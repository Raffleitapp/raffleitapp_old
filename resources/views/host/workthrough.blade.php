@extends('layouts/main')
@section('title', 'Create Raffle')
@section('content')
    {{-- @vite(['resources/scss/app.scss']) --}}
    <style>
        .top-bg {
            height: 20vh;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.63) 0%, rgba(0, 0, 0, 0.63) 100%),
            url("{{ asset('img/createwalk.png') }}"),
            lightgray 50% / cover no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
    </style>
    <div class="top-bg">
        <div class="top-section" style="padding-left: 2rem;">
            <div class="d-flex mb-2 align-items-center text-white fw-light">
                <ul class="list-inline">
                    <li class="list-inline-item d-flex align-items-center" onclick="location.href='{{ url('/') }}'">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                <path d="M23.7473 12.0343V6.65933C23.7473 5.97183 23.1848 5.40933 22.4973 5.40933H21.2473C20.5598 5.40933 19.9973 5.97183 19.9973 6.65933V8.65933L15.8348 4.90933C15.3598 4.48433 14.6348 4.48433 14.1598 4.90933L3.70981 14.3218C3.28481 14.6968 3.54731 15.4093 4.12231 15.4093H6.24731V24.1593C6.24731 24.8468 6.80981 25.4093 7.49731 25.4093H11.2473C11.9348 25.4093 12.4973 24.8468 12.4973 24.1593V17.9093H17.4973V24.1593C17.4973 24.8468 18.0598 25.4093 18.7473 25.4093H22.4973C23.1848 25.4093 23.7473 24.8468 23.7473 24.1593V15.4093H25.8723C26.4473 15.4093 26.7223 14.6968 26.2848 14.3218L23.7473 12.0343ZM12.4973 12.9093C12.4973 11.5343 13.6223 10.4093 14.9973 10.4093C16.3723 10.4093 17.4973 11.5343 17.4973 12.9093H12.4973Z" fill="#FDFDFD" />
                            </svg>
                        </span>
                        <span>Raffleit</span>
                    </li>
                    <li class="list-inline-item">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 25 25" fill="none">
                                <path d="M5.94263 6.99033C5.53638 7.39658 5.53638 8.05283 5.94263 8.45908L9.98429 12.5007L5.94263 16.5424C5.53638 16.9487 5.53638 17.6049 5.94263 18.0112C6.34888 18.4174 7.00513 18.4174 7.41138 18.0112L12.1926 13.2299C12.5989 12.8237 12.5989 12.1674 12.1926 11.7612L7.42179 6.99033C7.01554 6.58408 6.34888 6.58408 5.94263 6.99033Z" fill="#FDFDFD" />
                                <path d="M12.8072 6.99033C12.401 7.39658 12.401 8.05283 12.8072 8.45908L16.8489 12.5007L12.8072 16.5424C12.401 16.9487 12.401 17.6049 12.8072 18.0112C13.2135 18.4174 13.8697 18.4174 14.276 18.0112L19.0572 13.2299C19.4635 12.8237 19.4635 12.1674 19.0572 11.7612L14.276 6.97991C13.8801 6.58408 13.2135 6.58408 12.8072 6.99033Z" fill="#FDFDFD" />
                            </svg>
                        </span>
                    </li>
                    <li class="list-inline-item"><span>Raffle Creation Steps</span></li>
                </ul>
            </div>
            <div class="d-flex">
                <div class="vl mt-2 mr-2"></div>
                <p class="custom-textext">Follow Steps To Create Raffle</p>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="custom-card">
            <h3 class="head">Steps In Creating Your Raffle</h3>
            <div class="row justify-center g-3">
                <div class="col-md-4">
                    <div class="cardf">
                        <div class="count">
                            1
                        </div>
                        <div class="title">
                            <h3>Setup Your Organization</h3>
                            <p>Inform us about your organization. Setup information for your raffle Step 3 is where.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cardf">
                        <div class="counts">
                            2
                        </div>
                        <div class="title">
                            <h3>Setup Host Payout Info</h3>
                            <p>Please let us know to whom and where we should send your share of the money.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cardf">
                        <div class="count">
                            3
                        </div>
                        <div class="title">
                            <h3>Create Your First Raffle</h3>
                            <p>Describe the occasion for which you are raising funds to us, then set up your raffle.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4 mx-auto p-3 d-flex justify-content-center">
                <button onclick="location.href='{{ url('user/choose_organisation') }}'"
                    class="btn btn-primary">Proceed</button>
            </div>
        </div>
    </div>
@endsection
