<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            // return view('admin.dashboard',compact('data')); return array of object
        } else {
            return redirect('/login');
        }
    }

    function walkThrough()
    {
        if (session()->has('user_id') && (session()->get('user_type') == 'user')) {
            $data = DB::table('users')->where('id', session()->get('user_id'))->exists();
            if ($data) {
                return view('host.workthrough');
            } else {
                session()->flush();
                return redirect('/login');
            }
            // return view('admin.dashboard',compact('data'));
        } else {
            return redirect('/login');
        }
    }


    function chooseOrganisation()
    {
        if (session()->has('user_id') && (session()->get('user_type') == 'user')) {
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
            session().flush();
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
                'user_type' => 1,
                'status' => 1
            ]);

            if ($user) {
                $data = DB::table('users')->where('email', $request->email)->first();
                $request->session()->put('user_id', $data->id);
                $request->session()->put('user_type', 'user');

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
                    $user_type = $ch->user_type == 1 ? 'user' : ( $ch->user_type == 3 ? 'host' : 'admin') ;

                    //Store into session fields
                    $req->session()->put('user_id', $ch->id);
                    $req->session()->put('user_type', $user_type);

                    return response()->json([
                        'code' => 201,
                        'message' => "You have successfully logged in",
                        'type' =>  $ch->user_type == 1 ? 'user' : ( $ch->user_type == 3 ? 'host' : 'admin'),
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
        if (session()->has('user_id') && (session()->get('user_type') == 'user')) {
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
            $file->storeAs('uploads', $fileName);
            $path = $file->store("public/images");
            $imageNames = basename($path);
            $user = DB::table('users')->where('id', session()->get('user_id'))->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'about' => $request->about,
                'profile_pix' => $imageNames,
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
        if (session()->has('uid') && (session()->get('user_type') == 'user')) {
            $validator = Validator::make($req->all(), [
                'image' => 'max:4000',
            ]);
            if ($validator->fails()) {
                return back()->with('error', $validator->getMessageBag());
            } else {

                $file = $req->file('image');
                $fileName = time() . $file->getClientOriginalName();;
                $file->storeAs('uploads', $fileName);
                $path = $file->store("public/images");
                $imageNames = basename($path);

                $data = DB::table('organisation')->insert([
                    'organisation_name' => $req->title,
                    'category_id' => $req->description,
                    'description' => $req->project_type,
                    'cover_image' => $imageNames,
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
        if (session()->has('user_id') && session()->get('user_type') == 'user') {
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
                $file->storeAs('uploads', $fileName);
                $path = $file->store("public/images");
                $imageNames = basename($path);
                $data = DB::table('organisation')->insert([
                    'category_id' => $request->category_id,
                    'organisation_name' => $request->organisation_name,
                    'cover_image' => $imageNames,
                    'user_id' => session()->get('user_id'),
                    'handle' => $request->handle,
                    'website' => $request->website,
                    'description' => $request->description,
                    'status' => 1
                ]);

                if ($data) {
                    return response()->json([
                        'code' => 201,
                        'message' => 'Organisation created successfully'
                    ]);
                } else {
                    return response()->json([
                        'code' => 405,
                        'message' => 'Unable to create organisation'
                    ]);
                }
            }
            $data = DB::table('organisation')->insert([
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
                    'message' => 'Organisation created successfully'
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
        if (session()->has('user_id') && (session()->get('user_type') == 'user')) {

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
        if (session()->has('user_id') && session()->get('user_type') == 'user') {

            $data = DB::table('fundraising_check')->insertGetId([
                'user_id' => session()->get('user_id'),
                'name' => $request->name,
                'c_o' => $request->c_o,
                'user_id' => session()->get('user_id'),
                'address' => $request->address,
                'address_2' => $request->address_s,
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

    public function changeUser(){
        if (session()->has('user_id') && (session()->get('user_type') == 'user')) {
            $data = DB::table('users')->where('id', session()->get('user_id') )->update([
                'user_type' => 3
            ]);
            if($data){
                session()->put('user_type','host');
                return response()->json([
                    'code' => 201,
                    'message' => "Congratulation you are now a host"
                ]);
            }else{
                return response()->json([
                    'code' => 405,
                    'message' => "Something went wrong"
                ]);
            }
        }

    }

    public function saveAddress(Request $request){
        if (session()->has('user_id') && session()->get('user_type') == 'user') {
            $validator = Validator::make($request->all(),[
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'street' => 'required',
                'type' => 'required',
                'country_id' => 'required',

            ]);

            if($validator->fails()){
                // return response()->json([
                //     'code' => 404,
                //     'message' => "Please make sure you fill in the required"
                // ]);
                return redirect()->back()->with('error','Please make sure you fill in the required');
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
            if($data){
                // return response()->json([
                //     'code' => 201,
                //     'message' => $request->type == 1 ? 'Billing Address Successfully Added' : 'Shipping Address successfully Added'
                // ]);
                return redirect('/user/addresses')->with('success',$request->type == 1 ? 'Billing Address Successfully Added' : 'Shipping Address successfully Added');
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }
        }else{
            return redirect('/login');
        }
    }
}
