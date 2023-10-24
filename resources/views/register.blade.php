@extends('layouts.reguser')
@section('title', 'Register')
@section('content')
    <style>
        div.spinner-border {
            display: none;
        }

        a[type="submit"].btn {
            color: white;
        }
    </style>
    <div class="regform p-3">
        <h5>Register</h5>
        <div class="card p-3 shadow">
            <div class="form">
                <form id="reg-form">
                    @csrf
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <button type="submit" class="btn login_btn">Create</button>
                    <div class="d-flex spin justify-content-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="">...</span>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label fw-bold" for="defaultCheck1">
                            Remember Me
                        </label>
                    </div>
                </form>

            </div>
            <h6>Have an account? <a href="{{url('login')}}">Login</a></h6>
        </div>


    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script>
        // $("div.spinner-border").css("display", "block");
        $("#email").val("");
        $("#password").val("");

        $(document).ready(function() {
            $("form#reg-form").submit(function(e) {
                e.preventDefault();
                $(".spinner-border").css("display", "block");
                $(".login_btn").css("display", "none");
                const email = $("#email").val();
                let password = $("#password").val();

                console.log(email);
                if (email == "") {
                    Swal.fire({
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        icon: 'error',
                        text: "Please enter your email address",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $(".spinner-border").css("display", "none");
                    $(".login_btn").css("display", "block");
                    return;
                } else if (password == "") {
                    Swal.fire({
                        icon: 'error',
                        text: "Please enter your password",
                        showConfirmButton: false,
                        timer: 1500,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },

                    });
                    $(".spinner-border").css("display", "none");
                    $(".login_btn").css("display", "block");
                    return;
                } else {
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('create_account') }}",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(response) {
                            $(".spinner-border").css("display", "none");
                            $(".login_btn").css("display", "block");
                            if (response.code === 201) {
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
                                window.location = "{{ url('complete_register') }}"

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
                }

            });
        });
    </script>
@endsection
