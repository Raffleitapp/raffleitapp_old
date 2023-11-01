<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class StripeController extends Controller
{
    function createPay(Request $resquest)
    {
        $stripe = new \Stripe\StripeClient("sk_test_51HIb63EFkSOsWovihAgvTLfBDmMm4IAXuUvQ9PCeNdJhiNj8uRwpC34f8tX4QtKBIOTTkzyVECBwWRpWFilyZ38z00DUBhGP4o");

        try {
            // // retrieve JSON from POST body
            // $jsonStr = file_get_contents('php://input');
            // $jsonObj = json_decode($jsonStr);

            // Create a PaymentIntent with amount and currency
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => 100 * 100,
                'currency' => 'usd',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
                // 'payment_method_types' => ['card'],
                'metadata' => [
                    'order_id' => '6735',
                 'business' => 'Danscotech'
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            return response()->json($output);

       
        } catch (Error $e) {
            return response()->json([
                'code' => 405,
                'error' => $e->getMessage(),
                'response' => $output
            ]);
        }
    }

    function paymentSuccess(Request $request)
    {
        $paymentIntent = $request->query('payment_intent');
        $stripe = new \Stripe\StripeClient('sk_test_51HIb63EFkSOsWovihAgvTLfBDmMm4IAXuUvQ9PCeNdJhiNj8uRwpC34f8tX4QtKBIOTTkzyVECBwWRpWFilyZ38z00DUBhGP4o');
        $res =   $stripe->paymentIntents->retrieve(
            $paymentIntent,
            []
        );

        // $ed = $stripe->charges->retrieve(
        //     $res->latest_charge,
        //     []
        //   );
        // dd($ed->billing_details);
        dd($res);
    }
}
