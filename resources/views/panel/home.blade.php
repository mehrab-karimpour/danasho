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
            <div class="col-12 col-sm-10 col-md-10 col-lg-6  py-2 clearfix">
                <div class="profile-card-panel bg-white p-4 rounded row">
                    <div class="col-4">
                        <input id="fab" type="checkbox" class="fab">
                        <label for="fab" class="toggle">+</label>
                        <img
                            src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com"
                            class="img-fluid img-profile" alt="Card image">
                    </div>
                    <div class="col-8">
                        <div class="col-12 h-50">
                            <h4 class="text-right text-primary">مهدی پازوکیان عزیز خوش امدید</h4>
                        </div>
                        <div class="col-12 h-50">
                            <p>کد اشتراک شما در داناشو 465 میباشد</p>
                            <p>اعتبار کیف پول شما : 0 ریال </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
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

    </section>





@endsection


@section('panel-script')
    <script src="{{asset('js/panel/home.js')}}"></script>
@endsection
