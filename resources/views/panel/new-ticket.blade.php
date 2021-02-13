@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('css/panel/new-ticket.css')}}">
@endsection

@section('panel-content')



    <section id="home" class="container-fluid">
        <div class="row  flex-items-sm-center">
            <div class="col-12 col-sm-10 col-md-10 py-2 clearfix">
                <h5 class="text-right direction-rtl">
                    ارسال تیکت جدید
                </h5>
            </div>
        </div>
        @if($errors->any)
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 m-0 m-auto text-center">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger direction-rtl text-center  ">
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if(session('status')==='error')
            <div class="alert alert-danger direction-rtl text-right">
                با عرض پوزش , درخواست شما انجام نشد لطفا دوباره تلاش کنید !
            </div>
        @endif
        @if(session('status')==='success')
            <div class="alert alert-success direction-rtl text-right">
                تیکت شما با موفقیت ایجاد شد . برای دیدن آن به قسمت لیست تیکت ها مراجعه کنید .
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <form method="post" action=""
                      class="col-12 col-sm-10 col-md-8 col-lg-6 pt-3 pb-3 bg-white rounded-lg m-0 m-auto"
                      id="new-ticket">
                    @csrf

                    <div class="col-12 d-block d-md-flex justify-content-between">
                        <div class="form-group">
                            <p>موضوع تیکت :</p>
                        </div>
                        <div class="form-group">
                            <label for="subject"></label>
                            <input type="text" class="form-control" id="subject"
                                   name="subject"
                                   value=""
                                   placeholder="موضوع پیام را وارد نمایید ">
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-between">
                        <p>متن :</p>
                    </div>
                    <div class="col-12 d-flex justify-content-between">

                        <label for="description"></label>
                        <textarea id="description" name="description" class="form-control min-h-30"
                                  placeholder="لطفا متن تیکت را وارد کنید">

                            </textarea>

                    </div>
                    <br>
                    <div class="col-12 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>

                    <br>
                </form>
            </div>
        </div>


    </section>







@endsection


@section('panel-script')

@endsection
