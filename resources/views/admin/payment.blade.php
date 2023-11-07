@extends('layouts.admin.adminlayout')
@section('master-admin')
<style>
    h2.head {
        color: #000;

        /* H3 Bold */
        font-family: Poppins;
        font-size: 1.5rem;
        font-style: normal;
        font-weight: 700;
        line-height: 90%;
    }

    p.head-desc {
        color: #000;

        /* Title 1 */
        font-family: Poppins;
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
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 140%;
    }

    .profile-image{
        height: 50px;
        width: 50px;
        border-radius: 50%;
        object-fit: cover;
        object-position: center;
    }
</style>
<div class="p-3">
    <h2 class="head">Payment Settings</h2>
    <p class="head-desc">Manage payment settings</p>

</div>
@php
    $data = DB::table('payment_settings')->where('id', 1)->first();
@endphp
<div class="card p-3 mx-auto" style="max-width: 600px">
    @if (session()->has('success'))
    <div class="alert alert-success text-center" role="alert">
        {{session()->get('success')}}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger text-center" role="alert">
        {{session()->get('error')}}
    </div>
    @endif
    <form class="p-3" method="POST" action="{{route('admin.update-payment')}}">
        @csrf
        <div class="form-group mb-3">
            <label for="">Secret</label>
            <input type="text" required name="p_secret" value="{{$data->code_access}}" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Key</label>
            <input type="text" required name="p_key" value="{{$data->payment_name}}" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm">Update</button>
        </div>
    </form>
</div>
@endsection
