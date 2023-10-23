@extends('layouts.reguser')
@section('title', 'login')
@section('content')
<div class="regform p-3">
    <div class="text-center">
        <h5 class="fw-bold h3" style="color: #55C595;">Fundraising Cheque Address</h5>
    </div>
    <div class="card p-3 shadow">
        <div class="form">
            <h6 class="fw-bold mb-3 text-muted">Set up your address to receive cheque</h6>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" required id="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="co">c/o</label>
                <input type="text" required id="handle" class="form-control" placeholder="c/o">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" required id="address" class="form-control" placeholder="Address">
            </div>
            <div class="form-group">
                <label for="address">Address Line2</label>
                <input type="text" required id="" class="form-control" placeholder="Address Line2">
            </div>
            <div class="form-group">
                <label for="description">City</label>
                <input type="text" required id="" class="form-control" placeholder="City">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" required id="" class="form-control" placeholder="State">
            </div>
            <div class="form-group">
                <label for="zipcode">Zip Code</label>
                <input type="text" required id="" class="form-control" placeholder="zipcode">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" required id="" class="form-control" placeholder="phone">
            </div>
            <button class="btn">Proceed</button>
        </div>
    </div>
</div>
@endsection