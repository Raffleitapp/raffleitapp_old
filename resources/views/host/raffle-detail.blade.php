@extends('layouts/master')
@section('title', 'Raffle Detail')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- @vite(['resources/scss/raffle.scss']) --}}
    <style>
        .top-bg {
            height: 20vh;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.63) 0%, rgba(0, 0, 0, 0.63) 100%),
                url("{{ asset('img/createwalk.png') }}"),
                lightgray 50% / cover no-repeat;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: flex-start;
            align-items: center;

        }

        .carousel-container {
            display: flex;
            flex-direction: column;
            /* Add styles for container as needed */
        }

        .main-carouselsd {
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 45vh;
            /* Add styles for the main carousel as needed */
        }

        .carouselsd-item {
            display: block;
            height: 400px;
            max-width: 300px;
            margin: 0px auto;
            /* Add styles for individual carousel items as needed */
        }

        .carouselsd-item img {
            height: 100%;
            width: 100%;
            border-radius: 12px;
            object-fit: contain;
            object-position: center;
        }

        .thumbnail-carouselsd {
            display: flex;
            justify-content: center
        }

        .thumbnail-item {
            cursor: pointer;
            height: 80px;
            width: 80px;
            overflow: hidden;
            border-radius: 12px;
            margin: 0 10px;
        }

        .thumbnail-item img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            object-position: center
        }

        .tabs {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            border-radius: 20px;
            overflow-x: auto;
        }

        .tab-item {
            cursor: pointer;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            flex: 1;
            text-align: center;
            /* H3 Bold */
            font-family: Poppins;
            font-size: 15px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        .tab-item.active {
            background: var(--Primary-Color, #215273);
            color: #FFF;
        }

        .tab-content {
            /* border: 1px solid #ddd; */
            padding: 10px;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;

        }

        .host-detail .host-img {
            border-radius: 90px;

            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 12px
        }

        .host-detail .host-img img {
            height: 100%;
            width: 100%;
        }

        .profile-detail {
            align-items: center;
        }

        .profile-detail h4 {
            color: var(--bold-black-color, #262626);
            /* Title 3 Bold */
            font-family: Poppins;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: 100%;
        }

        .profile-detail h5 {
            color: var(--bold-black-color, #313030);
            /* Title 3 Bold */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 100%;
        }

        .text-icon {
            color: var(--Body-text-color, #303030);
            text-align: center;
            /* Title 4 Bold */
            font-family: Poppins;
            font-size: 14px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
            display: flex;
            align-items: center;
        }

        .extend-con h5.message {
            color: var(--Body-text-color, #303030);
            /* H5 */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        .extend-con .show-extend {
            border-radius: 10px;
            background: var(--Primary-Color, #215273);
            color: var(--Base-Color, #FDFDFD);
            /* H5 Bold */
            font-family: Poppins;
            font-size: 14px;
            padding: 10px 12px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            transition: display ease-in-out 10s
        }

        /* Modal content */
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            min-width: 300px;
            max-width: 400px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            position: relative;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }

        .modal-content h2 {
            color: var(--Body-text-color, #303030);
            /* H3 Bold */
            font-family: Poppins;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        .modal-content div.msg {
            border-radius: 5px;
            padding: 8px 10px;
            align-items: center;
            background: rgba(179, 212, 246, 0.40);
        }

        .modal-content div.msg span {
            color: #2B94DA;

            /* Title 4 Bold */
            font-family: Poppins;
            font-size: 10px;
            text-align: center;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        .modal-content input.days {
            border-radius: 10px;
            border: 1px solid var(--Primary-Color, #215273);
            width: 50%;
            padding: 10px 12px;
        }

        .modal-content label.day-label {
            color: var(--Body-text-color, #303030);
            /* H5 Bold */
            display: block;
            font-family: Poppins;
            font-size: 14px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        #old_date,
        #new_date {
            color: #666565;

            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
        }

        #extend {
            color: #FFF;
            padding: 10px;
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
            border-radius: 10px;
            background: var(--Button-Color, #55C595);
            border: none;
            outline: none;
        }

        #cancel,
        #closeModal {
            color: #161616;
            padding: 10px;
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
            margin-right: 20px;
            border-radius: 10px;
            border: 1px solid var(--Button-Color, #55C595);
            border: none;
            outline: none;
        }
    </style>

    @php
        $image1 = $data->image1;
        $image2 = $data->image2;
        $image3 = $data->image3;
        $image4 = $data->image4;
        $organ_id = $data->organisation_id;
    @endphp

    <div class="top-bg">
        <div class="top-section">
            <div class="flex mb-2 align-items-center text-white fw-light">
                <li class="flex align-items-center" onclick="location.href='{{ url('/') }}'">
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
                <li><span>Raffle Creation Steps</span></li>
            </div>
            <div class="flex  ">
                <div class="vl mt-2 mr-2"></div>
                <p class="custom-textext">Follow Steps To Create Raffle</p>
            </div>
        </div>
    </div>
    @php

        $raff_id = $data->id;
        $da = DB::table('ticket_price')
            ->where('raffle_id', $data->id)
            ->first();

        $organisationData = DB::table('organisation')
            ->where('id', $organ_id)
            ->first();

        $totalSales = DB::table('raffle_order')
            ->where('raffle_id', $data->id)
            ->sum('total');
        $totalPos = DB::table('raffle_order')
            ->where('raffle_id', $data->id)
            ->sum('amount');
        $formattedPrice = Lang::get('money', ['amount' => $totalPos]);

        // echo $da;
        // $imageData = DB::table('')

    @endphp
    <div class="creat-raffle-container">
        <div class="container">

            <div class="custom-grid">
                <div class="first-child">
                    <div class="carousel-container">
                        <div class="main-carouselsd">
                            <div class="carouselsd-item">
                                {{-- <img src="{{ asset('storage/images/' . $data->image1) }}" alt="..."> --}}
                                <img src="{{ asset('uploads/images/'.$data->image1) }}" alt="...">


                            </div>

                        </div>
                        <div class="thumbnail-carouselsd">

                            @if ($image2 != '')
                                <div class="thumbnail-item">
                                    <img src="{{ asset('uploads/images/'.$image2) }}" alt="...">

                                </div>
                            @endif
                            @if ($image3 != '')
                                <div class="thumbnail-item">
                                    <img src="{{ asset('uploads/images/'.$image3) }}" alt="...">

                                </div>
                            @endif
                            @if ($image4 != '')
                                <div class="thumbnail-item">
                                    <img src="{{ asset('uploads/images/'.$image4) }}" alt="...">

                                </div>
                            @endif



                            <!-- Add more thumbnail items corresponding to the main carousel items -->
                        </div>
                    </div>

                </div>
                <div class="second-child">

                    <h4 class="title">{{ $data->host_name }}</h4>
                    <div class="total-pot">
                        <span class="title">Total Pot:</span>
                        <span class="count">{{ '$' . $totalPos }}</span>
                    </div>
                    <h6 class="spa">Description</h6>
                    <p class="text">{{ $data->description }}</p>
                    <h6 class="spa">Time left</h6>

                    <div class="time-reader text-center">
                        <span class="time " style="font-size: 1.2rem; word-spacing: 2px; font-variant: small-caps "
                            id="time" data-target="{{ $data->ending_date }}">20h 33m</span>
                    </div>
                    <div class="flex my-2">
                        <h6 class="spa ">Raffles Ends:</h6>
                        <p class="text">{{ date('F j, Y, g:i a', strtotime($data->ending_date)) }}</p>
                    </div>
                    <div class="flex">
                        <h6 class="spa">Tickets sold:</h6>
                        <p class="text">{{ $formattedPrice }}</p>
                    </div>
                    <div class="support flex">
                        <p class="msg">Do Good. Support Our Cause Today!</p>
                        {{-- <p class="span_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">SUPPORT</p> --}}
                    </div>
                    {{-- <div class="price-select">
                    <div class="price-item">
                        <span class="name">3 Ticket</span>
                        <span class="amount">${{ $da->three }}</span>
                    </div>
                    <div class="price-item">
                        <span class="name">10 Ticket </span>
                        <span class="amount">${{ $da->ten }}</span>
                    </div>
                    <div class="price-item">
                        <span class="name">20 Ticket</span>
                        <span class="amount">${{ $da->twenty }}</span>
                    </div>
                    <div class="price-item">
                        <span class="name">100 Ticket</span>
                        <span class="amount">${{ $da->one_twenty }}</span>
                    </div>
                    <div class="price-item">
                        <span class="name">200 Ticket</span>
                        <span class="amount">${{ $da->two_hundred }}</span>
                    </div>
                </div> --}}
                    <div class="justify-center" id="me">

                    </div>
                    {{-- @if (!$check_if->exists())
                    <button class="pay-money" id="pay_now">Get Ticket</button>

                    @endif --}}
                    <div class="extend-con">
                        <h5 class="message">Did’t meet up with your raffle target? Make use of the extend button to extend
                            the raffle time.</h5>

                        <button class="show-extend" id="openModal">EXTEND RAFFLE</button>

                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-end align-items-center">
                {{-- <div class="text-icon">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30" fill="none">
                            <path d="M21.75 0C19.14 0 16.635 1.32425 15 3.41689C13.365 1.32425 10.86 0 8.25 0C3.63 0 0 3.9564 0 8.99183C0 15.1717 5.1 20.2071 12.825 27.8583L15 30L17.175 27.842C24.9 20.2071 30 15.1717 30 8.99183C30 3.9564 26.37 0 21.75 0ZM15.15 25.4223L15 25.5858L14.85 25.4223C7.71 18.376 3 13.7166 3 8.99183C3 5.72207 5.25 3.26975 8.25 3.26975C10.56 3.26975 12.81 4.88828 13.605 7.12807H16.41C17.19 4.88828 19.44 3.26975 21.75 3.26975C24.75 3.26975 27 5.72207 27 8.99183C27 13.7166 22.29 18.376 15.15 25.4223Z" fill="#55C595" />
                        </svg></span>
                    <span>Follow Org</span>
                </div>
                <div class="text-icon">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30" fill="none">
                            <path d="M13.75 8.75H16.25V11.25H13.75V8.75ZM13.75 13.75H16.25V21.25H13.75V13.75ZM15 2.5C8.1 2.5 2.5 8.1 2.5 15C2.5 21.9 8.1 27.5 15 27.5C21.9 27.5 27.5 21.9 27.5 15C27.5 8.1 21.9 2.5 15 2.5ZM15 25C9.4875 25 5 20.5125 5 15C5 9.4875 9.4875 5 15 5C20.5125 5 25 9.4875 25 15C25 20.5125 20.5125 25 15 25Z" fill="#55C595" />
                        </svg>
                    </span>
                    <span>More Info</span>
                </div> --}}
                <div class="text-icon m-2">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 30 30"
                            fill="none">
                            <path
                                d="M22.5 20.15C21.55 20.15 20.7 20.525 20.05 21.1125L11.1375 15.925C11.2 15.6375 11.25 15.35 11.25 15.05C11.25 14.75 11.2 14.4625 11.1375 14.175L19.95 9.03749C20.625 9.66249 21.5125 10.05 22.5 10.05C24.575 10.05 26.25 8.37499 26.25 6.29999C26.25 4.22499 24.575 2.54999 22.5 2.54999C20.425 2.54999 18.75 4.22499 18.75 6.29999C18.75 6.59999 18.8 6.88749 18.8625 7.17499L10.05 12.3125C9.375 11.6875 8.4875 11.3 7.5 11.3C5.425 11.3 3.75 12.975 3.75 15.05C3.75 17.125 5.425 18.8 7.5 18.8C8.4875 18.8 9.375 18.4125 10.05 17.7875L18.95 22.9875C18.8875 23.25 18.85 23.525 18.85 23.8C18.85 25.8125 20.4875 27.45 22.5 27.45C24.5125 27.45 26.15 25.8125 26.15 23.8C26.15 21.7875 24.5125 20.15 22.5 20.15ZM22.5 5.04999C23.1875 5.04999 23.75 5.61249 23.75 6.29999C23.75 6.98749 23.1875 7.54999 22.5 7.54999C21.8125 7.54999 21.25 6.98749 21.25 6.29999C21.25 5.61249 21.8125 5.04999 22.5 5.04999ZM7.5 16.3C6.8125 16.3 6.25 15.7375 6.25 15.05C6.25 14.3625 6.8125 13.8 7.5 13.8C8.1875 13.8 8.75 14.3625 8.75 15.05C8.75 15.7375 8.1875 16.3 7.5 16.3ZM22.5 25.075C21.8125 25.075 21.25 24.5125 21.25 23.825C21.25 23.1375 21.8125 22.575 22.5 22.575C23.1875 22.575 23.75 23.1375 23.75 23.825C23.75 24.5125 23.1875 25.075 22.5 25.075Z"
                                fill="#55C595" />
                        </svg></span>
                    <span>Share Raffle</span>
                </div>
                <div class="mx-3">

                    <button id="facebookShare" class="btn btn-primary">
                        <i class="bi bi-facebook"></i>
                    </button>
                    <button id="instagramShare" class="btn btn-danger">
                        <i class="bi bi-telegram"></i>
                    </button>
                    <button id="whatsappShare" class="btn btn-success">
                        <i class="bi bi-whatsapp"></i>
                    </button>
                    <button id="copyLink" class="btn btn-secondary">
                        <i class="bi bi-clipboard"></i>
                    </button>
                </div>
            </div>

            <div class="tab-container justify-center my-3">
                <ul class="tabs">
                    <li class="tab-item active">Description</li>
                    <li class="tab-item">Raffles History</li>
                    <li class="tab-item">Live Support</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active p-2">
                        <div class="card p-3" style="">
                            <div class="host-detail flex align-items-center">
                                <div class="host-img">
                                    {{-- <img src="{{ asset('storage/images/' . $organisationData->cover_image) }}"
                                        alt=""> --}}
                                    <img src="{{ asset('uploads/images/'.$organisationData->cover_image) }}" alt="">
                                </div>
                                <div class="profile-detail">
                                    <h4>{{ $organisationData->organisation_name }}</h4>
                                    <h5>{{ $organisationData->handle }}</h5>
                                </div>
                            </div>
                            <div class="profile-detail my-3">
                                <h4 style="font-size: 1.4rem">About Us</h4>
                                <h5 style="font-size: 12px; line-height:150%">{{ $organisationData->description }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane">
                        <div class="card p-3" style="width:85vw">
                            <div class="table-responsive">
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        @php
                                            $purchase = DB::table('raffle_order')
                                                ->where('raffle_id', $data->id)->where("payment_reason",1)
                                                ->join('users', 'raffle_order.user_id', 'users.id')
                                                ->orderBy('raffle_order.date_purchase', 'desc')
                                                ->select('raffle_order.date_purchase', 'users.first_name')
                                                ->get();

                                            function convertDate($originalDatetime)
                                            {

                                                // Convert the datetime string to a DateTime object
                                                $datetime = new DateTime($originalDatetime);

                                                // Get the current time as a DateTime object
                                                $currentTime = new DateTime();

                                                // Calculate the time difference
                                                $interval = $currentTime->diff($datetime);

                                                // Format the result
                                                if ($interval->h > 0) {
                                                    $result = $interval->h . ' hr ago';
                                                } elseif ($interval->i > 0) {
                                                    $result = $interval->i . ' min ago';
                                                } else {
                                                    $result = 'just now';
                                                }

                                                return $result;
                                            }
                                        @endphp

                                        <tr>
                                            <th style="min-width: 150px">Date </th>
                                            <th style="min-width: 150px">User</th>
                                        </tr>


                                    </thead>
                                    <tbody>
                                        @foreach ($purchase as $item)
                                            <tr>
                                                <td>{{ convertDate($item->date_purchase) }}</td>
                                                <td>{{ $item->first_name }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane">
                        <div class="card p-3" style="width:85vw">
                            <div class="table-responsive">
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        @php
                                            $purchaseSupport = DB::table('raffle_order')
                                                ->where('raffle_id', $data->id)->where("payment_reason",2)
                                                ->orderBy('raffle_order.date_purchase', 'desc')->get();

                                            function convertDates($originalDatetimes)
                                            {

                                                // Convert the datetime string to a DateTime object
                                                $datetimes = new DateTime($originalDatetimes);

                                                // Get the current time as a DateTime object
                                                $currentTimes = new DateTime();

                                                // Calculate the time difference
                                                $intervals = $currentTimes->diff($datetimes);

                                                // Format the result
                                                if ($intervals->h > 0) {
                                                    $results = $intervals->h . ' hr ago';
                                                } elseif ($interval->i > 0) {
                                                    $results = $intervals->i . ' min ago';
                                                } else {
                                                    $results = 'just now';
                                                }

                                                return $results;
                                            }
                                        @endphp

                                        <tr>
                                            <th style="min-width: 150px">Date </th>
                                            <th style="min-width: 150px">User</th>
                                        </tr>


                                    </thead>
                                    <tbody>
                                        @foreach ($purchaseSupport as $item)
                                            <tr>
                                                <td>{{ convertDate($item->date_purchase) }}</td>
                                                <td>Annonymous</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title fs-5 text-sm " id="staticBackdropLabel">Support
                                        {{ $data->host_name }}</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group mb-3">
                                            <label for="" style="font-size: 12px; font-weight:700">Amount you want
                                                to support with</label>
                                            <input type="number" name="support-amount" id="support-amount" required
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="pay-money btn btn-success btn-sm"
                                                id="support-pay">Make payment</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane">
                        <div class="card p-3" style="">
                            <div class="host-detail flex align-items-center">
                                <div class="host-img">
                                    <img src="{{ asset('storage/images/' . $organisationData->cover_image) }}"
                                        alt="">
                                </div>
                                <div class="profile-detail">
                                    <h4>{{ $organisationData->organisation_name }}</h4>
                                    <h5>{{ $organisationData->handle }}</h5>
                                </div>
                            </div>
                            <div class="profile-detail my-3">
                                <h4 style="font-size: 1.4rem">About Us</h4>
                                <h5 style="font-size: 12px; line-height:150%">{{ $organisationData->description }}</h5>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                {{-- <span id="closeModal" class="close">&times;</span> --}}
                <h2>Request: Extend Raffle End Time</h2>
                <div class="flex msg">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 17C11.45 17 11 16.55 11 16V12C11 11.45 11.45 11 12 11C12.55 11 13 11.45 13 12V16C13 16.55 12.55 17 12 17ZM13 9H11V7H13V9Z"
                                fill="#4FA9E6" />
                        </svg></span>
                    <span>Sometimes you need more time, to meet your goals. But keep in mind this can affect users
                        expectations.</span>
                </div>
                <form action="{{url('host/extendRaffle')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3 mt-3">
                        <label for="" class="day-label">How many days do you want to add?</label>
                        <input type="number" name="day_no" id="dayssss" class="days">
                    </div>
                    <input type="text" name="current_date" hidden readonly value="{{ $data->ending_date }}">
                    <input type="text" name="raffle_id" hidden readonly value="{{ $data->id }}">

                    <div class="d-flex align-items-center">
                        <h5>
                            <span
                                style="
                                color: #666565;

    font-family: Poppins;
    font-size: 13px;
    display:block;
    font-style: normal;
    font-weight: 500;
    line-height: 140%;
                                ">Original
                                date</span>
                            <span id="old_date">{{ $data->ending_date }}</span>
                        </h5>
                        <h5><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 50 50"
                                fill="none">
                                <path
                                    d="M33.5814 22.9736H10.6439C9.49805 22.9736 8.56055 23.8849 8.56055 24.9986C8.56055 26.1124 9.49805 27.0237 10.6439 27.0237H33.5814V30.6484C33.5814 31.5597 34.7064 32.0052 35.3522 31.3572L41.1439 25.7074C41.5397 25.3024 41.5397 24.6746 41.1439 24.2696L35.3522 18.6198C34.7064 17.9718 33.5814 18.4376 33.5814 19.3286V22.9736Z"
                                    fill="#666565" />
                            </svg></h5>
                        <h5>
                            <span
                                style="
                                color:  #161616;
    font-family: Poppins;
    font-size: 13px;
    display:block;
    font-style: normal;
    font-weight: 500;
    line-height: 140%;
                                ">New
                                date</span>
                            <span id="new_date">13 June 2023</span>
                        </h5>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" id="closeModal">Cancel</button>
                        <button type="submit" id="extend">Extend Time</button>

                    </div>
                </form>

            </div>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <script src="{{ asset('js/alert.js') }}"></script>
        <script>
            function ite() {
                $("#me").html(`
                    <div class="price-select justify-center">
                        <div class="price-item ${selectedCard == 1 ? 'yes' : ''}" onclick="selectItem('1','{{ $da->one }}')">
                            <span class="name">1 Ticket</span>
                            <span class="amount">${{ $da->one }}</span>
                        </div>
                        <div class="price-item ${selectedCard == 3 ? 'yes' : ''}"  onclick="selectItem('3','{{ $da->three }}')">
                            <span class="name">3 Ticket </span>
                            <span class="amount">${{ $da->three }}</span>
                        </div>
                        <div class="price-item ${selectedCard == 5 ? 'yes' : ''}"  onclick="selectItem('5','{{ $da->ten }}')">
                            <span class="name">5 Ticket </span>
                            <span class="amount">${{ $da->ten }}</span>
                        </div>
                        <div class="price-item ${selectedCard == 10 ? 'yes' : ''}"  onclick="selectItem('10','{{ $da->twenty }}')">
                            <span class="name">10 Ticket</span>
                            <span class="amount">${{ $da->twenty }}</span>
                        </div>
                        <div class="price-item ${selectedCard == 15 ? 'yes' : ''}"  onclick="selectItem('15','{{ $da->one_twenty }}')">
                            <span class="name">15 Ticket</span>
                            <span class="amount">${{ $da->one_twenty }}</span>
                        </div>
                        <div class="price-item ${selectedCard == 20 ? 'yes' : ''}"  onclick="selectItem('20','{{ $da->two_hundred }}')">
                            <span class="name">20 Ticket</span>
                            <span class="amount">${{ $da->two_hundred }}</span>
                        </div>
                    </div>
                `);
            }

            document.getElementById("facebookShare").addEventListener("click", function() {
                // Share on Facebook
                var url = encodeURIComponent(window.location.href);
                window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank");
            });

            document.getElementById("instagramShare").addEventListener("click", function() {
                // Share on Instagram
                var url = encodeURIComponent(window.location.href);
                window.open("https://telegram.me/share/url?url=" + url, "_blank");
            });

            document.getElementById("whatsappShare").addEventListener("click", function() {
                // Share on WhatsApp
                var url = encodeURIComponent(window.location.href);
                window.open("https://api.whatsapp.com/send?text=" + url, "_blank");
            });

            document.getElementById("copyLink").addEventListener("click", function() {
                // Copy the link to the clipboard
                var link = window.location.href;
                var textArea = document.createElement("textarea");
                textArea.value = link;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand("copy");
                document.body.removeChild(textArea);

                // alert("Link copied to clipboard: " + link);
                showSuccessMsg("Link copied to clipboard");
            });

            function updateCountdown(element) {
                const targetDateTime = new Date(element.getAttribute('data-target')).getTime();
                const now = new Date().getTime();
                const timeRemaining = targetDateTime - now;

                if (timeRemaining <= 0) {
                    element.innerHTML = "Raffle Ended";
                } else {
                    const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                    if (days > 30) {
                        const months = Math.floor(days / 30);
                        element.innerHTML = `<table class="table table-hover table-borderless text-white">
                            <thead>
                                <tr class='text-center'>
                                    <th>
                                        ${months}
                                        </th>
                                        <th>${days % 30}</th>
                                        <th>${hours}</th>
                                        <th>${minutes}</th>
                                        <th>${seconds}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='text-center' style='font-size:12px'>
                                        <td>Months</td>
                                        <td>Days</td>
                                        <td>Hours</td>
                                        <td>Mins</td>
                                        <td>Seconds</td>
                                        </tr>
                                    </tbody>
                            </table>`;
                    } else {
                        element.innerHTML = `<table class="table table-hover table-borderless text-white">
                            <thead>
                                <tr class='text-center'>

                                        <th>${days % 30}</th>
                                        <th>${hours}</th>
                                        <th>${minutes}</th>
                                        <th>${seconds}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='text-center' style='font-size:12px'>

                                        <td>Days</td>
                                        <td>Hours</td>
                                        <td>Mins</td>
                                        <td>Seconds</td>
                                        </tr>
                                    </tbody>
                            </table>`;
                    }
                }
            }

            $("span#time").each(function(index, element) {
                updateCountdown(element); // Initial call
                setInterval(function() {
                    updateCountdown(element);
                }, 1000); // Update every 1 second
            });
            let selectedCard = "";
            let selectedPrice = "";
            let selectedNo = "";
            $(document).ready(function() {
                ite();
                $("div.thumbnail-item img").click(() => {
                    var image = $("div.thumbnail-item img").attr('src');
                    console.log(image);

                });

                $("#pay_now").click(function(e) {
                    e.preventDefault();
                    // console.log(selectedCard, selectedPrice)
                    if (selectedCard === '') {
                        showErrorMsg("Please choose the number of ticket you want to purchase");
                    } else {

                        const id = {{ $raff_id }}
                        const param = {
                            raffle_id: id,
                            amount: selectedPrice,
                            total_raffle: selectedCard,
                            type: 'purchase'
                        }
                        // console.log(param);
                        localStorage.setItem('myData', JSON.stringify(param));
                        window.location.href = "{{ url('/make-payment') }}"
                    }

                });


                $("#support-pay").click(function(e) {
                    e.preventDefault();
                    // console.log(selectedCard, selectedPrice)
                    let amount = $("#support-amount").val();
                    if (amount > 0) {

                        const id = {{ $raff_id }}
                        const param = {
                            raffle_id: id,
                            amount: amount,
                            total_raffle: 0,
                            type: 'support'
                        }
                        // console.log(param);
                        localStorage.setItem('myData', JSON.stringify(param));
                        window.location.href = "{{ url('/make-payment') }}"
                    }

                });

                var originalDateTime = "{{ $data->ending_date }}";

                // Create a Date object from the original date and time string
                var dateObj = new Date(originalDateTime);

                // Format the date as "yyyy-mm-d"
                var formattedDate = dateObj.getFullYear() + '-' + (dateObj.getMonth() + 1) + '-' + dateObj.getDate();

                $("#old_date").text(formattedDate);
                $("#new_date").text(formattedDate);

                function updateDate() {
                    console.log('Update Date')
                    var originalDate = new Date('{{ $data->ending_date }}');
                    var daysToAdd = parseInt($("#dayssss").val());

                    // Add days to the original date
                    originalDate.setDate(originalDate.getDate() + daysToAdd);

                    // Format the updated date
                    var updatedDate = originalDate;

                    var options = {
                        weekday: 'long', // Display the full weekday name
                        year: 'numeric', // Display the full year
                        month: 'long', // Display the full month name
                        day: 'numeric' // Display the day of the month
                    };

                    // Format the date as "day, month name, year"
                    var formattedDate = originalDate.toLocaleString(undefined, options);
                    $("#new_date").text(formattedDate);
                }

                // Trigger the updateDate function on input change
                $("#dayssss").on('input', updateDate);

                // Call the function on page load
                updateDate();
            });



            function selectItem(id, price) {
                // console.log(id, price)
                selectedCard = id;
                selectedPrice = price


                ite();
            }

            $(document).ready(function() {
                // Add click event handlers to the tab items
                $('.tab-item').click(function() {
                    // Remove the 'active' class from all tab items and content panes
                    $('.tab-item').removeClass('active');
                    $('.tab-pane').removeClass('active');

                    // Add the 'active' class to the clicked tab item
                    $(this).addClass('active');
                    $(this).css({
                        "transition": "background ease-in-out 0.7s",

                    })

                    // Show the corresponding content pane
                    const tabIndex = $(this).index();
                    $('.tab-pane').eq(tabIndex).addClass('active');
                });

                // Set the first tab as active by default
                $('.tab-item:first').click();
            });

            document.getElementById('openModal').addEventListener('click', function() {
                document.getElementById('myModal').style.display = 'block';
            });

            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('myModal').style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target == document.getElementById('myModal')) {
                    document.getElementById('myModal').style.display = 'none';
                }
            });
        </script>
    </div>
@endsection
