@extends('Client.layout.main')

@section('client.css')
    <link rel="stylesheet" href="{{asset('css/auth/register.css')}}">
@endsection

@section('client.content')

    <div class="container ">
        @if(session('status')==='success')
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success">
                        <p class="text-center direction-rtl">
                            ثبت شما با موفقیت انجام شد .
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if(session('status')==='filed')
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        <p class="text-center direction-rtl">
                            اطلاعات وارد شده صحیح نیست !
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if(session('status')==='password')
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        <p class="text-center direction-rtl">
                            رمز عبور را اشتباه وارد کرده اید !
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <div class="myCard">
            <div class="row" id="login">
                <div class="login-back-first-child"></div>
                <div class="login-back-last-child"></div>
                <div class="col-md-6">
                    <div class="myLeftCtn myLeftCtn-login">

                        <form action="/login"  method="post" id="login-form" class="myForm text-center needs-validation">
                            @csrf
                            <header class="text-white">ورود به حساب کاربری</header>

                            <div class="form-group form-item-parent direction-rtl">
                                <i class="fas fa-user"></i>
                                <input class="myInput text-center" name="mobile" type="text" placeholder="شماره موبایل"
                                       id="username"
                                       required>
                            </div>

                            @csrf

                            <div class="form-group form-item-parent direction-rtl">
                                <i class="fas fa-lock"></i>
                                <input class="myInput text-center" name="password" type="password" id="password"
                                       placeholder="رمز عبور"
                                       required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="form-group direction-rtl">
                                <label class="direction-rtl">
                                    <input id="check_1" name="remember" type="checkbox" required/>
                                    <small><strong> مرا به خاطر بسپار</strong></small>
                                </label>
                            </div>

                            <button type="button" class="butt login-submit">ورود</button>

                        </form>
                        <a class="text-primary text-center d-block direction-rtl cursor-pointer mt-3" href="/register">
                            ثبت نام
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="myRightCtn">
                        <div class="box">
                            <header class="text-right">داناشو</header>

                            <p class="text-justify direction-rtl">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                                فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،
                                کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می
                                طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و
                                فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری
                                موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی
                                دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار
                                گیرد.</p>
                            <input type="button" class="butt_out" value="داناشو"/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('client.script')
    <script src="{{asset('js/validate.js')}}"></script>
    <script src="{{asset('js/login.js')}}"></script>
@endsection
