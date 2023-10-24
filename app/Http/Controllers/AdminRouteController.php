<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminRouteController extends Controller
{
   public function index(){
        return view('admin.dashboard');
    }
    public function users(){
        return view('admin.user');
    }
    public function admins(){
        return view('admin.admin');
    }
    public function category(){
        if(session()->has('user_id') && session()->get('user_type') == 'admin'){
            $data = DB::table('category')->get();

        return view('admin.category', compact('data'));

        }else {
            session()->flush();
            return redirect('/login');
        }
    }

    public function saveCategory(Request $request){
        //check the authentication user
        if(session()->has('user_id') && session()->get('user_type') == 'admin'){
            $validator = Validator::make($request->all(),[
                'category_name' => 'required'
            ]);

            if($validator->fails()){
                return back()->with('error', "All fields are required");
            }

            $data = DB::table('category')->insert([
                'category_name' => $request->category_name,
                'category_status' => 1
            ]);

            if($data){
                return redirect()->back()->with('success', 'Category added successfully');
            }else{
                return redirect()->back()->with('error', 'Something went wrong');
            }

        }
    }
}


