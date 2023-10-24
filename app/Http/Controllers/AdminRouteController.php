<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.category');

        }else {
            session()->flush();
            return redirect('/login');
        }
    }
}
