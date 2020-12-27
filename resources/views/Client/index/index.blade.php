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
                                                <a class="nav-link nav-brand" href="/auth/register">ایجاد حساب کاربری</a>
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
                <div class="section full-height">
                    <div class="absolute-center">
                        <div class="section">

                        </div>
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
@endsection

@section('client.script')
    <script src="{{asset('js/header.js')}}"></script>
@endsection
