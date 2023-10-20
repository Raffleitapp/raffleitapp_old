@extends('layouts/master')
@section('title', 'About')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        .top-bg {
            height: 20vh;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.63) 0%, rgba(0, 0, 0, 0.63) 100%),
                url("{{ asset('img/about-bg.png') }}"),
                lightgray 50% / cover no-repeat;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: flex-start;
            align-items: center;

        }

        .custom-textext {
            color: #FFF;

            /* H3 Bold */
            font-family: Poppins;
            font-size: 20px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        div.vl {
            height: 15px;
        }

        .pre-work .text {
            color: var(--Body-text-color, #303030);
            /* H5 */
            font-family: Poppins;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        .after-about {
            border-radius: 10px;
            background: #FFF;
            box-shadow: 20px 9px 70px 0px rgba(255, 255, 255, 0.15);
            display: flex;
            justify-content: center;
            padding: 12px 20px;

            align-items: center;
        }

        .after-about img {
            height: 100px;
            width: 120px;
        }

        .after-about p.price {
            color: var(--Heading-Text-color, #161616);
            /* text-align: center; */
            /* H4 Bold */
            font-family: Poppins;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: 70%;
        }

        .after-about p.desc {
            color: var(--Heading-Text-color, #161616);
            /* text-align: center; */
            /* H5 */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 80%;
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
    <div class="py-4">
        <div class="row justify-center  align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <img style="width: 100%; height:auto" class="mx-auto" src="{{ asset('img/active.png') }}" alt="">
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="j py-4 px-3">
                    <h3 class="how">
                        About <span>us</span>
                    </h3>
                    <div class="pre-work">

                        <p class="text">RaffleIt has several benefits</p>
                        <p class="text">RaffleItApp was created with the idea that everyone can Do Good and Have Fun, and
                            it aims to revolutionise the raffle platform for the twenty-first century by making it easier
                            for anybody to operate a raffle from the comfort of their homes and places of employment.</p>
                        <p class="text">Through the power of mobile connectivity, our internet platform connects people,
                            businesses, organisations, clubs, charities, and more with a practically infinite audience. This
                            provides everyone with an exciting option to make a difference, along with an accessible
                            interface, to provide an engaging raffle experience both on and off-site.</p>
                        <p class="text">We're pleased to participate in rewriting the rules of raffles while having fun by
                            offering an effective and scalable solution for everyone to effortlessly hold raffles and reach
                            customers.</p>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="fd pb-4">
        <div class="row my-3 g-3">
            <div class="col-12 col-md-3">
                <div class="after-about">
                    <img src="{{ asset('img/icon/save.png') }}" alt="">
                    <div class="">
                        <p class="price">
                            300
                        </p>
                        <p class="desc">
                            Fundraisers
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="after-about">
                    <img src="{{ asset('img/icon/follower.png') }}" alt="">
                    <div class="">
                        <p class="price">
                            300k
                        </p>
                        <p class="desc">
                            Followers
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="after-about">
                    <img src="{{ asset('img/icon/winner.png') }}" alt="">
                    <div class="">
                        <p class="price">
                            500
                        </p>
                        <p class="desc">
                            Winners
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="after-about">
                    <img src="{{ asset('img/icon/save.png') }}" alt="">
                    <div class="">
                        <p class="price">
                            500k
                        </p>
                        <p class="desc">
                           Raised
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="about-past py-4 px-3">
        <h6 class="small">TESTIMONIALS</h6>
        <h5 class="title-2 text-center">About Past <span>Raffles</span></h5>
        <div class="row py-2 mb-4  pb-4 g-3 sm:gy-5 justify-center ">
            <div class="col-12 col-md-4 mb-3">
                <div class="about-past-card">
                    <div class="decor">
                        <img src="{{ asset('img/icon/quote.png') }}" alt="">
                    </div>
                    <div class="first py-4">
                        <h3>Lorem ipsum dolor sit amet consectetur adipiscing elit a metus nam.</h3>
                    </div>
                    <div class="bott flex align-items-center justify-between">
                        <div class="img" style="background: url({{ asset('img/home-bg.jpeg') }})">

                        </div>
                        <div class="text mx-3">
                            <h3>Victor Barnabas</h3>
                            <h6>UI designer</h6>
                        </div>
                        <div class="flex">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30"
                                    fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30"
                                    fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30"
                                    fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30"
                                    fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30"
                                    fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="about-past-card sec">
                    <div class="decor">
                        <img src="{{ asset('img/icon/quote.png') }}" alt="">
                    </div>
                    <div class="first py-4">
                        <h3 class="text-white">Lorem ipsum dolor sit amet consectetur adipiscing elit a metus nam.</h3>
                    </div>
                    <div class="bott flex align-items-center justify-between">
                        <div class="img" style="background: url({{ asset('img/home-bg.jpeg') }})">

                        </div>
                        <div class="text text-white mx-3">
                            <h3 class="text-white">Victor Barnabas</h3>
                            <h6 class="text-white">UI designer</h6>
                        </div>
                        <div class="flex">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="about-past-card">
                    <div class="decor">
                        <img src="{{ asset('img/icon/quote.png') }}" alt="">
                    </div>
                    <div class="first py-4">
                        <h3>Lorem ipsum dolor sit amet consectetur adipiscing elit a metus nam.</h3>
                    </div>
                    <div class="bott flex align-items-center justify-between">
                        <div class="img" style="background: url({{ asset('img/home-bg.jpeg') }})">

                        </div>
                        <div class="text mx-3">
                            <h3>Victor Barnabas</h3>
                            <h6>UI designer</h6>
                        </div>
                        <div class="flex">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FFB72D" />
                                </svg></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn-icon mx-auto">Start Raffling Today <span class="ml-2"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z"
                        fill="#215273" />
                </svg></span></button>
    </div>
    <div class="fd">
        <div class="my-2 p-2 flex justify-between align-item-center">
            <h2 class="text-center title-2">Live <span>Raffle</span></h2>
            <button class="btn btn-sm draw-live-btn">DRAW LIVE</button>

        </div>
        <div class="row gx-3 mb-4 gy-4">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="raffle-card">
                    <div class="img">
                        <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                    </div>
                    <div class="d">
                        <h3 class="head">Save Children Charities Inc.</h3>
                        <h6>2023 Lifesaving Fundraiser</h6>
                        <h6 class="small">@children</h6>
                        <div class="flex align-items-center">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 18 26" fill="none">
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path
                                        d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z"
                                        fill="#215273" />
                                </svg></span>
                            <span class="time">20h 33m</span>
                        </div>
                    </div>

                    <div class="last">

                        <div class="flex justify-end">
                            <span><i class="bi bi-heart-fill"></i></span>
                        </div>
                        <div class="btm-div">
                            <h5>Total Pot</h5>
                            <h6>$30</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="raffle-card">
                    <div class="img">
                        <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                    </div>
                    <div class="d">
                        <h3 class="head">Save Children Charities Inc.</h3>
                        <h6>2023 Lifesaving Fundraiser</h6>
                        <h6 class="small">@children</h6>
                        <div class="flex align-items-center">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 18 26" fill="none">
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path
                                        d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z"
                                        fill="#215273" />
                                </svg></span>
                            <span class="time">20h 33m</span>
                        </div>
                    </div>

                    <div class="last">

                        <div class="flex justify-end">
                            <span><i class="bi bi-heart-fill"></i></span>
                        </div>
                        <div class="btm-div">
                            <h5>Total Pot</h5>
                            <h6>$30</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="raffle-card">
                    <div class="img">
                        <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                    </div>
                    <div class="d">
                        <h3 class="head">Save Children Charities Inc.</h3>
                        <h6>2023 Lifesaving Fundraiser</h6>
                        <h6 class="small">@children</h6>
                        <div class="flex align-items-center">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 18 26" fill="none">
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path
                                        d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z"
                                        fill="#215273" />
                                </svg></span>
                            <span class="time">20h 33m</span>
                        </div>
                    </div>

                    <div class="last">

                        <div class="flex justify-end">
                            <span><i class="bi bi-heart-fill"></i></span>
                        </div>
                        <div class="btm-div">
                            <h5>Total Pot</h5>
                            <h6>$30</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="raffle-card">
                    <div class="img">
                        <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                    </div>
                    <div class="d">
                        <h3 class="head">Save Children Charities Inc.</h3>
                        <h6>2023 Lifesaving Fundraiser</h6>
                        <h6 class="small">@children</h6>
                        <div class="flex align-items-center">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 18 26" fill="none">
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path
                                        d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z"
                                        fill="#215273" />
                                </svg></span>
                            <span class="time">20h 33m</span>
                        </div>
                    </div>

                    <div class="last">

                        <div class="flex justify-end">
                            <span><i class="bi bi-heart-fill"></i></span>
                        </div>
                        <div class="btm-div">
                            <h5>Total Pot</h5>
                            <h6>$30</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="raffle-card">
                    <div class="img">
                        <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                    </div>
                    <div class="d">
                        <h3 class="head">Save Children Charities Inc.</h3>
                        <h6>2023 Lifesaving Fundraiser</h6>
                        <h6 class="small">@children</h6>
                        <div class="flex align-items-center">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 18 26" fill="none">
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path
                                        d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z"
                                        fill="#215273" />
                                </svg></span>
                            <span class="time">20h 33m</span>
                        </div>
                    </div>

                    <div class="last">

                        <div class="flex justify-end">
                            <span><i class="bi bi-heart-fill"></i></span>
                        </div>
                        <div class="btm-div">
                            <h5>Total Pot</h5>
                            <h6>$30</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="raffle-card">
                    <div class="img">
                        <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                    </div>
                    <div class="d">
                        <h3 class="head">Save Children Charities Inc.</h3>
                        <h6>2023 Lifesaving Fundraiser</h6>
                        <h6 class="small">@children</h6>
                        <div class="flex align-items-center">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 18 26" fill="none">
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                        fill="#215273" />
                                    <path
                                        d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z"
                                        fill="#215273" />
                                </svg></span>
                            <span class="time">20h 33m</span>
                        </div>
                    </div>

                    <div class="last">

                        <div class="flex justify-end">
                            <span><i class="bi bi-heart-fill"></i></span>
                        </div>
                        <div class="btm-div">
                            <h5>Total Pot</h5>
                            <h6>$30</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="home-la">
        <div class="h">
            <h4 class="big-text text-center">
                Get Started Today!
            </h4>
            <h6 class="desc-text">
                RaffleItApp connects your raffle to persons and donors outside of your community so they can take part in
                the
                raffle or donate remotely to your cause. Revolutionize raffles and fundraising!
            </h6>
        </div>
        <div class="grid-sec flex justify-center">
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <div class="get-started-card">
                        <div class="step">
                            1
                        </div>
                        <h4 class="head">Create</h4>
                        <h6 class="desc">Nonprofits and charities can create an account by <span>clicking here</span> or
                            by
                            downloading the raffleit app on <span>IOS</span> | <span>Google Play</span> </h6>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="get-started-card middle">
                        <div class="step">
                            2
                        </div>
                        <h4 class="head">Share Raffle</h4>
                        <h6 class="desc">Now it’s time to get a link to your raffle for you to share your fundraising
                            event with your network.</h6>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="get-started-card">
                        <div class="step">
                            3
                        </div>
                        <h4 class="head">Fundraiser</h4>
                        <h6 class="desc">Watch your charitable donations grow in real time as technology and community
                            sharing take your fundraising to new heights!</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center py-4 px-3">
            <div class="flex mx-auto">

                    <button class="btn-icon md:mx-3 ">Start Raffling Today <span class="ml-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z"
                                    fill="#215273" />
                            </svg></span></button>

                    <button class="btn-icon ml-2 white">Create Raffle <span class="ml-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z"
                                    fill="#215273" />
                            </svg></span></button>


            </div>

        </div>

    </div>
@endsection
