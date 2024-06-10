<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="{{ asset('frontend/assets/fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/assets/fonts/elegant-fonts.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/zabuto_calendar.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.nouislider.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" type="text/css">

    <title>EcoSansar</title>


</head>

<body class="nav-btn-only homepage">

<div class="page-wrapper">
    <header id="page-header" class="pheader">
        <nav style="height: 93px;">
           <div class="col-md-2"></div>

            <div class="left">
                <a href="/" class="brand"><img src="{{ asset('frontend/assets/img/logo-one.png') }}" alt="" height="50"></a>
            </div>
            <!--end left-->
            <div class="right">
                <div class="primary-nav has-mega-menu">
                    <ul class="navigation">
                        <li ><a href="#nav-homepages">Home</a>
                        </li>
                        <li class=" "><a href="#nav-listing">About</a>
                        </li>
                        <li class=" "><a href="{{ route('listings') }}">Listings</a>
                        </li>
                        <li class=" "><a href="#nav-pages">FAQ</a>
                        </li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <!--end navigation-->
                </div>
                <!--end primary-nav-->

                <div class="secondary-nav">
                    @php
                    $user_id = session('user_id');
                    if(null !== $user_id && $user_id != ''){
                        echo "<span style='background-color: #6ab04c;'>".session('user')."</span>";
                    } else {
                    @endphp
                        <a href="{{ route('business_login') }}" class="promoted" >Sign In</a>
                        <a href="{{ route('user_register') }}" class="promoted" >Register</a>
                    @php
                    }
                    @endphp

                    @php
                 $user_id = session()->get('user_id');
                if(isset($user_id) && !empty($user_id)) {
            @endphp
            <a class="  " href="{{ route('user_logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">  {{ __('Logout') }} </a>
            <form id="logout-form" action="{{ route('user_logout') }}"   class="d-none">
                @csrf
            </form>
            @php
                }
            @endphp
                </div>








                <!--end secondary-nav-->
                <a href="#" class="btn btn-primary btn-small btn-rounded icon shadow add-listing"    ><i class="fa fa-plus"></i><span>Add listing</span></a>
                <div class="nav-btn">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>
                <!--end nav-btn-->

        </div>
        <div class="col-md-2"></div>
            <!--end right-->
        </nav>
        <!--end nav-->
    </header>
    <!--end page-header-->
