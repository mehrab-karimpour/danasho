@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/mobile.css')}}">
@endsection

@section('panel-content')

    <div class="container bg-white rounded-lg">
        <div class="row">
            <div class="col-12">
                <form action="{{route('online-form')}}" method="post" id="online-form-items" enctype="multipart/form-data">

                    @include('Client.index.onlineClass.index')

                    @include('Client.index.partials.error-select')

                    @include('Client.index.onlineClass.online-item-end-2')

                    @include('Client.index.onlineClass.online-item-end-1')

                    @include('Client.index.onlineClass.online-items')

                    {{--  online modal alert  --}}
                    @include('Client.index.partials.online-class-alert')

                    @include('partials.ajax-loader')

                    @include('Client.index.partials.ajax-back')
                </form>
            </div>
        </div>
    </div>



@endsection


@section('panel-script')
    <script src="{{asset('js/header.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
@endsection
