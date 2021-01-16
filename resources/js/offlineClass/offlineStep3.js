class StepOffline_3 extends indexOffline {
    constructor() {
        super();
    }

    static endStep = (stepTitle) => {

    }

    startStep = () => {
        $('.ajax-back').fadeIn(0);
        indexOffline.offlineAppendItems(window.offlineDate[0], window.offlineDate[1]);
        let firstItem = $('#list-group-offline li').eq(0);
        firstItem.removeAttr('onclick');
        firstItem.addClass('bg-danger');
    }

    handleStep = (url, data) => {
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
    }

}
