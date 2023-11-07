<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- link'resources/css/app.css' --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <style>
        .custom-grid{
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(500px, auto))
        }
    </style>
</head>

<body>
@if(!session()->has('user_id'))
    @php
        return redirect('/login');
    @endphp
@elseif(session()->get('user_type') == 'admin')
    @php
        return redirect('admin/dashboard');
    @endphp
@endif
    <header>
        <nav class="header-bar">
            <div class="site-logo">
                <img src="{{ asset('img/logo.png') }}">
            </div>
            {{-- <div class="align-items-center"> --}}

                <div class="conta">
                    <div class="ul">
                        <li class="list-item" onclick="location.href='{{ url('/') }}'"><a>HOME</a></li>
                        <span class="vl"></span>
                        <li class="list-item" onclick="location.href='{{url('about') }}'"><a>ABOUT </a></li>
                        <span class="vl"></span>

                        <li class="list-item" onclick="location.href='{{ url('howitworks') }}'"><a>HOW IT WORKS</a></li>
                        <span class="vl"></span>
                        <li class="list-item" onclick="location.href='{{ url('contact') }}'"><a>CONTACT</a></li>


                    </div>
                    {{-- </div> --}}
                    <div class="ul">

                        <div class="axcou" onclick="location.href='{{ url('user/dashboard') }}'">
                            <img src="{{ asset('img/account_circle.png') }}" alt="">
                        </div>
                        <li class="list-item"><a class="view-btn">VIEW LIVE RAFFLES</a></li>

                        <li id="my-account" class="list-item"><a class="view-btn btn-primary">Account</a></li>


                    </div>
                </div>

                <div class="toggle">
                    <i class="bi bi-list"></i>
                </div>

        </nav>
    </header>
    <div class="container ">
        <div class="custom-grid justify-center border-2 p-3">
            <div class="col-md-3 mb-2">
                <div class="admin-sidebar">
                    {{-- <li class="sidebar-item"><a href="{{ url('dashboard')}}">Dashboard</a></li> --}}
                    <li class="sidebar-item"><a href="#">My Tickets</a></li>
                    <li class="sidebar-item"><a href="#">Hosted Raffle</a></li>
                    <li onclick="location.href='{{ url('user/dashboard')}}'"  class="sidebar-item"><a href="javascript:void(0)">Dashboard</a></li>
                    {{-- <li class="sidebar-item"><a href="#">Raffles</a></li> --}}
                    <li onclick="location.href='{{ url('user/addresses')}}'" class="sidebar-item"><a href="javascript:void(0)">Addresses</a></li>
                    <li class="sidebar-item"><a href="{{ url('accdetails')}}">Account Details</a></li>
                    <li class="sidebar-item" onclick="location.href='{{url('')}}'"><a href="javscript:void(0)">Payment Method</a></li>
                    <li class="sidebar-item" onclick="location.href='{{url('logout')}}'"><a href="javascript:void(0)">Logout</a href="javascript:void"></li>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                @yield('contentss')
            </div>
        </div>
    </div>
    </div>
    <footer>
        <div class="container-fluid-ft">
            <div class="row justify-start">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <ul class="footer-list">
                        <li>
                            <a href="">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                Raffleit provides opportunities to raise funds for business, non-profit organization or
                                even to give persons a wide range of opportunity to raffle items or own items once you
                                have taken part in the raffle.
                            </a>
                        </li>
                        <div class="social">
                            <a href="">
                                <img src="{{ asset('img/icon/bha.svg') }}" alt="">
                            </a>
                            <a href="">
                                <img src="{{ asset('img/icon/facebook.svg') }}" alt="">
                            </a>
                            <a href="">
                                <img src="{{ asset('img/icon/instagram.svg') }}" alt="">
                            </a>
                            <a href="">
                                <img src="{{ asset('img/icon/twitter.svg') }}" alt="">
                            </a>
                        </div>

                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <ul class="footer-list py-4">

                        <li>

                            <h3>Quick Links</h3>
                            {{-- </a> --}}
                        </li>
                        <li>
                            <a href="javascrip:void(0)">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="javascrip:void(0)">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="javascrip:void(0)">
                                How Raffleit Works
                            </a>
                        </li>
                        <li>
                            <a href="javascrip:void(0)">
                                Testimonial
                            </a>
                        </li>


                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <ul class="footer-list py-4">

                        <li>

                            <h3>Why Choose Us?</h3>
                            {{-- </a> --}}
                        </li>
                        <li>
                            <a href="javascrip:void(0)">
                                50% of the total
                            </a>
                        </li>
                        <li>
                            <a href="javascrip:void(0)">
                                Easy Setup
                            </a>
                        </li>
                        <li>
                            <a href="javascrip:void(0)">
                                Support
                            </a>
                        </li>
                        <li>
                            <a href="javascrip:void(0)">
                                Doorstep Delivery
                            </a>
                        </li>


                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <ul class="footer-list py-4">

                        <li>

                            <h3>Get Email Notifications</h3>
                            {{-- </a> --}}
                        </li>
                        <li>
                            <div class="notify-con">
                                <input type="email">
                                <button>Submit</button>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        // $("div.toggle").hide();
        let toggle = false;


        if ($(window).width() < 961) {
            // $('.content-container').load('mobile-content.html');
            $("div.toggle").show();
            $(".conta").css("display", "none");


        } else {
            // $('.content-container').load('desktop-content.html');
            $("div.toggle").hide();
            $(".conta").css("display", "flex");
            toggle = false;

        }
        $(window).resize(function() {
            if ($(window).width() < 961) {
                $("div.toggle").show();
                $(".conta").css("display", "none");

            } else {
                $("div.toggle").hide();
                $(".conta").css("display", "flex");
                toggle = false;

            }
        });
        $('div.toggle').click(function() {

            if (!toggle) {
                $(".conta").css("display", "block");
                toggle = true;

            } else {
                $(".conta").css("display", "none");
                toggle = false;
            }

        });
    </script>
</body>

</html>
