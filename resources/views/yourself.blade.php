@extends('layouts.reguser')
@section('title', 'login')
@section('content')
    @vite(['resources/scss/app.scss'])
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        div.spinner-border {
            display: none;
        }

        a[type="submit"].btn {
            color: white;
        }

        #clickable-image {
            height: 80px;
            width: 80px;
            border-radius: 50%;
            /* This applies rounded corners to make it a circle */
            cursor: pointer;
        }

        /* Optionally, you can add some styles for a better user experience */
        #image-container {
            display: inline-block;
            position: relative;
        }

        #image-container input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            z-index: 1;
        }
    </style>
    <div class="regform p-3">
        <div class="text-center">
            <h5 class="fw-bold h3">Tell Us about yourself</h5>
        </div>
        <div class="card p-3 shadow">

            <div class="form">
                <form id="continue" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h6>Image Upload</h6>
                    <div id="image-container">
                        <img id="clickable-image" required src="{{ asset('img/account_circle.png') }}"
                            alt="Click to Upload">
                        <input type="file" id="image-input" name="image" accept="image/*" style="display:none;">
                    </div>
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="fname">First Name</label>
                            <input type="text" required id="first_name" required name="first_name" class="form-control"
                                placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lname">Last Name</label>
                            <input type="text" required id="last_name" name="last_name" required class="form-control"
                                placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Display Name</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Optional">
                        <h6 class="mt-0 h6 text-muted fw-normal">This is a name that will show</h6>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" required id="email" class="form-control" value="{{ $data }}"
                            readonly placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="">Tell us alittle about yourself</label>
                        <textarea type="text" id="about" name="about" class="form-control" cols="5" rows="5"
                            placeholder="Write something..."></textarea>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" required id="agree">
                        <label class="form-check-label fw-bold" for="agree">
                            I have read and agreed to the Ts & Conditions
                        </label>
                    </div>
                    <button type="submit" class="btn login_btn">Complete profile</button>
                    <div class="d-flex spin justify-content-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="">...</span>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#clickable-image').on('click', function() {
                $('#image-input').click();
            });
            let image;

            $('#image-input').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#clickable-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
                image = this.files[0];
            });
            $("form#continue").on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

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
                    url: "{{ url('update_register') }}",
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
                            text:'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        console.log(data);
                    }
                });
            })
        });
    </script>
@endsection
