class StepOffline_3 extends indexOffline {
    constructor() {
        super();
    }

    static endStep = (stepTitle) => {
        indexOffline.completeEnd('.date-get-answer');
        indexOffline.completedStep(stepTitle, '.date-get-answer');
        let offlineItem = $('#offline-items');
        $('.ajax-back').fadeOut();
        offlineItem.css("opacity", "0");
        offlineItem.empty();
        offlineItem.append("<br><h5 class='step-title-offline text-center'></h5><input type='hidden' id='turn-offline' name='turn-offline' value='1'><input type='hidden' id='edit-offline' name='edit-offline' value='0'><span onclick='offlineModalClose()' class='d-block mt-2 ml-1 '><i class='fas fa-times offline-steps-close cursor-pointer'></i></span><div id='list-parent'></div><div class='form-item-parent'><div class='col-12 d-flex justify-content-around'><input class='form-control text-right col-12 col-md-5' name='offline_name' id='offline_name' type='text' placeholder='نام '><label for='offline_name' class='col-12 text-right direction-rtl col-md-6'>نام و نام خانوادگی :</label></div></div><br><div class='form-item-parent'><div class='col-12 d-flex justify-content-around'><input class='form-control text-right col-12 col-md-5' id='offline_mobile' type='number' name='offline_mobile' placeholder='شماره موبایل '><label for='offline_mobile' class='col-12 text-right direction-rtl col-md-6'>شماره موبایل خود را وارد کنید : </label></div></div><br><div class='col-12' id='verify-code-offline'></div><br><div class='form-item-parent'></div><div class='timer-parent-offline form-item-parent'></div><div class='col-12 d-flex justify-content-around'><br><br><br><br><br><br><br><button class='btn btn-primary last-record__submit-offline' onclick='offlineRecorder(this,8)'>تایید</button><button class='btn btn-secondary'>بازگشت به مرحله قبل</button></div><div class='col-6 col-md-4 col-xl-2 circle-select-offline'><span class='circle-select-active'></span></div><br><div class='go-back-offline text-right'></div><br/>");
        setTimeout(() => {
            $('#offline-items').fadeOut();
        }, 1000);
    }

    startStep = () => {
        $('.ajax-back').fadeIn(0);
        indexOffline.offlineAppendItems(window.offlineDate[0], window.offlineDate[1]);
        let firstItem = $('#list-group-offline li').eq(0);
        firstItem.removeAttr('onclick');
        firstItem.addClass('bg-danger');
    }

    handleStep = (url, data) => {
        let goBack = $('.go-back-offline');
        goBack.empty();
        goBack.append("<button class='btn btn-secondary' onclick='itemHandle(3,window.offlineDate,3)'>بازگشت به عقب</button>");
        let circleSelect = $('.circle-select-offline span');
        circleSelect.removeClass("circle-select-active");
        circleSelect.eq(1).addClass("circle-select-active");
        $('.step-title-offline').text('انتخاب محدوده زمانی مورد نظر');
        this.post(url, data).then(function (result) {
            indexOffline.offlineAppendItems(result[0], result[1]);
            if (result[2] === 1) {
                let firstItem = $('#list-group-offline li').eq(0);
                firstItem.removeAttr('onclick');
                firstItem.addClass('bg-danger');
            }
        });
        if (data['turn'] === 6) {
            window.dateOffline = data['step'];
        }
        if (data['turn'] === 7) {
            let stepThreeTitle = window.dateOffline + data['step'];
            StepOffline_3.endStep(stepThreeTitle);
        }
    }

}
