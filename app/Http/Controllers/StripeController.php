<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Error;
use Stripe;

class StripeController extends Controller
{
    function createPay(Request $request)
    {
        $pay_data = DB::table('payment_settings')->where('id', 1)->first();

        // $stripe = new \Stripe\StripeClient("sk_test_51HIb63EFkSOsWovihAgvTLfBDmMm4IAXuUvQ9PCeNdJhiNj8uRwpC34f8tX4QtKBIOTTkzyVECBwWRpWFilyZ38z00DUBhGP4o");
        $stripe = new \Stripe\StripeClient($pay_data->code_access);
        try {
            // // retrieve JSON from POST body
            // $jsonStr = file_get_contents('php://input');
            // $jsonObj = json_decode($jsonStr);

            $amount = $request['amount'];
            $new_amount = ((double)$amount * 100);
            // Create a PaymentIntent with amount and currency
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => $new_amount,
                'currency' => 'usd',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
                // 'payment_method_types' => ['card'],
                'metadata' => [
                    'raffle_id' => $request->raffle_id,
                    'total_raffle' => $request->total_raffle,
                    'pay_type' => $request->pay_type
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            $request->session()->put('raffle_id', $request->raffle_id);
            $request->session()->put('total_raffle', $request->total_raffle);
            $request->session()->put('pay_type', $request->pay_type);
            $request->session()->put('amount', $request->amount);

            return response()->json($output);
        } catch (\Error $e) {
            return response()->json([
                'code' => 405,
                'error' => $e->getMessage(),
                'response' => $output
            ]);
        }
    }

    function paymentSuccess(Request $request)
    {
        $pay_data = DB::table('payment_settings')->where('id', 1)->first();
        $paymentIntent = $request->query('payment_intent');
        // $stripe = new \Stripe\StripeClient('sk_test_51HIb63EFkSOsWovihAgvTLfBDmMm4IAXuUvQ9PCeNdJhiNj8uRwpC34f8tX4QtKBIOTTkzyVECBwWRpWFilyZ38z00DUBhGP4o');
        $stripe = new \Stripe\StripeClient($pay_data->code_access);

        $res =   $stripe->paymentIntents->retrieve(
            $paymentIntent,
            []
        );
 if(!is_null($res->latest_charge)){
  $ed = $stripe->charges->retrieve(
            $res->latest_charge,
            []
          );


            $insert_order = DB::table('raffle_order')->insertGetId([
                'raffle_id' => session()->get('raffle_id'),
                'amount' => session()->get('amount'),
                'total' => session()->get('total_raffle'),
                'user_id' => session()->get('user_id'),
                'date_purchase' => now(),
                'payment_reason' => session()->get('pay_type') == 'purchase' ? 1 : 2
              ]);
              if($insert_order){
                $dat = DB::table('payment_history')->insert([
                    'payment_id' => $ed->id,
                    'payment_method' => $ed->payment_method,
                    'txn_id' => $ed->balance_transaction,
                    'user_id' => session()->get('user_id'),
                    'order_id' => $insert_order,

                ]);

                if($dat){
                    return view('payment-success');
                }
              }
          }else{
            return redirect('make-payment');
          }



        // dd($ed);
         //dd($res);
    }
}
