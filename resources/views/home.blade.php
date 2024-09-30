@extends('layout')

@push('styles')
<style>
    .btn-link {
        text-decoration: none;
        color: #2e5555;
        box-shadow: none;
        padding: 10px 0px;
        border: 2px solid #2e5555;
    }

    .sign_up_btn,
    .login_btn {
        text-decoration: none;
        color: #2e5555;
        box-shadow: none;
        padding: 10px 10px;
        border: 2px solid #2e5555;
    }

    .sign_up_btn:hover,
    .login_btn:hover {
        text-decoration: none;
        color: #fff;
        background: #2e5555;
    }
</style>
@endpush

@section('content')

<header class="header-section" id="header-section">
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="#">
                    <img src="assets/image/black-logo.png" height="16" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
                </a>
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle Navigation">
                    <i class="fa fa-align-right"></i>
                </button>                
                @if(Auth::check())
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">                        
                        Welcome {{ Auth::user()->name }} !                        
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashborad</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
                @else 
                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- Add your links here -->
                    </ul>
                    <!-- Right links -->
                    <div class="d-flex align-items-center">
                        <a href="{{ route('login') }}" class="btn login_btn" data-mdb-ripple-init>Login</a>
                        <!-- <button data-mdb-ripple-init type="button" class="btn btn-link px-3">Login</button> -->
                        <!-- <button data-mdb-ripple-init type="button" class="btn btn-primary">Sign up for free</button> -->
                        <a href="{{ route('register') }}" class="btn sign_up_btn" data-mdb-ripple-init>Register for free</a>
                    </div>
                </div>
                @endif
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
        <!-- <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="https://startbootstrap.github.io/startbootstrap-coming-soon/assets/mp4/bg.mp4" type="video/mp4"></video> -->

        <section class="banner-design">
            <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="https://startbootstrap.github.io/startbootstrap-coming-soon/assets/mp4/bg.mp4" type="video/mp4">
            </video>
            <div class="main-div">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Left: Masthead Section -->
                        <div class="col-lg-8 col-md-12">
                            <div class="masthead">
                                <div class="masthead-content text-white">
                                    <h1 class="fst-italic lh-1 mb-4">Unlock the Power of Sharing</h1>
                                    <!-- <p class="mb-5">We're working hard to finish the development of this site. Sign up below to receive updates and to be notified when we launch!</p> -->
                                    <div class="slick" >
                                        <div class="item" >
                                            <div class="bg" >
                                                <img src="{{ asset(config('app.asset_url').'assets/image/slide1.jpg') }}" alt="Slide 1">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="bg">
                                                <img src="{{ asset(config('app.asset_url').'assets/image/slide2.jpeg') }}" alt="Slide 2">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="bg">
                                                <img src="{{ asset(config('app.asset_url').'assets/image/slide3.jpeg') }}" alt="Slide 3">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="bg">
                                                <img src="{{ asset(config('app.asset_url').'assets/image/slide4.jpeg') }}" alt="Slide 4">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="bg">
                                                <img src="{{ asset(config('app.asset_url').'assets/image/slide5.jpeg') }}" alt="Slide 5">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="bg">
                                                <img src="{{ asset(config('app.asset_url').'assets/image/slide6.jpg') }}" alt="Slide 2">
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="bg">
                                                <img src="{{ asset(config('app.asset_url').'assets/image/slide7.jpeg') }}" alt="Slide 7">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('file-transfer.index')
                    </div>
        </section>
    </div>
</header>

@endsection