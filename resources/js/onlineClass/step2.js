class Step2 extends index {
    constructor() {
        super();
    }


    startStep = (actionType) => {
        $('.go-back').empty();
        this.circleSelect(1, 0);
        $('.ajax-back').fadeIn();
        this.completing('.time');
        index.stepsTitle('انتخاب مدت زمان کلاس انلاین و هزینه آن');
        const price = window.prices.filter((obg) => {
            return obg.grade_id === parseInt(window.grade_id);
        });
        if (window.times[0].title.length < 5) {
            for (let i = 0; i < window.times.length; i++) {
                window.times[i].title = window.times[i].title + " دقیقه " + (parseInt(window.times[i].title) / 15) * price[0].title + "  هزار تومان ";
            }
        }
        Step2.appendItems(window.times, 4);
    }

    stepHandle = (turn, data) => {
        this.endStep(data);
    }

    endStep = (data) => {
        index.appendInput('time-input', 'time', data.dataID);
        Step1.completedStep(data.value, '.time');
        Step1.completeEnd('.time');
    }


}
