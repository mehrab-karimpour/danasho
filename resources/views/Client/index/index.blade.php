@extends('Client.layout.main')

@section('client.css')
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
@endsection

@section('client.content')
    <div class="container">
        <div class="row">
            <header class="col-12">
                <div class="navigation-wrap bg-light start-header start-style">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <nav class="navbar navbar-expand-md navbar-light">

                                    {{--   navbar brand  --}}
                                    <div class="navbar-brand">
                                        <ul class="navbar-nav text-center">
                                            <li class="nav-item nav-brand mr-2">
                                                <a class="nav-link nav-brand" href="/auth/register">ایجاد حساب
                                                    کاربری</a>
                                            </li>
                                            <li class="nav-item nav-brand ml-2">
                                                <a class="nav-link nav-brand" href="/auth/login">ورود</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto col-md-8 py-4 py-md-0">

                                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                <a class="nav-link" href="#"><strong>تماس با ما</strong></a>
                                            </li>
                                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                <a class="nav-link" href="#"><strong>سوالات متداول</strong></a>
                                            </li>
                                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                <a class="nav-link" href="#"><strong>قوانین</strong></a>
                                            </li>
                                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
                                                   role="button" aria-haspopup="true" aria-expanded="false">
                                                    <strong>خدمات</strong>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">تست</a>
                                                    <a class="dropdown-item" href="#">تست</a>
                                                    <a class="dropdown-item" href="#">تست</a>
                                                    <a class="dropdown-item" href="#">تست</a>
                                                </div>
                                            </li>
                                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                                <a class="nav-link" href="#"><strong>داناشو</strong></a>
                                            </li>
                                        </ul>
                                    </div>

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section full-height position-absolute">
                    <div class="absolute-center">
                        <div class="section mt-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="switch">
                                            <div id="circle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>

    <div id="slider">

        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>

            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/image/slide1.jpg" alt="Los Angeles">
                    <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>We had such a great time in LA!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/image/slide3.jpg" alt="Chicago">
                    <div class="carousel-caption">
                        <h3>Chicago</h3>
                        <p>Thank you, Chicago!</p>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <fieldset class="container-fluid">
        <h3 class="text-center online-class-text mt-2">کلاس انلاین</h3>
        <br>
        <section class="row" id="select-class">
            <div>
                پایه تحصیلی و عنوان درس
            </div>
            <div>
                مدت زمان کلاس و هزینه
            </div>
            <div>
                زمان برگزاری کلاس
            </div>
            <div>
                ثبت درخواست
            </div>
        </section>
    </fieldset>
@endsection

@section('client.script')
    <script src="{{asset('js/header.js')}}"></script>
@endsection
