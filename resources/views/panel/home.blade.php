@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('css/panel/home.css')}}">
@endsection

@section('panel-content')




    <section id="home" class="container-fluid">
        <div class="row  flex-items-sm-center">
            <!--
                    User Card
            -->
            <div class="col-12 col-sm-10 col-md-10 py-2 clearfix">

                <div class="profile-card-panel bg-white p-4 rounded row">
                    <div class="col-8 col-sm-4 col-md-3 col-lg-2 pt-2 pb-2 card rounded-circle">
                        <input id="fab" type="file" class="fab image-profile">
                        <label for="fab" class="toggle">+</label>
                        @csrf
                        <img
                            src="/files/{{auth()->user()->img}}"
                            class="img-fluid rounded-circle" alt="Card image">
                        <div class="col-1 position-relative">
                            @include('partials.ajax-loader')
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 col-md-9 col-lg-10">
                        <div class="h-50 pt-2">
                            <h4 class="text-right text-primary">{{authFullName()}} عزیز خوش امدید</h4>
                        </div>
                        <div class="col-12 h-50">
                            <p>کد اشتراک شما در داناشو {{subscriptionCode()}} میباشد</p>
                            <p>اعتبار کیف پول شما : 0 ریال </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        @role('student')
        <div id="home__item" class="row col-12 justify-content-between col-md-8 m-0 m-auto">

            <div class="col-12 mt-4 col-md-6 pt-4 pb-4 rounded row bg-white hover-shadow">
                <div class="col-3 p-0">
                    <i class="fas fa-laptop-medical"></i>
                </div>
                <div class="col-9 d-flex justify-content-center align-items-center">
                    <h4>درخواست کلاس انلاین</h4>
                </div>
            </div>
            <div class="col-12 mt-4 col-md-6 pt-4 pb-4 rounded row bg-white hover-shadow">
                <div class="col-3 p-0">
                    <i class="fas fa-laptop-medical"></i>
                </div>
                <div class="col-9 d-flex justify-content-center align-items-center">
                    <h4>کلاس های انلاین رزرو شده</h4>
                </div>
            </div>
            <div class="col-12 mt-4 col-md-6 pt-4 pb-4 rounded row bg-white hover-shadow">
                <div class="col-3 p-0">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="col-9 d-flex justify-content-center align-items-center">
                    <h4>درخواست رفع اشکال افلاین</h4>
                </div>
            </div>
            <div class="col-12 mt-4 col-md-6 pt-4 pb-4 rounded row bg-white hover-shadow">
                <div class="col-3 p-0">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="col-9 d-flex justify-content-center align-items-center">
                    <h4>رفع اشکال افلاین رزرو شده</h4>
                </div>
            </div>
            <div class="col-12 mt-4 col-md-6 pt-4 pb-4 rounded row bg-white hover-shadow">
                <div class="col-3 p-0">
                    <i class="fas fa-funnel-dollar"></i>
                </div>
                <div class="col-9 d-flex justify-content-center align-items-center">
                    <h4>افزایش اعتبار</h4>
                </div>
            </div>
            <div class="col-12 mt-4 col-md-6 pt-4 pb-4 rounded row bg-white hover-shadow">
                <div class="col-3 p-0">
                    <i class="fas fa-rocket"></i>
                </div>
                <div class="col-9 d-flex justify-content-center align-items-center">
                    <h4>تیکت های پشتیبانی</h4>
                </div>
            </div>


        </div>
        @endif

        @role('professor')

        @if(auth()->user()->activityStatus())

        @else

            <div class="text-justify direction-rtl bg-white rounded p-3 h4 text-primary">
                 پروفایل شما در حال حاضر <strong class="text-danger">غیر فعال</strong> میباشد
                خواهش مند است جهت <strong class="text-success">فعال</strong>
                شدن ابتدا از قسمت <strong>ویرایش پروفایل</strong>
                اطلاعات خود را تکمیل نموده و سپس دروس <strong>تدریس انلاین</strong>
                و <strong>زمان های خالی جهت تدریس</strong>
                را مشخص نمایید
            </div>

        @endif

        <div>

        </div>

        @endif

    </section>







@endsection


@section('panel-script')
    <script src="{{asset('js/panel/home.js')}}"></script>
@endsection
