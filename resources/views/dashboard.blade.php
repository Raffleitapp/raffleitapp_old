@extends('layouts.dashlayout')
@section('title', 'Dashboard')
@section('contentss')
    <link href="{{ asset('css/host.css') }}" rel="stylesheet">


    <div class="container">
        <h3 class="user-greet">Welcome {{ $getUser->username == '' ? $getUser->first_name : $getUser->username }}</h3>
        <h6 class="instruction">From your account dashboard you can view your recent raffles, manage your shipping and
            billing
            addresses, and edit your password and account details.
        </h6>

        <div class="my-3">
            <div class="row justify-between g-2 gy-3">
                <div class="col-12 col-md-9">
                    <div class="profile-pix flex items-center">
                        <img src="{{ asset('storage/images/' . $getUser->profile_pix) }}" class="profile-img" alt="">
                        <h5 class="welcome-name ml-4">
                            {{ $getUser->first_name . ' ' . $getUser->last_name }}
                            <span>{{ $getUser->about }}</span>
                        </h5>
                    </div>
                </div>

                {{-- <div class="col-12 col-md-3">
                    <button class="host-btn">Host New Raffle</button>

                </div> --}}
            </div>
            {{-- <h5 class="follow">
                Raffles you follow
            </h5> --}}
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


            <div class="rafle">
                <h5 class="head">Active Raffles</h5>
            </div>
            <div class="ongoing-card-container">
                @php
                    // $raffle = DB::table('raffle')
                    //     ->where('approve_status', 1)
                    //     ->leftJoin('organisation', 'raffle.organisation_id', 'organisation.id')
                    //     ->select('raffle.*', 'organisation.organisation_name', 'organisation.cover_image', 'organisation.handle', 'organisation.website')
                    //     ->limit(6)
                    //     ->get();
                        $raffle = DB::table('raffle_order')->where('raffle_order.user_id', session()->get('user_id'))->join('raffle','raffle_order.raffle_id','raffle.id')
                        ->leftJoin('organisation', 'raffle.organisation_id', 'organisation.id')
                        ->select('raffle.*', 'organisation.organisation_name', 'organisation.cover_image', 'organisation.handle', 'organisation.website')->get();
                @endphp
                <div class="">
                    <div class="raffle-group">
                        @foreach ($raffle as $item)
                            <div class="mx-auto raffle-cardz" onclick="location.href='{{ url('raffle_detail/' . $item->state_raffle_hosted) }}'">
                                <div class="img">
                                    <img src="{{ asset($item->cover_image) }}" alt="">
                                </div>
                                <div class="text" style="position: relative">
                                    <div class="" style="width:70%">
                                        <h3 class="title">{{ $item->host_name }}</h3>
                                        <h4 class="purpose">{{ $item->organisation_name }}</h4>
                                        <h4 class="handle">{{ $item->handle }}</h4>
                                        <h4 class="handle">{{ $item->website }}
                                        </h4>
                                    </div>

                                    <span style="position: absolute; top: 5px; right:10px"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                        <path d="M17.5007 6.5625C10.209 6.5625 3.9819 11.0979 1.45898 17.5C3.9819 23.9021 10.209 28.4375 17.5007 28.4375C24.7923 28.4375 31.0194 23.9021 33.5423 17.5C31.0194 11.0979 24.7923 6.5625 17.5007 6.5625ZM17.5007 24.7917C13.4757 24.7917 10.209 21.525 10.209 17.5C10.209 13.475 13.4757 10.2083 17.5007 10.2083C21.5257 10.2083 24.7923 13.475 24.7923 17.5C24.7923 21.525 21.5257 24.7917 17.5007 24.7917ZM17.5007 13.125C15.0798 13.125 13.1257 15.0792 13.1257 17.5C13.1257 19.9208 15.0798 21.875 17.5007 21.875C19.9215 21.875 21.8757 19.9208 21.8757 17.5C21.8757 15.0792 19.9215 13.125 17.5007 13.125Z" fill="#215273"/>
                                      </svg></span>
                                    <div class="bottom-text flex justify-between align-items-center">
                                        <h6 class="flex align-items-center"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="18" height="18" viewBox="0 0 18 26" fill="none">
                                                    <path opacity="0.3"
                                                        d="M3.14258 7.375L8.71335 12.375L14.2841 7.375V3H3.14258V7.375Z"
                                                        fill="#215273" />
                                                    <path opacity="0.3"
                                                        d="M3.14258 7.375L8.71335 12.375L14.2841 7.375V3H3.14258V7.375Z"
                                                        fill="#215273" />
                                                    <path
                                                        d="M17.0698 0.5H0.357422V8L5.9282 13L0.371349 18.0125L0.357422 25.5H17.0698L17.0558 18.0125L11.499 13L17.0698 8.0125V0.5ZM14.2844 18.625V23H3.14281V18.625L8.71359 13.625L14.2844 18.625ZM14.2844 7.375L8.71359 12.375L3.14281 7.375V3H14.2844V7.375Z"
                                                        fill="#215273" />
                                                </svg></span><span class="time" id="time"
                                                data-target="{{ $item->ending_date }}">20h 33m</span></h6>
                                        <h6>Total Pot <span class="block text-right" style="text-align: right">$100</span>
                                        </h6>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>


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
