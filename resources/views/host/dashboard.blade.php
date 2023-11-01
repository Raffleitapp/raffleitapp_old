@extends('layouts.dashlayout')
@section('title', 'Dashboard | Host')
@section('contentss')
    <link href="{{ asset('css/host.css') }}" rel="stylesheet">

    <div class="container">
        <h3 class="user-greet">Welcome, Victor</h3>
        <h6 class="instruction">From your Admin dashboard you can view your ;ive raffles and ended raffles. And make edits.
        </h6>

        <div class="my-3">
            <div class="row justify-between g-2 gy-3">
                <div class="col-12 col-md-9">
                    <div class="profile-pix flex items-center">
                        <img src="{{ asset('img/icon/user.png') }}" class="profile-img" alt="">
                        <h5 class="welcome-name ml-4">
                            Victor Akinola
                            <span>I love to raffle and support organizations</span>
                        </h5>
                    </div>
                </div>

                <div class="col-12 col-md-3 sm:mt-2">
                    <button class="host-btn">Host New Raffle</button>

                </div>
            </div>

            <div class="row my-4 gy-3 gx-3">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="customs-card flex items-center">
                        <div class="w-100">
                            <h4 class="big">
                                RAFFLE’S INCOME
                            </h4>
                            <h6>$5,000</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="customs-card second flex items-center">
                        <div class="w-100">
                            <h4 class="big">
                                PENDING FUND
                            </h4>
                            <h6>$5,000</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="customs-card third flex items-center">
                        <div class="w-100">
                            <h4 class="big">
                                CLEARED FUNDS
                            </h4>
                            <h6>$5,000</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="customs-card flex items-center" style="background: blue">
                        <div class="w-100">
                            <h4 class="big">
                               Total Raffle
                            </h4>
                            <h6>$5,000</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="customs-card second flex items-center">
                        <div class="w-100">
                            <h4 class="big">
                               Live Raffle
                            </h4>
                            <h6>$5,000</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="customs-card flex items-center" style="background: red">
                        <div class="w-100">
                            <h4 class="big">
                               Completed Raffle
                            </h4>
                            <h6>$5,000</h6>
                        </div>
                    </div>
                </div>
            </div>


            <div class="rafle">
                <h5 class="head">Raffles Hosted (live raffles)</h5>
                <div class="raffle-group">
                    <div class="raffle-card">
                        
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
