@extends('layouts/master')
@section('title', 'Raffle Detail')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['resources/scss/raffle.scss'])
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
    </style>



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
        $da = DB::table('ticket_price')
            ->where('raffle_id', $data->id)
            ->first();
    @endphp
    <div class="creat-raffle-container">

        <div class="custom-grid">
            <div class="first-child">
                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga eveniet, aliquid distinctio corrupti neque
                    consectetur minus veniam laboriosam aliquam odio, illum, a rerum ratione ullam magni expedita! At, non
                    modi!</h3>
            </div>
            <div class="second-child">

                <h4 class="title">Free Education Funding Inc.</h4>
                <div class="total-pot">
                    <span class="title">Total Pot:</span>
                    <span class="count">$100</span>
                </div>
                <h6 class="spa">Description</h6>
                <p class="text">Lorem ipsum dolor sit amet consectetur adipiscing elit litora, cursus class molestie
                    torquent gravida platea accumsan, felis sapien massa bibendum ante est mollis</p>
                <h6 class="spa">Time left</h6>

                <div class="time-reader">

                </div>
                <div class="flex">
                    <h6 class="spa">Description</h6>
                    <p class="text">December 23, 2023 1:25 pm</p>
                </div>
                <div class="flex">
                    <h6 class="spa">Tickets sold:</h6>
                    <p class="text">39</p>
                </div>
                <div class="support flex">
                    <p class="msg">Do Good. Support Our Cause Today!</p>
                    <p class="span_btn">SUPPORT</p>
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
                <div class="" id="me">

                </div>

                <button class="pay-money" id="pay_now">Get Ticket</button>
            </div>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <script src="{{ asset('js/alert.js') }}"></script>
        <script>
            function ite() {
                $("#me").html(`
                    <div class="price-select">
                        <div class="price-item ${selectedCard == 3 ? 'yes' : ''}" onclick="selectItem('3','{{ $da->three }}')">
                            <span class="name">3 Ticket</span>
                            <span class="amount">${{ $da->three }}</span>
                        </div>
                        <div class="price-item ${selectedCard == 10 ? 'yes' : ''}"  onclick="selectItem('10','{{ $da->ten }}')">
                            <span class="name">10 Ticket </span>
                            <span class="amount">${{ $da->ten }}</span>
                        </div>
                        <div class="price-item ${selectedCard == 20 ? 'yes' : ''}"  onclick="selectItem('20','{{ $da->twenty }}')">
                            <span class="name">20 Ticket</span>
                            <span class="amount">${{ $da->twenty }}</span>
                        </div>
                        <div class="price-item ${selectedCard == 100 ? 'yes' : ''}"  onclick="selectItem('100','{{ $da->one_twenty }}')">
                            <span class="name">100 Ticket</span>
                            <span class="amount">${{ $da->one_twenty }}</span>
                        </div>
                        <div class="price-item ${selectedCard == 200 ? 'yes' : ''}"  onclick="selectItem('200','{{ $da->two_hundred }}')">
                            <span class="name">200 Ticket</span>
                            <span class="amount">${{ $da->two_hundred }}</span>
                        </div>
                    </div>
                `);
            }
            let selectedCard = "";
            let selectedPrice = "";
            let selectedNo = "";
            $(document).ready(function() {
                ite();

                $("#pay_now").click(function (e) {
                    e.preventDefault();
            console.log(selectedCard, selectedPrice)
            if(selectedCard === ''){
                showErrorMsg("Please choose the ticket you want to buy");
            }

                });
            });


            function selectItem(id, price) {
                // console.log(id, price)
                selectedCard = id;
                selectedPrice = price

                ite();
            }

        </script>
    </div>
@endsection
