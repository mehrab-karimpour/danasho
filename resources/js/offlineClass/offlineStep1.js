class StepOffline_1 extends indexOffline {
    constructor() {
        super();
        window.grades = {};
    }

    startStep = (actionType) => {

        $('.go-back').empty();
        this.circleSelect(3, 0);
        this.completing('.grade-offline');
        indexOffline.stepsTitle('انتخاب مقطع تحصیلی');
        this.ajaxStart();
        this.post('/offline', {}).then((data) => {
            window.grades = data.grades;
            window.units = data.units;
            window.lessons = data.lessons;
            window.questions = data.questions;
            window.prices = data.prices;
            window.dates = data.dates;
            window.periods = data.periods;
            console.log(window.questions)
            StepOffline_1.appendItems(window.grades, 1);
            setTimeout(() => {
                Step1.ajaxBackEnd();
            }, 200);
        });

    }

    stepHandle = (turn, data) => {
        this.addButtonBack('.grade-offline');
        switch (turn) {
            case 1:
                this.circleSelect(3, 1);
                // record grade
                window.grade_id = data.dataID;
                $('#online-form-items').append("<input type='hidden' name='grade_id' value='" + window.grade_id + "'>");
                indexOffline.stepsTitle('انتخاب پایه تحصیلی');
                indexOffline.appendInput('grade-input', 'grade', data.value);
                const units = window.units.filter((obg) => {
                    return obg.grade_id === parseInt(data.dataID);
                })
                indexOffline.appendItems(units, 2);
                break;
            case 2:
                this.circleSelect(3, 2);
                indexOffline.stepsTitle('انتخاب درس');
                indexOffline.appendInput('unit-input', 'unit', data.value);
                const lessons = window.lessons.filter((obg) => {
                    return obg.unit_id === parseInt(data.dataID);
                })
                indexOffline.appendItems(lessons, 3);
                break;

            case 3:
                this.endStep(data);
        }
    }

    endStep = (data) => {
        indexOffline.appendInput('lesson-input', 'lesson', data.value);
        indexOffline.completedStep(data.value, '.grade-offline');
        indexOffline.completeEnd('.grade-offline');

    }

}
