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
            @foreach($messages as $message)
                @if($message->type)
                    {{-- <div id="conversation__item">
                     <div id="left-conversation" class="col-12 col-md-7  bg-dark">
                         <div class="conversation-title">
                             <img class="img-md rounded-circle" src="/files/{{auth()->user()->img}}" alt="">
                             <h5>محراب کریم پور</h5>
                         </div>
                         <div class="conversation-body">
                             لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                             است،
                             چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی
                             تکنولوژی
                             مورد
                             نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                             درصد
                             گذشته
                             گیرد.
                         </div>
                     </div>
                 </div>--}}
                @else
                    <div id="conversation__item">
                        <div id="right-conversation" class="col-12 col-md-6  bg-dark">
                            <div class="conversation-title">
                                <img class="img-md rounded-circle" src="/files/{{auth()->user()->img}}" alt="">
                                <h5>محراب کریم پور</h5>
                            </div>
                            <div class="conversation-body">
                                {{$message->message}}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>


    <section class="container-fluid bg-white m-0 p-0" id="send-box-parent">


        <div class="row p-0 m-0">
            <form method="post" action="{{route('panel.send.message')}}" id="send-box"
                  enctype="multipart/form-data"
                  class="col-12 col-sm-10 col-md-8 col-lg-6 m-auto m-0">
                @csrf
                <input id="ticket-id" name="ticket-id" type="hidden" value="{{$ticket->id}}">
                <div class="select-file">
                    <span class="show-file-name"></span>
                    <i class="fas fa-folder-open"></i>
                    <input id="ticket-file" name="file-ticket" type="file" class="form-control">
                </div>
                <div class="message-text">
                    <label for="message"></label>
                    <input type="text" name="message" id="message" placeholder="پیام خود را اینجا بنویسید">
                </div>
                <div class="send-icon">
                    <i class="fas opacity-low fa-paper-plane"></i>
                </div>
            </form>
        </div>
        @csrf
    </section>


    <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content alert alert-danger">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">

                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    حجم فایل باید کمتر از 10 مگابایت باشد
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        متوجه شدم !
                    </button>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('panel-script')
    <script src="{{asset('js/panel/ticket.js')}}"></script>
@endsection
