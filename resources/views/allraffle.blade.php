@extends('layouts/main')
@section('title', 'All Raffle')
@section('content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/host.css') }}">

<style>
    .top-bg {
        height: 20vh;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.63) 0%, rgba(0, 0, 0, 0.63) 100%),
        url("{{ asset('img/how-it-work-bg.jpeg') }}"),
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

    h3.top-head {
        color: #000;

        font-family: 'Prompt';
        font-size: 2rem;
        font-style: normal;
        font-weight: 900;
        line-height: 140%;
    }

    h3.top-head span {
        color: #55C595
    }

    .top-filter-dash {
        border-radius: 5px 5px 0px 0px;
        border-bottom: 3px solid rgba(57, 57, 57, 0.10);
        background: #FFF;
        padding: 20px 0px;
    }

    .top-filter-dash .head {
        border-radius: 10px 10px 0px 0px;
        background: var(--Primary-Color, #215273);
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 12px;
    }

    .top-filter-dash .head .serch-text {
        color: var(--Base-Color, #FDFDFD);
        /* H4 Bold */
        font-family: 'Poppins';
        font-size: 1rem;
        font-style: normal;
        font-weight: 700;
        line-height: 140%;
    }

    .top-filter-dash .head .show-more {
        color: var(--Base-Color, #FDFDFD);
        /* Title 6 Medium */
        font-family: 'Poppins';
        font-size: .8rem;
        font-style: normal;
        font-weight: 500;
        line-height: 140%;
    }

    .top-filter-dash .body .search label {
        color: var(--bold-black-color, #262626);
        /* Title 3 Bold Medium Semi Bold */
        font-family: 'Poppins';
        font-size: .8rem;
        font-style: normal;
        font-weight: 600;
        line-height: 140%;
    }

    .top-filter-dash .body {
        padding: 12px
    }

    .top-filter-dash .body .search input {
        padding: 7px;
        border-radius: 10px;
        border: 1px solid rgba(57, 57, 57, 0.20);
        box-shadow: 0px 0px 3px 0px rgba(57, 57, 57, 0.25);
    }

    .top-filter-dash .body {
        display: flex;
        justify-content: space-between;
        align-items: center
    }

    .top-filter-dash .body .search-org label {
        color: var(--bold-black-color, #262626);
        /* H5 Bold */

        font-size: .8rem;
        font-style: normal;
        font-weight: 700;
        line-height: 140%;
    }

    .top-filter-dash .body .search-org select {
        border-radius: 10px;
        border: 2px solid var(--Button-Color, #55C595);
        background: #FFF;
        font-size: 12px;
        box-shadow: 0px 0px 4px 0px rgba(234, 168, 19, 0.30);
        width: 150px;
    }

    .card-itemhj {
        border: none;
    }

    .card-itemhj .search-text {
        color: var(--Body-text-color, #303030);
        /* H5 */
        font-family: 'Poppins';
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 140%;
    }


    .card-itemhj select {
        border-radius: 10px;
        border: 1px solid var(--Primary-Color, #215273);
        background: #FDFDFD;
        box-shadow: 0px 0px 40px 0px rgba(33, 82, 115, 0.25);
        font-size: .8rem
    }

    .card-itemhj .raffle-card {
        border-radius: 10px;
        background: #FFF;
        box-shadow: 0px 0px 40px 0px rgba(33, 82, 115, 0.25);
    }

    @media screen and (max-width: 420px) {
        .top-filter-dash .body {
            display: block;

        }

        .top-filter-dash .body .search {
            margin: 12px;
        }

        .top-filter-dash .body .search-org select {
            width: 70%;
        }
    }

    /* @media screen and (max-width: 600px){
            .row.mk{
                justify-content:
            }
        } */
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
            <li><span>Live Raffle</span></li>
        </div>
        <div class="flex  ">
            <div class="vl mt-2 mr-2"></div>
            <p class="custom-textext">Join Live Raffles</p>
        </div>
    </div>
</div>

<div class="container md:px-4">
    <h3 class="top-head">Join Live <span>Raffle</span></h3>
    <div class="top-filter-dash">
        <div class="head">
            <h6 class="serch-text">Search Raffle</h6>
            <h6 class="show-more flex align-items-center"><span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 40 40" fill="none">
                        <path d="M15.6584 33.114L15.3422 32.1654H15.3422L15.6584 33.114ZM24.6584 30.1141L24.9747 31.0627L24.9747 31.0627L24.6584 30.1141ZM33.0408 11.9596L32.3337 11.2525L33.0408 11.9596ZM25.2932 19.7072L24.5861 19.0001L25.2932 19.7072ZM14.7074 19.7072L15.4145 19.0001L14.7074 19.7072ZM6.95989 11.9596L6.25278 12.6667L6.95989 11.9596ZM7.66699 7.66675H32.3337V5.66675H7.66699V7.66675ZM7.66699 11.2525V7.66675H5.66699V11.2525H7.66699ZM15.4145 19.0001L7.66699 11.2525L6.25278 12.6667L14.0003 20.4143L15.4145 19.0001ZM14.0003 20.4143V32.6397H16.0003V20.4143H14.0003ZM14.0003 32.6397C14.0003 33.6635 15.0034 34.3865 15.9747 34.0627L15.3422 32.1654C15.666 32.0574 16.0003 32.2984 16.0003 32.6397H14.0003ZM15.9747 34.0627L24.9747 31.0627L24.3422 29.1654L15.3422 32.1654L15.9747 34.0627ZM24.9747 31.0627C25.5872 30.8586 26.0003 30.2854 26.0003 29.6397H24.0003C24.0003 29.4245 24.138 29.2334 24.3422 29.1654L24.9747 31.0627ZM26.0003 29.6397V20.4143H24.0003V29.6397H26.0003ZM32.3337 11.2525L24.5861 19.0001L26.0003 20.4143L33.7479 12.6667L32.3337 11.2525ZM32.3337 7.66675V11.2525H34.3337V7.66675H32.3337ZM33.7479 12.6667C34.1229 12.2917 34.3337 11.783 34.3337 11.2525H32.3337L33.7479 12.6667ZM26.0003 20.4143L24.5861 19.0001C24.211 19.3752 24.0003 19.8839 24.0003 20.4143H26.0003ZM14.0003 20.4143H16.0003C16.0003 19.8839 15.7896 19.3751 15.4145 19.0001L14.0003 20.4143ZM5.66699 11.2525C5.66699 11.783 5.87771 12.2917 6.25278 12.6667L7.66699 11.2525H7.66699H5.66699ZM32.3337 7.66675H32.3337H34.3337C34.3337 6.56218 33.4382 5.66675 32.3337 5.66675V7.66675ZM7.66699 5.66675C6.56242 5.66675 5.66699 6.56218 5.66699 7.66675H7.66699V7.66675V5.66675Z" fill="#FDFDFD" />
                    </svg></span> Show more filters</h6>
        </div>
        <div class="body ">
            <div class="search">
                <label for="">Keyword</label>
                <input type="searcch">
            </div>
            {{-- <div class="search-org">
                <label for="">Organization</label>
                <select name="" id="">
                    <option value="">Charity</option>
                </select>
            </div> --}}
        </div>
    </div>

    <div class="card-itemhj my-3 md:p-3 ">
        <div class="flex justify-between align-items-center">
            <h5 class="search-text">Showing 1-9 of 55 raffles</h5>
            <h6>
                <select name="" id="">
                    <option value="">Sort by popularity</option>
                    <option value="">Sort by picket price</option>
                </select>
            </h6>
        </div>
        <div class="md:p-4 xl:p-4 sm:p-2 w-100 raffle-group">
            <div class="row w-100 justify-evenly g-3">
                @php

                @endphp
                @foreach ($data as $item )
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
                                <h6>Total Pot <span class="block text-right" style="text-align: right">${{number_format($item->total_amount, 2, '.', ',')}} </span>
                                </h6>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach

                {{ $data->links('vendor.pagination.bootstrap-5') }}

                {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="raffle-card">
                        <div class="img">
                            <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                        </div>
                        <div class="d">
                            <h3 class="head">Save Children Charities Inc.</h3>
                            <h6>2023 Lifesaving Fundraiser</h6>
                            <h6 class="small">@children</h6>
                            <div class="flex align-items-center">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18 26" fill="none">
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z" fill="#215273" />
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="raffle-card">
                        <div class="img">
                            <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                        </div>
                        <div class="d">
                            <h3 class="head">Save Children Charities Inc.</h3>
                            <h6>2023 Lifesaving Fundraiser</h6>
                            <h6 class="small">@children</h6>
                            <div class="flex align-items-center">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18 26" fill="none">
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z" fill="#215273" />
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="raffle-card">
                        <div class="img">
                            <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                        </div>
                        <div class="d">
                            <h3 class="head">Save Children Charities Inc.</h3>
                            <h6>2023 Lifesaving Fundraiser</h6>
                            <h6 class="small">@children</h6>
                            <div class="flex align-items-center">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18 26" fill="none">
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z" fill="#215273" />
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="raffle-card">
                        <div class="img">
                            <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                        </div>
                        <div class="d">
                            <h3 class="head">Save Children Charities Inc.</h3>
                            <h6>2023 Lifesaving Fundraiser</h6>
                            <h6 class="small">@children</h6>
                            <div class="flex align-items-center">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18 26" fill="none">
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z" fill="#215273" />
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="raffle-card">
                        <div class="img">
                            <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                        </div>
                        <div class="d">
                            <h3 class="head">Save Children Charities Inc.</h3>
                            <h6>2023 Lifesaving Fundraiser</h6>
                            <h6 class="small">@children</h6>
                            <div class="flex align-items-center">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18 26" fill="none">
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z" fill="#215273" />
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="raffle-card">
                        <div class="img">
                            <img src="{{ asset('img/icon/raffle-card-img.jpeg') }}" alt="">
                        </div>
                        <div class="d">
                            <h3 class="head">Save Children Charities Inc.</h3>
                            <h6>2023 Lifesaving Fundraiser</h6>
                            <h6 class="small">@children</h6>
                            <div class="flex align-items-center">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18 26" fill="none">
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z" fill="#215273" />
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="raffle-card">
                        <div class="img">
                            <img src="{{ asset('img/icon/bag.png') }}" alt="">
                        </div>
                        <div class="d">
                            <h3 class="head">Save Children Charities Inc.</h3>
                            <h6>2023 Lifesaving Fundraiser</h6>
                            <h6 class="small">@children</h6>
                            <div class="flex align-items-center">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18 26" fill="none">
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z" fill="#215273" />
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="raffle-card">
                        <div class="img">
                            <img src="{{ asset('img/icon/bag.png') }}" alt="">
                        </div>
                        <div class="d">
                            <h3 class="head">Save Children Charities Inc.</h3>
                            <h6>2023 Lifesaving Fundraiser</h6>
                            <h6 class="small">@children</h6>
                            <div class="flex align-items-center">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18 26" fill="none">
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path opacity="0.3" d="M3.1416 7.375L8.71238 12.375L14.2832 7.375V3H3.1416V7.375Z" fill="#215273" />
                                        <path d="M17.0685 0.5H0.356201V8L5.92698 13L0.370128 18.0125L0.356201 25.5H17.0685L17.0546 18.0125L11.4978 13L17.0685 8.0125V0.5ZM14.2831 18.625V23H3.14159V18.625L8.71237 13.625L14.2831 18.625ZM14.2831 7.375L8.71237 12.375L3.14159 7.375V3H14.2831V7.375Z" fill="#215273" />
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
                </div> --}}
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
            element.innerHTML = "Raffle Ended!";
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
