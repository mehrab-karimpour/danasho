<section class="col-12 col-md-5 d-block col-xl-4" id="offline-items">
    <br><h5 class='step-title-offline text-center'>
    </h5><input type='hidden' id='turn-offline' name='turn-offline' value='1'>
    <input type='hidden' id='edit-offline' name='edit-offline' value='0'>
    <span onclick='offlineModalClose()' class='d-block mt-2 ml-1 '>
        <i class='fas fa-times offline-steps-close cursor-pointer'></i>
    </span>
    <div id='list-parent'></div>
    <div class="form-item-parent">
        <div class='col-12 d-flex justify-content-around'>
            <input class='form-control text-right col-12 col-md-5'
                   name="offline_name"
                   id='offline_name' type='text'
                   placeholder='نام '>
            <label for='offline_name' class='col-12 text-right direction-rtl col-md-6'>نام و نام خانوادگی :
            </label>
        </div>
    </div>
    <br>
    <div class="form-item-parent">
        <div class='col-12 d-flex justify-content-around'>
            <input class='form-control text-right col-12 col-md-5' id='offline_mobile' type='number'
                   name="offline_mobile"
                   placeholder='شماره موبایل '>
            <label for='offline_mobile' class='col-12 text-right direction-rtl col-md-6'>شماره موبایل خود را وارد کنید
                : </label>
        </div>
    </div>
    <br>
    <div class="form-item-parent">

    </div>


    <div class='col-12 d-flex justify-content-around'><br><br><br><br><br><br><br>
        <button class='btn btn-primary last-record__submit-offline' onclick='offlineRecorder(this,8)'>تایید</button>
        <button class='btn btn-secondary'>بازگشت به مرحله قبل</button>
    </div>
    <div class='col-12 d-flex justify-content-around ' id='verify-code-offline'>

    </div>
    <div class="timer-parent-offline">

    </div>
    <div class='col-6 col-md-4 col-xl-2 circle-select-offline'><span class='circle-select-active'></span></div>
    <br>
    <div class='go-back-offline text-right'></div>
    <br/>
</section>

{{--<section class="col-12 col-md-5 col-xl-4" id="offline-items">
    <br>
    <h5 class="step-title-offline text-center"></h5>

    <input type="hidden"  id="turn-offline" name="turn-offline" value="1">
    <input type="hidden"  id="edit-offline" name="edit-offline" value="0">
    <span onclick="offlineModalClose()" class="d-block mt-2 ml-1 "><i class="fas fa-times offline-steps-close cursor-pointer"></i></span>
    <div id="list-parent"></div>
    <div class="col-12 d-flex justify-content-center">
        <ul class='list-group m-0 p-0' id="list-group-offline">

        </ul>
    </div>
    <div class="col-6 col-md-4 col-xl-2 circle-select-offline">
        <span class="circle-select-active"></span>
        <span></span>
        <span></span>
    </div>
    <br>
    <div class="go-back-offline text-right">

    </div>
    <br/>
</section>--}}
