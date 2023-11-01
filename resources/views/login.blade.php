@extends('layouts.reguser')
@section('title', 'Login')
@section('content')
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
        <h5>Login Form</h5>
        <div class="card p-3">
            <div class="form p-3">
                <form id="reg-form">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Email Address</label>
                        <input type="email" required id="email" name="email" class="form-control"
                            placeholder="Email address">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <div class="pass">
                            <input type="password" required id="password" name="password" class="form-control"
                                placeholder="password">
                            <i id="togglePassword" class="bi bi-eye-fill"></i>
                        </div>
                    </div>
                    <div class="form-group mb-3 d-flex align-items-center">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 19 21"
                                fill="none">
                                <path
                                    d="M1.16663 11.375C1.16663 9.48938 1.16663 8.54657 1.75241 7.96079C2.3382 7.375 3.28101 7.375 5.16663 7.375H13.8333C15.7189 7.375 16.6617 7.375 17.2475 7.96079C17.8333 8.54657 17.8333 9.48938 17.8333 11.375V13.875C17.8333 16.7034 17.8333 18.1176 16.9546 18.9963C16.0759 19.875 14.6617 19.875 11.8333 19.875H7.16663C4.3382 19.875 2.92399 19.875 2.04531 18.9963C1.16663 18.1176 1.16663 16.7034 1.16663 13.875V11.375Z"
                                    stroke="#215273" />
                                <path
                                    d="M13.6666 6.33333V5.29167C13.6666 2.99048 11.8011 1.125 9.49992 1.125V1.125C7.19873 1.125 5.33325 2.99048 5.33325 5.29167V6.33333"
                                    stroke="#215273" stroke-linecap="round" />
                                <circle cx="9.49996" cy="13.6248" r="2.08333" fill="#215273" />
                            </svg></span> <span>FORGOT PASSWORD?</span>
                    </div>
                    <button type="submit" class="btn login_btn">Login</button>
                    <div class="form-check align-items-center">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label fw-bold" for="defaultCheck1">
                            Remember Me
                        </label>
                    </div>
                </form>
                <h6>Don't have an account? <a href="{{ url('register') }}">Register</a></h6>

            </div>
        </div>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <script>
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

                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('login_login') }}",
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
                                if (response.type == "user" || response.type == "host") {

                                    if (response.u_status == 0) {
                                        window.location = "{{ url('complete_register') }}"
                                    } else {
                                        if( response.type == "host"){
                                        window.location = "{{ url('host/dashboard') }}"

                                        }else{
                                        window.location = "{{ url('user/dashboard') }}"

                                        }

                                    }
                                } else {
                                    window.location = "{{ url('admin/dashboard') }}"

                                }

                            } else {
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
