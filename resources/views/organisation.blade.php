@extends('layouts.reguser')
@section('title', 'login')
@section('content')
<div class="regform p-3">
    <div class="text-center">
        <h5 class="fw-bold h3">Tell Us about your organisation</h5>
    </div>
    <div class="card p-3 shadow">
        <div class="form">
            <div class="form-group">
                <label for="exampleInputEmail1">Select Raffle type</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Education</option>
                    <option>Charity</option>
                    <option>Fundraisers</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Education</option>
                    <option>Charity</option>
                    <option>Fundraisers</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input type="text" required id="nickname" class="form-control" placeholder="Nickname">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="handle">Handle</label>
                    <input type="text" required id="handle" class="form-control" placeholder="@example">
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" required id="website" class="form-control" placeholder="Optional">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" required id="" class="form-control" cols="5" rows="5" placeholder="Write something..."></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label fw-bold" for="defaultCheck1">
                        I have read and agreed to the Terms & Conditions
                    </label>
                </div>
                <button class="btn">Proceed</button>
            </div>
        </div>
    </div>
    @endsection