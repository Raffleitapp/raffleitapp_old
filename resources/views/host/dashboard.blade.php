@extends('layouts.dashlayout')
@section('title', 'Dashboard | Host')
@section('contentss')
    <link href="{{ asset('css/host.css') }}" rel="stylesheet">

    @php
        $currentUser = DB::table('users')->where('id', session()->get('user_id'))->first();
    @endphp
    <div class="container">
        <h3 class="user-greet">Welcome,  {{$currentUser->last_name}}</h3>
        <h6 class="instruction">From your Admin dashboard you can view your ;ive raffles and ended raffles. And make edits.
        </h6>

        <div class="my-3">
            <div class="row justify-between g-2 gy-3">
                <div class="col-12 col-md-9">
                    <div class="profile-pix flex items-center">
                        <img src="{{ asset('img/icon/user.png') }}" class="profile-img" alt="">
                        <h5 class="welcome-name ml-4">
                           {{$currentUser->first_name . ' ' . $currentUser->last_name}}
                            <span>I love to raffle and support organizations</span>
                        </h5>
                    </div>
                </div>

                <div class="col-12 col-md-3">
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
                    <div class="mx-auto raffle-cardz">
                        <div class="img">
                            <img src="{{asset('img/icon/bag.png')}}" alt="">
                        </div>
                        <div class="text">
                            <div class="" style="width:70%">
                                <h3 class="title">Free Education Funding Inc.</h3>
                                <h4 class="purpose">Free Education</h4>
                                <h4 class="handle">Education</h4>
                                <h4 class="handle">Freeeducation.com
                                </h4>
                            </div>

                            <div class="bottom-text flex justify-between align-items-center">
                                <h6 class="flex align-items-center"><span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 26" fill="none">
                                    <path opacity="0.3" d="M3.14258 7.375L8.71335 12.375L14.2841 7.375V3H3.14258V7.375Z" fill="#215273"/>
                                    <path opacity="0.3" d="M3.14258 7.375L8.71335 12.375L14.2841 7.375V3H3.14258V7.375Z" fill="#215273"/>
                                    <path d="M17.0698 0.5H0.357422V8L5.9282 13L0.371349 18.0125L0.357422 25.5H17.0698L17.0558 18.0125L11.499 13L17.0698 8.0125V0.5ZM14.2844 18.625V23H3.14281V18.625L8.71359 13.625L14.2844 18.625ZM14.2844 7.375L8.71359 12.375L3.14281 7.375V3H14.2844V7.375Z" fill="#215273"/>
                                  </svg></span>1h 30m</h6>
                                  <h6>Total Pot <span class="block text-right" style="text-align: right">$100</span></h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
