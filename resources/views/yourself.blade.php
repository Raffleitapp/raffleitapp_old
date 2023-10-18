@extends('layouts.reguser')
@section('title', 'login')
@section('content')
<div class="regform p-3">
    <div class="text-center">
        <h5 class="fw-bold h3">Tell Us about yourself</h5>
    </div>
    <div class="card p-3 shadow">
        <div class="form">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="fname">First Name</label>
                    <input type="text" required id="fname" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="lname">Last Name</label>
                    <input type="text" required id="lname" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group">
                <label for="username">Display Name</label>
                <input type="text" required id="username" class="form-control" placeholder="Optional">
                <h6 class="mt-0 h6 text-muted fw-normal">This is a name that will show</h6>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" required id="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="">Tell us alittle about yourself</label>
                <textarea type="text" required id="" class="form-control" cols="5" rows="5" placeholder="Write something..."></textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label fw-bold" for="defaultCheck1">
                    I have read and agreed to the Ts & Conditions
                </label>
            </div>
            <button class="btn">Create Account</button>
        </div>
    </div>
</div>
@endsection