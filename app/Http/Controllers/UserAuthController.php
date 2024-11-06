<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// mobile app imports
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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

    public function logout()
    {
        if (session()->has('user_id')) {
            session()->flush();
            return redirect('/login');
        }
        return redirect('/login');
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

    function save_oranganisation(Request $req)
    {
        if (session()->has('uid') && (session()->get('user_type') == 'host')) {
            $validator = Validator::make($req->all(), [
                'image' => 'max:4000',
            ]);
            if ($validator->fails()) {
                return back()->with('error', $validator->getMessageBag());
            } else {

                $file = $req->file('image');
                $fileName = time() . $file->getClientOriginalName();;
                // $file->storeAs('uploads', $fileName);
                // $path = $file->store("public/images");
                // $imageNames = basename($path);
                $file->move(public_path('uploads/images'), $fileName);


                $data = DB::table('organisation')->insert([
                    'organisation_name' => $req->title,
                    'category_id' => $req->description,
                    'description' => $req->project_type,
                    'cover_image' => $fileName,
                    'website' => $req->website,
                    'handle' => $req->handle,
                    'status' => 1
                ]);
                if ($data) {

                    return  redirect()->back()->with('success', "Organisation successfully created");
                } else {
                    return redirect()->back()->with('error', "Something went wrong! Please try again");
                }
            }
        }
    }


    public function save_organisation(Request $request)
    {
        //check the authentication user
        if (session()->has('user_id') && session()->get('user_type') == 'host') {
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'organisation_name' => 'required',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'code' => 405,
                    'message' => $validator->errors()
                ]);
            }

            if ($request->has('image')) {
                $file = $request->file('image');
                $fileName = time() . $file->getClientOriginalName();;
                // $file->storeAs('uploads', $fileName);
                // $path = $file->store("public/images");
                // $imageNames = basename($path);
                $file->move(public_path('uploads/images'), $fileName);
                $data = DB::table('organisation')->insertGetId([
                    'category_id' => $request->category_id,
                    'organisation_name' => $request->organisation_name,
                    'cover_image' => $fileName,
                    'user_id' => session()->get('user_id'),
                    'handle' => $request->handle,
                    'website' => $request->website,
                    'description' => $request->description,
                    'status' => 1
                ]);

                if ($data) {
                    return response()->json([
                        'code' => 201,
                        'message' => 'Organisation created successfully',
                        'data' => $data
                    ]);
                } else {
                    return response()->json([
                        'code' => 405,
                        'message' => 'Unable to create organisation'
                    ]);
                }
            }
            $data = DB::table('organisation')->insertGetId([
                'category_id' => $request->category_id,
                'organisation_name' => $request->organisation_name,
                'cover_image' => '',
                'user_id' => session()->get('user_id'),
                'handle' => $request->handle,
                'website' => $request->website,
                'description' => $request->description,
                'status' => 1
            ]);

            if ($data) {
                return response()->json([
                    'code' => 201,
                    'message' => 'Organisation created successfully',
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'code' => 405,
                    'message' => 'Unable to create organisation'
                ]);
            }
        }
    }
    public function billAddress(Request $request)
    {
        // Check the authentication user
        if (session()->has('user_id') && session()->get('user_type') == 'user') {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'company_name' => 'required',
                'region' => 'required',
                'street_name' => 'required',
                'town' => 'required',
                'phone_number' => 'required',
                'email' => 'required',
                'zipcode' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->with('error', "All fields are required");
            }

            $data = DB::table('billaddress')->insert([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'company_name' => $request->input('company_name'),
                'region' => $request->input('region'),
                'zipcode' => $request->input('zipcode'),
                'town' => $request->input('town'),
                'country' => $request->input('country'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'apartment' => $request->input('apartment'),
                'street_name' => $request->input('street_name'),
            ]);

            if ($data) {
                return redirect()->back()->with('success', 'Billing address added successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }


    public function createFundraise($id)
    {
        $data = DB::table('organisation')->where('id', $id)->first();
        if ($data) {
            return view('fundraise');
        } else {
            return redirect('/');
        }
    }

    public function createRaffle()
    {
        if (session()->has('user_id') && (session()->get('user_type') == 'host')) {

            return view('createraffle');
        } else {
            return redirect('/login');
        }
    }

    public function getStateByCountryId(Request $request)
    {
        $data = DB::table('states')->where('country_id', $request->c_id)->orderBy('name', 'asc')->get();
        if ($data) {
            return response()->json([
                'code' => 201,
                'data' => $data
            ]);
        }
    }

    public function getCityByStateId(Request $request)
    {
        $data = DB::table('cities')->where('state_id', $request->s_id)->orderBy('name', 'asc')->get();
        if ($data) {
            return response()->json([
                'code' => 201,
                'data' => $data
            ]);
        }
    }
    public function addFundraising(Request $request)
    {
        if (session()->has('user_id') && session()->get('user_type') == 'host') {

            $data = DB::table('fundraising_check')->insertGetId([
                'user_id' => session()->get('user_id'),
                'name' => $request->name,
                'CO' => $request->CO,
                'address' => $request->address,
                'addressline' => $request->addresslines,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'zip_code' => $request->zip_code,
                'phone_number' => $request->phone_no,

            ]);

            if ($data) {

                return response()->json([
                    'code' => 201,
                    'message' => 'Fundraising submitted successfully',
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'code' => 405,
                    'message' => 'Unable to create fundraising check'
                ]);
            }
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
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'device_name' => 'string|max:255|nullable',
                'user_type' => 'required|integer',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'about' => 'required|string|max:255',
                // 'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048'
                'image' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $imagePath = null;
            if ($request->hasFile('image')) {
                // Get the file from the request
                $file = $request->file('image');

                // Generate a unique file name
                $imageName = 'profile_' . time() . '.' . $file->getClientOriginalExtension();

                // Save the file to the S3 storage
                $filePath = $file->storeAs('profiles', $imageName, 's3');

                // Get the full URL to the image
                // $imagePath = Storage::disk('s3')->url($filePath);
            }

            // Create user with image path
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'about' => $request->about,
                'image' => $request->image, // Store full S3 URL in the database
            ]);

            // Generate token
            $deviceName = $request->device_name ?? 'Default Device';
            $token = $user->createToken($deviceName)->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error during registration: ', [
                'error' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->except(['password', 'password_confirmation'])
            ]);

            return response()->json(['error' => 'An error occurred during registration. Please try again later.'], 500);
        }
    }



    // public function update_register(Request $request)
    // {
    //     // Validate the request data
    //     $validator = Validator::make($request->all(), [

    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'username' => 'required|string|max:255|unique:users,username,' . auth()->id(),
    //         'about' => 'nullable|string|max:1000',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
    //     ]);

    //     // Return validation errors if any
    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     try {
    //         // Verify and authenticate user via token
    //         if (!Auth::guard('api')->check()) {
    //             return response()->json(['error' => 'Unauthenticated.'], 401);
    //         }

    //         $user = Auth::guard('api')->user(); // Get authenticated user

    //         // Handle file upload
    //         $fileName = null;
    //         if ($request->hasFile('image')) {
    //             $file = $request->file('image');
    //             $fileName = time() . '_' . $file->getClientOriginalName();

    //             // Handle file move with error check
    //             try {
    //                 $file->move(public_path('uploads/images'), $fileName);
    //             } catch (\Exception $e) {
    //                 \Log::error('File upload error: ' . $e->getMessage());
    //                 return response()->json([
    //                     'code' => 500,
    //                     'message' => 'File upload failed. Please try again.'
    //                 ], 500);
    //             }
    //         }

    //         // Update user details in the database
    //         $user->first_name = $request->first_name;
    //         $user->last_name = $request->last_name;
    //         $user->username = $request->username;
    //         $user->about = $request->about;
    //         if ($fileName) {
    //             $user->image = $fileName; // Update profile picture if uploaded
    //         }
    //         $user->reg_status = 1; // Assuming this is a registration status update

    //         $user->save();

    //         // Return success response
    //         return response()->json([
    //             'code' => 201,
    //             'message' => 'Account successfully updated'
    //         ]);
    //     } catch (\Exception $e) {
    //         \Log::error('Error updating user details: ' . $e->getMessage());

    //         // Return error response
    //         return response()->json([
    //             'code' => 500,
    //             'message' => 'Internal server error. Please try again later.'
    //         ], 500);
    //     }
    // }


    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'device_name' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect']
            ]);
        }

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken
        ]);
    }

    /**
     * Log out a user.
     */
    // public function logout(Request $request)
    // {
    //     $request->user()->tokens()->delete();

    //     return response()->json(['message' => 'Successfully logged out']);
    // }
}
