<section class="col-12 col-md-10  col-xl-8 p-2 end-step-section" id="online-items-end-step">
    <span class="d-block mt-2 ml-1 "><i class="fas fa-times end-step-close cursor-pointer"></i></span>
    <h5 class="text-center direction-rtl">جهت افزایش کیفیت کلاس لطفا موارد زیر را تکمیل نمایید :</h5>
    <hr class="m-2">
    <p class="text-right direction-rtl">سطح خود را انتخاب کنید <small
            class="text-warning">(لطفا این فیلد را کامل کنید)</small></p>
    <label for="level" class="text-center"></label>
    <div class="form-item-parent">
        <div class="d-flex justify-content-around col-12">
            <div>
                <p>ضعیف</p>
                <input name="level" value="ضعیف" class="custom-radio" id="level" type="radio">
            </div>
            <div>
                <p>متوسط</p>
                <input name="level" value="متوسط" class="custom-radio" id="level" type="radio">
            </div>
            <div>
                <p>خوب</p>
                <input name="level" value="خوب" class="custom-radio" id="level" type="radio">
            </div>
            <div>
                <p>عالی</p>
                <input name="level" value="عالی" class="custom-radio" id="level" type="radio">
            </div>
        </div>
    </div>
    <p class="text-right direction-rtl mt-2">تصویر سوالاتی که قصد رفع اشکال انها را دارید اپلود کنید .<small
            class="text-success">(اختیاری)</small></p>
    <div class="form-item-parent">
        <div class="d-flex justify-content-center col-12">
            <div class="col-12 col-md-3 col-xl-2">
                <label for="questions"></label>
                <input type="file" class="form-control" name="img" id="questions">
            </div>
        </div>
    </div>
    <p class="text-right direction-rtl mt-2">هر گونه توضیح تکمیلی که به بهبود کیفیت کلاس شما کمک میکند را در زیر
        وارد کنید </p>
    <p class="text-right m-0 p-0">(میتواند شامل مبحث مورد نطر باشد ) <small
            class="text-warning">(لطفا این فیلد را کامل کنید)</small></p>
    <label for="description"></label>
    <div class="form-item-parent">
            <textarea class="form-control" name="description" id="description"
                      placeholder="لطفا توصیحات خود را وارد کنید"></textarea>
    </div>
    <div class="d-flex justify-content-around col-12 mt-2">
        <button type="button" onclick="recordHandle(this,7)" class="btn btn-primary next-record">مرحله بعد</button>

    </div>

</section>
