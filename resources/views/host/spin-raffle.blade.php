@extends('layouts.dashlayout')
@section('title', 'Dashboard')
@section('contentss')
    {{-- @vite(['resources/scss/raffle.scss']) --}}


<div class="admin-main-container  p-sm-2 p-md-3 ">

    <h2 class="title">Spin to choose <span>winner</span> </h2>
    <div id="spin-table">
        <div class="row ">
            <div class="col-12 col-md-9">
                <table id="custom-table" class="table table-hover table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th style="min-width: 100px;">Date</th>
                            <th style="min-width: 80px;">Time</th>
                            <th style="min-width: 100px;">Participants</th>
                            <th style="min-width: 60px;">Tickets Entry</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="{{asset("img/tb1.png")}}" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="{{asset("img/tb1.png")}}" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="{{asset("img/tb1.png")}}" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb1.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb1.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb2.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb1.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb1.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb2.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb1.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb1.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb2.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb1.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb1.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>
                        <tr  class="text-center align-middle">
                            <td class="d-flex justify-content-center ms-auto">
                                <div class="d-flex align-items-center text-center">
                                   <img src="./assets/img/tb2.png" style="border-radius: 50%; height:30px; width: 30px; margin-right: 6px" alt="">
                                   <span>21-01-2023</span>
                                </div>
                            </td>
                            <td>1hr ago</td>
                            <td>Ernest NDEERXW</td>
                            <td>$100</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-3">
                <div class="pin-head-text">
                    <h3>Spin to choose winner</h3>
                    <p>The winner's profile will appear here</p>
                </div>
                <div class="text-center">
                    <img src="{{asset("img/spin.png")}}" height="180px" width="180px" alt="">
                    <br>
                    <button class="btn btn-sm btn-success my-3 ">RAFFLE NOW</button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
