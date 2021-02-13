class StepOffline_2 extends indexOffline {
    constructor() {
        super();
    }

    startStep = (actionType) => {
        $('.go-back-offline').empty();
        this.circleSelect(2, 0);
        $('.ajax-back').fadeIn();
        this.completing('.question-count');
        indexOffline.stepsTitle('انتخاب تعداد سوالات و هزینه آن');
        const price = window.prices.filter((obg) => {
            return obg.grade_id === parseInt(window.grade_id);
        });
        if (window.questions[0].title.length < 5) {
            for (let i = 0; i < window.questions.length; i++) {
                window.questions[i].title = "" +   window.questions[i].title  + " تا " +(parseInt(window.questions[i].title) + 3)+ " سوال " + (parseInt(window.questions[i].title)) * price[0].title + " هزار تومان ";
                /*if (i < 1) {
                    window.questions[i].title = window.questions[i].title + " سوال " + (parseInt(window.questions[i].title)) * price[0].title + "  هزار تومان ";
                } else {
                    window.questions[i].title = "" + (window.questions[i].title) - 3 + " تا " + window.questions[i].title + " سوال " + (parseInt(window.questions[i].title)) * price[0].title + " هزار تومان ";
                }*/

            }
        }
        console.log(window.questions)
        Step2.appendItems(window.questions, 4);
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
