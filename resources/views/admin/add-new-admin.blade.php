@extends('layouts.admin.adminlayout')
@section('master-admin')
<meta name="_token" content="{{ csrf_token() }}">

    <style>
        .card {
            border-radius: 10px;
            border: 1px solid #215273;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.25);
        }

        label {
            color: #303030;
            /* H5 Bold */

            font-size: 14px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        h2 {
            color: #161616;
            text-align: center;
            font-family: Prompt;
            font-size: 24px;
            font-style: normal;
            font-weight: 900;
            line-height: 96.5%;
        }

        button[type="submit"] {
            border-radius: 10px;
            background: var(--Button-Color, #55C595);
            color: #ffffff;
            text-align: center;
            font-family: Prompt;
            font-size: 14px;
            font-style: normal;
            font-weight: 900;
            line-height: 96.5%;
        }
    </style>
    <div class="container overflow-hidden p-3">
        <div class="card p-3 mx-auto" style=" max-width:600px; border-radius:12px;">
            {{-- <div class="flex justify-between"> --}}

            <h2>Add New Admin</h2>

            @if (session()->has('message'))
            <div class="alert text-center alert-danger" role="alert">
                {{session()->get('message')}}
            </div>
            @endif
            {{-- </div> --}}
            <form class="p-3" action="{{url('admin/addAdmin')}}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>First Name</label>
                    <input type="text" placeholder="Enter first name" name="first_name" autocomplete="off" class="required:border-red-500 form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Last Name</label>
                    <input type="text" placeholder="Enter last name" autocomplete="off" name="last_name" class="required:border-red-500 form-control"
                        required>
                </div>
                <div class="form-group mb-3">
                    <label>Email Address</label>
                    <input type="email" placeholder="Enter email address" autocomplete="off" name="email" class="required:border-red-500 form-control"
                        required>
                </div>
                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" placeholder="Enter username" autocomplete="off" name="username" class="required:border-red-500 form-control"
                        required>
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" placeholder="Enter password" autocomplete="off" name="password" class="required:border-red-500 form-control"
                        required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn py-3 px-2 w-100">Create Account</button>
                </div>
            </form>
        </div>
    </div>
@endsection
