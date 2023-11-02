<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HostController extends Controller
{

    public function getDashboard()
    {
        if (session()->has('user_id') && session()->get('user_type') == 'host') {
            return view('host.dashboard');
        } else {
            session()->flush();
            return redirect('/login');
        }
    }
}
