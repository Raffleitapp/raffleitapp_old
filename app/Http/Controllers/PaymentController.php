<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
