<section class="col-12 mt-8 col-md-10 col-xl-8 p-2 end-step-section" id="last-step-record">
    <form>
        <span class="d-block mt-2 ml-1 "><i class="fas fa-times end-step-close cursor-pointer"></i></span>
        <h5 class="text-center direction-rtl">لطفا مشخصات خود را وارد نمایید </h5>
        <br>
        <div class="form-item-parent">
            <div class="col-12 col-md-8 m-0 m-auto d-md-flex d-block justify-content-around">
                <input type="text" class="form-control col-12 col-md-6" name="name" id="name"
                       placeholder="نام کامل">
                <label for="name" class="col-12 col-md-6 text-right">نام و نام خانوادگی خود را وارد کنید</label>
            </div>
        </div>

        <br>
        <br>
        <div class="form-item-parent">
            <div class="col-12 col-md-8 m-0 m-auto d-md-flex d-block justify-content-around">
                <input type="number" class="form-control col-12 col-md-6" name="mobile" id="mobile"
                       placeholder="شماره تماس">
                <label for="mobile" class="col-12 col-md-6 text-right">شماره تماس خود را وارد کنید</label>
            </div>
        </div>
        <br>
        <br>
        <div class="form-item-parent  d-none dont-show-password-section"
             id="password-verify-parent">
            <div class="form-item-parent">
                <div class="col-12 col-md-8 m-0 m-auto d-md-flex d-block justify-content-around">
                    <input type="number" class="form-control col-12 col-md-6 text-center" name="verify-token" id="verify-token"
                           placeholder="کد ارسال شده را  وارد کنید">
                    <label for="verify-token" class="text-right"></label>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2" id="timer-parent">
                <span class="timer">120</span>
            </div>
        </div>
        <div class="resend-verify-token text-center">

        </div>
        <br>

        <br>

        <div class="d-flex justify-content-center col-12 mt-2">
            <button type="button" onclick="recordHandle(this,8)" class="verify-password-button btn btn-primary mr-4 ml-4 last-record__submit">
                تایید
            </button>
            <button type="button" onclick="itemsStart(4,'.set-record')" class="btn btn-secondary mr-4 ml-4">مرحله قبل
            </button>
        </div>
    </form>
</section>
