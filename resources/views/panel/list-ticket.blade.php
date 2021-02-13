@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('css/panel/new-ticket.css')}}">
@endsection

@section('panel-content')



    <section id="list-ticket" class="container-fluid bg-white rounded-lg">
        <div class="row  flex-items-sm-center">
            <div class="col-12 col-sm-10 col-md-10 py-2 clearfix">
                <h5 class="text-right direction-rtl">
                    لیست تیکت ها
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 m-0 m-auto">
                <table class="table table-striped table-hover  rounded-lg">
                    <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col">اخرین به روزرسانی</th>
                        <th scope="col">موضوع</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">مشاهده</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <th>{{returnCreatedAtJalali($ticket->updated_at,"-")}}</th>
                            <td>{{$ticket->subject}}</td>
                            <td>{{$ticket->status ? 'بسته' :'باز'}}</td>
                            <td>
                                <a href="{{route('panel.show.ticket',$ticket->id)}}">
                                    مشاهده
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>







@endsection


@section('panel-script')

@endsection
