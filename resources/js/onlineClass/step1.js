class Step1 extends index {
    constructor() {
        super();
        window.grades = {};
    }

    gradeHandle = () => {
        $('.step-title').text('انتخاب مقطع تحصیلی');
        let turn = $("input[name='turn']").val();
        step1.completing('.grade');
        this.ajaxStart();
        this.post('/online/GetGrades', {}).done(function (result) {
            index.ajaxBackEnd();
            window.grades = result;
            index.appendItems(result);
        });
    }

    goBack = () => {
        let goBack = $('.go-back');
        goBack.empty();
        goBack.append("<button onclick='goBackGrade()' class='btn float-right btn-secondary mb-5'> قبلی</button>");
    }

    stepOneHandle = (url, data) => {
        this.ajaxStart();
        this.post(url, data).done(function (result) {
            window.grades = result;
            if (data['turn'] === 3) {
                $("#online-items").fadeOut();
                $('.ajax-back').fadeOut();
                index.completeEnd('.grade');
                index.completedStep(data['step'], '.grade');
                window.time = result;
            } else {
                index.appendItems(result[0], result[1]);
            }

            let circleSelect = $('.circle-select span');
            circleSelect.removeClass('circle-select-active');
            const stepTitle=$('.step-title');
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
            index.ajaxBackEnd();
        });
        this.goBack();
    }


}

