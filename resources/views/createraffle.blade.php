@extends('layouts.reguser')
@section('title', 'login')
@section('content')

<style>
    .raft {
        color: #215273;
        padding: 1rem;
    }

    .raft li {
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        margin-left: 0.5rem;
    }

    .raft i {
        background: #215273;
        margin-left: 0.5rem;
        border-radius: 50%;
        color: #FDFDFD !important;
    }
</style>

<div class="regform p-3">
    <div class="text-center">
        <h5 class="fw-bold h3" style="color: #55C595;">Create your first raffle</h5>
    </div>
    <div class="card p-3 shadow">
        <div class="form">
            <div class="form-group">
                <label for="hostname">Host name</label>
                <input type="text" required id="hostname" class="form-control" placeholder="Host name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" required id="description" class="form-control" cols="3" rows="5" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <label for="address">Picture</label>
            </div>
            <div class="form-group">
                <label for="startdate">Raffle Start Date</label>
                <input type="date" required id="startdate" class="form-control" placeholder="Raffle startdate">
            </div>
            <div class="form-group">
                <label for="enddate">Raffle End Date</label>
                <input type="date" required id="enddate" class="form-control" placeholder="Raffle enddate">
            </div>
            <div class="container" style="padding:0;">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="date">Start time</label>
                        <input type="time" class="form-control" name="start" id="" placeholder="3:14">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="date">End time</label>
                        <input type="time" class="form-control" name="start" id="" placeholder="3:14">
                    </div>
                </div>
            </div>
            <div class="row">
        
            </div>
            <h6 class="fw-normal text-muted">The above preset value will be applied and can't be changed.</h6>
            <div class="form-group">
                <label for="state">State Raffle is hosted in</label>
                <input type="text" required id="state" class="form-control" placeholder="state">
            </div>
            <h6 class="fw-normal text-muted">By proceeding you agree with this terms</h6>
            <ul class="raft list-group list-group-horizontal-sm">
                <a href="raffles.php">
                    <li class="list-item m-1" style="background: #55C595; color: white;">Raffle Now<i class='bx bx-chevron-right'></i></li>
                </a>
                <a href="users/addraffle.php">
                    <li class="list-item m-1" style="border: #55C595 1px solid; color: #161616;">Preview Raffle<i class='bx bx-chevron-right'></i></li>
                </a>
            </ul>
            <!-- <button class="btn">Proceed</button> -->
        </div>
    </div>
</div>
@endsection