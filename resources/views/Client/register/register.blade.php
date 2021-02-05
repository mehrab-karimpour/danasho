@extends('Client.layout.main')

@section('client.css')
    <link rel="stylesheet" href="{{asset('css/auth/register.css')}}">
@endsection


@section('client.content')

    <section class="container-fluid" id="register">
        <div class="myCard">
            <div class="row">
                <div id="bg-register" class="col-12 col-md-8 col-xl-6 m-0 m-auto h-100 pt-5">

                    <div id="bg-register-cover" style="background-image: url('{{asset('image/login.png')}}')">

                    </div>

                    <div class="myLeftCtn h-100 pt-5">
                        @if(session('status')==='error')
                            <div class="alert alert-danger direction-rtl text-right">
                                با عرض پوزش , ثبت نام انجام نشد لطفا دوباره تلاش کنید !
                            </div>
                        @endif
                        @if(session('status')==='mobile')
                            <div class="alert alert-danger direction-rtl text-right">
                                شماره موبایل وارد شده قبلا در داناشو ثبت شده است .
                            </div>
                        @endif
                        <form action="" method="post" class="myForm text-center pt-5 h-100 needs-validation"
                              onsubmit=""
                              novalidate>
                            @csrf
                            <header>ساخت حساب کاربری</header>
                            <div class="col-12 d-block d-md-block d-lg-flex justify-content-between">

                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <div class="form-item-parent">
                                        <input
                                            class="myInput direction-rtl text-center  direction-rtl text-center r col-12"
                                            name="mobile" placeholder="موبایل" type="text"
                                            id="mobile" required>
                                    </div>
                                    <i class="fas fa-envelope"></i>
                                </div>

                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <div class="form-item-parent">
                                        <input class="myInput  direction-rtl text-center  col-12" name="fullName"
                                               placeholder="نام و نام خانوادگی"
                                               type="text" id="fullName" required>
                                    </div>
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>

                            <div class="col-12  d-block  d-md-block d-lg-flex justify-content-between">
                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <div class="form-item-parent">
                                        <input class="myInput  direction-rtl text-center  col-12" name="password"
                                               placeholder="رمز عبور" type="password"
                                               id="email" required>
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>


                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <input class="myInput  direction-rtl text-center  col-12" name="email"
                                           placeholder="ایمیل" type="text"
                                           id="email" required>
                                    <i class="fas fa-envelope"></i>
                                </div>


                            </div>

                            <div class="col-12  display-none insert-password ">
                                <div class="d-flex justify-content-center mt-2" id="timer-parent">
                                    <span class="timer">120</span>
                                </div>
                                <a class="text-primary cursor-pointer display-none send-password-again">
                                    ارسال مجدد رمز عبور
                                </a>
                                <br>
                                <br>
                                <br>
                            </div>

                            <button class="butt btn submit-register-form" type="button">
                                ثبت نام
                            </button>
                            <br>
                            <a href="/login" class="text-primary mt-5 d-block">
                                قبلا در داناشو ثبت نام کرده اید ؟ وارد شوید
                            </a>
                        </form>

                    </div>
                </div>

                <div id="register-description" class="col-md-6 col-md-4 col-xl-6 m-0 m-auto h-100">
                    <div class="myRightCtn">

                        <div class="box box-item display-none ">
                            <div class="d-flex justify-content-around">
                                <h4 class="text-white direction-rtl col-8 d-flex justify-content-start align-items-center">
                                    همراه شما تا رسیدن به مسیر موفقیت...
                                </h4>
                                <img width="120px" height="120px" class="img-fluid rounded-circle col-3"
                                     src="http://cps-static.rovicorp.com/3/JPG_400/MI0003/711/MI0003711195.jpg?partner=allrovi.com"
                                     alt="danasho">
                            </div>
                            <header class="text-center">داناشو</header>

                            <p class="text-justify direction-rtl">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                                فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                                کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می
                                طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و
                                فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری
                                موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی
                                دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                                گیرد.
                            </p>
                            <input type="button" class="butt_out btn" value="بیشتر"/>
                        </div>

                        <div class="box box-item display-none ">
                            <div class="d-flex justify-content-around">
                                <h4 class="text-white direction-rtl col-8 d-flex justify-content-start align-items-center">
                                    و کنار شما در مسیر موفقیت..
                                </h4>
                                <img width="120px" height="120px" class="img-fluid rounded-circle col-3"
                                     src="data:image/png;base64,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"
                                     alt="danasho">
                            </div>
                            <header class="text-center">داناشو</header>

                            <p class="text-justify direction-rtl">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                                فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                                کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می
                                طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و
                                فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری
                                موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی
                                دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                                گیرد.
                            </p>
                            <input type="button" class="butt_out btn" value="بیشتر"/>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('client.script')
    <script src="{{asset('js/validate.js')}}"></script>
    <script src="{{asset('js/register.js')}}"></script>
@endsection

