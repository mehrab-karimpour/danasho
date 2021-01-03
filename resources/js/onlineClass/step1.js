class Step1 extends index {
    constructor() {
        super();
        window.grades = {};
    }

    gradeHandle = () => {
        let turn = $("input[name='turn']").val();
        step1.completing('.grade');
        this.ajaxStart();
        this.post('/online/GetGrades', {}).done(function (result) {
            window.grades = result;
            index.appendItems(result);

        });
    }

    stepOneHandle = (url, data) => {
        this.ajaxStart();
        this.post(url, data).done(function (result) {
            window.grades = result;
            if (data['turn'] === 3) {
                index.ajaxLoaderEnd();
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
            switch (data['turn']) {
                case 1:
                    circleSelect.eq(1).addClass("circle-select-active");

                    break;
                case 2:
                    circleSelect.eq(2).addClass("circle-select-active");
                    break;
            }
        });
    }


}

