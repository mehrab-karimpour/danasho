@extends('panel.layout')



@section('panel-content')



    <br>
    @if(session('status')==='success')
        <div class="alert alert-success">
            وضعیت دریافت کلاس (انلاین ) با موفقیت بروزرسانی شد .
        </div>
    @endif
    @if(session('status')==='error')
        <div class="alert alert-danger">
            با عرض پوزش ! متاسفانه عملیات وضعیت دریافت کلاس (انلاین ) با شکست مواجه شد ! لطفا دوباره تلاش فرمایید
        </div>
    @endif


    <div class="container-fluid" id="online-selected-teaching">
        <div class="col-12 card card-body">
            <h5 class="text-justify direction-rtl">
                استاد محترم، لطفا در صورتی که برای مدتی فرصت کافی جهت تدریس و فعالیت در سامانه «داناشو» را ندارید، از
                طریم کلیمد زیمر ایمن
                موضوع را اطلاع نمایید تا عملکرد شما ضعیف تلقی نگشته و از امتیاز شما کاسته نشود.

            </h5>
        </div>
        <br><br><br>
        <form method="post" action=""
              class="row">
            @csrf
            @if($user->professor_active)
                <label for="submit">
                    <input type="hidden" name="getStudentStatus" value="off">
                </label>
                <button class="btn btn-danger m-0 m-auto" type="submit" id="submit">
                    در حال حاضر فرصت کافی جهت تدریس ندارم
                </button>
            @else
                <label for="submit">
                    <input type="hidden" name="getStudentStatus" value="on">
                </label>
                <button class="btn btn-success m-0 m-auto" type="submit" id="submit">
                    امکان تدریس در سامانه را دارم
                </button>
            @endif
        </form>
    </div>



@endsection


@section('panel-script')
    <script src="{{asset('js/panel/online-select-teaching.js')}}"></script>
@endsection
