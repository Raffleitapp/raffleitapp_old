@extends('layouts.admin.adminlayout')
@section('master-admin')
    <style>
        h2.head {
            color: #000;

            /* H3 Bold */

            font-size: 1.5rem;
            font-style: normal;
            font-weight: 700;
            line-height: 90%;
        }

        p.head-desc {
            color: #000;

            /* Title 1 */

            font-size: .8rem;
            font-style: normal;
            font-weight: 400;
            line-height: 90%;
        }

        table thead {
            background: var(--primary-color);
            color: var(--white-color);
            padding: 8px 0px;

        }

        table thead tr {
            padding: 8px 0px;
            color: var(--white-color, #FDFDFD);
            /* Title 3 Bold */

            font-size: 14px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
        }

        table tbody tr td{
            font-size: 12px;
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
    </style>
    <div class="container-fluid">
        <div class="p-3">
            <h2 class="head">Raffle</h2>
            <p class="head-desc">Manage all raffle here</p>

        </div>
        @php
$raffleActiveCount = DB::table('raffle')->where('approve_status', 1)->get();
$rafflePendingCount = DB::table('raffle')->where('approve_status', 2)->get();
$raffleCompletedCount = DB::table('raffle')->where('approve_status', 3)->get();
$raffleCancelCount = DB::table('raffle')->where('approve_status', 4)->get();


        @endphp


        <div class="tab-container">
            <ul class="tabs">
                <li class="tab-item active">Active ({{count($raffleActiveCount)}})</li>
                <li class="tab-item">Pending ({{count($rafflePendingCount)}})</li>
                <li class="tab-item">Completed ({{count($raffleCompletedCount)}})</li>
                <li class="tab-item">Cancelled ({{count($raffleCancelCount)}})</li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr class="text-center">
                                    <th>S/No</th>
                                    <th style="min-width: 150px">Host Name</th>
                                    <th style="min-width: 100px">Reasons</th>
                                    <th>Organisation</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $activeData = DB::table('raffle')->where('approve_status', 1)->leftJoin('organisation', 'raffle.organisation_id', 'organisation.id')
                                    ->join('users', 'raffle.user_id', 'users.id')->select('raffle.*', 'organisation.organisation_name', 'users.first_name', 'users.last_name')->get();
                                @endphp
                                @foreach ($activeData as $index => $item)
                                <tr class="text-center">
                                    <td>{{$index + 1}}</td>
                                    <td>{{$item->first_name. ' '. $item->last_name}}</td>
                                    <td>{{$item->host_name}}</td>
                                    <td>{{$item->organisation_name}}</td>
                                    <td>{{($item->starting_date)}}</td>
                                    <td>{{$item->ending_date}}</td>
                                    <td style="color: green">{{$item->approve_status == 1 ? "Approved" : ''}}</td>
                                    <td class="">
                                        <div class="flex justify-center">
                                            <span onclick="location.href='{{url('admin/viewraffle/'.$item->id)}}'" class="mx-2 text-success text-xl"><i class="bi bi-eye-fill"
                                                style="font-size:1rem"></i></span>

                                        {{-- <span class="mx-2 text-danger text-xl"><i class="bi bi-trash-fill"
                                                style="font-size:1rem"></i></span> --}}
                                        </div>


                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
                <div class="tab-pane">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr class="text-center">
                                    <th>S/No</th>
                                    <th style="min-width: 150px">Host Name</th>
                                    <th style="min-width: 100px">Reasons</th>
                                    <th>Organisation</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $activeDataa = DB::table('raffle')->where('approve_status', 2)->leftJoin('organisation', 'raffle.organisation_id', 'organisation.id')
                                    ->join('users', 'raffle.user_id', 'users.id')->select('raffle.*', 'organisation.organisation_name', 'users.first_name', 'users.last_name')->get();
                                @endphp
                                @foreach ($activeDataa as $index => $item)
                                <tr class="text-center">
                                    <td>{{$index + 1}}</td>
                                    <td>{{$item->first_name. ' '. $item->last_name}}</td>
                                    <td>{{$item->host_name}}</td>
                                    <td>{{$item->organisation_name}}</td>
                                    <td>{{($item->starting_date)}}</td>
                                    <td>{{$item->ending_date}}</td>
                                    <td style="color: rgb(144, 1, 116)">{{$item->approve_status == 2 ? "Pending" : ''}}</td>
                                    <td class="flex justify-center">

                                        <span onclick="location.href='{{url('admin/viewraffle/'.$item->id)}}'" class="mx-2 text-success text-xl"><i class="bi bi-eye-fill"
                                                style="font-size:1rem"></i></span>

                                        {{-- <span class="mx-2 text-danger text-xl"><i class="bi bi-trash-fill"
                                                style="font-size:1rem"></i></span> --}}

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
                <div class="tab-pane">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr class="text-center">
                                    <th>S/No</th>
                                    <th style="min-width: 150px">Host Name</th>
                                    <th style="min-width: 100px">Reasons</th>
                                    <th>Organisation</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $activeDataaa = DB::table('raffle')->where('approve_status', 3)->leftJoin('organisation', 'raffle.organisation_id', 'organisation.id')
                                    ->join('users', 'raffle.user_id', 'users.id')->select('raffle.*', 'organisation.organisation_name', 'users.first_name', 'users.last_name')->get();
                                @endphp
                                @foreach ($activeDataaa as $index => $item)
                                <tr class="text-center">
                                    <td>{{$index + 1}}</td>
                                    <td>{{$item->first_name. ' '. $item->last_name}}</td>
                                    <td>{{$item->host_name}}</td>
                                    <td>{{$item->organisation_name}}</td>
                                    <td>{{($item->starting_date)}}</td>
                                    <td>{{$item->ending_date}}</td>
                                    <td style="color: rgb(0, 2, 136)">{{$item->approve_status == 3 ? "Completed" : ''}}</td>
                                    <td class="flex justify-center">

                                        <span onclick="location.href='{{url('admin/viewraffle/'.$item->id)}}'" class="mx-2 text-success text-xl"><i class="bi bi-eye-fill"
                                                style="font-size:1rem"></i></span>

                                        {{-- <span class="mx-2 text-danger text-xl"><i class="bi bi-trash-fill"
                                                style="font-size:1rem"></i></span> --}}

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
                <div class="tab-pane">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr class="text-center">
                                    <th>S/No</th>
                                    <th style="min-width: 150px">Host Name</th>
                                    <th style="min-width: 100px">Reasons</th>
                                    <th>Organisation</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $activeDataaa = DB::table('raffle')->where('approve_status', 4)->leftJoin('organisation', 'raffle.organisation_id', 'organisation.id')
                                    ->join('users', 'raffle.user_id', 'users.id')->select('raffle.*', 'organisation.organisation_name', 'users.first_name', 'users.last_name')->get();
                                @endphp
                                @foreach ($activeDataaa as $index => $item)
                                <tr class="text-center">
                                    <td>{{$index + 1}}</td>
                                    <td>{{$item->first_name. ' '. $item->last_name}}</td>
                                    <td>{{$item->host_name}}</td>
                                    <td>{{$item->organisation_name}}</td>
                                    <td>{{($item->starting_date)}}</td>
                                    <td>{{$item->ending_date}}</td>
                                    <td style="color: rgb(144, 1, 1)">{{$item->approve_status == 2 ? "Rejected" : ''}}</td>
                                    <td class="flex justify-center">

                                        <span onclick="location.href='{{url('admin/viewraffle/'.$item->id)}}'" class="mx-2 text-success text-xl"><i class="bi bi-eye-fill"
                                                style="font-size:1rem"></i></span>

                                        {{-- <span class="mx-2 text-danger text-xl"><i class="bi bi-trash-fill"
                                                style="font-size:1rem"></i></span> --}}

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>










    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $("#support-item").hide();
        $("#completed-item").hide();
        $("#cancelled-item").hide();


        $(document).ready(function() {
            $("span#support-btn").click(() => {
                $("span#host-btn").removeClass("active");
                $("#host-item").hide();
                $("#completed-item").hide();
                $("#cancelled-item").hide();
                $("#support-item").show();

                $("span#support-btn").addClass("active");

            });

            $("span#host-btn").click(() => {
                $("span#support-btn").removeClass("active");
                $("span#host-btn").addClass("active");
                $("#host-item").show();
                $("#support-item").hide();
                $("#completed-item").hide();
                $("#cancelled-item").hide();

            });
        });

        $(document).ready(function() {
            // Add click event handlers to the tab items
            $('.tab-item').click(function() {
                // Remove the 'active' class from all tab items and content panes
                $('.tab-item').removeClass('active');
                $('.tab-pane').removeClass('active');

                // Add the 'active' class to the clicked tab item
                $(this).addClass('active');

                // Show the corresponding content pane
                const tabIndex = $(this).index();
                $('.tab-pane').eq(tabIndex).addClass('active');
            });

            // Set the first tab as active by default
            $('.tab-item:first').click();
        });
    </script>
@endsection
