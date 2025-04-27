@extends('layouts/main')
@section('title', 'About')
@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/host.css') }}">

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

        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        line-height: 70%;
    }

    .after-about p.desc {
        color: var(--Heading-Text-color, #161616);
        /* text-align: center; */
        /* H5 */

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
                <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                        <path d="M23.7473 12.0343V6.65933C23.7473 5.97183 23.1848 5.40933 22.4973 5.40933H21.2473C20.5598 5.40933 19.9973 5.97183 19.9973 6.65933V8.65933L15.8348 4.90933C15.3598 4.48433 14.6348 4.48433 14.1598 4.90933L3.70981 14.3218C3.28481 14.6968 3.54731 15.4093 4.12231 15.4093H6.24731V24.1593C6.24731 24.8468 6.80981 25.4093 7.49731 25.4093H11.2473C11.9348 25.4093 12.4973 24.8468 12.4973 24.1593V17.9093H17.4973V24.1593C17.4973 24.8468 18.0598 25.4093 18.7473 25.4093H22.4973C23.1848 25.4093 23.7473 24.8468 23.7473 24.1593V15.4093H25.8723C26.4473 15.4093 26.7223 14.6968 26.2848 14.3218L23.7473 12.0343ZM12.4973 12.9093C12.4973 11.5343 13.6223 10.4093 14.9973 10.4093C16.3723 10.4093 17.4973 11.5343 17.4973 12.9093H12.4973Z" fill="#FDFDFD" />
                    </svg></span><span>Raffleit</span>
            </li>
            <li>
                <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 25" fill="none">
                        <path d="M5.94263 6.99033C5.53638 7.39658 5.53638 8.05283 5.94263 8.45908L9.98429 12.5007L5.94263 16.5424C5.53638 16.9487 5.53638 17.6049 5.94263 18.0112C6.34888 18.4174 7.00513 18.4174 7.41138 18.0112L12.1926 13.2299C12.5989 12.8237 12.5989 12.1674 12.1926 11.7612L7.42179 6.99033C7.01554 6.58408 6.34888 6.58408 5.94263 6.99033Z" fill="#FDFDFD" />
                        <path d="M12.8072 6.99033C12.401 7.39658 12.401 8.05283 12.8072 8.45908L16.8489 12.5007L12.8072 16.5424C12.401 16.9487 12.401 17.6049 12.8072 18.0112C13.2135 18.4174 13.8697 18.4174 14.276 18.0112L19.0572 13.2299C19.4635 12.8237 19.4635 12.1674 19.0572 11.7612L14.276 6.97991C13.8801 6.58408 13.2135 6.58408 12.8072 6.99033Z" fill="#FDFDFD" />
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
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
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
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
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
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z" fill="#FFB72D" />
                            </svg></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn-icon mx-auto">Start Raffling Today <span class="ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z" fill="#215273" />
            </svg></span></button>
</div>
<div class="fd">
    <div class="my-3 p-3 flex justify-between align-item-center">
        <h2 class="text-center title-2">Live <span>Raffle</span></h2>
        <button class="btn btn-sm draw-live-btn"  onclick="location.href='{{ url('raffles') }}'">DRAW LIVE</button>

    </div>
    @php
    $raffle = DB::table('raffle')
        ->where('approve_status', 1)->leftJoin('raffle_order', 'raffle.id', 'raffle_order.raffle_id')->where('raffle.ending_date' ,'>', now()->format('Y-m-d H:i:s') )
        ->leftJoin('organisation', 'raffle.organisation_id', 'organisation.id')
        ->select('raffle.starting_date','raffle.id','raffle.ending_date','raffle.host_name','raffle.state_raffle_hosted', 'organisation.organisation_name', 'organisation.cover_image', 'organisation.handle','organisation.website',  DB::raw('COALESCE(SUM(raffle_order.amount), 0) as total_amount'))
        ->groupBy('raffle.id',  'raffle.starting_date',
'raffle.ending_date',  // Corrected column name
'raffle.host_name',
'raffle.state_raffle_hosted',
'organisation.organisation_name',
'organisation.cover_image',
'organisation.handle',
'organisation.website')
        ->limit(6)
        ->get();
@endphp
<div class="row justify-center gx-3 mb-4 gy-4">
    <div class="md:p-4 xl:p-4 sm:p-2 w-100 raffle-group">
        <div class="row justify-center g-3 mb-4 gy-4 ">
            @foreach ($raffle as $item)
            <div class="col-12  col-sm-12 col-md-6 col-lg-6">

                <div class="mx-auto raffle-cardz" onclick="location.href='{{ url('raffle_detail/' . $item->state_raffle_hosted) }}'">
                    <div class="img">
                        <img src="{{ asset('uploads/images/'.$item->cover_image) }}" alt="">
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
                            <h6>Total Pot <span class="block text-right" style="text-align: right">{{$item->total_amount}}</span>
                            </h6>
                        </div>
                    </div>

                </div>
            </div>



            @endforeach

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
    <div class="flex justify-center my-4 py-4">
        <div class="row w-3/5 align-items-center mx-auto my-4 ">
            <div class="col-12 col-md-6 ">
                <button  onclick="location.href='{{ url('raffles') }}'" class="btn-icon w-100" style="font-size: 12px; flex-wrap: nowrap ">Start Raffling Today <span class="ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z" fill="#215273" />
                        </svg></span></button>
            </div>
            <div class="col-12 col-md-6 py-3">
                <button onclick="location.href='{{ url('user/create_step') }}'" class="btn-icon  w-100 white">Create Raffle <span class="ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2C6.48 2 2 6.48 2 12ZM11.71 8.21L14.79 11.29C15.18 11.68 15.18 12.31 14.79 12.71L11.71 15.79C11.32 16.18 10.68 16.18 10.29 15.79C9.9 15.4 9.9 14.77 10.29 14.38L12.67 12L10.29 9.62C9.9 9.23 9.9 8.6 10.29 8.21C10.68 7.82 11.32 7.82 11.71 8.21Z" fill="#215273" />
                        </svg></span></button>
            </div>
        </div>
    </div>

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
</div>
@endsection
