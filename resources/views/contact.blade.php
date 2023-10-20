@extends('layouts/master')
@section('title', 'About')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        .top-bg {
            height: 20vh;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.63) 0%, rgba(0, 0, 0, 0.63) 100%),
                url("{{ asset('img/contact.png') }}"),
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

        .howitwork-container .pre-work {
            width: 200px
        }

        .howitwork-container .pre-work img {
            width: 70px;
            height: 70px
        }

        .howitwork-container .pre-work h3.head {
            color: var(--Body-text-color, #303030);
            /* H5 Bold */
            font-family: Poppins;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        .howitwork-container .pre-work p.text {
            color: var(--Body-text-color, #303030);
            /* H5 */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        .howitwork-container h5.title-2 {
            color: var(--Heading-Text-color, #161616);
            font-family: 'Prompt', sans-serif;
            font-size: 24px;
            font-style: normal;
            font-weight: 900;
            line-height: 96.5%;

        }

        .howitwork-container h6.desc {
            color: var(--Body-text-color, #303030);
            /* H5 */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        .howitwork-container h5.title-2 span {
            color: #55C595;

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

        .tab-container {
            border-radius: 10px;
            border: 1px solid var(--Button-Color, #55C595);
            max-width: 500px;
            width: 100%;
            overflow: hidden;
            height: 50px;
        }

        .tab-container div span {
            width: 50%;
            height: 50px;
            padding: 12px 20px;


            /* H3 Bold */
            font-family: Poppins;
            font-size: 15px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;

        }

        .tab-container div span#host-btn.active {
            background: var(--Primary-Color, #215273);
            color: #FFF;
        }

        .tab-container div span#support-btn.active {
            background: #55C595;
            color: #FFF;
        }

        #host-item {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid var(--Primary-Color, #215273);
        }

        #host-item h3.head {
            color: var(--Primary-Color, #215273);
            /* H3 Bold */
            font-family: Poppins;
            font-size: 18px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        #host-item h6.desc {
            color: var(--Body-text-color, #303030);
            /* H5 */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        #support-item h6.desc {
            color: var(--Body-text-color, #303030);
            /* H5 */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        #host-item ul li {
            color: var(--Body-text-color, #303030);
            /* H5 */
            list-style: disc;
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
        }

        #host-item ul li span {
            font-weight: 700;
        }

        #host-item #sec li {
            color: var(--Body-text-color, #303030);
            /* H5 */
            list-style: none;
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
        }

        #host-item #sec li span {
            font-weight: 700;
        }

        #support-item {
            padding: 12px;

            border-radius: 10px;
            border: 2px solid var(--Button-Color, #55C595);
        }

        #support-item ul li {
            color: var(--Body-text-color, #303030);
            /* H5 */
            list-style: disc;
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
        }

        #support-item ul li span {
            font-weight: 700;
        }

        .contact-detail h5 {
            color: var(--Heading-Text-color, #161616);
            /* H5 Bold */
            font-family: Poppins;
            font-size: 18px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
            display: flex
        }

        .contact-detail h6 {
            color: var(--Body-text-color, #303030);
            /* H5 */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        h5.link {
            color: var(--Body-text-color, #303030);
            /* H5 */
            font-family: Poppins;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
            margin: 12px 0px;
        }

        h5.link span{
            cursor: pointer;
            color: var(--Primary-Color, #215273);
/* H5 */
font-family: Poppins;
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: 140%;
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
                <li><span>Contact</span></li>
            </div>
            <div class="flex  ">
                <div class="vl mt-2 mr-2"></div>
                <p class="custom-textext">How To Find Us</p>
            </div>
        </div>
    </div>

    <div class="howitwork-container  p-3" style="width: 100vw">
        <div class="row justify-center">
            <div class="col-12 col-md-6">

                <h5 class="title-2 text-left">Write <span>Us</span></h5>
                <h6 class="desc">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei.
                    Mei an pericula euripidis, hinc partem ei est</h6>

                <div class="car w-100 mx-auto">
                    <form>
                        <div class="form-group mb-3">
                            <label for="fname">Full Name</label>
                            <input type="text" name="fname" id="fname" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="fname">Email</label>
                            <input type="email" name="fname" id="fname" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="fname">Your Message</label>
                            <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                        </div>
                        <div class="flex">
                            <button class="btn-icon mr-3 px-3" style="font-size: 12px; flex-wrap: nowrap ">Send<span
                                    class="ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z"
                                            fill="#215273" />
                                    </svg></span></button>
                            {{-- <button class="btn-icon white ml-3"
                                style="font-size: 12px; flex-wrap: nowrap; margin-left:12px">Contact Team<span
                                    class="ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z"
                                            fill="#215273" />
                                    </svg></span></button> --}}
                        </div>
        <h5 class="link">Ready to raffle? <span>Click Here</span></h5>

                    </form>
                </div>


            </div>
            <div class="col-12 col-md-6">
                <div class="" style="padding: 20px 40px;">
                    <h5 class="title-2 text-left">Contact <span>Us</span></h5>
                    <h6 class="desc">Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in
                        mei. Mei an pericula euripidis, hinc partem ei est</h6>
                </div>

                <div class="row justify-center align-items-center p-3 px-4">
                    <div class="col-12 col-md-6">
                        <div class="contact-detail">
                            <h5><span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 30 30" fill="none">
                                        <path
                                            d="M15 2.5C10.1625 2.5 6.25 6.4125 6.25 11.25C6.25 17.8125 15 27.5 15 27.5C15 27.5 23.75 17.8125 23.75 11.25C23.75 6.4125 19.8375 2.5 15 2.5ZM15 14.375C13.275 14.375 11.875 12.975 11.875 11.25C11.875 9.525 13.275 8.125 15 8.125C16.725 8.125 18.125 9.525 18.125 11.25C18.125 12.975 16.725 14.375 15 14.375Z"
                                            fill="#55C595" />
                                    </svg></span> Address</h5>
                            <h6>198 West 21th Street,Suite 721 New York,NY 10010</h6>
                        </div>
                        <div class="contact-detail">
                            <h5><span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 30 30" fill="none">
                                        <path
                                            d="M8.275 13.4875C10.075 17.025 12.975 19.9125 16.5125 21.725L19.2625 18.975C19.6 18.6375 20.1 18.525 20.5375 18.675C21.9375 19.1375 23.45 19.3875 25 19.3875C25.6875 19.3875 26.25 19.95 26.25 20.6375V25C26.25 25.6875 25.6875 26.25 25 26.25C13.2625 26.25 3.75 16.7375 3.75 5C3.75 4.3125 4.3125 3.75 5 3.75H9.375C10.0625 3.75 10.625 4.3125 10.625 5C10.625 6.5625 10.875 8.0625 11.3375 9.4625C11.475 9.9 11.375 10.3875 11.025 10.7375L8.275 13.4875Z"
                                            fill="#55C595" />
                                    </svg></span> Phones</h5>
                            <h6>Phone: +1 (758) 714-4919 <br>
                                Cell: +1 (646) 600-3001</h6>
                        </div>
                        <div class="contact-detail">
                            <h5><span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 30 30" fill="none">
                                        <path
                                            d="M25 5H5C3.625 5 2.5125 6.125 2.5125 7.5L2.5 22.5C2.5 23.875 3.625 25 5 25H25C26.375 25 27.5 23.875 27.5 22.5V7.5C27.5 6.125 26.375 5 25 5ZM25 10L15 16.25L5 10V7.5L15 13.75L25 7.5V10Z"
                                            fill="#55C595" />
                                    </svg></span> Email</h5>
                            <h6>Gib@raffleit.com <br>
                                Victordesign@raffleit.com</h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="{{ asset('img/icon/map.jpeg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


{{--
    <div class="fd">
        <div class="my-3 p-3 flex justify-between align-item-center">
            <h2 class="text-center title-2">Live <span>Raffle</span></h2>
            <button class="btn btn-sm draw-live-btn">DRAW LIVE</button>

        </div>
        <div class="row gx-3 mb-3 gy-3">
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
    </div> --}}


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
        <div class="flex justify-center my-4 py-4">
            <div class="row w-3/5 align-items-center mx-auto my-4 ">
                <div class="col-12 col-md-6 ">
                    <button class="btn-icon w-100" style="font-size: 12px; flex-wrap: nowrap ">Start Raffling Today <span
                            class="ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z"
                                    fill="#215273" />
                            </svg></span></button>
                </div>
                <div class="col-12 col-md-6 py-3">
                    <button class="btn-icon  w-100 white">Create Raffle <span class="ml-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z"
                                    fill="#215273" />
                            </svg></span></button>
                </div>


            </div>

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $("#support-item").hide();

        $(document).ready(function() {
            $("span#support-btn").click(() => {
                $("span#host-btn").removeClass("active");
                $("#host-item").hide();
                $("#support-item").show();

                $("span#support-btn").addClass("active");

            });

            $("span#host-btn").click(() => {
                $("span#support-btn").removeClass("active");
                $("span#host-btn").addClass("active");
                $("#host-item").show();
                $("#support-item").hide();

            });
        });
    </script>

@endsection
