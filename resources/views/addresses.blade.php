@extends('layouts.dashlayout')
@section('title', 'Addresses')
@section('contentss')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        label {
            font-weight: bold;
        }
    </style>

    <div class="address">
        <!-- all-address -->
        <div id="all-address" class="row">
            <div class="admin-card">
                <h2 class="name-address">The following addresses will be used on the checkout page by default.</h2>
                <div class="row my-3">
                    <div class="col-6 col-md-6">
                        <div class="address-container">
                            <h4 class="address-title">
                                Billing address
                            </h4>
                            <p class="address-name">You have not set up this type of address yet.</p>
                            <button class="btn btn-sm btn-success" id="add-billing">Add</button>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="address-container">
                            <h4 class="address-title">
                                Shipping address
                            </h4>
                            <p class="address-name">You have not set up this type of address yet.</p>
                            <button class="btn btn-sm btn-success" id="add-ship">Add</button>

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
                    <form>

                        <div class="row gap-0 justify-content-center">
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">First Name</label>
                                    <input type="text">
                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text">
                                </div>

                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Company Name (optional)</label>
                            <input type="text" placeholder="Optional">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Street Address</label>
                            <input type="text" name="" id="email">
                        </div>

                        @php
                            $country = DB::table('countries')->get();
                        @endphp
                        <div class="form-group mb-3">
                            <select required name="country" id="country" class="form-control">
                                <option value="">Choose country</option>
                                @foreach ($country as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="state">State</label>
                            <select required name="state" id="state" class="form-control">
                                <option value="">Choose state</option>

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">City</label>
                            <select required name="city" id="city" class="form-control">
                                <option value="">Choose city</option>

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Zip Code</label>
                            <input type="text" name="" id="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Phone</label>
                            <input type="text" name="" id="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" name="" id="email">
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
                    <form id="ship">

                        <div class="row gap-0 justify-content-center">
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name_ship">
                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name_ship">
                                </div>

                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Company Name (optional)</label>
                            <input type="text" name="company_name_ship" placeholder="Optional">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Street Address</label>
                            <input type="text" name="street_name_ship" id="email">
                        </div>
                        @php
                            $country = DB::table('countries')->get();
                        @endphp
                        <div class="form-group mb-3">
                            <select required name="country-ship" id="country-ship" class="form-control">
                                <option value="">Choose country</option>
                                @foreach ($country as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="state">State</label>
                            <select required name="state-ship" id="state-ship" class="form-control">
                                <option value="">Choose state</option>

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">City</label>
                            <select required name="city-ship" id="city-ship" class="form-control">
                                <option value="">Choose city</option>

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Zip Code</label>
                            <input type="text" name="zip_code_ship" id="email">
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
