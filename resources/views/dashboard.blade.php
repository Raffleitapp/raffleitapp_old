@extends('layouts.dashlayout')
@section('title', 'Dashboard')
@section('contentss')
    @vite(['resources/scss/raffle.scss'])


    <style>
        label {
            font-weight: bold;
        }

        .card .raft {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .prof h5 {
            color: #000;

            /* H3 Bold */
            font-family: Poppins;
            font-size: 23px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        .prof h6.h6 {
            color: #000;

            /* Title 1 */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        .profpic {
            display: flex;
            /* justify-content: center; */
            align-items: center;
        }

        .prof img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .prof .txt1 h5 {
            color: #000;

            /* H5 Bold */
            font-family: Poppins;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: 100%;
        }

        .prof .profpic .txt1 h6.hj {
            color: #000;

            /* Title 1 */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 100%;
        }
    </style>

    <div class="admin-card">
        <div class="prof">
            <h5 class="fw-bold h5">Welcome {{ $getUser->username == '' ? $getUser->first_name : $getUser->username }}</h5>
            <h6 class="h6">From your account dashboard you can view your recent raffles, manage your shipping and billing
                addresses, and edit your password and account details./h6>
                <div class="my-3">
                    <div class="profpic d-flex align-items-center">
                        <div class="">
                            <img src="{{ asset('storage/images/' . $getUser->profile_pix) }}" alt="">
                        </div>
                        <div class="txt1">
                            <h5 class="">{{ $getUser->first_name . ' ' . $getUser->last_name }}</h5>
                            <h6 class="hj">{{ $getUser->about }}</h6>
                        </div>
                    </div>
                </div>
                <h5 class="follow">
                    Raffles you follow
                </h5>
{{-- 
                <div class="follow-card-container">
                    <div class="raffless-card">
                        <div class="first">
                            <div class="img">
                                <img src="{{ asset('storage/images/' . $getUser->profile_pix) }}" alt="">
                            </div>
                            <div class="text">
                                <h5>Free Education Funding Inc.</h5>
                                <h6>Lorem ipsum dolor sit a gravida platea accumsan, felis </h6>
                            </div>
                        </div>

                        <div class="button">
                            <button class="support-btn">Support</button>
                            <button class="check">Check Raffles</button>

                        </div>
                    </div>
                    <div class="raffless-card">
                        <div class="first">
                            <div class="img">
                                <img src="{{ asset('storage/images/' . $getUser->profile_pix) }}" alt="">
                            </div>
                            <div class="text">
                                <h5>Free Education Funding Inc.</h5>
                                <h6>Lorem ipsum dolor sit a gravida platea accumsan, felis </h6>
                            </div>
                        </div>

                        <div class="button">
                            <button class="support-btn">Support</button>
                            <button class="check">Check Raffles</button>

                        </div>
                    </div>
                    <div class="raffless-card">
                        <div class="first">
                            <div class="img">
                                <img src="{{ asset('storage/images/' . $getUser->profile_pix) }}" alt="">
                            </div>
                            <div class="text">
                                <h5>Free Education Funding Inc.</h5>
                                <h6>Lorem ipsum dolor sit a gravida platea accumsan, felis </h6>
                            </div>
                        </div>

                        <div class="button">
                            <button class="support-btn">Support</button>
                            <button class="check">Check Raffles</button>

                        </div>
                    </div>
                    <div class="raffless-card">
                        <div class="first">
                            <div class="img">
                                <img src="{{ asset('storage/images/' . $getUser->profile_pix) }}" alt="">
                            </div>
                            <div class="text">
                                <h5>Free Education Funding Inc.</h5>
                                <h6>Lorem ipsum dolor sit a gravida platea accumsan, felis </h6>
                            </div>
                        </div>

                        <div class="button">
                            <button class="support-btn">Support</button>
                            <button class="check">Check Raffles</button>

                        </div>
                    </div>
                    <div class="raffless-card">
                        <div class="first">
                            <div class="img">
                                <img src="{{ asset('storage/images/' . $getUser->profile_pix) }}" alt="">
                            </div>
                            <div class="text">
                                <h5>Free Education Funding Inc.</h5>
                                <h6>Lorem ipsum dolor sit a gravida platea accumsan, felis </h6>
                            </div>
                        </div>

                        <div class="button">
                            <button class="support-btn">Support</button>
                            <button class="check">Check Raffles</button>

                        </div>
                    </div>
                    <div class="raffless-card">
                        <div class="first">
                            <div class="img">
                                <img src="{{ asset('storage/images/' . $getUser->profile_pix) }}" alt="">
                            </div>
                            <div class="text">
                                <h5>Free Education Funding Inc.</h5>
                                <h6>Lorem ipsum dolor sit a gravida platea accumsan, felis </h6>
                            </div>
                        </div>

                        <div class="button">
                            <button class="support-btn">Support</button>
                            <button class="check">Check Raffles</button>

                        </div>
                    </div>
                    <div class="raffless-card">
                        <div class="first">
                            <div class="img">
                                <img src="{{ asset('storage/images/' . $getUser->profile_pix) }}" alt="">
                            </div>
                            <div class="text">
                                <h5>Free Education Funding Inc.</h5>
                                <h6>Lorem ipsum dolor sit a gravida platea accumsan, felis </h6>
                            </div>
                        </div>

                        <div class="button">
                            <button class="support-btn">Support</button>
                            <button class="check">Check Raffles</button>

                        </div>
                    </div>
                </div> --}}

                <h5 class="follow">
                    Active Raffles
                </h5>

                <div class="ongoing-card-container">
                    @php
                        $raffle = DB::table('raffle')
                            ->where('approve_status', 1)
                            ->leftJoin('organisation', 'raffle.organisation_id', 'organisation.id')
                            ->select('raffle.*', 'organisation.organisation_name', 'organisation.cover_image', 'organisation.handle')
                            ->limit(6)
                            ->get();
                    @endphp
                    <div class="">
                        @foreach ($raffle as $item)
                            <div class="dash-raffle">
                                <div class="image-card">
                                    <img src="{{ asset('storage/images/'.$item->cover_image) }}" alt="">
                                </div>


                                <div class="desc">
                                    <div class="d">
                                        <h3 class="head">{{ $item->host_name }}</h3>
                                        <h6>{{ $item->organisation_name }}</h6>
                                        <h6 class="small">{{ $item->handle }}</h6>
                                        <div class="flex justify-between">
                                            <div class="flex align-items-center">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 18 26" fill="none">
                                                        <path opacity="0.3"
                                                            d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                                            fill="#215273" />
                                                        <path opacity="0.3"
                                                            d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z"
                                                            fill="#215273" />
                                                        <path
                                                            d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z"
                                                            fill="#215273" />
                                                    </svg></span>
                                                <span class="time" id="time"
                                                    data-target="{{ $item->ending_date }}">20h 33m</span>
                                            </div>
                                            <div class="last">

                                                <div class="flex justify-end">
                                                    {{-- <span><i class="bi bi-heart-fill"></i></span> --}}
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
                        @endforeach

                    </div>

                </div>
        </div>

    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script>
        function updateCountdown(element) {
            const targetDateTime = new Date(element.getAttribute('data-target')).getTime();
            const now = new Date().getTime();
            const timeRemaining = targetDateTime - now;

            if (timeRemaining <= 0) {
                element.innerHTML = "Countdown expired!";
            } else {
                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                if (days > 30) {
                    const months = Math.floor(days / 30);
                    element.innerHTML = `${months}M ${days % 30}D ${hours}h ${minutes}m ${seconds}s`;
                } else {
                    element.innerHTML = `${days}D ${hours}h ${minutes}m ${seconds}s`;
                }
            }
        }

        $("span#time").each(function(index, element) {
            updateCountdown(element); // Initial call
            setInterval(function() {
                updateCountdown(element);
            }, 1000); // Update every 1 second
        });
    </script>
@endsection
