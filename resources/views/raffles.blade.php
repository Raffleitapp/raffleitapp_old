@extends('layouts.dashlayout')
@section('title', 'Raffles')
@section('content')

<style>
    label {
        font-weight: bold;
    }
    .card .raft{
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="regform p-3 col-md-8">
    <h5 class="fw-bold h5">Raffles</h5>
    <div class="">
        <div class="card shadow p-2">
            <div class="first-section">
                <div class="row raft">
                    <div class="col-md-4">
                        <img src="{{ asset('img/about-bg.png') }}" alt="">
                    </div>
                    <div class="col-md-5">
                        <h5 class="h5">Education</h5>
                        <h5 class="h6">Educating children</h5>
                        <h6 class="text-muted fw-normal">@leon</h6>
                        <h6>Freeeducation.com</h6>
                        <div class="d-flex hj">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 26" fill="none">
                                    <path opacity="0.3" d="M3.14355 7.375L8.71433 12.375L14.2851 7.375V3H3.14355V7.375Z" fill="#215273" />
                                    <path opacity="0.3" d="M3.14355 7.375L8.71433 12.375L14.2851 7.375V3H3.14355V7.375Z" fill="#215273" />
                                    <path d="M17.0707 0.5H0.358398V8L5.92917 13L0.372326 18.0125L0.358398 25.5H17.0707L17.0568 18.0125L11.5 13L17.0707 8.0125V0.5ZM14.2853 18.625V23H3.14379V18.625L8.71456 13.625L14.2853 18.625ZM14.2853 7.375L8.71456 12.375L3.14379 7.375V3H14.2853V7.375Z" fill="#215273" />
                                </svg></span> <span>1h 30m</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 32 32" fill="none">
                                    <circle cx="16.002" cy="16" r="16" fill="#215273" />
                                    <path d="M20.502 8C18.762 8 17.092 8.88283 16.002 10.2779C14.912 8.88283 13.242 8 11.502 8C8.42195 8 6.00195 10.6376 6.00195 13.9946C6.00195 18.1144 9.40195 21.4714 14.552 26.5722L16.002 28L17.452 26.5613C22.602 21.4714 26.002 18.1144 26.002 13.9946C26.002 10.6376 23.582 8 20.502 8ZM16.102 24.9482L16.002 25.0572L15.902 24.9482C11.142 20.2507 8.00195 17.1444 8.00195 13.9946C8.00195 11.8147 9.50195 10.1798 11.502 10.1798C13.042 10.1798 14.542 11.2589 15.072 12.752H16.942C17.462 11.2589 18.962 10.1798 20.502 10.1798C22.502 10.1798 24.002 11.8147 24.002 13.9946C24.002 17.1444 20.862 20.2507 16.102 24.9482Z" fill="#55C595" />
                                </svg></span>
                        </div>
                        <div class="pot">
                            <span>Total Pot</span><br>
                            <span>$100</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection