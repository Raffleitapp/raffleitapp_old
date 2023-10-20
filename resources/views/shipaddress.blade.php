@extends('layouts.dashlayout')
@section('title', 'Account Details')
@section('content')

<style>
    label {
        font-weight: bold;
    }
</style>

<div class="regform p-3">
    <!-- <div class="text-center"> -->
        <h5 class="fw-bold h5">Shipping address</h5>
    <!-- </div> -->
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
                <label for="cname">Company Name</label>
                <input type="text" required id="cname" class="form-control" placeholder="Optional">
            </div>
            <div class="form-group">
                <label for="region">Region/Country</label>
                <input type="text" required id="region" class="form-control" placeholder="Region/Country">
            </div>
            <!-- <h5 class="mt-4 fw-bold"></h5> -->
            <div class="form-group">
                <label for="saddress">Street Address</label>
                <input type="text" required id="saddress" class="form-control" placeholder="Street number and street name">
                <input type="text" required id="saddress" class="form-control" placeholder="Apartment, suite, unit etc (optional)">
            </div>
            <div class="form-group">
                <label for="town">Town/City</label>
                <input type="text" required id="town" class="form-control" placeholder="Town/City">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="country" required id="country" class="form-control" placeholder="Country">
            </div>
            <div class="form-group">
                <label for="zipcode">Zip Code</label>
                <input type="text" required id="country" class="form-control" placeholder="Zip Code">
            </div>
            <button class="btn">Save Changes</button>
        </div>
    </div>
</div>
@endsection