@extends('Client.layout.main')

@section('client.css')
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">

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
                                                <a class="nav-link nav-brand" href="/auth/register">
                                                    ثبت نام
                                                    <i class="fas fa-user-plus"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item nav-brand ml-2">
                                                <a class="nav-link nav-brand" href="/auth/login">
                                                    ورود
                                                    <i class="fas fa-sign-in-alt"></i>
                                                </a>
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
                                                    <strong>
                                                        <i class="fas fa-chevron-down"></i>
                                                        خدمات
                                                    </strong>
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
                {{--<div class="section full-height position-absolute">
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
                </div>--}}
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
        @csrf
        <h4 class="text-center online-class-text">
            کلاس انلاین
            <i class="fas fa-video ml-3 pt-3"></i>
        </h4>
        <br>
        <section id="select-class">
            <div class="grade">
                <i class="fas fa-user-graduate ml-2"></i>
                پایه تحصیلی و عنوان درس
            </div>
            <div class="time public-items">
                <i class="fas fa-hourglass-start ml-2"></i>
                مدت زمان کلاس و هزینه
            </div>
            <div class="date public-items">
                <i class="fas fa-calendar-alt ml-2"></i>
                زمان برگزاری کلاس
            </div>
            <div class="set-record">
                <i class="fas fa-edit ml-2"></i>
                ثبت درخواست
            </div>
        </section>
    </fieldset>

    @include('Client.index.partials.error-select')

    <section class="col-12 col-md-10 col-xl-8 p-2" id="online-items-end-step">
        <span class="d-block mt-2 ml-1 "><i class="fas fa-times end-step-close cursor-pointer"></i></span>
        <h5 class="text-center direction-rtl">جهت افزایش کیفیت کلاس لطفا موارد زیر را تکمیل نمایید :</h5>
        <hr class="m-2">
        <p class="text-right direction-rtl">سطح خود را انتخاب کنید</p>
        <label for="level" class="text-center"></label>
        <div class="d-flex justify-content-around col-12">
            <div>
                <p>ضعیف</p>
                <input name="level" class="custom-radio" id="level" type="radio">
            </div>
            <div>
                <p>متوسط</p>
                <input name="level" class="custom-radio" id="level" type="radio">
            </div>
            <div>
                <p>خوب</p>
                <input name="level" class="custom-radio" id="level" type="radio">
            </div>
            <div>
                <p>عالی</p>
                <input name="level" class="custom-radio" id="level" type="radio">
            </div>

        </div>
        <p class="text-right direction-rtl mt-2">تصویر سوالاتی که قصد رفع اشکال انها را دارید اپلود کنید .</p>
        <div class="d-flex justify-content-center col-12">
            <div class="col-12 col-md-3 col-xl-2">
                <label for="questions"></label>
                <input type="file" class="form-control" name="img" id="questions">
            </div>
        </div>
        <p class="text-right direction-rtl mt-2">هر گونه توضیح تکمیلی که به بهبود کیفیت کلاس شما کمک میکند را در زیر وارد کنید </p>
        <p class="text-right m-0 p-0">(میتواند شامل مبحث مورد نطر باشد )</p>
        <label for="description"></label>
        <textarea class="form-control" name="description" id="description" placeholder="لطفا توصیحات خود را وارد کنید"></textarea>
        <div class="d-flex justify-content-around col-12 mt-2">
            <button class="btn btn-secondary">مرحله قبل</button>
            <button class="btn btn-primary">مرحله بعد</button>
        </div>
    </section>

    <section class="col-12 col-md-5 col-xl-4" id="online-items">
        <input type="text" id="turn" name="turn" value="1">
        <span class="d-block mt-2 ml-1 "><i class="fas fa-times online-steps-close cursor-pointer"></i></span>
        <div class="col-12 d-flex justify-content-center">
            <ul class='list-group' id="list-group">

            </ul>
        </div>
        <button class="btn btn-secondary"> بعدی</button>
    </section>

    @include('partials.ajax-loader')
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

@section('client.script')
    <script src="{{asset('js/header.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
@endsection
