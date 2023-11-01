<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminRouteController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function users()
    {
        return view('admin.user');
    }
    public function admins()
    {
        return view('admin.admin');
    }
    public function category()
    {
        if (session()->has('user_id') && session()->get('user_type') == 'admin') {
            $data = DB::table('category')->paginate(10);

            return view('admin.category', compact('data'));
        } else {
            session()->flush();
            return redirect('/login');
        }
    }

    public function saveCategory(Request $request)
    {
        //check the authentication user
        if (session()->has('user_id') && session()->get('user_type') == 'admin') {
            $validator = Validator::make($request->all(), [
                'category_name' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->with('error', "All fields are required");
            }

            $data = DB::table('category')->insert([
                'category_name' => $request->category_name,
                'category_status' => 1
            ]);

            if ($data) {
                return redirect()->back()->with('success', 'Category added successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function deleteCategory(Request $request)
    {
        $data = DB::table('category')->where('id', $request->id)->delete();
        if ($data) {
            return response()->json(array('code' => 201, 'message' => 'Category deleted successfully'));
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Unable to delete category'
            ]);
        }
    }

    public function raffle()
    {
        if (session()->has('user_id') && session()->get('user_type') == 'admin') {

            return view('admin.raffle');
        } else {
            session()->flush();
            return redirect('/login');
        }
    }

    public function viewraffle($id)
    {
        if (session()->has('user_id') && session()->get('user_type') == 'admin') {
            $data = DB::table("raffle")->where('raffle.id', $id)->leftJoin('users', 'raffle.user_id', 'users.id')->select('raffle.*', 'users.first_name', 'users.last_name', 'users.email', 'users.profile_pix', 'users.about', 'users.username')->first();
            if ($data) {
                return view('admin.viewraffle', compact('data'));
            }
        } else {
            session()->flush();
            return redirect('/login');
        }
    }

    public function newAdmin()
    {
        if (session()->has("user_id") && session()->get("user_type") == "admin") {
            return view("admin.add-new-admin");
        } else {
            session()->flush();
            return redirect("/login");
        }
    }
    function addAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => $validator->errors()]);
        } else {
            $check_exist = DB::table('users')->where("email", $request->email)->exists();
            if ($check_exist) {
                return redirect()->back()->with(['message' => 'Email Address already exists']);
            } else {
                $data = DB::table('users')->insert([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'user_type' => 2,
                    'status' => 1
                ]);
                if ($data) {
                    return redirect('/admin/admins')->with('message', 'Admin Succesfully created');
                } else {
                    return redirect()->back()->with(['message' => 'Something went wrong']);
                }
            }
        }
    }

    public function getAdminById($id)
    {
        if (session()->has("user_id") && session()->get("user_type") == "admin") {
            $data = DB::table('users')->where("id", $id)->first();
            return view('admin.edit-admin', get_defined_vars());
        } else {
            session()->flush();
            return redirect("/login");
        }
    }

    // public function saveMultiple(Request $request)
    // {

    //     if ($request->hasFile('json_file')) {
    //         $jsonFile = $request->file('json_file');
    //         $jsonData = json_decode(file_get_contents($jsonFile), true);
    //         foreach ($jsonData as $record) {
    //             DB::table('users')->insert([
    //                 'first_name' => $record['first_name'],
    //                 'last_name' => $record['last_name'],
    //                 'email' => $record['email'],
    //                 'username' => $record['username'],
    //                 'password' => Hash::make('123456789'),
    //                 'gender' => $record['gender'] == "M" ? 1 : 2,
    //                 'user_type' => $record['user_type'],
    //                 'about' => $record['about'],
    //                 'reg_status' => $record['reg_status'],
    //                 'status' => 1
    //             ]);
    //         }

    //         return response()->json([
    //             'code' => 201,
    //             'message' => 'Account successfully created',
    //             // 'imge' => $imageNames,
    //             'data' => $jsonData

    //         ]);
    //     } else {
    //         return response()->json([
    //             'code' => 401,
    //             'message' => 'Somethimg wrong',

    //         ]);
    //     }
    // }

    public function saveMultiple(Request $request)
    {

        if ($request->hasFile('json_file')) {
            $jsonFile = $request->file('json_file');
            $jsonData = json_decode(file_get_contents($jsonFile), true);
            foreach ($jsonData as $record) {
                DB::table('organisation')->insert([
                    'user_id' => $record['user_id'],
                    'organisation_name' => $record['organisation_name'],
                    'cover_image' => $record['cover_image'],
                    'category_id' => $record['category_id'],
                    'handle' => $record['handle'],
                    'description' => $record['description'],
                    'status' => 1
                ]);
            }

            return response()->json([
                'code' => 201,
                'message' => 'Account successfully created',
                // 'imge' => $imageNames,
                'data' => $jsonData

            ]);
        } else {
            return response()->json([
                'code' => 401,
                'message' => 'Somethimg wrong',

            ]);
        }
    }
}
