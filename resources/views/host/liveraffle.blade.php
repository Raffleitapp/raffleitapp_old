@extends('layouts.dashlayout')
@section('title', 'Dashboard | Host')
@section('contentss')
    <link href="{{ asset('css/host.css') }}" rel="stylesheet">

    @php
        $currentUser = DB::table('users')->where('id', session()->get('user_id'))->first();
    @endphp
    <div class="container">
            <div class="rafle">
                <h5 class="head">Raffles Hosted (live raffles)</h5>
                @php
                       $raffle = DB::table('raffle')
                        ->where('approve_status', 1)->where('raffle.user_id',session()->get('user_id'))
                        ->leftJoin('organisation', 'raffle.organisation_id', 'organisation.id')
                        ->select('raffle.*', 'organisation.organisation_name', 'organisation.cover_image', 'organisation.handle', 'organisation.website')
                        ->get();

                @endphp
                <div class="raffle-group">
                    @if (count($raffle) > 0)
                    @foreach ($raffle as $item)
                    <div class=" raffle-cardz" onclick="location.href='{{ url('host/raffle-detail/' . $item->state_raffle_hosted) }}'">
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
                                <h6>Total Pot <span class="block text-right" style="text-align: right">$100</span>
                                </h6>
                            </div>
                        </div>

                    </div>

                @endforeach
                    @else
                    <p class="text-center">No live raffle yet</p>
                    @endif


                </div>
            </div>




        </div>
    </div>
@endsection
