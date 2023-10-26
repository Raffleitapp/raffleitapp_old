@extends('layouts/master')
@section('title', 'Create Raffle')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['resources/scss/app.scss'])
    <style>
        .top-bg {
            height: 20vh;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.63) 0%, rgba(0, 0, 0, 0.63) 100%),
                url("{{ asset('img/createwalk.png') }}"),
                lightgray 50% / cover no-repeat;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: flex-start;
            align-items: center;

        }
    </style>

    <div class="top-bg">
        <div class="top-section">
            <div class="flex mb-2 align-items-center text-white fw-light">
                <li class="flex align-items-center" onclick="location.href='{{ url('/') }}'">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30"
                            fill="none">
                            <path
                                d="M23.7473 12.0343V6.65933C23.7473 5.97183 23.1848 5.40933 22.4973 5.40933H21.2473C20.5598 5.40933 19.9973 5.97183 19.9973 6.65933V8.65933L15.8348 4.90933C15.3598 4.48433 14.6348 4.48433 14.1598 4.90933L3.70981 14.3218C3.28481 14.6968 3.54731 15.4093 4.12231 15.4093H6.24731V24.1593C6.24731 24.8468 6.80981 25.4093 7.49731 25.4093H11.2473C11.9348 25.4093 12.4973 24.8468 12.4973 24.1593V17.9093H17.4973V24.1593C17.4973 24.8468 18.0598 25.4093 18.7473 25.4093H22.4973C23.1848 25.4093 23.7473 24.8468 23.7473 24.1593V15.4093H25.8723C26.4473 15.4093 26.7223 14.6968 26.2848 14.3218L23.7473 12.0343ZM12.4973 12.9093C12.4973 11.5343 13.6223 10.4093 14.9973 10.4093C16.3723 10.4093 17.4973 11.5343 17.4973 12.9093H12.4973Z"
                                fill="#FDFDFD" />
                        </svg></span><span>Raffleit</span>
                </li>
                <li>
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 25"
                            fill="none">
                            <path
                                d="M5.94263 6.99033C5.53638 7.39658 5.53638 8.05283 5.94263 8.45908L9.98429 12.5007L5.94263 16.5424C5.53638 16.9487 5.53638 17.6049 5.94263 18.0112C6.34888 18.4174 7.00513 18.4174 7.41138 18.0112L12.1926 13.2299C12.5989 12.8237 12.5989 12.1674 12.1926 11.7612L7.42179 6.99033C7.01554 6.58408 6.34888 6.58408 5.94263 6.99033Z"
                                fill="#FDFDFD" />
                            <path
                                d="M12.8072 6.99033C12.401 7.39658 12.401 8.05283 12.8072 8.45908L16.8489 12.5007L12.8072 16.5424C12.401 16.9487 12.401 17.6049 12.8072 18.0112C13.2135 18.4174 13.8697 18.4174 14.276 18.0112L19.0572 13.2299C19.4635 12.8237 19.4635 12.1674 19.0572 11.7612L14.276 6.97991C13.8801 6.58408 13.2135 6.58408 12.8072 6.99033Z"
                                fill="#FDFDFD" />
                        </svg></span>
                </li>
                <li><span>Raffle Creation Steps</span></li>
            </div>
            <div class="flex  ">
                <div class="vl mt-2 mr-2"></div>
                <p class="custom-textext">Follow Steps To Create Raffle</p>
            </div>
        </div>
    </div>

    <div class="creat-raffle-container">
        <div class="raffle-form-card">
            <h6 class="heading">Create your first raffle</h6>
            <h6 class="step">Step 3 of 3</h6>
            @php
                $organisation = DB::table('organisation')
                    ->where('user_id', session()->get('user_id'))
                    ->get();
            @endphp
            <div class="form-card">
                <form id="submit-raffle" enctype="multipart/form-data">
                    {{-- <div class="form-group">
                        <label for="">Selected Organisation</label>
                        <select name="organisation_id" class="custom-form-control" id="organ_id">
                            <option value=""></option>
                            @foreach ($organisation as $item)
                                <option value="{{ $item->id }}">{{ $item->organisation_name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">

                        <input name="organisation_id" hidden readonly  class="custom-form-control" id="organisation_id">
                        <input name="fundraiser_id" hidden readonly class="custom-form-control" id="fundraiser_id">


                    </div>

                    @csrf

                    <div class="form-group">
                        <label for="">Host Name</label>
                        <input name="host_name" required placeholder="Enter host name" class="custom-form-control" id="host_name">

                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" required placeholder="Enter the reason for the raffle" id="description" class="custom-form-control"
                            cols="5" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Pictures</label>
                        <div class="gri">
                            <div class="col-3 col-md-3">
                                <div id="image-container">
                                    <img id="clickable-imagee" required src="{{ asset('img/upload.png') }}"
                                        alt="Click to Upload">
                                    <input type="file" id="image-input" name="image1" accept="image/*"
                                        style="display:none;">
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div id="image-container">
                                    <img id="clickable-imagee1" required src="{{ asset('img/upload.png') }}"
                                        alt="Click to Upload">
                                    <input type="file" id="image-input1" name="image2" accept="image/*"
                                        style="display:none;">
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div id="image-container">
                                    <img id="clickable-imagee2" required src="{{ asset('img/upload.png') }}"
                                        alt="Click to Upload">
                                    <input type="file" id="image-input2" name="image3" accept="image/*"
                                        style="display:none;">
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div id="image-container">
                                    <img id="clickable-imagee3" required src="{{ asset('img/upload.png') }}"
                                        alt="Click to Upload">
                                    <input type="file" id="image-input3" name="image4" accept="image/*"
                                        style="display:none;">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Raffle Start Date and Time</label>
                        <input type="datetime-local" name="starting_date" required placeholder="Enter host name"
                            class="custom-form-control" id="host_name">

                    </div>
                    <div class="form-group">
                        <label for="">Raffle End Date and Time</label>
                        <input type="datetime-local" name="ending_date" required placeholder="Enter host name"
                            class="custom-form-control" id="host_name">

                    </div>
                    <div class="form-group">
                        <label for="">Raffle Ticket Prices</label>
                        <div class="price-section">
                            <div class="price-insert">
                                <span id="decreaseButton1">-</span>
                                <input type="number" required name="three_ticket" id="numberField1" value="0">
                                <span id="increaseButton1">+</span>
                            </div>
                            <div class="fo">
                                For
                            </div>
                            <div class="price-label">
                                3 Ticket
                            </div>
                        </div>
                        <div class="price-section">
                            <div class="price-insert">
                                <span id="decreaseButton2">-</span>
                                <input type="number" name="ten_ticket" id="numberField2" value="0">
                                <span id="increaseButton2">+</span>
                            </div>
                            <div class="fo">
                                For
                            </div>
                            <div class="price-label">
                                10 Ticket
                            </div>
                        </div>
                        <div class="price-section">
                            <div class="price-insert">
                                <span id="decreaseButton3">-</span>
                                <input type="number" name="twenty_ticket" id="numberField3" value="0">
                                <span id="increaseButton3">+</span>
                            </div>
                            <div class="fo">
                                For
                            </div>
                            <div class="price-label">
                                20 Ticket
                            </div>
                        </div>
                        <div class="price-section">
                            <div class="price-insert">
                                <span id="decreaseButton4">-</span>
                                <input type="number" id="numberField4" name="one_twenty" value="0">
                                <span id="increaseButton4">+</span>
                            </div>
                            <div class="fo">
                                For
                            </div>
                            <div class="price-label">
                                120 Ticket
                            </div>
                        </div>
                        <div class="price-section">
                            <div class="price-insert">
                                <span id="decreaseButton5">-</span>
                                {{-- <span style="color: #215">$</span> --}}
                                <input type="number" name="two_hundred" id="numberField5" value="0">
                                <span id="increaseButton5">+</span>
                            </div>
                            <div class="fo">
                                For
                            </div>
                            <div class="price-label">
                                200 Ticket
                            </div>
                        </div>
                        <p class="text">The above preset value will be applied and can’t be changed. <br> By proceeding you agree with this terms</p>
                    </div>
                    <button type="submit" class="submit-raffle login_btn" ><span>Create raffle</span> <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z" fill="#215273"/>
                      </svg></span></button>
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
        <script src="{{ asset('js/alert.js') }}"></script>
        <script>
            $(document).ready(function() {
                $(".spinner-border").css("display", "none");

                var organsation_id = localStorage.getItem('orgaisation_id');
                var fundraiser_id = localStorage.getItem('fundraising_id');
                $("#organisation_id").val(organsation_id);
                $("#fundraiser_id").val(fundraiser_id);

                $('#clickable-imagee').on('click', function() {
                    $('#image-input').click();
                });


                $('#image-input').on('change', function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#clickable-imagee').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                    image = this.files[0];
                });
                $('#clickable-imagee1').on('click', function() {
                    $('#image-input1').click();
                });


                $('#image-input1').on('change', function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#clickable-imagee1').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                    // image = this.files[0];
                });
                $('#clickable-imagee2').on('click', function() {
                    $('#image-input2').click();
                });


                $('#image-input2').on('change', function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#clickable-imagee2').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                    // image = this.files[0];
                });
                $('#clickable-imagee3').on('click', function() {
                    $('#image-input3').click();
                });


                $('#image-input3').on('change', function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#clickable-imagee3').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                    // image = this.files[0];
                });


                $('#increaseButton1').click(function() {
                    var numberField = $('#numberField1');
                    var currentValue = parseInt(numberField.val(), 10); // Parse the current value as an integer
                    var incrementAmount = 1; // You can change this value to the desired increment amount

                    // Increment the value by the specified amount
                    numberField.val(currentValue + incrementAmount);
                });
                $('#decreaseButton1').click(function() {
                    var numberField = $('#numberField1');
                    if(numberField.val() == 0){
                        return;
                    }else{
                        var currentValue = parseInt(numberField.val(), 10); // Parse the current value as an integer
                    var incrementAmount = 1; // You can change this value to the desired increment amount

                    // Increment the value by the specified amount
                    numberField.val(currentValue - incrementAmount);
                    }

                });

                $('#increaseButton2').click(function() {
                    var numberField = $('#numberField2');
                    var currentValue = parseInt(numberField.val(), 10); // Parse the current value as an integer
                    var incrementAmount = 1; // You can change this value to the desired increment amount

                    // Increment the value by the specified amount
                    numberField.val(currentValue + incrementAmount);
                });
                $('#decreaseButton2').click(function() {
                    var numberField = $('#numberField2');
                    if(numberField.val() == 0){
                        return;
                    }else{
                        var currentValue = parseInt(numberField.val(), 10); // Parse the current value as an integer
                    var incrementAmount = 1; // You can change this value to the desired increment amount

                    // Increment the value by the specified amount
                    numberField.val(currentValue - incrementAmount);
                    }

                });

                $('#increaseButton3').click(function() {
                    var numberField = $('#numberField3');
                    var currentValue = parseInt(numberField.val(), 10); // Parse the current value as an integer
                    var incrementAmount = 1; // You can change this value to the desired increment amount

                    // Increment the value by the specified amount
                    numberField.val(currentValue + incrementAmount);
                });
                $('#decreaseButton3').click(function() {
                    var numberField = $('#numberField3');
                    if(numberField.val() == 0){
                        return;
                    }else{
                        var currentValue = parseInt(numberField.val(), 10); // Parse the current value as an integer
                    var incrementAmount = 1; // You can change this value to the desired increment amount

                    // Increment the value by the specified amount
                    numberField.val(currentValue - incrementAmount);
                    }

                });


                $('#increaseButton4').click(function() {
                    var numberField = $('#numberField4');
                    var currentValue = parseInt(numberField.val(), 10); // Parse the current value as an integer
                    var incrementAmount = 1; // You can change this value to the desired increment amount

                    // Increment the value by the specified amount
                    numberField.val(currentValue + incrementAmount);
                });
                $('#decreaseButton4').click(function() {
                    var numberField = $('#numberField4');
                    if(numberField.val() == 0){
                        return;
                    }else{
                        var currentValue = parseInt(numberField.val(), 10); // Parse the current value as an integer
                    var incrementAmount = 1; // You can change this value to the desired increment amount

                    // Increment the value by the specified amount
                    numberField.val(currentValue - incrementAmount);
                    }

                });


                $('#increaseButton5').click(function() {
                    var numberField = $('#numberField5');
                    var currentValue = parseInt(numberField.val(), 10); // Parse the current value as an integer
                    var incrementAmount = 1; // You can change this value to the desired increment amount

                    // Increment the value by the specified amount
                    numberField.val(currentValue + incrementAmount);
                });
                $('#decreaseButton5').click(function() {
                    var numberField = $('#numberField5');
                    if(numberField.val() == 0){
                        return;
                    }else{
                        var currentValue = parseInt(numberField.val(), 10); // Parse the current value as an integer
                    var incrementAmount = 1; // You can change this value to the desired increment amount

                    // Increment the value by the specified amount
                    numberField.val(currentValue - incrementAmount);
                    }

                });




                $("form#submit-raffle").on('submit', function(e) {
                    e.preventDefault(); // Prevent the default form submission

                    var imaghe = $("#image-input");

                    // if (imaghe.val() === "") {

                    //     Swal.fire({
                    //         icon: 'error',
                    //         type: 'error',
                    //         title: 'Please upload at least one image',
                    //         showConfirmButton: false,
                    //         timer: 1500
                    //     });
                    //     return;
                    // } else {
                        $(".spinner-border").css("display", "block");
                        $(".login_btn").css("display", "none");
                        var formData = new FormData(this);

                        console.log("form", image);
                        var formData = new FormData(this);
                        $.ajax({
                            type: "post",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ url('user/saveRaffle') }}",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                $(".spinner-border").css("display", "none");
                                $(".login_btn").css("display", "block");
                                if (response.code === 201) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: response.message,
                                        showConfirmButton: false,
                                        timer: 1000
                                    });
                                    localStorage.clear();
                                    window.location = "{{ url('user/dashboard') }}"

                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: response.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                    $(".spinner-border").css("display", "none");
                                    $(".login_btn").css("display", "block");

                                }
                            },
                            error: function(data) {
                                // Handle the error response
                                $(".spinner-border").css("display", "none");
                                $(".login_btn").css("display", "block");
                                Swal.fire({
                                    icon: 'error',
                                    text: 'Something went wrong',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                console.log(data);
                            }
                        });
                    // }

                })

            });
        </script>
    </div>
@endsection
