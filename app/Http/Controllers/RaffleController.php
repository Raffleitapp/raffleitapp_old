<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Raffle;
use Stripe;

class RaffleController extends Controller
{
    public function generateRandomAlphanumeric($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
    public function createRaffle(Request $req)
    {
        $image1 = '';
        $image2 = '';
        $image3 = '';
        $image4 = '';

        // Handle image uploads
        $imagePaths = ['image1', 'image2', 'image3', 'image4'];
        foreach ($imagePaths as $imagePath) {
            if ($req->hasFile($imagePath)) { // Check if the request has the file
                $file = $req->file($imagePath);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/images'), $fileName);
                ${$imagePath} = $fileName; // Use variable variables to dynamically assign image paths
            }
        }

        // New image upload code
        $images = []; // Initialize an array for additional images

        // Handle additional image uploads
        if ($req->has('images')) { // Check for additional images
            foreach ($req->input('images') as $imageUrl) {
                $images[] = $imageUrl; // Collect additional image URLs
            }
        }

        $link = $this->generateRandomAlphanumeric(10);

        // Insert raffle data
        $data = DB::table('raffle')->insertGetId([
            'user_id' => session()->get('user_id'),
            'organisation_id' => $req->organisation_id,
            'fundraising_id' => $req->fundraiser_id,
            'description' => $req->description,
            'host_name' => $req->host_name,
            'image1' => $images[0] ?? $image1, // Use additional images or fallback to uploaded images
            'image2' => $images[1] ?? $image2,
            'image3' => $images[2] ?? $image3,
            'image4' => $images[3] ?? $image4,
            'target' => $req->raffle_target,
            'starting_date' => $req->starting_date,
            'ending_date' => $req->ending_date,
            'state_raffle_hosted' => $link,
            'approve_status' => 2
        ]);
        if ($data) {

            DB::table("ticket_price")->insert([
                'raffle_id' => $data,
                'one' => $req->one_ticket,
                'three' => $req->three_ticket,
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

    public function allRaffles()
    {
        $data = DB::table('raffle')
            ->where('approve_status', 1)->leftJoin('raffle_order', 'raffle.id', 'raffle_order.raffle_id')->where('raffle.ending_date', '>', now()->format('Y-m-d H:i:s'))
            ->leftJoin('organisation', 'raffle.organisation_id', 'organisation.id')
            ->select('raffle.starting_date', 'raffle.id', 'raffle.ending_date', 'raffle.host_name', 'raffle.state_raffle_hosted', 'organisation.organisation_name', 'organisation.cover_image', 'organisation.handle', 'organisation.website',  DB::raw('COALESCE(SUM(raffle_order.amount), 0) as total_amount'))
            ->groupBy(
                'raffle.id',
                'raffle.starting_date',
                'raffle.ending_date',  // Corrected column name
                'raffle.host_name',
                'raffle.state_raffle_hosted',
                'organisation.organisation_name',
                'organisation.cover_image',
                'organisation.handle',
                'organisation.website'
            )->paginate(7);
        return view('allraffle', compact('data'));
    }

    public function raffleDetails($id)
    {
        $data = DB::table("raffle")->where('state_raffle_hosted', $id)->first();
        if ($data) {
            return view('raffle-detail', compact('data'));
        }
    }

    public function extendDate(Request $request)
    {

        $update = date("Y-m-d H:i:s", strtotime($request->current_date . "+" . $request->day_no . "days"));
        $data = DB::table('raffle')->where('id', $request->raffle_id)->update([
            'ending_date' => $update,
        ]);
        if ($data) {
            return redirect()->back()->with('message', 'Ending Date updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to update ending date');
        }
    }


    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100 * 150,
            "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => "Making test payment."
        ]);

        Session::flash('success', 'Payment has been successfully processed.');

        return back();
    }

    // mobile app details
    public function createRaffleMobile(Request $req)

    {
        $image1 = '';
        $image2 = '';
        $image3 = '';
        $image4 = '';

        // Handle image uploads
        $imagePaths = ['image1', 'image2', 'image3', 'image4'];
        foreach ($imagePaths as $imagePath) {
            if ($req->hasFile($imagePath)) {
                $file = $req->file($imagePath);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/images'), $fileName);
                ${$imagePath} = $fileName; // Use variable variables to dynamically assign image paths
            }
        }

        // Generate unique link
        $link = $this->generateRandomAlphanumeric(10);

        //new image upload code
        $images = [];

        // Handle image uploads
        if ($req->has('images')) {
            foreach ($req->input('images') as $imageUrl) {
                $images[] = $imageUrl;
            }
        }

        // Validate the request data
        $validatedData = $req->validate([
            'user_id' => 'required|integer',
            'organisation_id' => 'required|integer',
            'fundraising_id' => 'required|integer',
            'target' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'hostname' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
            'text1' => 'required|numeric|min:0',
            'text5' => 'required|numeric|min:0',
            'text20' => 'required|numeric|min:0',
            'text50' => 'required|numeric|min:0',
            'text100' => 'required|numeric|min:0',
            'text150' => 'required|numeric|min:0'
        ]);

        // Insert raffle data
        $raffleId = DB::table('raffle')->insertGetId([
            'user_id' => $validatedData['user_id'],
            'organisation_id' => $validatedData['organisation_id'],
            'fundraising_id' => $validatedData['fundraising_id'],
            'description' => $validatedData['description'],
            'target' => $validatedData['target'],
            'host_name' => $validatedData['hostname'],
            'image1' => $images[0] ?? null,
            'image2' => $images[1] ?? null,
            'image3' => $images[2] ?? null,
            'image4' => $images[3] ?? null,
            'starting_date' => $validatedData['startDate'],
            'ending_date' => $validatedData['endDate'],
            'state_raffle_hosted' => $link,
            'approve_status' => 1
        ]);

        if ($raffleId) {
            DB::table('ticket_price')->insert([
                'raffle_id' => $raffleId,
                'one' => $validatedData['text1'],
                'three' => $validatedData['text5'],
                'ten' => $validatedData['text20'],
                'twenty' => $validatedData['text50'],
                'one_twenty' => $validatedData['text100'],
                'two_hundred' => $validatedData['text150']
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

    public function fetch_raffles()
    {
        $raffles = Raffle::all();
        return response()->json($raffles);
    }
}
