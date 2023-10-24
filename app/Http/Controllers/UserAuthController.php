<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    function dashboard(){
        if(session()->has('user_id') && (session()->get('user_type') == 'user')){
             $data = DB::table('users')->where('id', session()->get('user_id'))->exists();
             if($data){
                 return view('dashboard');

             }else{
                 session()->flush();
                 return redirect('/login');

             }
            // return view('admin.dashboard',compact('data'));
        }else{
            return redirect('/login');
        }
    }
    function walkThrough(){
        if(session()->has('user_id') && (session()->get('user_type') == 'user')){
            $data = DB::table('users')->where('id', session()->get('user_id'))->exists();
            if($data){
                return view('host.workthrough');

            }else{
                session()->flush();
                return redirect('/login');

            }
            // return view('admin.dashboard',compact('data'));
        }else{
            return redirect('/login');
        }
    }


    function createAccount(Request $request){
        $check = DB::table("users")->where("email", $request->email)->exists();
        if($check){
            return response()->json([
                'code' => 405,
                'message' => 'Email already exist'
            ]);
        }else{
            $user = DB::table("users")->insert([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => 1,
                'status' => 1
            ]);

            if($user){
                $data = DB::table('users')->where('email',$request->email)->first();
                $request->session()->put('user_id', $data->id);
                $request->session()->put('user_type', 'user');

                return response()->json([
                    'code' => 201,
                    'message' => 'Account created successfully',
                    // "user" => $data
                ]);
            }else{
                   return response()->json([
                    'code' => 405,
                    'message' => 'Unable to create account, please try again later'
                ]);
            }
        }
    }

    public function loginAccount(Request $req){
        $check = DB::table("users")->where("email", $req->email);
        if($check->exists()){
            $ch = $check->first();
            if(Hash::check($req->password,$ch->password)){
                if($ch->status == 0){
                    return response()->json([
                        'code'=>401,
                        'message'=>"Sorry you can't login, please contact System Admin"
                    ]);
                }else{
                    $user_type = $ch->user_type == 1 ? 'user' : 'admin';
                    $req->session()->put('user_id', $ch->id);
                    $req->session()->put('user_type', $user_type);

                    return response()->json([
                        'code'=>201,
                        'message' =>"You have successfully logged in",
                        'type'=>  $ch->user_type == 1 ? 'user' : 'admin',
                        'u_status' => $ch->reg_status
                    ]);

                }
            }else{
                return response()->json([
                    'code'=>405,
                    'message'=>"Invalid email or password"
                ]);
            }
        }else{

                   return response()->json([
                    'code' => 405,
                    'message' => 'Invalid email or password'
                ]);
        }
    }

    public function logout(){
        if(session()->has('user_id')){
            session()->flush();
            return redirect('/login');
        }
        return redirect('/login');

    }

    public function complete_register(){
        if(session()->has('user_id') && (session()->get('user_type') == 'user')){
            $data = DB::table('users')->where('id', session()->get('user_id'))->first();
            $data = $data->email;
            return view('yourself',get_defined_vars());
        }else{
            return redirect('/login');
        }

    }

    public function update_register(Request $request){
        if(session()->has('user_id')){
           $file = $request->file('image');
           $fileName = time().$file->getClientOriginalName();;
           $file->storeAs('uploads',$fileName);
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
            if($user){
                return response()->json([
                    'code' => 201,
                    'message' => "Account successfully updated"
                ]);
            }else{
                 return response()->json([
                        'code' => 405,
                        'message' => "Unable to update your profile"
                    ]);
            }
        }
    }
}
