@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-md-offest-2" onclick="redirectUserLogin()">
            <img style="width: 100%;text-align:center" src="{{ asset('public/admin_asset/img/login_error.webp') }}">
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<script>
    function redirectUserLogin() {
        location.href = '{{url('user/login')}}';
    }
</script>
@endsection