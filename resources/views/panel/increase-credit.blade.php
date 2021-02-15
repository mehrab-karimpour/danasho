@extends('panel.layout')

@section('panel-link')
    <link rel="stylesheet" href="{{asset('/css/panel/increase-credit.css')}}">
@endsection

@section('panel-content')

    <section id="increase-credit" class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h5>افزایش اعتبار</h5>
                <br><br>
            </div>
        </div>
        <div class="row">
            @foreach($creditItems as $creditItem)
                <div data-credit="{{$creditItem->amount}}"  class="credit-item card col-12 col-sm-6 col-md-3">
                    <div class="card-body">
                        <p class="text-center">افزایش اعتبار</p>
                        <p class="text-center">{{$creditItem->amount}} ریال</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <br><br>
            <form class="col-12 m-0 m-auto">
                <div class="form-group">
                    <label for="amount" class="text-center col-12">
                        مبلغ دلخواه خود را با ریال وارد کنید :
                    </label>
                    <input type="number"
                           name="amount"
                           class="form-control col-12 col-md-5 m-auto m-0 text-center"
                           id="amount"
                           placeholder="مبلغ به ریال">

                </div>
                <input type="hidden" id="main-amount" name="main-amount">
            </form>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-md-5 col-lg-4 m-auto m-0 card">
                <div class="card-body d-flex justify-content-between">
                    <p>اعتبار فعلی شما :</p>
                    <p>{{$userCredit->creditLevel}} ریال</p>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <p>مبلغ افزایش اعتبار :</p>
                    <p class="amount-increase-item-show text-success">0 ریال</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button type="button"  class="btn btn-success credit-submit">
                    پرداخت
                </button>
            </div>
        </div>
    </section>

    <div class="modal fade" id="amount-is-low" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content alert alert-danger">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body direction-rtl">
                    مبلغ اعتبار باید بیشتر از 10 هزار تومان باشد !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        متوجه شدم
                    </button>

                </div>
            </div>
        </div>
    </div>



@endsection


@section('panel-script')
    <script src="{{asset('js/panel/increase-credit.js')}}"></script>
@endsection
