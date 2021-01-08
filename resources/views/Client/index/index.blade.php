@extends('Client.layout.main')

@section('client.css')
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">

@endsection

@section('client.content')
    <div class="navigation-wrap bg-light start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-light">

                        <a class="navbar-brand" href="" target="_blank">
                            ورود
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                        <a class="navbar-brand" href="" target="_blank">
                            ثبت نام
                            <i class="fa fa-user-plus"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-0 m-auto py-4 py-md-0">

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">تماس با ما</a>
                                    <i class="fas fa-address-book"></i>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">سوالات متداول</a>
                                    <i class="far fa-question-circle"></i>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">قوانین</a>
                                    <i class="fas fa-pencil-ruler"></i>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-chevron-down"></i>
                                        خدمات
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">خدمات</a>
                                        <a class="dropdown-item" href="#">خدمات </a>
                                        <a class="dropdown-item" href="#">خدمات</a>
                                        <a class="dropdown-item" href="#">خدمات</a>
                                    </div>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">داناشو</a>
                                </li>
                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('Client.index.partials.slider')
    <fieldset class="container-fluid">
        @csrf
        <h2 class="text-center online-class-text">
            کلاس انلاین
            <i class="fas fa-video ml-3 pt-3"></i>
        </h2>

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

    @include('Client.index.partials.online-item-end-2')

    @include('Client.index.partials.online-item-end-1')

    @include('Client.index.partials.online-items')

    @include('partials.ajax-loader')

    <br><br><br><br><br><br><br><br><br><br><br><br><br>

@endsection

@section('client.script')
    <script src="{{asset('js/header.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
@endsection
