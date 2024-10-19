@extends('layouts.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/me.css') }}">
    @if (!session()->has('user_id'))
        @php
            return redirect('/login');
        @endphp
    @elseif(session()->get('user_type') == 'admin')
        @php
            return redirect('admin/dashboard');
        @endphp
    @endif
    <style>
        .top-bg {
            height: 20vh;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.63) 0%, rgba(0, 0, 0, 0.63) 100%),
                url("{{ asset('img/dash.jpeg') }}"),
                lightgray 50% / cover no-repeat;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: flex-start;
            align-items: center;

        }

        .custom-grid {
            display: grid;
            /* padding: 12px; */
            width: 90vw;
            /* border:2px solid red; */
            grid-template-columns: repeat(auto-fit, minmax(250px, auto));
            justify-content: center;
            margin: 0px auto;
            gap: 10px;
        }

        .admin-sidebar {
            width: 100%;
            padding: 12px 0px;
        }

        .admin-sidebar .sidebar-item {
            background: #215273;
            padding: 10px 20px;
            list-style: none;
            margin: 0;
            border: #215273 1px solid;
            border-bottom: 1px solid white;
        }

        .sidebar-item:first-child {
            border-radius: 10px 10px 0 0;
        }

        .sidebar-item:last-child {
            border-radius: 0px 0px 10px 10px;
        }

        .sidebar-item a {
            color: white;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none
        }

        .sidebar-item:hover,
        .sidebar-item.active {
            background: #ffffff;
            /* opacity: 0.5; */
            cursor: pointer;
        }

        .sidebar-item:hover>a,
        .sidebar-item.active>a {
            color: #215273;
        }



        .sidebar-item.active {
            background: white;
        }

        .sidebar-item.active>a {
            color: #215273;
        }

        .container-user {
            /* background: yellow */
        }
    </style>

    <div class="top-bg">
        <div class="top-section">
            <div class="flex mb-2 align-items-center text-white fw-light">
                <li class="flex align-items-center">
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
                <li><span>About Us</span></li>
            </div>
            <div class="flex  ">
                <div class="vl mt-2 mr-2"></div>
                <p class="custom-textext">About Raffleit</p>
            </div>
        </div>
    </div>
    <div class="">
        <div class=" row p-3 justify-center py-4">
            @if (session()->get('user_type') == 'user')
                <div class="col-12 col-md-3">
                    <div class="admin-sidebar animate__animated animate__fadeInLeft">

                        <li class="sidebar-item"><a href="#">My Tickets</a></li>

                        <li onclick="location.href='{{ url('user/dashboard') }}'"
                            class="sidebar-item {{ request()->is('user/dashboard*') ? 'active' : '' }}"><a
                                href="javascript:void(0)">Dashboard</a></li>
                        <li onclick="convertUser()" class="sidebar-item"><a href="javascript:void(0)">Become a Host</a></li>
                        <li onclick="location.href='{{ url('user/raffles') }}'" class="sidebar-item {{ request()->is('user/raffles*') ? 'active' : '' }}"><a href="javascript:void(0)">Raffles</a></li>
                        <li onclick="location.href='{{ url('user/addresses') }}'"
                            class="sidebar-item {{ request()->is('user/addresses*') ? 'active' : '' }}"><a
                                href="javascript:void(0)">Addresses</a></li>

                        <li class="sidebar-item {{ request()->is('user/accdetails*') ? 'active' : '' }}"><a
                                href="{{ url('user/accdetails') }}">Account Details</a></li>
                        {{-- <li class="sidebar-item " onclick="location.href='{{url('')}}'"><a href="jaavscript:void(0)">Payment Method</a></li> --}}
                        <li class="sidebar-item" onclick="location.href='{{ url('logout') }}'"><a
                                href="javascript:void(0)">Logout</a href="javascript:void"></li>

                    </div>
                </div>
            @endif

            @if (session()->get('user_type') == 'host')
                <div class="col-12 col-md-3">
                    <div class="admin-sidebar animate__animated animate__fadeInLeft">

                        <li class="sidebar-item"><a href="#">My Tickets</a></li>

                        <li onclick="location.href='{{ url('host/dashboard') }}'"
                            class="sidebar-item {{ request()->is('host/dashboard*') }}"><a
                                href="javascript:void(0)">Dashboard</a></li>

                        {{-- <li class="sidebar-item"><a href="#">Raffles</a></li> --}}
                        <li onclick="location.href='{{ url('host/live-raffle') }}'"
                            class="sidebar-item {{ request()->is('host/live-raffle*') ? 'active' : '' }}"><a
                                href="javascript:void(0)">Live Raffle</a></li>
                        <li class="sidebar-item {{ request()->is('host/completed*') ? 'active' : '' }}"><a
                                href="{{ url('host/completed') }}">Completed Raffle</a></li>
                        {{-- <li class="sidebar-item " onclick="location.href='{{url('')}}'"><a href="jaavscript:void(0)">Payment Method</a></li> --}}
                        <li class="sidebar-item" onclick="location.href='{{ url('logout') }}'"><a
                                href="javascript:void(0)">Logout</a href="javascript:void"></li>

                    </div>
                </div>
            @endif

            <div class="col-12 col-md-7">
                @yield('contentss')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{asset('js/alert.js')}}"></script>
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
        });

        function convertUser() {
            Swal.fire({
                title: '<strong>Are you sure you want to become a host?</strong>',
                icon: 'info',
                html: "You won't be able to <b>revert</b> this ",
                // '<a href="//sweetalert2.github.io">links</a> ' +
                // 'and other HTML tags',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Yes',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText: '<i class="fa fa-thumbs-down"></i> No',
                cancelButtonAriaLabel: 'Thumbs down'
            }).then((result) => {
                if (result.value) {
                    console.log(result);
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{url("user/changeUser")}}",
                        data: {},
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            if(response.code === 201){
                                showSuccessMsg(response.message);
                                window.location.href = "/host/dashboard"
                            }else{
                                showErrorMsg(response.message);
                            }
                        }
                    });

                }
            }).catch((err) => {

            });
        }
    </script>
    </div>
@endsection
