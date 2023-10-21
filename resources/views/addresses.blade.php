@extends('layouts.dashlayout')
@section('title', 'Addresses')
@section('content')

<style>
    label {
        font-weight: bold;
    }
</style>

<div class="address p-4">
    <h6>The following addresses will be used on the checkout page by default.</h6>
    <div class="row">
        <div class="col-md-6">
            <h5 class="fw-bold mt-4">Billing Addresses</h5>
            <h6>You have not set up this type of address yet.</h6>
            <button class="btn fw-bold">Add</button>
        </div>
        <div class="col-md-6">
            <h5 class="fw-bold mt-4">Shipping Addresses</h5>
            <h6>You have not set up this type of address yet.</h6>
            <button class="btn fw-bold">Add</button>
        </div>
    </div>
</div>
@endsection