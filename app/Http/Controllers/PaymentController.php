<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function addPaymentMethod(Request $request){
       $data = DB::table('payment_settings')->insert([

        ]);

        if($data){
            return response()->json([
                'code' => 201,

            ]);
        }
    }
}
