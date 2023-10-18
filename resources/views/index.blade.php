@extends('layouts/master')
@section('title', 'Home')
@section('content')
<style>
    .top-bg {
        height: 65vh;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.63) 0%, rgba(0, 0, 0, 0.63) 100%),
        url("{{asset(" img/home-bg.jpeg")}}"),
        lightgray 50% / cover no-repeat;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
</style>
<div class="top-bg">
    <div class="top-section">

    </div>
</div>
<div class="">
    <h2>workibg</h2>
</div>
@endsection