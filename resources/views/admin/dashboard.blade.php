@extends('layouts.admin.adminlayout')
@section('master-admin')
<style>
    .admin-dashboard .card{
        border-radius: 20px;
    }
    .admin-dashboard .row .card{
        border-radius: 10px;
    }
    .card-test h2{
        color: var(--Heading-Text-color, #161616);
/* H5 Bold */

font-size: 16px;
font-style: normal;
font-weight: 700;
line-height: 140%;
    }
</style>
<div class="admin-dashboard">
    @php
        $liveRaffle = DB::table('raffle')->where('approve_status', 1)->get();
        $completeRaffle = DB::table('raffle')->where('approve_status', 3)->get();
        $pendingRaffle = DB::table('raffle')->where('approve_status', 2)->get();
        $cancelRaffle = DB::table('raffle')->where('approve_status', 4)->get();


    @endphp
          <div class="row">
            <div class="col-md-4  my-3">
                <div class="card mx-2 " style="border-top: 40px solid rgb(25, 25, 255)">
                    <div class="d-flex justify-between px-2 py-2">
                        <div class="card-test">
                            <h2>Live Raffle</h2>
                            <p class="text-center text-xl font-medium">{{count($liveRaffle)}}</p>
                        </div>
                        <p><span style="font-size: 26px; color:rgb(25, 25, 255)"><i class="bi bi-truck"></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4  my-3">
                <div class="card mx-2">
                    <div class="d-flex justify-between px-2 py-2" style="border-top: 40px solid rgb(18,153,0)">
                        <div class="card-test">
                            <h2>Completed Raffle</h2>
                            <p class="text-center text-xl font-medium">{{count($completeRaffle)}}</p>
                        </div>
                        <p><span style="font-size: 26px; color:rgb(18, 153, 0);"><i class="bi bi-ui-checks"></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4  my-3">
                <div class="card mx-2">
                    <div class="d-flex justify-between px-2 py-2" style="border-top: 40px solid rgb(255, 180, 109)">
                        <div class="card-test">
                            <h2>Pending Approve Raffle</h2>
                            <p class="text-center text-xl font-medium">{{count($pendingRaffle)}}</p>
                        </div>
                        <p><span style="font-size: 26px; color:rgb(255, 180, 109);"><i class="bi bi-hourglass"></i></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4  my-3">
                <div class="card mx-2 " style="border-top: 40px solid rgb(255, 0, 0)">
                    <div class="d-flex justify-between px-2 py-2">
                        <div class="card-test">
                            <h2>Cancelled Raffle</h2>
                            <p class="text-center text-xl font-medium">{{count($cancelRaffle)}}</p>
                        </div>
                        <p><span style="font-size: 26px; color:rgb(255, 0, 0)"><i class="bi bi-door-closed-fill"></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4  my-3">
                <div class="card mx-2">
                    <div class="d-flex justify-between px-2 py-2" style="border-top: 40px solid rgb(81, 83, 81)">
                        <div class="card-test">
                            <h2>Total Users</h2>
                            <p class="text-center text-xl font-medium">0</p>
                        </div>
                        <p><span style="font-size: 26px; color:rgb(81,83,81);"><i class="bi bi-person-check-fill"></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4  my-3">
                <div class="card mx-2">
                    <div class="d-flex justify-between px-2 py-2" style="border-top: 40px solid rgb(211, 7, 201)">
                        <div class="card-test">
                            <h2>Total Host</h2>
                            <p class="text-center text-xl font-medium">0</p>
                        </div>
                        <p><span style="font-size: 26px; color:rgb(211,7,201);"><i class="bi bi-house-check-fill"></i></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>


    <div class="card p-3">
        <div class="card-head">
            <h2>Recent purchase ticket</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive my-3">
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th>S/No</th>
                            <th style="min-width: 150px">Category</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>



                        <tr class="text-center">

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
