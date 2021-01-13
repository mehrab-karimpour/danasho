class StepOffline_1 extends indexOffline {
    constructor() {
        super();
        window.grades = {};
    }

    static goBackMaker = () => {
        let goBack = $('.go-back-offline');
        goBack.empty();
        goBack.append("<button onclick='goBackGradeOffline()' class='btn float-right btn-secondary mb-5'> قبلی</button>");
    }

    gradeHandle = () => {
        $('.step-title-offline').text('انتخاب مقطع تحصیلی');
        this.completing('.grade-offline');
        let turn = $("input[name='turn-indexOffline']").val();

        this.ajaxStart();
        this.post('/online/GetGrades', {}).done(function (result) {
            indexOffline.ajaxBackEnd();
            indexOffline.offlineAppendItems(result);
        });
    }

    stepOneHandle = (url, data) => {
        this.ajaxStart();
        this.post(url, data).done(function (result) {
            window.offlinegrades = result;
            if (data['turn'] === 3) {
                $("#offline-items").fadeOut();
                $('.ajax-back').fadeOut();
                indexOffline.completeEnd('.grade-offline');
                indexOffline.completedStep(data['step'], '.grade-offline');
                window.time = result;
            } else {
                indexOffline.offlineAppendItems(result[0], result[1]);
            }
            let circleSelect = $('.circle-select-offline span');
            circleSelect.removeClass('circle-select-active');
            const stepTitle = $('.step-title-offline');
            switch (data['turn']) {
                case 1:
                    StepOffline_1.goBackMaker();
                    circleSelect.eq(1).addClass("circle-select-active");
                    stepTitle.text('انتخاب پایه  تحصیلی');
                    break;
                case 2:
                    circleSelect.eq(2).addClass("circle-select-active");
                    stepTitle.text('انتخاب درس');
                    break;
            }
            indexOffline.ajaxBackEnd();

        });
        this.goBackMaker();
    }


}
