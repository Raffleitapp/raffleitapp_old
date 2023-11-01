@extends('layouts.admin.adminlayout')
@section('master-admin')
    <style>
        .host-detail .host-img {
            border-radius: 90px;
            background: url(<path-to-image>), lightgray 50% / cover no-repeat;
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

        .profile-detail h5 {
            color: var(--bold-black-color, #313030);
            /* Title 3 Bold */
            font-family: Poppins;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 100%;
        }

        .price {
            margin: 12px 0px
        }

        .price .amount,
        .price .numbe {
            width: 120px;
            border-radius: 10px;
            border: 1px solid var(--Body-text-color, #303030);
            padding: 10px;
            color: #000;
            text-align: center;

            /* H5 Bold */
            font-family: Poppins;
            font-size: 13px;
            font-style: normal;
            font-weight: 700;
            line-height: 140%;
            margin: 0px 10px
        }

        .imgh{
            margin: 0px 20px;
            height: 120px;
            width: 120px;
            min-width: 120px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 12px;
            border-radius: 10px;
border: 1px solid var(--Primary-Color, #215273);
box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.25);
        }
    </style>

    @php
        $priceTicket = DB::table('ticket_price')
            ->where('raffle_id', $data->id)
            ->first();
        $organisation = DB::table('organisation')
            ->where('id', $data->organisation_id)
            ->select('organisation.*')
            ->first();

            $fundraising = DB::table('fundraising_check')
            ->where('fundraising_check.id', $data->fundraising_id)
            ->leftJoin('countries','fundraising_check.country', 'countries.id')
            ->join('states','fundraising_check.state', 'states.id')
            ->join('cities','fundraising_check.city', 'cities.id')
            ->select('fundraising_check.*','countries.name as country_name','states.name as state_name','cities.name as city_name')
            ->first();

    @endphp
    <div class="container">

        <div class=" p-3" style="padding:60px 20px">

            @if ($data->approve_status == 2)
            <div class="flex mb-3">
                <button class="btn btn-success btn-sm p-2 mr-3">Accept</button>
                <button class="btn btn-danger btn-sm p-2 mx-5">Reject</button>
            </div>
            @endif

            <div class="host-detail flex align-items-center">
                <div class="host-img">
                    <img src="{{ asset('storage/images/' . $data->profile_pix) }}" alt="">
                </div>
                <div class="profile-detail">
                    <h4>{{ $data->first_name . ' ' . $data->last_name }}</h4>
                    <h5>{{ $data->username }}</h5>
                </div>
            </div>
            <div class="profile-detail mt-3">
                <h4>About User</h4>
                <h5>{{ $data->about }}</h5>
            </div>
            <div class="profile-detail flex mt-3">
                <h4>Email : </h4>
                <h5>{{ $data->email }}</h5>
            </div>
            <div class="profile-detail my-3">
                <h4>Billing Address</h4>
                <h5>{{ $data->about }}</h5>
            </div>
            <div class="profile-detail my-3">
                <h4 style="font-size: 20px">About Raffle</h4>
                {{-- <h5>{{$data->about}}</h5> --}}
            </div>
            <div class="profile-detail my-3">
                <h4>Reason for Raffle</h4>
                <h5>{{ $data->host_name }}</h5>
            </div>
            <div class="profile-detail mb-3">
                <h4>Raffle Description</h4>
                <h5>{{ $data->description }}</h5>
            </div>
            <div class="flex">
                <div class="mr-3">
                    <div class="profile-detail my-2">
                        <h4>Starting Date and Time</h4>
                        <h5>{{ $data->starting_date }}</h5>
                    </div>

                </div>
                <div class="mx-3">
                    <div class="profile-detail my-2">
                        <h4>Ending Date and Time</h4>
                        <h5>{{ $data->ending_date }}</h5>
                    </div>
                </div>
            </div>
            <div class="profile-detail my-2">
                <h4>Raffle Ticket Prices</h4>

            </div>
            <div class="flex price align-items-center mb-3">
                <h6 class="amount">${{ $priceTicket->three }}</h6>
                <h6 class="for">For</h6>
                <h6 class="numbe">1 Tickets</h6>
            </div>
            <div class="flex price align-items-center mb-3">
                <h6 class="amount">${{ $priceTicket->three }}</h6>
                <h6 class="for">For</h6>
                <h6 class="numbe">3 Tickets</h6>
            </div>
            <div class="flex price align-items-center mb-3">
                <h6 class="amount">${{ $priceTicket->ten }}</h6>
                <h6 class="for">For</h6>
                <h6 class="numbe">5 Tickets</h6>
            </div>
            <div class="flex price align-items-center mb-3">
                <h6 class="amount">${{ $priceTicket->twenty }}</h6>
                <h6 class="for">For</h6>
                <h6 class="numbe">10 Tickets</h6>
            </div>
            <div class="flex price align-items-center mb-3">
                <h6 class="amount">${{ $priceTicket->one_twenty }}</h6>
                <h6 class="for">For</h6>
                <h6 class="numbe">15 Tickets</h6>
            </div>
            <div class="flex price align-items-center mb-3">
                <h6 class="amount">${{ $priceTicket->two_hundred }}</h6>
                <h6 class="for">For</h6>
                <h6 class="numbe">20 Tickets</h6>
            </div>

            <div class="profile-detail my-3">
                <h4>Item Images</h4>
                <div class="img-con flex overflow-auto">
                    <div class="imgh" style="background-image:url('{{asset('storage/images/' . $data->profile_pix)}}')">

                    </div>
                    <div class="imgh" style="background-image:url('{{asset('storage/images/' . $data->profile_pix)}}')">

                    </div>
                    <div class="imgh" style="background-image:url('{{asset('storage/images/' . $data->profile_pix)}}')">

                    </div>
                    <div class="imgh" style="background-image:url('{{asset('storage/images/' . $data->profile_pix)}}')">

                    </div>
                </div>
            </div>

            <div class="tab-container my-3">
                <ul class="tabs">
                    <li class="tab-item active">Organisation </li>
                    <li class="tab-item">Fundraising </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="card p-3">
                            <div class="host-detail flex align-items-center">
                                <div class="host-img">
                                    <img src="{{ asset('storage/images/' . $organisation->cover_image) }}" alt="">
                                </div>
                                <div class="profile-detail">
                                    <h4>{{ $organisation->organisation_name }}</h4>
                                    {{-- <h5>{{ $organisation->category_name }}</h5> --}}
                                </div>
                            </div>

                            <div class="flex profile-detail my-3">

                                <h4>Organisation Handle</h4>
                                <h5>{{ $organisation->handle }}</h5>

                            </div>
                            <div class="flex profile-detail my-3">

                                <h4>Organisation website</h4>
                                <h5>{{ $organisation->website }}</h5>

                            </div>
                            <div class="flex profile-detail my-3">

                                <h4>Description</h4>
                                <h5>{{ $organisation->description }}</h5>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane">
                        <div class="card p-3">

                            <div class="flex profile-detail my-3">

                                <h4>Name : </h4>
                                <h5>{{ $fundraising->name }}</h5>

                            </div>
                            <div class="flex profile-detail my-3">

                                <h4>C/O : </h4>
                                <h5>{{ $fundraising->c_o }}</h5>

                            </div>
                            <div class="flex profile-detail my-3">

                                <h4>Address : </h4>
                                <h5>{{ $fundraising->address}}</h5>

                            </div>
                            <div class="flex profile-detail my-3">

                                <h4>City : </h4>
                                <h5>{{ $fundraising->city_name}}</h5>

                            </div>
                            <div class="flex profile-detail my-3">

                                <h4>State : </h4>
                                <h5>{{ $fundraising->state_name}}</h5>

                            </div>
                            <div class="flex profile-detail my-3">

                                <h4>Country : </h4>
                                <h5>{{ $fundraising->country_name}}</h5>

                            </div>
                        </div>
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
