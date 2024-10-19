@extends('layouts.dashlayout')
@section('title', 'Account Details')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="regform p-3">
        <h5 class="fw-bold h5">Shipping Address</h5>
        <div class="card p-3 shadow">
            <form class="form" id="shipAddressForm" method="POST" action="{{ route('user.shipaddress') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" required id="first_name" class="form-control" name="first_name"
                            placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" required id="last_name" class="form-control" name="last_name" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" required id="company_name" name="company_name" class="form-control"
                        placeholder="Optional">
                </div>
                <div class="form-group">
                    <label for="region">Region/Country</label>
                    <input type="text" required id="region" class="form-control" name="region"
                        placeholder="Region/Country">
                </div>
                <div class="form-group">
                    <label for="street_address">Street Address</label>
                    <input type="text" required id="street_address" name="street_address" class="form-control"
                        placeholder="Street number and street name">
                    <input type="text" required id="apartment" class="form-control" name="apartment"
                        placeholder="Apartment, suite, unit etc (optional)">
                </div>
                <div class="form-group">
                    <label for="town">Town/City</label>
                    <input type="text" required id="town" name="town" class="form-control"
                        placeholder="Town/City">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" required id="country" name="country" class="form-control" placeholder="Country">
                </div>
                <div class="form-group">
                    <label for="zipcode">Zip Code</label>
                    <input type="text" required id="zipcode" name="zipcode" class="form-control"
                        placeholder="Zip Code">
                </div>
                <button type="submit" class="btn btn-outline-danger">Save Shipping Address</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#shipAddressForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('user.shipaddress') }}",
                    data: $('#shipAddressForm').serialize(),
                    success: function(response) {
                        if (response.status == 401) {
                            Swal.fire({
                                icon: 'error',
                                title: response.error,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.reload(true);
                        }
                    }
                });
            });
        });
    </script>
@endsection
