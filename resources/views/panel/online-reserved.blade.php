@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('css/panel/online-reserved.css')}}">
@endsection

@section('panel-content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-6">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title text-center">ریاضی اول ابتدایی</h4>
                        <br>
                        <div class="d-flex justify-content-between">
                            <p>مدت زمان کلاس :</p>
                            <p>45 دقیقه </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>هزینه کلاس :</p>
                            <p>45 هزار تومان </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p> زمان برگزری کلاس :</p>
                            <p>چهارشنبه 8/11/99 ساعت 15:00 </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a type="button" class="d-block text-center text-primary" data-toggle="modal"
                               data-target="#professor">
                                مشخصات دبیر
                            </a>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <button type="button" class="btn btn-warning btn-lg btn-block col-12">
                                    پرداخت
                                </button>
                            </div>
                            <div class="col-12 col-md-6">
                                <button type="button" class="btn btn-success btn-lg btn-block col-12">
                                    ورود به کلاس
                                </button>
                            </div>
                        </div>
                        {{--   professor information  --}}

                        <div class="modal fade bd-example-modal-lg " id="professor">
                            <div class="modal-dialog ">
                                <div class="modal-content ">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body  ml-0 pl-0 mr-0 pr-0">
                                        <div class="col-12 card-image">
                                            <h5 class="text-right">استاد علیرضا محمدی</h5>
                                            <div class="col-12 h-25 col-md6 d-flex justify-content-start">
                                                <img class="img-fluid rounded-circle"
                                                     src="https://amazona.webacademy.pro/images/p1.jpg"
                                                     alt="professor">
                                            </div>
                                            <div
                                                class="col-12 col-sm-8 col-md-6 col-lg-4  d-flex justify-content-around">
                                                <p>کد استاد :</p>
                                                <p>3453</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-justify col-12  direction-rtl">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده
                                                از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای
                                                متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                                                درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            بستن
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-8 col-md-6 col-lg-6">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title text-center">ریاضی اول ابتدایی</h4>
                        <br>
                        <div class="d-flex justify-content-between">
                            <p>مدت زمان کلاس :</p>
                            <p>45 دقیقه </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>هزینه کلاس :</p>
                            <p>45 هزار تومان </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p> زمان برگزری کلاس :</p>
                            <p>چهارشنبه 8/11/99 ساعت 15:00 </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a type="button" class="d-block text-center text-primary" data-toggle="modal"
                               data-target="#professor">
                                مشخصات دبیر
                            </a>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <button type="button" class="btn btn-success btn-lg btn-block col-12">
                                    پرداخت شده
                                </button>
                            </div>
                            <div class="col-12 col-md-6">
                                <button type="button" class="btn btn-success btn-lg btn-block col-12">
                                    ورود به کلاس
                                </button>
                            </div>
                        </div>
                        {{--   professor information  --}}

                        <div class="modal fade bd-example-modal-lg " id="professor">
                            <div class="modal-dialog ">
                                <div class="modal-content ">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body  ml-0 pl-0 mr-0 pr-0">
                                        <div class="col-12 card-image">
                                            <h5 class="text-right">استاد علیرضا محمدی</h5>
                                            <div class="col-12 h-25 col-md6 d-flex justify-content-start">
                                                <img class="img-fluid rounded-circle"
                                                     src="https://amazona.webacademy.pro/images/p1.jpg"
                                                     alt="professor">
                                            </div>
                                            <div
                                                class="col-12 col-sm-8 col-md-6 col-lg-4  d-flex justify-content-around">
                                                <p>کد استاد :</p>
                                                <p>3453</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-justify col-12  direction-rtl">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده
                                                از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای
                                                متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                                                درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            بستن
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>







@endsection


@section('panel-script')

@endsection
