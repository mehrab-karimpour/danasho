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
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="true" aria-expanded="false">
                                        تماس با ما
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"></a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </div>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">سوالات متداول</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="#">قوانین</a>
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
        <h5 class="text-center online-class-text">
            کلاس انلاین
            <i class="fas fa-video ml-3 pt-3"></i>
        </h5>

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

    <section class="col-12 mt-8 col-md-10 col-xl-8 p-2 end-step-section "
             id="last-step-record">
        <span class="d-block mt-2 ml-1 "><i class="fas fa-times end-step-close cursor-pointer"></i></span>
        <h5 class="text-center direction-rtl">لطفا مشخصات خود را وارد نمایید </h5>
        <br>
        <div class="form-item-parent">
            <div class="col-12 col-md-8 m-0 m-auto d-md-flex d-block justify-content-around">
                <input type="text" class="form-control col-6" name="name" id="name"
                       placeholder="نام کامل">
                <label for="name" class="col-6 text-right">نام و نام خانوادگی خود را وارد کنید</label>
            </div>
        </div>

        <br>
        <br>
        <div class="form-item-parent">
            <div class="col-12 col-md-8 m-0 m-auto d-md-flex d-block justify-content-around">
                <input type="number" class="form-control col-6" name="mobile" id="mobile"
                       placeholder="شماره تماس">
                <label for="mobile" class="col-6 text-right">شماره تماس خود را وارد کنید</label>
            </div>
        </div>
        <br>
        <br>
        <div class="form-item-parent dont-show-password-section" id="password-verify-parent">
            <div class="col-12 col-md-8 m-0 m-auto d-md-flex d-block justify-content-around">
                <input type="password" class="form-control col-6 text-center" name="password" id="password"
                       placeholder="_________">
                <label for="password" class="col-6 text-right">رمز ارسال شده را وارد نمایید</label>
            </div>
            <div class="d-flex justify-content-center mt-2" id="timer-parent">
                <span class="timer">56</span>
            </div>
        </div>
        <br>

        <br>
        <div class="d-flex justify-content-start col-12 mt-2">
            <button class="btn btn-primary last-record__submit">تایید</button>
        </div>
    </section>


    <section class="col-12 col-md-10 col-xl-8 p-2 end-step-section" id="online-items-end-step">
        <span class="d-block mt-2 ml-1 "><i class="fas fa-times end-step-close cursor-pointer"></i></span>
        <h5 class="text-center direction-rtl">جهت افزایش کیفیت کلاس لطفا موارد زیر را تکمیل نمایید :</h5>
        <hr class="m-2">
        <p class="text-right direction-rtl">سطح خود را انتخاب کنید <small
                class="text-warning">(لطفا این فیلد را کامل کنید)</small></p>
        <label for="level" class="text-center"></label>
        <div class="form-item-parent">
            <div class="d-flex justify-content-around col-12">
                <div>
                    <p>ضعیف</p>
                    <input name="level" value="ضعیف" class="custom-radio" id="level" type="radio">
                </div>
                <div>
                    <p>متوسط</p>
                    <input name="level" value="متوسط" class="custom-radio" id="level" type="radio">
                </div>
                <div>
                    <p>خوب</p>
                    <input name="level" value="خوب" class="custom-radio" id="level" type="radio">
                </div>
                <div>
                    <p>عالی</p>
                    <input name="level" value="عالی" class="custom-radio" id="level" type="radio">
                </div>
            </div>
        </div>
        <p class="text-right direction-rtl mt-2">تصویر سوالاتی که قصد رفع اشکال انها را دارید اپلود کنید .<small
                class="text-success">(اختیاری)</small></p>
        <div class="form-item-parent">
            <div class="d-flex justify-content-center col-12">
                <div class="col-12 col-md-3 col-xl-2">
                    <label for="questions"></label>
                    <input type="file" class="form-control" name="img" id="questions">
                </div>
            </div>
        </div>
        <p class="text-right direction-rtl mt-2">هر گونه توضیح تکمیلی که به بهبود کیفیت کلاس شما کمک میکند را در زیر
            وارد کنید </p>
        <p class="text-right m-0 p-0">(میتواند شامل مبحث مورد نطر باشد ) <small
                class="text-warning">(لطفا این فیلد را کامل کنید)</small></p>
        <label for="description"></label>
        <div class="form-item-parent">
            <textarea class="form-control" name="description" id="description"
                      placeholder="لطفا توصیحات خود را وارد کنید"></textarea>
        </div>
        <div class="d-flex justify-content-around col-12 mt-2">
            <button class="btn btn-secondary">مرحله قبل</button>
            <button class="btn btn-primary next-record">مرحله بعد</button>
        </div>
    </section>

    <section class="col-12 col-md-5 col-xl-4" id="online-items">
        <input type="hidden" id="turn" name="turn" value="1">
        <input type="hidden" id="edit" name="edit" value="0">
        <span class="d-block mt-2 ml-1 "><i class="fas fa-times online-steps-close cursor-pointer"></i></span>
        <div class="col-12 d-flex justify-content-center">
            <ul class='list-group m-0 p-0' id="list-group">

            </ul>
        </div>
        <div class="col-12 col-md-4 col-xl-2 circle-select">
            <span class="circle-select-active"></span>
            <span></span>
            <span></span>
        </div>
        <br>
        {{--<button class="btn float-right btn-secondary mb-5"> بعدی</button>--}}
    </section>

    @include('partials.ajax-loader')
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

@section('client.script')
    <script src="{{asset('js/header.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
@endsection
