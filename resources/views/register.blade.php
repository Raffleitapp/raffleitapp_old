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
        <style>
            div.regform h5 {
                color: #000;
    
                /* H1 Bold */
                font-family: Poppins;
                font-size: 24px;
                font-style: normal;
                font-weight: 700;
                line-height: 140%;
            }
    
            .regform .card {
                border-radius: 10px;
                border: 1px solid var(--Primary-Color, #215273);
                box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.25);
                padding: 20px;
            }
    
            .regform form .form-group label {
                color: var(--Body-text-color, #303030);
                /* H5 Bold */
                font-family: Poppins;
                font-size: 14px;
                font-style: normal;
                font-weight: 700;
                line-height: 140%;
            }
    
            .regform form .form-group input {
                border-radius: 10px;
                border: 1px solid var(--Primary-Color, #215273);
                background: #FFF;
                padding: 12px 10px
            }
    
            .regform form .form-group span {
                color: var(--Primary-Color, #215273);
                text-align: center;
                /* Body */
                font-family: Poppins;
                font-size: 10px;
                font-style: normal;
                font-weight: 400;
                line-height: 140%;
            }
    
            .regform form .form-group span:hover {
                cursor: pointer;
                text-decoration: underline;
            }
    
            .regform h6 {
                color: var(--Body-text-color, #303030);
                /* Title 2 */
                font-family: Poppins;
                font-size: 13px;
                font-style: normal;
                font-weight: 400;
                line-height: 140%;
            }
    
            .login_btn {
                border-radius: 10px;
                background: var(--Button-Color, #55C595);
                color: #FFF;
                padding: 10px 20px;
                font-family: Poppins;
                font-size: 13px;
                font-style: normal;
                font-weight: 700;
                line-height: 140%;
            }
    
            .regform form .form-group .pass {
                position: relative;
            }
    
            .regform form .form-group .pass i {
                font-size: 20px;
                position: absolute;
                top: 50%;
                right: 10px;
                color: #215273;
                transform: translate(-50%, -50%);
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
                        <div class="pass">
                            <input type="password" required id="password" name="password" class="form-control"
                                placeholder="password">
                            <i id="togglePassword" class="bi bi-eye-fill"></i>
                        </div>
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

            $('#togglePassword').click(function() {
                    const passwordInput = $('#password');
                    // const passwordIcon = $('#passwordIcon');

                    // Toggle the input type between 'password' and 'text'
                    if (passwordInput.attr('type') === 'password') {
                        passwordInput.attr('type', 'text');
                        $(this).removeClass('bi bi-eye-fill').addClass('bi bi-eye-slash-fill');
                    } else {
                        passwordInput.attr('type', 'password');
                        $(this).removeClass('bi bi-eye-slash-fill').addClass('bi bi-eye-fill');
                    }
                });
                $('#ntogglePassword').click(function() {
                    const passwordInput = $('#npassword');
                    // const passwordIcon = $('#passwordIcon');

                    // Toggle the input type between 'password' and 'text'
                    if (passwordInput.attr('type') === 'password') {
                        passwordInput.attr('type', 'text');
                        $(this).removeClass('bi bi-eye-fill').addClass('bi bi-eye-slash-fill');
                    } else {
                        passwordInput.attr('type', 'password');
                        $(this).removeClass('bi bi-eye-slash-fill').addClass('bi bi-eye-fill');
                    }
                });
                $('#ctogglePassword').click(function() {
                    const passwordInput = $('#cpassword');
                    // const passwordIcon = $('#passwordIcon');

                    // Toggle the input type between 'password' and 'text'
                    if (passwordInput.attr('type') === 'password') {
                        passwordInput.attr('type', 'text');
                        $(this).removeClass('bi bi-eye-fill').addClass('bi bi-eye-slash-fill');
                    } else {
                        passwordInput.attr('type', 'password');
                        $(this).removeClass('bi bi-eye-slash-fill').addClass('bi bi-eye-fill');
                    }
                });
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
