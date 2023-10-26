<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Stripe;

class RaffleController extends Controller
{
   public function generateRandomAlphanumeric($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
   public function createRaffle(Request $req){

        $image1 = '';
        $image2 = '';
        $image3 = '';
        $image4 = '';

        if($req->has('image1')){
            $file = $req->file('image1');
            $fileName = time() . $file->getClientOriginalName();;
            $file->storeAs('uploads', $fileName);
            $path = $file->store("public/images");
            $imageNames = basename($path);
           global $image1;
           $image1 = $imageNames;
        }

        if($req->has('image2')){
            $file = $req->file('image2');
            $fileName = time() . $file->getClientOriginalName();;
            $file->storeAs('uploads', $fileName);
            $path = $file->store("public/images");
            $imageNames = basename($path);
           global $image2;
           $image2 = $imageNames;
        }
        if($req->has('image3')){
            $file = $req->file('image3');
            $fileName = time() . $file->getClientOriginalName();;
            $file->storeAs('uploads', $fileName);
            $path = $file->store("public/images");
            $imageNames = basename($path);
           global $image3;
           $image3 = $imageNames;
        }

        if($req->has('image4')){
            $file = $req->file('image4');
            $fileName = time() . $file->getClientOriginalName();;
            $file->storeAs('uploads', $fileName);
            $path = $file->store("public/images");
            $imageNames = basename($path);
           global $image4;
           $image4 = $imageNames;
        }


        $link = $this->generateRandomAlphanumeric(10);

            $data = DB::table('raffle')->insertGetId([
                'user_id' => session()->get('user_id'),
                'organisation_id' => $req->organisation_id,
                'fundraising_id' => $req->fundraiser_id,
                'description' => $req->description,
                'host_name' => $req->host_name,
                'image1' => $image1,
                'image2' => $image2,
                'image3' => $image3,
                'image4' => $image4,
                'starting_date' => $req->starting_date,
                'ending_date' => $req->ending_date,
                'state_raffle_hosted' => $link,
                'approve_status' => 2
            ]);
            if ($data) {

                DB::table("ticket_price")->insert([
                    'raffle_id' => $data,
                    'three' =>$req->three_ticket,
                    'ten' => $req->ten_ticket,
                    'twenty' => $req->twenty_ticket,
                    'one_twenty' => $req->one_twenty,
                    'two_hundred' => $req->two_hundred
                ]);
                return response()->json([
                    'code' => 201,
                    'message' => "Raffle created successfully"
                ]);
            } else {
                return response()->json([
                    'code' => 405,
                    'message' => "Unable to create raffle"
                ]);
            }


   }

   public function raffleDetails($id){
        $data = DB::table("raffle")->where('state_raffle_hosted', $id)->first();
        if ($data) {
            return view('raffle-detail',compact('data'));
        }
    }




    //pay

    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Making test payment."
        ]);

        Session::flash('success', 'Payment has been successfully processed.');

        return back();
    }


}
