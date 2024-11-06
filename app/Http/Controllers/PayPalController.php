<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Log;
use Exception;

class PayPalController extends Controller
{
    protected $paypal;

    public function __construct()
    {
        // Ensure the PayPal service is properly initialized
        $this->paypal = new PayPalClient(); // Replace with your actual PayPal service initialization
    }

    public function payment(Request $request)
    {
        $amount = $request->input('amount'); // Get the amount from the request

        $provider = new PayPalClient;
        $provider->getAccessToken();
        $provider->setApiCredentials(config(key: 'paypal'));
        $provider->setCurrency('USD');

        $data = [
            "intent"              => "CAPTURE",
            "purchase_units"      => [
                [
                    "amount" => [
                        "value"         => $amount,
                        "currency_code" => 'USD',
                    ],
                ],
            ],
            "application_context" => [
                "cancel_url" => route('paypal.failed'),
                "return_url" => route('paypal.success'),
            ],
        ];

        // Create a payment
        $payment = $provider->createOrder($data);

        // Return the approval URL to the client
        if (isset($payment['links'][1]['href'])) {
            return response()->json(['approval_url' => $payment['links'][1]['href']]);
        }

        return response()->json(['error' => 'Payment creation failed'], 500);
    }

    public function failed()
    {
        return view('payment-failed', ['message' => 'Your payment was declined.']);
    }

    public function success(Request $request)
    {
        $this->paypal->getAccessToken();
        $token = $request->get('token');

        // Capture the payment
        $orderInfo = $this->paypal->showOrderDetails($token);
        $response = $this->paypal->capturePaymentOrder($token);

        // Log the response for debugging
        Log::info('PayPal Response:', $response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Save payment information to the database
            try {
                // Ensure you access the amount correctly
                $amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
                $currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
                $transactionId = $response['purchase_units'][0]['payments']['captures'][0]['id'];
                $payerEmail = $response['payer']['email_address'];
                $paymentId = $response['id'];
                $status = $response['status'];

                DB::table('payment_history')->insert([
                    'payment_id' => $paymentId,
                    'transaction_id' => $transactionId,
                    'amount' => $amount,
                    'currency' => $currency,
                    'status' => $status,
                    'payer_email' => $payerEmail,
                    'payment_method' => 'paypal',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'user_id' => 2
                ]);
            } catch (Exception $e) {
                Log::error('Database Insert Error:', ['error' => $e->getMessage()]);
                return redirect()->route('payment')->with('error', 'Failed to save payment information.');
            }

            return view('payment-success');
        } else {
            return redirect()->route('payment')->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
