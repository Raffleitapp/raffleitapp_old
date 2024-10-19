@extends('layouts.dashlayout')
@section('title', 'Addresses')
@section('contentss')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        label {
            font-weight: bold;
        }
    </style>
    @php
        $check_billing = DB::table('addresses')
            ->where('user_id', session()->get('user_id'))
            ->where('type', 1);
        $check_shipping = DB::table('addresses')
            ->where('user_id', session()->get('user_id'))
            ->where('type', 2);

        if ($check_billing->exists()) {
            $bill = $check_billing->first();
            $b_first_name = $bill->first_name;
            $b_last_name = $bill->last_name;
            $b_email = $bill->email;
            $b_street = $bill->street;
            $b_apartment = $bill->apartment;
            if (!is_null($bill->city)) {
                $c = DB::table('cities')
                    ->where('id', $bill->city)
                    ->first();
                $b_city = $c->name;
            } else {
                $b_city = '';
            }

            $s = DB::table('states')
                ->where('id', $bill->state_id)
                ->first();
            $country = DB::table('countries')
                ->where('id', $bill->country_id)
                ->first();
            $b_state = $s->name;
            $b_country = $country->name;
        }

        if ($check_shipping->exists()) {
            $ship = $check_shipping->first();
            $s_first_name = $ship->first_name;
            $s_last_name = $ship->last_name;
            $s_email = $ship->email;
            $s_street = $ship->street;
            $s_apartment = $ship->apartment;
            $c = DB::table('cities')
                ->where('id', $ship->city)
                ->first();
            // $s_city = $c->name;
            if (!is_null($ship->city)) {
                $c = DB::table('cities')
                    ->where('id', $bill->city)
                    ->first();
                $s_city = $c->name;
            } else {
                $c_city = '';
            }

            $s = DB::table('states')
                ->where('id', $ship->state_id)
                ->first();
            $country = DB::table('countries')
                ->where('id', $ship->country_id)
                ->first();
            $s_state = $s->name;
            $s_country = $country->name;
        }
    @endphp
    <div class="address">
        <!-- all-address -->
        <div id="all-address" class="row">
            <div class="admin-card">
                <h2 class="name-address">The following addresses will be used on the checkout page by default.</h2>

                @if (session()->has('error'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="row my-3">
                    <div class="col-6 col-md-6">
                        <div class="address-container">
                            <h4 class="address-title">
                                Billing address
                            </h4>
                            @if (!$check_billing->exists())
                                <p class="address-name">You have not set up this type of address yet.</p>
                                <button class="btn btn-sm btn-success" id="add-billing">Add</button>
                            @else
                                <p class="address-name">{{ $b_first_name . ' ' . $b_last_name }}</p>
                                <p class="address-name">{{ $b_email }}</p>
                                <p class="address-name">{{ $b_apartment . ' , ' . $b_street }}</p>
                                <p class="address-name">{{ $b_city . ', ' . $b_state . ', ' . $b_country }}</p>

                                {{-- <button class="btn btn-sm btn-success" id="add-billing">Edit</button> --}}
                            @endif


                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="address-container">
                            <h4 class="address-title">
                                Shipping address
                            </h4>
                            @if (!$check_shipping->exists())
                                <p class="address-name">You have not set up this type of address yet.</p>
                                <button class="btn btn-sm btn-success" id="add-ship">Add</button>
                            @else
                                <p class="address-name">{{ $s_first_name . ' ' . $s_last_name }}</p>
                                <p class="address-name">{{ $s_email }}</p>
                                <p class="address-name">{{ $s_apartment . ' , ' . $s_street }}</p>
                                <p class="address-name">{{ $s_city . ', ' . $s_state . ', ' . $s_country }}</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- add new billing -->
        <div id="add-billing-form">
            <div class="admin-container">
                <div class="admin-card">
                    <h3 class="head-title">Billing address</h3>
                    <form action="{{ route('user.saveAddress') }}" method="POST">
                        <input type="text" hidden name="type" value="1">

                        @csrf
                        <div class="row gap-0 justify-content-center">
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" required>
                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" required>
                                </div>

                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Company Name (optional)</label>
                            <input type="text" placeholder="Optional" name="company_name">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Street Address</label>
                            <input type="text" id="email" name="street" required>
                        </div>

                        @php
                            $country = DB::table('countries')->get();
                        @endphp
                        <div class="form-group mb-3">
                            <select required name="country_id" id="country" class="form-control">
                                <option value="">Choose country</option>
                                @foreach ($country as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="state">State</label>
                            <select name="state_id" id="state" class="form-control">
                                <option value="">Choose state</option>

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">City</label>
                            <select name="city" id="cities" class="form-control">
                                <option value="">Choose city</option>

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Zip Code</label>
                            <input type="text" name="zip_code" id="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Phone</label>
                            <input type="text" name="phone_no" id="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- add new shipping -->
        <div id="add-shipping-form">
            <div class="admin-container">
                <div class="admin-card">
                    <h3 class="head-title">Shipping address</h3>
                    <form action="{{ route('user.saveAddress') }}" method="POST">
                        <input type="text" hidden name="type" value="2">

                        @csrf

                        <div class="row gap-0 justify-content-center">
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">First Name</label>
                                    <input type="text" required name="first_name">
                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text" required name="last_name">
                                </div>

                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Company Name (optional)</label>
                            <input type="text" name="company_name" placeholder="Optional">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Street Address</label>
                            <input type="text" name="street" id="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Apartment</label>
                            <input type="text" name="apartment" id="email">
                        </div>
                        @php
                            $country = DB::table('countries')->get();
                        @endphp
                        <div class="form-group mb-3">
                            <select required name="country_id" id="country-ship" class="form-control">
                                <option value="">Choose country</option>
                                @foreach ($country as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="state">State</label>
                            <select name="state_id" id="state-ship" class="form-control">
                                <option value="">Choose state</option>

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">City</label>
                            <select name="city" id="city-ship" class="form-control">
                                <option value="">Choose city</option>

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Zip Code</label>
                            <input type="text" name="zip_code" id="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Phone</label>
                            <input type="text" name="phone_no" id="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $("#add-billing-form, #add-shipping-form").css('display', 'none');



        $(document).ready(() => {
            $("#add-billing").click(() => {
                $("#all-address").hide();
                // $("#add-billing-form").show();
                $("#add-billing-form").css('display', 'block');

            });
            $("#add-ship").click(() => {
                $("#all-address").hide();
                // $("#add-billing-form").show();
                $("#add-shipping-form").css('display', 'block');

            });

            $('#country').change(function() {

                var selectedCountry = $(this).val();
                if (selectedCountry != "") {
                    console.log(selectedCountry);
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('getStateByCountryId') }}",
                        data: {
                            c_id: selectedCountry
                        },

                        success: function(response) {
                            $('#state').empty();
                            $('#state').append('<option value="">Select a state</option>');
                            console.log(response.data)
                            if (response.code == 201) {
                                const info = response.data;
                                info.forEach((element, index) => {
                                    $("#state").append(`
                <option value="${element['id']}">${element['name']}</option>
                `);
                                });
                            }
                        }
                    });
                }
            });
            $('#state').change(function() {

                var selectedCountry = $(this).val();
                if (selectedCountry != "") {
                    console.log(selectedCountry);
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('getCityByStateId') }}",
                        data: {
                            s_id: selectedCountry
                        },

                        success: function(response) {
                            $('#city').empty();
                            $('#city').append('<option value="">Select a city</option>');
                            console.log(response.data)
                            if (response.code == 201) {
                                const info = response.data;
                                info.forEach((element, index) => {
                                    $("#city").append(`
                                    <option value="${element['id']}">${element['name']}</option>
                                    `);
                                });
                            }
                        }
                    });
                }
            });

            $('#country-ship').change(function() {

                var selectedCountry = $(this).val();
                if (selectedCountry != "") {
                    console.log(selectedCountry);
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('getStateByCountryId') }}",
                        data: {
                            c_id: selectedCountry
                        },

                        success: function(response) {
                            $('#state-ship').empty();
                            $('#state-ship').append('<option value="">Select a state</option>');
                            console.log(response.data)
                            if (response.code == 201) {
                                const info = response.data;
                                info.forEach((element, index) => {
                                    $("#state-ship").append(`
                    <option value="${element['id']}">${element['name']}</option>
                    `);
                                });
                            }
                        }
                    });
                }
            });
            $('#state-ship').change(function() {

                var selectedCountry = $(this).val();
                if (selectedCountry != "") {
                    console.log(selectedCountry);
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('getCityByStateId') }}",
                        data: {
                            s_id: selectedCountry
                        },

                        success: function(response) {
                            $('#city-ship').empty();
                            $('#city-ship').append('<option value="">Select a city</option>');
                            console.log(response.data)
                            if (response.code == 201) {
                                const info = response.data;
                                info.forEach((element, index) => {
                                    $("#city-ship").append(`
                    <option value="${element['id']}">${element['name']}</option>
                    `);
                                });
                            }
                        }
                    });
                }
            });
        })
    </script>
@endsection
