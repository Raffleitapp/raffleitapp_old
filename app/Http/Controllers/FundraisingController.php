<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;

use App\Models\Fundraising;

class FundraisingController extends Controller
{
    public function fundraising(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'CO' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'addressline' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'phone_number' => 'required|string|max:20',
            'country'=> 'required|string|max:100',
            'user_id' => 'required|exists:users,id', // Ensure user_id exists
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Create user
            $fundraising = Fundraising::create([
                'name' => $request->name,
                'CO' => $request->CO,
                'address' => $request->address,
                'addressline' => $request->addressline,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'phone_number' => $request->phone_number,
                'country'=> $request->country,
                'user_id'=> $request->user_id,
            ]);

            // Return success response
            return response()->json([
                'fundraising' => $fundraising,
                'message' => 'Fundraising record created successfully.',
                'data'=> $fundraising->toArray()
            ], 201);

        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-specific errors
            Log::error('Database error during fundraising: ', [
                'error' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->except(['CO']) // Adjust to exclude sensitive fields
            ]);

            return response()->json(['error' => 'A database error occurred during fundraising. Please try again later.'], 500);

        } catch (Exception $e) {
            // Handle generic errors
            Log::error('Error during fundraising: ', [
                'error' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->except(['CO']) // Adjust to exclude sensitive fields
            ]);

            return response()->json(['error' => 'An error occurred during fundraising. Please try again later.'], 500);
        }
    }
}
