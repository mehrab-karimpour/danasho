@extends('Client.layout.main')

@section('client.css')
    <link rel="stylesheet" href="{{asset('css/online-success.css')}}">

@endsection

@section('client.content')

    <div class="success-message col-12 col-md-12">
        <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">
            <circle cx="38" cy="38" r="36"/>
            <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7"/>
        </svg>
        <h1 class="success-message__title col-12 text-center direction-rtl"> کلاس شما با موفقیت ایجاد شد </h1>
        <div class="success-message__content"></div>
        <a href="/panel" class="btn btn-primary text-white fa-bold">
            ورود به پنل کاربری
        </a>
    </div>


    <script>
        function PathLoader(el) {
            this.el = el;
            this.strokeLength = el.getTotalLength();

            // set dash offset to 0
            this.el.style.strokeDasharray =
                this.el.style.strokeDashoffset = this.strokeLength;
        }

        PathLoader.prototype._draw = function (val) {
            this.el.style.strokeDashoffset = this.strokeLength * (1 - val);
        }

        PathLoader.prototype.setProgress = function (val, cb) {
            this._draw(val);
            if(cb && typeof cb === 'function') cb();
        }

        PathLoader.prototype.setProgressFn = function (fn) {
            if(typeof fn === 'function') fn(this);
        }

        var body = document.body,
            svg = document.querySelector('svg path');

        if(svg !== null) {
            svg = new PathLoader(svg);

            setTimeout(function () {
                document.body.classList.add('active');
                svg.setProgress(1);
            }, 200);
        }

        document.addEventListener('click', function () {

            if(document.body.classList.contains('active')) {
                document.body.classList.remove('active');
                svg.setProgress(0);
                return;
            }
            document.body.classList.add('active');
            svg.setProgress(1);
        });
    </script>


@endsection

@section('client.script')
    <script src="{{asset('js/header.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
@endsection
