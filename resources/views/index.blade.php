@extends('layouts/master')
@section('title', 'Home')
@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        .top-bg {
            height: 65vh;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.63) 0%, rgba(0, 0, 0, 0.63) 100%),
                url("{{ asset('img/home-bg.jpeg') }}"),
                lightgray 50% / cover no-repeat;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: flex-start;
            align-items: center;

        }

        .j h3.how {
            color: var(--Heading-Text-color, #161616);
            font-family: Prompt;
            font-size: 2.5rem;
            font-style: normal;
            font-weight: 900;
            line-height: 96.5%;
        }

        .j h3.how span {
            color: #55C595;
        }

        div.j .row .col-6 .pre-work img {
            width: 70px;
            height: auto;
        }

        div.j .row .col-6 .pre-work h3.head {
            color: #303030;
            /* H5 Bold */
            font-family: Poppins;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        div.j .row .col-6 .pre-work p.text {
            color: #303030;
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        .fd {
            padding: 20px;
            background: #215273;
        }

        .fd h2.title {
            color: #55C595;
            text-align: center;
            font-family: Prompt;
            font-size: 2.5rem;
            font-style: normal;
            font-weight: 900;
            line-height: 96.5%;
        }

        .fd h2.title span {
            color: #FDFDFD;
        }

        .fd p.desc {
            color: var(--Base-Color, #FDFDFD);
            text-align: center;
            /* H5 */
            font-family: Poppins;
            font-size: 14px;
            max-width: 600px;
            font-style: normal;
            margin: 0px auto;
            font-weight: 400;
            line-height: 140%;
        }

        .fd .custom {
            display: flex;
            /* width: 100px; */
            padding: 20px 12px;
            flex-direction: column;
            /* justify-content: flex-end; */
            align-items: center;
            /* gap: 12px; */
            border-radius: 10px;
            background: var(--Base-Color, #FDFDFD);
        }

        .fd .custom img {
            width: 70px;
            height: 70px;
        }

        .fd .custom p {
            color: var(--Heading-Text-color, #161616);
            text-align: center;
            /* H5 Bold */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 700;
            margin-top: 8px;
            line-height: 140%;
        }
    </style>
    <div class="top-bg">
        <div class="top-section">
            <p class="smallest-text">COULD YOU BE THE NEXT WINNER?</p>
            <h4 class="big">Raffle From Anywhere <span>Around The World</span></h4>
            <p class="text">Raffleit provides opportunities to raise funds for business, non-profit organization or even to
                give persons a wide range of opportunity to raffle items or own items once you have taken part in the
                raffle. </p>
            <a href="" class="btn view-btn">HOW IT WORKS</a>
        </div>
    </div>
    <div class="">
        <div class="row justify-center align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <img style="width: 100%; height:auto" src="{{ asset('img/active.png') }}" alt="">
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="j py-4 px-3">
                    <h3 class="how">
                        How <span>raffleit</span> works
                    </h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="pre-work">
                                <img src="{{ asset('img/icon/50.png') }}" alt="">
                                <h3 class="head">50% of the total</h3>
                                <p class="text">The winner gets the price, the person or company who issues the raffle
                                    receives 50% of the total</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pre-work">
                                <img src="{{ asset('img/icon/setup.png') }}" alt="">
                                <h3 class="head">Easy Setup</h3>
                                <p class="text">Set up is free and can be done in a few minutes from the comfort of your
                                    home or office </p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pre-work">
                                <img src="{{ asset('img/icon/support.png') }}" alt="">
                                <h3 class="head">Support</h3>
                                <p class="text">RaffleIt App ensures people everywhere, support your cause without taking
                                    part in the raffle.</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pre-work">
                                <img src="{{ asset('img/icon/deliver.png') }}" alt="">
                                <h3 class="head">Doorstep Delivery</h3>
                                <p class="text">Set up is free and can be done in a few minutes from the comfort of your
                                    home or office </p>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success view-btn text-uppercase">Learn More</a>
                </div>
            </div>
        </div>


    </div>
    <div class="fd">
        <h2 class="text-center title">Raffleit <span>Collections</span></h2>
        <p class="text-center desc">Raffleit provides opportunities to raise funds for business, non-profit organization or
            even to give persons a wide range of opportunity to raffle items or own items once you have taken part in the
            raffle. </p>
        <div class="row g-3 my-3 justify-center">
            <div class="col-6 col-md-3">
                <div class="custom">
                    <img src="{{ asset('img/icon/live.png') }}" alt="">
                    <p>Live Draws</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="custom">
                    <img src="{{ asset('img/icon/business.png') }}" alt="">
                    <p>Business</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="custom">
                    <img src="{{ asset('img/icon/non-profit.png') }}" alt="">
                    <p>Non-Profit </p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="custom">
                    <img src="{{ asset('img/icon/save.png') }}" alt="">
                    <p>Fundraising</p>
                </div>
            </div>
        </div>
    </div>
@endsection
