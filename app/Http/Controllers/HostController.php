<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    // public function goRaffleDetails($id)
    // {
    //     if (session()->has('user_id') && session()->get('user_type') == 'host') {
    //         $data = DB::table("raffle")->where('state_raffle_hosted', $id)->where('user_id', session()->get('user_id'))->first();
    //         if ($data) {
    //             return view('raffle-detail', compact('data'));
    //         } else {
    //             return redirect('/host/dashboard')->with('error', 'Raffle not found.');
    //         }
    //     } else {
    //         session()->flush();
    //         return redirect('/login');
    //     }
    // }
    public function goRaffleDetails($id)
    {
        $data = DB::table("raffle")->where('state_raffle_hosted', $id)->first();
        if ($data) {
            return view('raffle-detail', compact('data'));
        }
    }

    public function liveraffle(){
        if(session()->has('user_id') && session()->get('user_type') == 'host'){
            return view("host.liveraffle");
        }else{
            return redirect('/login');
        }
    }

    public function completedraffle(){
        if(session()->has('user_id') && session()->get('user_type') == 'host'){
            return view("host.completedraffle");
        }else{
            return redirect('/login');
        }
    }
}
