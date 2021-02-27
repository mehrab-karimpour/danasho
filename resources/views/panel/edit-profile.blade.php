@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('css/panel/edit-profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/dependencies/persianDatepicker-default.css')}}">
@endsection

@section('panel-content')

    <div class="container">
        <div class="row col-12 col-md-12 col-lg-8 m-0 m-auto">
            @if(session('status')==='error')
                <div class="alert alert-danger direction-rtl text-right">
                    با عرض پوزش , خطایی رخ داد لطفا دوباره تلاش کنید !
                </div>
            @endif
            @if(session('status')==='success')
                <div class="alert alert-success direction-rtl text-right">
                    اطلاعات شما با موفقیت بروز رسانی شد .
                </div>
            @endif


            @role('student')
            <form method="post" action="{{route('panel.edit-profile-form')}}" class="col-12 pt-3 pb-3"
                  id="edit-profile">
                @csrf
                <div class="col-12 col-sm-10 col-md-12 align-items-center d-flex justify-content-center ">
                    <i class="checkmark ml-4 mb-3">✓</i>
                    <h4>کد اشتراک شما در داناشو : {{subscriptionCode()}}</h4>
                </div>
                <div class="col-12 d-block d-md-flex justify-content-between">
                    <div class="form-group">
                        <label for="fullName">نام و نام خانوادگی :</label>
                        <input type="text" class="form-control" id="fullName" aria-describedby="emailHelp"
                               name="fullName"
                               value="{{$user->fullName}}"
                               placeholder="نام و نام خانوادگی">
                    </div>
                    <div class="form-group">
                        <label for="mobile">شماره موبایل :</label>
                        <input type="text" class="form-control" id="mobile"
                               name="mobile"
                               value="{{$user->mobile}}"
                               placeholder="شماره موبایل">
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-around">

                    <label for="gender">جنسیت :</label>

                    <label>
                        <input type="radio" class="custom-radio" id="gender"
                               @if($user->gender===1)  {{'checked'}} @endif
                               value="1"
                               name="gender"
                               placeholder="">
                        آقا
                    </label>
                    <label>
                        <input type="radio" class="custom-radio" id="gender"
                               @if($user->gender===2)  {{'checked'}} @endif
                               value="2"
                               name="gender"
                               placeholder="">
                        خانوم
                    </label>

                </div>
                <div class="col-12 d-flex justify-content-between">

                    <div class="form-group">
                        <label for="birthDate">تاریخ تولد :</label>
                        <input name="birthDate" type="text" class="form-control" id="birthDate"
                               placeholder="تاریخ تولد">
                    </div>


                    <div class="form-group">
                        <label for="birthDate"> شماره موبایل :</label>
                        <input name="birthDate" type="text" class="form-control" id="birthDate"
                               placeholder="شماره موبایل">
                    </div>

                </div>

                <div class="col-12 d-flex justify-content-between">
                    <div class="col-12 d-block d-md-flex justify-content-between">
                        <div class="form-group">
                            <label for="grade"></label>
                            <select class="form-control" id="grade" name="grade">
                                <option value="">مقطع تحصیلی</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}" id="{{$grade->key}}"
                                            @if($user->grade_id===$grade->id)
                                            {{'selected'}}
                                            @endif
                                            data-key="{{$grade->key}}">{{$grade->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group  edit-field   @if($user->field_id===null){{'display-none'}}@endif">
                            <label for="field"></label>
                            <select class="form-control" id="field" name="field">
                                <option value="">رشته تحصیلی</option>
                                @foreach($fields as $field)
                                    <option @if($user->field_id===$field->id)
                                            {{'selected'}}
                                            @endif value="{{$field->id}}">{{$field->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <div class="col-12 d-block d-md-flex justify-content-between">
                        <div class="form-group edit-unit ">
                            <label for="unit"></label>
                            <select class="form-control" id="unit" name="unit">
                                <option value="">پایه تحصیلی</option>

                                @foreach($units as $unit)
                                    @if($user->grade_id===$unit->grade_id)
                                        <option
                                            @if($user->unit_id==$unit->id)
                                            {{'selected'}}
                                            @endif
                                            value="{{$user->unit_id}}">
                                            {{$unit->title}}
                                        </option>
                                    @endif
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" class="form-control" id="email"
                                   value="{{$user->email}}"
                                   name="email"
                                   placeholder="ادرس ایمیل">
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <div class="form-group">
                        <label for="typeSchool_id" class="text-center">نوع مدرسه</label>
                    </div>
                    <div class="col-8 d-block d-lg-flex justify-content-between">
                        <label>
                            <input @if($user->typeSchool==='دولتی')  {{'checked'}} @endif
                                   value="دولتی" type="radio" name="typeSchool_id" id="typeSchool_id">
                            دولتی
                        </label>
                        <label>
                            <input @if($user->typeSchool==='نمونه دولتی')  {{'checked'}} @endif
                                   value="نمونه دولتی" type="radio" name="typeSchool_id" id="typeSchool_id">
                            نمونه دولتی
                        </label>
                        <label>
                            <input @if($user->typeSchool==='غیر انتفاعی')  {{'checked'}} @endif
                                   value="غیر انتفاعی" type="radio" name="typeSchool_id" id="typeSchool_id">
                            غیر انتفاعی
                        </label>
                        <label>
                            <input @if($user->typeSchool==='تیز هوشان')  {{'checked'}} @endif
                                   value="تیز هوشان" type="radio" name="typeSchool_id" id="typeSchool_id">
                            تیز هوشان
                        </label>

                    </div>
                </div>
                <div class="col-12 d-block d-md-flex justify-content-between">
                    <div class="form-group col-md-4 pl-0">
                        <label for="addressState"></label>
                        <select class="form-control" id="addressState" name="state">
                            <option name="state" value="">استان</option>
                            @foreach($states as $state)
                                <option @if($user->state===$state->name){{'selected'}}@endif
                                        data-id="{{$state->id}}" value="{{$state->name}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-4 pl-0">
                        <label for="addressCity"></label>
                        <select name="city" class="form-control" id="addressCity">
                            <option value="">شهر</option>
                            @foreach($cities as $city)
                                @if($user->city===$city->name)
                                    <option selected value="{{$city->name}}">
                                        {{$city->name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-between">
                    <div class="form-group">
                        <label for="password"></label>
                        <input name="password" type="password" class="form-control" id="password"
                               placeholder="رمز عبور">
                    </div>
                    <div class="form-group">
                        <label for="repeat-password"></label>
                        <input type="password" class="form-control" id="repeat-password"
                               name="repeat-password"
                               placeholder="تکرار رمز عبور">
                    </div>
                </div>

                <button type="button" class="btn btn-primary">ارسال</button>
                <br>
            </form>
            @endif


            @role('professor')

            <form method="post" action="{{route('panel.edit-profile-professor')}}" class="col-12 pt-3 pb-3"
                  enctype="multipart/form-data"
                  id="edit-profile">
                @csrf
                <div class="col-12 col-sm-10 col-md-12 align-items-center d-flex justify-content-center ">
                    <i class="checkmark ml-4 mb-3">✓</i>
                    <h4>کد اشتراک شما در داناشو : {{subscriptionCode()}}</h4>
                </div>
                <div class="col-12 d-block d-md-flex justify-content-between">
                    <div class="form-group">
                        <label for="fullName">نام و نام خانوادگی :</label>
                        <input type="text" class="form-control" id="fullName" aria-describedby="emailHelp"
                               name="fullName"
                               value="{{$user->fullName}}"
                               placeholder="نام و نام خانوادگی">
                    </div>
                    <div class="form-group">
                        <label for="mobile">شماره موبایل :</label>
                        <input type="text" class="form-control" id="mobile"
                               name="mobile"
                               value="{{$user->mobile}}"
                               placeholder="شماره موبایل">
                    </div>
                </div>


                <div class="col-12 d-block d-md-flex justify-content-between">
                    <div class="form-group">
                        <label for="birthDate">تاریخ تولد :</label>
                        <input name="birthDate" type="text" class="form-control" id="birthDate"
                               placeholder="تاریخ تولد">
                    </div>
                </div>

                <div class="col-12 d-block d-md-flex justify-content-between">
                    <div class="form-group">
                        <label for="national_code">کد ملی :</label>
                        <input name="national_code" type="text" class="form-control" id="national_code"
                               placeholder="کد ملی">
                    </div>
                    <div class="form-group form-item-parent">
                        <label for="national_image"> تصویر کارت ملی :</label>
                        <input name="national_image" type="file" class="form-control" id="national_image">
                    </div>
                </div>

                <div class="col-12 d-block d-md-flex justify-content-between">
                    <div class="form-group">
                        <label for="education_level">میزان تحصیلات :</label>
                        <input name="education_level" type="text" class="form-control" id="education_level"
                               placeholder="میزان تحصیلات">
                    </div>
                    <div class="form-group">
                        <label for="field_university"> رشته ی تحصیلی :</label>
                        <input name="field_university" type="text" class="form-control" id="field_university"
                               placeholder=" رشته ی تحصیلی">
                    </div>
                </div>

                <div class="col-12 d-block d-md-flex justify-content-between">
                    <div class="form-group">
                        <label for="university">اخرین دانشگاه محل تحصیلی :</label>
                        <input name="university" type="text" class="form-control" id="university"
                               placeholder="نام دانشگاه را وارد کنید">
                    </div>
                    <div class="form-group form-item-parent">
                        <label for="university_image"> اخرین مدرک تحصیلی یا کارت دانشجویی:</label>
                        <input name="university_image" type="file" class="form-control" id="university_image">
                    </div>
                </div>

                <div class="col-12 d-block d-md-flex justify-content-between">
                    <div class="form-group col-md-4 pl-0">
                        <label for="addressState"></label>
                        <select class="form-control" id="addressState" name="state">
                            <option name="state" value="">استان</option>
                            @foreach($states as $state)
                                <option @if($user->state===$state->name){{'selected'}}@endif
                                        data-id="{{$state->id}}" value="{{$state->name}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-4 pl-0">
                        <label for="addressCity"></label>
                        <select name="city" class="form-control" id="addressCity">
                            <option value="">شهر</option>
                            @foreach($cities as $city)
                                @if($user->city===$city->name)
                                    <option selected value="{{$city->name}}">
                                        {{$city->name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 d-block d-md-flex justify-content-between">
                    <div class="form-group form-item-parent">
                        <label for="cv_image">آپلود فایل pdf رزومه :</label>
                        <input name="cv_image" type="file" class="form-control" id="cv_image">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group card pt-3">
                        <label for="professor_tags" class="text-center">
                            <strong>
                                جملات معرفی کننده شما به دانش آموزان :
                            </strong>
                        </label>
                        <div class="col-12">
                            <textarea
                                class="form-control" id="professor_tags" name="professor_tags"
                                placeholder="جملات خود را اینجا بنویسید"></textarea>
                        </div>

                        <div class=" p-3 cursor-pointer direction-rtl" id="birthDate" disabled>

                            به عنوان مثال :
                            <br>
                            علیرضا محمدی
                            <br>
                            فوق لیسانس مهندسی نرم افزار از دانشگاه صنعتی شریف
                            <br>
                            سابقه شش سال تدریس ریاضیات کنکور
                            <br>
                            دبیر دبیرستان علامه حلی و انرژی اتمی
                            <br>
                            مولف کتاب...
                            <br>
                            تدریس در آموزشگاه...
                            <br>
                            <strong class="text-danger">توجه :</strong>
                            لطفا برای هرکدام از موارد فوق مدرکی دارید اسکن آنها را در قالب فایل pdf ارسال فرمایید
                        </div>
                        <div class="form-group col-12 form-item-parent">
                            <label for="professor_tags_image"></label>
                            <input name="professor_tags_image" type="file" id="professor_tags_image" class="form-control" >
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group card pt-3">
                        <div class="p-3 cursor-pointer direction-rtl" id="birthDate" disabled>
                            لطفا به انتخاب خود یک سوال نسبتا سخت از یکس از دروسی که تدریس می فرمایید را بر روی تخته وایت
                            برد حل نموده و توضیح دهید وویدئوی خود را به ایدی تلگرام danasho_support@ ارسال فرمایید
                            <br>
                            همچنین میتوانید حل را در قالب فایل PDF یا PowerPoint توضیح دهید
                            <br>
                            <br>
                            {{--<strong class="text-danger">تذکر مهم :</strong>
                            امتیاز اولیه شما بر اساس کیفیت ویدیو و واضح بودن آن و همچنین قدرت بیان در ارائه توضیحات و
                            پاسخ سوال ، تعیین می کند.--}}
                        </div>
                    </div>
                </div>

                <div class="col-12 d-block d-md-flex justify-content-between">
                    <div class="form-group form-item-parent">
                        <label for="bank_card_image">تصویر کارت بانکی :</label>
                        <input name="bank_card_image" type="file" class="form-control" id="bank_card_image">
                    </div>
                </div>


                <div class="col-12 d-block d-md-flex justify-content-between">
                    <label for="gender">جنسیت :</label>
                    <label>
                        <input type="radio" class="custom-radio" id="gender"
                               @if($user->gender===1)  {{'checked'}} @endif
                               value="1"
                               name="gender"
                               placeholder="">
                        آقا
                    </label>
                    <label>
                        <input type="radio" class="custom-radio" id="gender"
                               @if($user->gender===2)  {{'checked'}} @endif
                               value="2"
                               name="gender"
                               placeholder="">
                        خانوم
                    </label>
                </div>


                <div id="submit-form-professor"  class="btn btn-primary">ارسال</div>
                <br>
            </form>

            @endif


        </div>
    </div>
    <script>

        $('#grade').change(function () {
            const selectFields = $('.edit-field');
            const selectUnits = $('.edit-unit');
            let gradeID = $(this).val();

            if (gradeID) {
                const fields =  {!! $fields !!};
                const units =  {!! $units !!};
                let res = fields.filter(function (obj) {
                    return (obj.grade_id == gradeID);
                });
                if (res.length === 0) {
                    selectFields.hide(0);
                } else {
                    selectFields.fadeIn(500);
                }
                selectFields.find('select').empty();
                selectFields.find('select').append('<option value="">انتخاب کنید</option>');
                $.each(res, function (key, value) {
                    selectFields.find('select').append('<option value="' + value.id + '">' + value.title + '</option>');
                });

                let resUnit = units.filter(function (obg) {
                    return (obg.grade_id == gradeID);
                })
                selectUnits.find('select').empty();
                selectUnits.find('select').append('<option value="">انتخاب کنید</option>');
                $.each(resUnit, function (key, value) {
                    selectUnits.find('select').append('<option value="' + value.id + '">' + value.title + '</option>');
                });

            } else {
                selectUnits.find('select').empty();
                selectFields.find('select').empty();
            }
        });


        $('#addressState').change(function () {

            let stateid = $('#addressState').find(":selected").attr('data-id');

            if (stateid) {
                const cities =  {!! $cities !!};

                let res = cities.filter(function (obj) {
                    return (obj.state_id == stateid);
                });

                $("#addressCity").empty();
                $("#addressCity").append('<option value="">انتخاب کنید</option>');
                $.each(res, function (key, value) {
                    $("#addressCity").append('<option value="' + value.name + '">' + value.name + '</option>');
                });

            } else {
                $("#addressCity").empty();
            }
        });
    </script>


@endsection


@section('panel-script')
    <script src="{{asset('js/validate.js')}}"></script>
    <script src="{{asset('js/dependencies/persian-datepicker.js')}}"></script>
    <script src="{{asset('js/panel/editProfile.js')}}"></script>
    @role('professor')
    <script src="{{asset('js/panel/editProfileProfessor.js')}}"></script>
    @endif
@endsection
