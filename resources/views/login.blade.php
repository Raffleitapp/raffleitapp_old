@extends('layouts.reguser')
@section('title', 'login')
@section('content')
<div class="regform p-3">
    <h5>Login Form</h5>
    <div class="card p-3 shadow">
        <div class="form">
            <form id="reg-form" >
                @csrf
                <div class="form-group">
                    <label for="">Email Address</label>
                    <input type="email" required id="email" name="email" class="form-control" placeholder="Email address">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" required id="password" name="password" class="form-control" placeholder="password">
                </div>
                <button type="submit" class="btn login_btn">Login</button>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label fw-bold" for="defaultCheck1">
                        Remember Me
                    </label>
                </div>
            </form>

        </div>
        <h6>Don't have an account? <a href="{{url('register')}}">Register</a></h6>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script>

        $(document).ready(function() {
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
                                if(response.type == "user"){

                                    if(response.u_status == 0){
                                        window.location = "{{ url('complete_register') }}"
                                    }else{
                                        window.location = "{{ url('user/dashboard') }}"

                                    }
                                }else{
                                    window.location = "{{ url('admin/dashboard') }}"

                                }

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
