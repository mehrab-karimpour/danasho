class StepOffline_1 extends indexOffline {
    constructor() {
        super();
        window.grades = {};
    }

    /*
     * every step has two main method . 1:start  , 2:handle
     * start method mey be constructor for every section .
     * handle method handled other items .
     * */
    static endStep = (stepTitle) => {
        indexOffline.completeEnd('.grade-offline');
        indexOffline.completedStep(stepTitle, '.grade-offline');
        $('#offline-items').fadeOut();
        $('.ajax-back').fadeOut();
    }

    startStep = (turn) => {
        $('.step-title-offline').text("انتخاب مقطع تحصیلی");
        $('.go-back-offline').empty();
        this.ajaxStart();
        const data = {'turn': turn};
        this.post('/online/GetGrades', data).then(function (result) {
            indexOffline.offlineAppendItems(result);
        });
        indexOffline.ajaxLoaderEnd();
    }

    handleStep = (url, data) => {
        this.ajaxStart();
        this.post('/offline/recordHandle', data).then(function (result) {
            if (data['turn'] === 3) {
                StepOffline_1.endStep(data['step']);

                // saved all questions in window.offlineQuestions because step two we have handel questions
                window.offlineQuestions = result;
            } else {
                indexOffline.offlineAppendItems(result[0], result[1]);
            }
        });
        indexOffline.ajaxLoaderEnd();
        /*
        * handle circle select .
        * */
        let circleSelect = $('.circle-select-offline span');
        circleSelect.removeClass('circle-select-active');
        const stepTitle=$('.step-title-offline');
        switch (data['turn']) {
            case 1:
                circleSelect.eq(1).addClass("circle-select-active");
                stepTitle.text('انتخاب پایه  تحصیلی');
                break;
            case 2:
                circleSelect.eq(2).addClass("circle-select-active");
                stepTitle.text('انتخاب درس');
                break;
        }
    }


}
