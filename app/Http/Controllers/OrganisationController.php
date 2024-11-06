<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    // Validate request data and handle file upload
    private function validateRequestAndHandleFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|exists:category,id',
            'organisation_name' => 'required|string|max:255',
            'handle' => 'nullable|string|max:255|unique:organisation,handle',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string|max:5000',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'errors' => $validator->errors(),
            ];
        }

        $fileName = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/images'), $fileName);
        }

        return [
            'status' => true,
            'fileName' => $fileName,
        ];
    }

    // Function to insert organisation data into the database
    private function insertOrganisationData(Request $request, $fileName)
    {
        try {
            $organisationId = DB::table('organisation')->insertGetId([
                'category_id' => $request->category,
                'organisation_name' => $request->organisation_name,
                'cover_image' => $request->cover_image,
                'user_id' => $request->user_id, // Assuming user_id is passed in the request
                'handle' => $request->handle ?? '',
                'website' => $request->website ?? '',
                'description' => $request->description ?? '',
                'status' => 1, // Assuming status 1 means active
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return [
                'status' => true,
                'organisation_id' => $organisationId,
            ];
        } catch (Exception $e) {
            Log::error('Error creating organisation: ' . $e->getMessage());
            return [
                'status' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    // Function to create an organisation
    public function createOrganisation(Request $request)
    {
        $validationResult = $this->validateRequestAndHandleFile($request);

        if (!$validationResult['status']) {
            return response()->json([
                'code' => 422,
                'message' => 'Validation failed',
                'errors' => $validationResult['errors'],
            ], 422);
        }

        $insertResult = $this->insertOrganisationData($request, $validationResult['fileName']);

        if ($insertResult['status']) {
            return response()->json([
                'code' => 201,
                'message' => 'Organisation created successfully',
                'data' => [
                    'organisation_id' => $insertResult['organisation_id'],
                ],
            ], 201);
        } else {
            return response()->json([
                'code' => 500,
                'message' => 'An error occurred while creating the organisation',
                'error' => $insertResult['error'],
            ], 500);
        }
    }

    // Function to save an organisation
    public function save_organisation(Request $request)
    {
        // Check if the user is authenticated and is a host
        if (session()->has('user_id') && session()->get('user_type') === 'host') {
            $validationResult = $this->validateRequestAndHandleFile($request);

            if (!$validationResult['status']) {
                return response()->json([
                    'code' => 422,
                    'message' => 'Validation failed',
                    'errors' => $validationResult['errors'],
                ], 422);
            }

            $insertResult = $this->insertOrganisationData($request, $validationResult['fileName']);

            if ($insertResult['status']) {
                return response()->json([
                    'code' => 201,
                    'message' => 'Organisation created successfully',
                    'data' => [
                        'organisation_id' => $insertResult['organisation_id'],
                    ],
                ], 201);
            } else {
                return response()->json([
                    'code' => 500,
                    'message' => 'An error occurred while creating the organisation',
                    'error' => $insertResult['error'],
                ], 500);
            }
        } else {
            return response()->json([
                'code' => 403,
                'message' => 'Unauthorized access',
            ], 403);
        }
    }
}
