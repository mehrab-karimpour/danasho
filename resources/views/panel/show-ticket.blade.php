@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('css/panel/new-ticket.css')}}">
@endsection

@section('panel-content')



    <section id="show-ticket" class="container-fluid bg-white rounded-lg">

        <div class="row  flex-items-sm-center">
            <div class="col-12 col-sm-10 col-md-10 py-2 clearfix">
                <div><strong>موضوع :</strong></div>
                <div>
                    <p class="text-justify direction-rtl">
                        <strong class="text-primary">{{$ticket->subject}}</strong>
                    </p>
                </div>
            </div>
        </div>
        <div class="row  flex-items-sm-center">
            <div class="col-12 col-sm-10 col-md-10 py-2 clearfix">
                <div><strong>متن : </strong></div>
                <div>
                    <p class="text-justify direction-rtl">
                        {{$ticket->description}}
                    </p>
                </div>
            </div>
        </div>
        <div id="conversation" class="row">
            <div id="conversation__item">
                <div id="right-conversation" class="col-12 col-md-6  bg-dark">
                    <div class="conversation-title">
                        <img class="img-md rounded-circle" src="/files/{{auth()->user()->img}}" alt="">
                        <h5>محراب کریم پور</h5>
                    </div>
                    <div class="conversation-body">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                        مورد
                        نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد
                        گذشته
                        گیرد.
                    </div>
                </div>
            </div>

            <div id="conversation__item">
                <div id="left-conversation" class="col-12 col-md-7  bg-dark">
                    <div class="conversation-title">
                        <img class="img-md rounded-circle" src="/files/{{auth()->user()->img}}" alt="">
                        <h5>محراب کریم پور</h5>
                    </div>
                    <div class="conversation-body">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                        مورد
                        نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد
                        گذشته
                        گیرد.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid bg-light m-0 p-0" id="send-box-parent">
        <div class="row p-0 m-0">
            <div id="send-box" class="col-12 col-sm-10 col-md-8 col-lg-6 m-auto m-0">
                <div class="select-file">
                    <i class="fas fa-folder-open"></i>
                    <input type="file" class="form-control">
                </div>
                <div class="message-text">
                    <label for="message"></label>
                    <input id="message" placeholder="پیام خود را اینجا بنویسید" type="text">
                </div>
                <div class="send-icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
            </div>
        </div>
    </section>



@endsection


@section('panel-script')

@endsection
