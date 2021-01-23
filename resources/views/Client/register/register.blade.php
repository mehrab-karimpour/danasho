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
                        <form class="myForm text-center pt-5 h-100 needs-validation" onsubmit="return validateForm(this)"
                              novalidate>
                            <header>ساخت حساب کاربری</header>
                            <div class="col-12  d-block  d-md-block d-lg-flex justify-content-between">

                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <input class="myInput col-12" name="mobile" placeholder="موبایل" type="text"
                                           id="mobile" required>
                                    <i class="fas fa-envelope"></i>
                                </div>

                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <input class="myInput col-12" name="fullName" placeholder="نام و نام خانوادگی"
                                           type="text" id="fullName" required>
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>

                            <div class="col-12  d-block  d-md-block d-lg-flex justify-content-between">

                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <input class="myInput col-12" name="mobile" placeholder="ایمیل" type="text"
                                           id="mobile" required>
                                    <i class="fas fa-envelope"></i>
                                </div>

                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <input class="myInput col-12" name="fullName" placeholder="تاریخ تولد"
                                           type="text" id="fullName" required>
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col-12  d-block  d-md-block d-lg-flex justify-content-between">

                                <div class="form-group col-6 d-flex justify-content-center align-items-center">
                                    <label class="mr-3">
                                        اقا
                                        <input type="radio" name="gender" value="1" >
                                    </label>
                                    <label class="ml-3">
                                        خانوم
                                        <input type="radio" name="gender" value="1" >
                                    </label>
                                </div>

                                <div class="form-group col-6 d-flex justify-content-center align-items-center">
                                    <p class="text-center"> جنسیت </p>
                                </div>
                            </div>


                            <input type="submit" class="butt btn" value="ثبت نام">

                        </form>
                    </div>
                </div>

                <div id="register-description" class="col-md-6 col-md-4 col-xl-6 m-0 m-auto h-100">
                    <div class="myRightCtn">
                        <div class="box">
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
    <script href="{{asset('js/auth/register.js')}}"></script>
@endsection
