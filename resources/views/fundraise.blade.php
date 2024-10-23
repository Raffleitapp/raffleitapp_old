@extends('layouts.reguser')
@section('title', 'Fundraising Address')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h3 class="fw-bold" style="color: #55C595;">Fundraising Cheque Address</h3>
        </div>
        @php
            $currentPath = request()->path();
            $pathSegments = explode('/', $currentPath);
            $desiredValue = count($pathSegments) >= 2 ? $pathSegments[2] : null;
        @endphp
        <div class="card shadow p-4">
            <h5 class="fw-bold mb-3 text-muted">Set up your address to receive cheque</h5>
            <form id="submit_fundraise">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" required id="name" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="co" class="form-label">c/o</label>
                    <input type="text" id="handle" name="c_o" class="form-control" placeholder="c/o">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" required id="address" name="address" class="form-control" placeholder="Address">
                </div>
                <div class="mb-3">
                    <label for="addressline" class="form-label">Address Line2</label>
                    <input type="text" id="addressline" name="addressline" class="form-control" placeholder="Address Line2">
                </div>
                @php
                    $country = DB::table('countries')->get();
                @endphp
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <select required name="country" id="country" class="form-select">
                        <option value="">Choose country</option>
                        @foreach ($country as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <select required name="state" id="state" class="form-select">
                        <option value="">Choose state</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <select required name="city" id="city" class="form-select">
                        <option value="">Choose city</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="zipcode" class="form-label">Zip Code</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" placeholder="Zip Code">
                </div>
                <div class="mb-3">
                    <label for="phone_no" class="form-label">Phone Number</label>
                    <input type="text" required id="phone_no" name="phone_no" class="form-control" placeholder="Phone Number">
                </div>
                <button type="submit" class="btn btn-primary w-100">Proceed</button>
                <div class="d-flex justify-content-center mt-3">
                    <div class="spinner-border text-primary" role="status" style="display: none;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </form>
        </div>
    </div>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <script>
            $(document).ready(function() {
                // console.log("path: ",)
                localStorage.setItem("orgaisation_id", {{ $desiredValue }})
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

                $(".spinner-border").css("display", "none");

                $("form#submit_fundraise").submit(function(e) {
                e.preventDefault();
                $(".spinner-border").css("display", "block");
                $(".login_btn").css("display", "none");
                const email = $("#email").val();
                let password = $("#password").val();

                console.log(email);

                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('user/addFundraising') }}",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(response) {
                            $(".spinner-border").css("display", "none");
                            $(".login_btn").css("display", "block");
                            console.log(response);
                            if (response.code === 201) {
                                localStorage.setItem("fundraising_id", response.data);
                                Swal.fire({
                                    icon: 'success',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    },

                                });
                                window.location = "{{ url('user/createraffle') }}"

                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    },

                                });
                            }
                        },

                    });


            });
            });
        </script>
    </div>
@endsection
