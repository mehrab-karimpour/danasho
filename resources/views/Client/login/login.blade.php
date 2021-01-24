@extends('Client.layout.main')

@section('client.css')
    <link rel="stylesheet" href="{{asset('css/auth/register.css')}}">
@endsection

@section('client.content')

    <div class="container">
        <div class="myCard">
            <div class="row" id="login">
                <div class="login-back-first-child"></div>
                <div class="login-back-last-child"></div>
                <div class="col-md-6">
                    <div class="myLeftCtn myLeftCtn-login">

                        <form class="myForm text-center needs-validation" onsubmit="return validateForm(this)"
                              novalidate>
                            <header class="text-white">ورود به حساب کاربری</header>

                            <div class="form-group direction-rtl">
                                <i class="fas fa-user"></i>
                                <input class="myInput text-center" type="text" placeholder="نام کاربری" id="username"
                                       required>
                            </div>


                            <div class="form-group direction-rtl">
                                <i class="fas fa-lock"></i>
                                <input class="myInput text-center" type="password" id="password" placeholder="رمز عبور"
                                       required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="form-group direction-rtl">
                                <label class="direction-rtl">
                                    <input id="check_1" name="check_1" type="checkbox" required/>
                                    <small><strong> مرا به خاطر بسپار</strong></small>
                                </label>
                            </div>

                            <input type="submit" class="butt" value="ورود">

                        </form>
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
    <script href="{{asset('js/auth/register.js')}}"></script>
@endsection
