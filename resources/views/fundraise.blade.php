@extends('layouts.reguser')
@section('title', 'Fundraising Address')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="regform p-3">
        <div class="text-center">
            <h5 class="fw-bold h3" style="color: #55C595;">Fundraising Cheque Address</h5>
        </div>
        @php
            $currentPath = request()->path();

            $pathSegments = explode('/', $currentPath);

            // Access the desired value by index (in this case, '1')
            if (count($pathSegments) >= 2) {
                $desiredValue = $pathSegments[2];
            } else {
                // Handle the case where there may not be a value at that index
                $desiredValue = null;
            }
        @endphp
        <div class="card p-3 shadow">
            <div class="form">
                <h6 class="fw-bold mb-3 text-muted">Set up your address to receive cheque</h6>
                <form id="submit_fundraise">
                    @csrf
                    {{-- <input type="text" name="" value="{{$desiredValue}}" id=""> --}}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" required id="name" name="name" class="form-control"
                            placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="co">c/o</label>
                        <input type="text"  id="handle" name="c_o" class="form-control" placeholder="c/o">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" required id="address" name="address" class="form-control"
                            placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="address">Address Line2</label>
                        <input type="text" id="" name="address_2" class="form-control"
                            placeholder="Address Line2">
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

                    <div class="form-group">
                        <label for="zipcode">Zip Code</label>
                        <input type="text" id="zipcode" name="zipcode" class="form-control" placeholder="zipcode">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" required id="" name="phone_no" class="form-control"
                            placeholder="phone">
                    </div>
                    <button type="submit" class="btn login_btn">Proceed</button>
                    <div class="d-flex spin justify-content-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="">...</span>
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
