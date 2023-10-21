@extends('layouts.reguser')
@section('title', 'login')
@section('content')
<div class="regform p-3">
    <h5>Login Form</h5>
    <div class="card p-3 shadow">
        <div class="form">
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="email" required id="email" class="form-control" placeholder="Email address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" required id="password" class="form-control" placeholder="password">
            </div>
            <button class="btn">Login</button>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label fw-bold" for="defaultCheck1">
                    Remember Me
                </label>
            </div>
        </div>
        <h6>Don't have an account? <a href="#">Register</a></h6>
    </div>
</div>
@endsection