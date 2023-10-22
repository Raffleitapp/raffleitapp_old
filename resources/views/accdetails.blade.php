@extends('layouts.dashlayout')
@section('title', 'Account Details')
@section('content')

<style>
    label {
        font-weight: bold;
    }
</style>

<div class="regform p-3">
    <div class="card p-3 shadow">
        <div class="form">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">First Name</label>
                    <input type="text" required id="fname" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Last Name</label>
                    <input type="text" required id="fname" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="username">Display Name</label>
                <input type="text" required id="username" class="form-control" placeholder="Optional">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" required id="email" class="form-control" placeholder="Email Address">
            </div>
            <h5 class="mt-4 fw-bold">Password Change</h5>
            <div class="form-group">
                <label for="password">Current Password (Leave blank to leave Unchanged)</label>
                <input type="password" required id="password" class="form-control" placeholder="Email Address">
            </div>
            <div class="form-group">
                <label for="password">New Password (Leave blank to leave Unchanged)</label>
                <input type="password" required id="password" class="form-control" placeholder="Email Address">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" required id="password" class="form-control" placeholder="Email Address">
            </div>
            <button class="btn">Save Changes</button>
        </div>
    </div>
</div>
@endsection