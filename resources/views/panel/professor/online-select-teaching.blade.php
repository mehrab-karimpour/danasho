@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('css/panel/online-select-teaching.css')}}">
@endsection

@section('panel-content')


    {{--<section class="container" id="online-selected-teaching">
        <form class="col-12 row">

        </form>
    </section>--}}
    <div class="container-fluid" id="online-selected-teaching">
        <form method="post" action="{{route('panel.online-select-teaching-record')}}"
              class="row">
            @csrf

        </form>

    </div>
    <br>
    @if(session('status')==='success')
        <div class="alert alert-success">
            دروس انتخاب شده با موفقیت به لیست تدریس شما افزوده شد .
        </div>
    @endif
    @if(session('status')==='error')
        <div class="alert alert-danger">
            با عرض پوزش ! متاسفانه عملیات افزودن دروس با شکست مواجه شد ! لطفا دوباره تلاش فرمایید
        </div>
    @endif
    <div id="accordion" class="myaccordion">
        @foreach($books as $book)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed"
                                data-toggle="collapse" data-target="#i{{$book->id}}d" aria-expanded="false"
                                aria-controls="collapseOne">
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                        </span>

                            {{$book->title}}

                        </button>
                    </h2>
                </div>
                <div id="i{{$book->id}}d" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <ul class="select-online-teaching-parents">
                            @foreach($book->lessons as $lesson)
                                <li data-id="{{$lesson->id}}">{{$lesson->title}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


@endsection


@section('panel-script')
    <script src="{{asset('js/panel/online-select-teaching.js')}}"></script>
@endsection
