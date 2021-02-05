@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('css/panel/online-held.css')}}">
@endsection

@section('panel-content')

    <div class="container">
        <div class="row">
            @if(sizeof($allOnlineClass)===0)
                <div class="col-12 alert alert-warning">
                    <h5 class="text-center">کلاسی برای شما ثبت نشده است</h5>
                </div>
            @endif
            @foreach($allOnlineClass as $online)
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title text-center">{{$online->lesson}}</h4>
                            <br>
                            <div class="d-flex justify-content-between">
                                <p>مدت زمان کلاس :</p>
                                <p class="col-6"><strong>{{$online->time}}</strong></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>هزینه کلاس :</p>
                                <p class="col-6"><strong>{{$online->price}} هزار تومان </strong></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p> زمان برگزری کلاس :</p>
                                <p><strong>{{$online->period}}</strong></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p> سطح بندی :</p>
                                <p class="col-6"><strong>{{$online->level}}</strong></p>
                            </div>
                            <div class="">
                                <p> توضیحات :</p>
                                <p><strong>{{$online->description}}</strong></p>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <a type="button"
                                       data-toggle="modal"
                                       data-target="#professor"
                                       class="btn btn-warning btn-lg btn-block col-12">
                                        شرکت در نظر سنجی
                                    </a>
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
                                            @foreach($allSurveys as $key=>$survey)
                                                <div class="col-12 card-image">
                                                    <h5 class="text-center">{{$surveyType[$key]['type']}}</h5>
                                                    @foreach($survey as $row)

                                                        <div class="col-12">
                                                            <p><strong>{{$row->title}}  </strong> : </p>
                                                            <div class="d-flex justify-content-between score">
                                                                @foreach($scores as $score)
                                                                    <label>
                                                                        <input type="radio" value="{{$score->score_title}}"
                                                                               name="{{$row->id}}">
                                                                        <span class="design"></span>
                                                                        <span class="text">{{$score->score_title}}</span>
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                                ارسال
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>







@endsection


@section('panel-script')

@endsection
