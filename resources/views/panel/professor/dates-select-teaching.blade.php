@extends('panel.layout')

@section('panel-link')

@endsection

@section('panel-content')

    @if(session('status')==='success')
        <div class="alert alert-success">
            زمان های تدریس شما با موفقیت بروزرسانی شدند
        </div>
    @endif
    @if(session('status')==='error')
        <div class="alert alert-danger">
            با عرض پوزش ! متاسفانه عملیات بروزرسانی زمان های تدریس شما با شکست مواجه شد ! لطفا دوباره تلاش فرمایید
        </div>
    @endif
    <div class="card card-body mt-3">
        <h6>
            لطفا روز هایی که قادر به تدریس هستید را به همراه ساعت ان مشخص و سپس دکمه ی ارسال را فشار دهید
        </h6>
    </div>
    <br>

    <div class="container-fluid p-0">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs col-12 col-sm-8 col-md-6 col-lg-5 d-flex justify-content-between" role="tablist">
            <li class="active col-6 mt-2 m-sm-0">
                <a class="nav-link p-0 d-block p-2 active rounded" data-toggle="tab" href="#menu1">
                    زمان های تدریس شما
                </a>
            </li>
            <li class="nav-item col-6 mt-2 m-sm-0">
                <a class="nav-link p-0 d-block p-2 rounded" data-toggle="tab" href="#menu2">بروزرسانی زمان های تدریس</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-0">
            <div id="menu1" class="tab-pane fade in active show p-0"><br>
                <ul class="bg-white p-2 rounded">
                    @foreach($teachingDatesSaved as $item)
                        <li>
                            {{$item->datePersian}} : <strong class="mr-2">{{$item->datePeriods[0]->title}}</strong>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="menu2" class="tab-pane fade p-0">
                <form method="post" action="{{route('panel.update-teaching-dates')}}" id="accordion"
                      class="myaccordion col-12 col-md-10 col-sm-8 col-lg-6 m-0 m-auto p-0">
                    @csrf
                    @foreach($teachingDates as $key=>$teachingDate)
                        <div class="card p-0">
                            <div class="card-header p-0" id="headingOne">
                                <h2 class="mb-0 direction-rtl">
                                    <button type="button" class="btn btn-link collapsed"
                                            data-toggle="collapse" data-target="#i{{$teachingDate['index']}}d"
                                            aria-expanded="false"
                                            aria-controls="collapseOne">
                                            <span class="fa-stack fa-sm">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                                            </span>

                                        {{$teachingDate['datePersian']}}

                                    </button>
                                </h2>
                            </div>
                            <div id="i{{$teachingDate['index']}}d" class="collapse p-0 active"
                                 aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="select-online-teaching-parents">
                                        @foreach($periodDateClasses as $periodDateClass)
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <label for="{{$teachingDate['key']}}">
                                                        {{$periodDateClass->title}}
                                                    </label>
                                                    <input
                                                        name="{{$teachingDate['index']}}[]"
                                                        id="{{$teachingDate['key']}}"
                                                        value="{{$periodDateClass->id.'$'.$teachingDate['key'].'$'.$teachingDate['datePersian']."$".$teachingDate['index'].'$'.$teachingDate['date']}}"
                                                        type="checkbox"/>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 mt-2">
                        <button type="submit" class="btn btn-primary">
                            ارسال
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection


@section('panel-script')

@endsection
