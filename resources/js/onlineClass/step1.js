class Step1 extends index {
    constructor() {
        super();
    }

    startStep = (actionType) => {
        this.completing('.grade');
        index.stepsTitle('انتخاب مقطع تحصیلی');
        this.ajaxStart();

        this.post('/online', {}).then((data) => {
            window.grades = data.grades;
            window.units = data.units;
            window.lessons = data.lessons;
            window.times = data.times;
            window.prices = data.prices;
            window.dates = data.dates;
            window.periods = data.periods;
            Step1.appendItems(window.grades, 1);
            setTimeout(() => {
                Step1.ajaxBackEnd();
            }, 200)
        });

    }

    stepHandle = (turn, data) => {
        switch (turn) {
            case 1:
                // record grade
                window.grade_id = data.dataID;
                index.stepsTitle('انتخاب پایه تحصیلی');
                index.appendInput('grade-input', 'grade', data.value);
                const units = window.units.filter((obg) => {
                    return obg.grade_id === parseInt(data.dataID);
                })
                Step1.appendItems(units, 2);
                break;
            case 2:
                index.stepsTitle('انتخاب درس');
                index.appendInput('unit-input', 'unit', data.value);
                const lessons = window.lessons.filter((obg) => {
                    return obg.unit_id === parseInt(data.dataID);
                })
                Step1.appendItems(lessons, 3);
                break;

            case 3:
                this.endStep(data);
        }
    }

    endStep = (data) => {
        index.appendInput('lesson-input', 'lesson', data.value);
        Step1.completedStep(data.value, '.grade');
        Step1.completeEnd('.grade');

    }


}

