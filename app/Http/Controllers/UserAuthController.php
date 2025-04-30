<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    function dashboard()
    {

        if (session()->has('user_id') && (session()->get('user_type') == 'user')) {
            $data = DB::table('users')->where('id', session()->get('user_id'))->exists();
            if ($data) {
                $getUser = DB::table('users')->where('id', session()->get('user_id'))->first();
                return view('dashboard', compact('getUser'));
            } else {
                //to clear all the session already stored
                session()->flush();

                //  redirect me
                return redirect('/login');
            }
        } else {
            session()->flush();
            return redirect('/login');
        }
    }

    function walkThrough()
    {
        if (session()->has('user_id') && (session()->get('user_type') == 'host')) {
            $data = DB::table('users')->where('id', session()->get('user_id'))->exists();
            if ($data) {
                return view('host.workthrough');
            } else {
                session()->flush();
                return redirect('/login');
            }
        } else {
            session()->flush();
            return redirect('/login');
        }
    }


    function chooseOrganisation()
    {
        if (session()->has('user_id') && (session()->get('user_type') == 'host')) {
            $data = DB::table('users')->where('id', session()->get('user_id'))->exists();
            if ($data) {
                $categoryData = DB::table('organisation')->where('user_id', session()->get('user_id'))->get();

                return view('host.listorganisation', compact('categoryData'));
            } else {
                session()->flush();
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }


    function address()
    {
        if (session()->has('user_id') && (session()->get('user_type') == 'user')) {
            $data = DB::table('users')->where('id', session()->get('user_id'))->exists();
            if ($data) {
                return view('addresses');
            } else {
                session()->flush();
                return redirect('/login');
            }
        } else {
            session()->flush();
            return redirect('/login');
        }
    }

    function createAccount(Request $request)
    {
        $check = DB::table("users")->where("email", $request->email)->exists();
        if ($check) {
            return response()->json([
                'code' => 405,
                'message' => 'Email already exist'
            ]);
        } else {
            $user = DB::table("users")->insert([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
                'status' => 1
            ]);

            if ($user) {
                $data = DB::table('users')->where('email', $request->email)->first();
                $request->session()->put('user_id', $data->id);
                $request->session()->put('user_type', $request->user_type == 1 ? 'user' : 'host');

                return response()->json([
                    'code' => 201,
                    'message' => 'Account created successfully',
                    // "user" => $data
                ]);
            } else {
                return response()->json([
                    'code' => 405,
                    'message' => 'Unable to create account, please try again later'
                ]);
            }
        }
    }

    public function loginAccount(Request $req)
    {
        $check = DB::table("users")->where("email", $req->email);
        if ($check->exists()) {
            $ch = $check->first();
            if (Hash::check($req->password, $ch->password)) {
                if ($ch->status == 0) {
                    return response()->json([
                        'code' => 401,
                        'message' => "Sorry you can't login, please contact System Admin"
                    ]);
                } else {
                    $ip = $req->ip();
                    DB::table('location_data')->insert([
                        'user_id' => $ch->id,
                        'ip_address' => $ip,
                        'created_at' => now()
                    ]);
                    // $currentUserInfo = Location::get($ip);
                    $user_type = $ch->user_type == 1 ? 'user' : ($ch->user_type == 3 ? 'host' : 'admin');

                    //Store into session fields
                    $req->session()->put('user_id', $ch->id);
                    $req->session()->put('user_type', $user_type);

                    return response()->json([
                        'code' => 201,
                        'message' => "You have successfully logged in",
                        'type' =>  $ch->user_type == 1 ? 'user' : ($ch->user_type == 3 ? 'host' : 'admin'),
                        'u_status' => $ch->reg_status
                    ]);
                }
            } else {
                return response()->json([
                    'code' => 405,
                    'message' => "Invalid email or password"
                ]);
            }
        } else {

            return response()->json([
                'code' => 405,
                'message' => 'Invalid email or password'
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function complete_register()
    {
        if (session()->has('user_id') && (session()->get('user_type') == 'user' || session()->get('user_type') == 'host')) {
            $data = DB::table('users')->where('id', session()->get('user_id'));
            if ($data->exists()) {
                $datas = $data->first();
                $dt = $datas->email;

                return view('yourself', get_defined_vars());
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }

    public function update_register(Request $request)
    {
        if (session()->has('user_id')) {
            $file = $request->file('image');
            $fileName = time() . $file->getClientOriginalName();;
            // $file->storeAs('uploads', $fileName);
            // $path = $file->store("public/images");
            // $imageNames = basename($path);
            $file->move(public_path('uploads/images'), $fileName);
            $user = DB::table('users')->where('id', session()->get('user_id'))->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'about' => $request->about,
                'image' => $fileName,
                'reg_status' => 1

            ]);
            if ($user) {
                return response()->json([
                    'code' => 201,
                    'message' => "Account successfully updated"
                ]);
            } else {
                return response()->json([
                    'code' => 405,
                    'message' => "Unable to update your profile"
                ]);
            }
        }
    }

    public function saveOrganisation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'organisation_name' => 'required|string|max:255',
            'handle' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|file|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $coverImage = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $coverImage = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/images'), $coverImage);
            }

            $organisationId = DB::table('organisation')->insertGetId([
                'category_id' => $request->category_id,
                'organisation_name' => $request->organisation_name,
                'cover_image' => $coverImage,
                'user_id' => $request->user()->id,
                'handle' => $request->handle,
                'website' => $request->website,
                'description' => $request->description,
                'status' => 1,
            ]);

            return response()->json([
                'message' => 'Organisation created successfully',
                'organisation_id' => $organisationId,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Organisation creation error: ', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Unable to create organisation. Please try again later.'], 500);
        }
    }

    public function billAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'region' => 'required|string|max:255',
            'street_name' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'zipcode' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            DB::table('billaddress')->insert([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company_name' => $request->company_name,
                'region' => $request->region,
                'zipcode' => $request->zipcode,
                'town' => $request->town,
                'country' => $request->country,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'apartment' => $request->apartment,
                'street_name' => $request->street_name,
            ]);

            return response()->json(['message' => 'Billing address added successfully'], 201);
        } catch (\Exception $e) {
            Log::error('Billing address error: ', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Unable to add billing address. Please try again later.'], 500);
        }
    }

    public function createFundraise(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'organisation_id' => 'required|integer|exists:organisation,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $fundraiseId = DB::table('fundraising')->insertGetId([
                'organisation_id' => $request->organisation_id,
                'name' => $request->name,
                'description' => $request->description,
                'status' => 1,
            ]);

            return response()->json([
                'message' => 'Fundraise created successfully',
                'fundraise_id' => $fundraiseId,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Fundraise creation error: ', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Unable to create fundraise. Please try again later.'], 500);
        }
    }

    public function shipAddress(Request $request)
    {
        // Check the authentication user
        if (session()->has('user_id') && session()->get('user_type') == 'user') {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'company_name' => 'required',
                'region' => 'required',
                'street_address' => 'required',
                'town' => 'required',
                'zipcode' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'All fields are required');
            }

            $data = DB::table('shipaddress')->insert([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'company_name' => $request->input('company_name'),
                'region' => $request->input('region'),
                'zipcode' => $request->input('zipcode'),
                'town' => $request->input('town'),
                'street_address' => $request->input('street_address'),
                'apartment' => $request->input('apartment'),
                'country' => $request->input('country')
            ]);

            if ($data) {
                return redirect()->back()->with('success', 'Shipping address added successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function changeUser()
    {
        if (session()->has('user_id') && (session()->get('user_type') == 'user')) {
            $data = DB::table('users')->where('id', session()->get('user_id'))->update([
                'user_type' => 3
            ]);
            if ($data) {
                session()->put('user_type', 'host');
                return response()->json([
                    'code' => 201,
                    'message' => "Congratulation you are now a host"
                ]);
            } else {
                return response()->json([
                    'code' => 405,
                    'message' => "Something went wrong"
                ]);
            }
        }
    }

    public function saveAddress(Request $request)
    {
        if (session()->has('user_id') && session()->get('user_type') == 'user') {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'street' => 'required',
                'type' => 'required',
                'country_id' => 'required',

            ]);

            if ($validator->fails()) {
                // return response()->json([
                //     'code' => 404,
                //     'message' => "Please make sure you fill in the required"
                // ]);
                return redirect()->back()->with('error', 'Please make sure you fill in the required');
            }
            $data = DB::table('addresses')->insert([
                'first_name' => $request['first_name'],
                'last_name' => $request->last_name,
                'email' => $request['email'],
                'phone_no' => $request['phone_no'],
                'company_name' => $request['company_name'],
                'street' => $request['street'],
                'apartment' => $request['apartment'],
                'city' => $request['city'],
                'country_id' => $request['country_id'],
                'state_id' => $request['state_id'],
                'type' => $request['type'],
                'user_id'  => session()->get("user_id")
            ]);
            if ($data) {
                // return response()->json([
                //     'code' => 201,
                //     'message' => $request->type == 1 ? 'Billing Address Successfully Added' : 'Shipping Address successfully Added'
                // ]);
                return redirect('/user/addresses')->with('success', $request->type == 1 ? 'Billing Address Successfully Added' : 'Shipping Address successfully Added');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        } else {
            return redirect('/login');
        }
    }

    public function raffles()
    {
        if (session()->has('user_id') && session()->get('user_type') == 'user') {
            return view('ticket');
        } else {
            session()->flush();
            return redirect('login');
        }
    }


    // mobile app codebase
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'about' => 'required|string|max:255',
            'image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'about' => $request->about,
                'image' => $request->image,
            ]);

            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Registration error: ', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred during registration. Please try again later.'], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid email or password'], 401);
        }

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
        ], 200);
    }
}
