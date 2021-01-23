@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('css/panel/edit-profile.css')}}">
@endsection

@section('panel-content')

    <div class="container">
        <div class="row col-12 col-md-12 col-lg-8 m-0 m-auto">
            <form class="col-12 pt-3 pb-3" id="edit-profile">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 align-items-center d-flex justify-content-center ">
                    <i class="checkmark ml-4 mb-3">✓</i>
                    <h4>کد اشتراک شما در داناشو : 345</h4>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <div class="form-group">
                        <label for="fullName"></label>
                        <input type="text" class="form-control" id="fullName" aria-describedby="emailHelp"
                               placeholder="نام و نام خانوادگی">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"></label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                               placeholder="شماره موبایل">
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <div class="form-group">
                        <label for="fullName"></label>
                        <input type="text" class="form-control" id="fullName" placeholder="جنسیت">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="تاریخ تولد">
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <div class="form-group">
                        <label for="fullName"></label>
                        <input type="text" class="form-control" id="fullName" placeholder="مقطع تحصیلی">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"></label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                               placeholder="رشته تحصیلی">
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <div class="form-group">
                        <label for="fullName"></label>
                        <input type="text" class="form-control" id="fullName" placeholder="پایه تحصیلی">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="ادرس ایمیل">
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <div class="form-group">
                        <label for="school-type" class="text-center">نوع مدرسه</label>
                    </div>
                    <div class="col-8 d-block d-lg-flex justify-content-between">
                        <label>
                            <input type="radio" name="school-type" id="school-type">
                            دولتی
                        </label>
                        <label>
                            <input type="radio" name="school-type" id="school-type">
                            نمونه دولتی
                        </label>
                        <label>
                            <input type="radio" name="school-type" id="school-type">
                            غیر انتفاعی
                        </label>
                        <label>
                            <input type="radio" name="school-type" id="school-type">
                            تیز هوشان
                        </label>

                    </div>
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <div class="form-group">
                        <label for="sel1">محل سکونت</label>
                        <select class="form-control" id="sel1">
                            <option>کشور</option>
                            <option>ایران</option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel1"></label>
                        <select class="form-control" id="sel1">
                            <option>استان</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel1"></label>
                        <select class="form-control" id="sel1">
                            <option>شهر</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <div class="form-group">
                        <label for="fullName"></label>
                        <input type="password" class="form-control" id="fullName" placeholder="رمز عبور">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="تکرار رمز عبور">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">ارسال</button>
                <br>
            </form>
        </div>
    </div>


@endsection


@section('panel-script')
    <script src="{{asset('js/panel/editProfile.js')}}"></script>
@endsection
