class Step1 extends index {
    constructor() {
        super();

    }


    stepOneStart() {

        if (this.lengthLi() < 1) {
            this.ajaxStart();
            this.post('/online/GetGrades', {}).done(function (result) {
                index.appendItems(result);
                console.log(result);
            });
        } else {
            index.ajaxBackStart();
            this.showItem("#online-items");
        }
    }

    completedStep = (stepTitle, stepItem) => {
        $(stepItem).text(stepTitle);
        $(stepItem).addClass('item-selected');

    }

    completing = (stepItem) => {
        $(stepItem).addClass('bg-warning');
    }

    completeEnd = (stepItem) => {
        $(stepItem).removeClass('bg-warning');
    }


    recordHandle = (tag) => {
        let turn = $('#turn').val();
        let dataID = $(tag).attr("data-id");
        let step = $(tag).text();
        let data = {'turn': turn, 'step': step, 'dataID': dataID};
        index.ajaxBackStart()
        this.post('/online/recordHandle', data).done(function (result) {
            if (turn === "6") {
                const date = $('.date');
                date.removeClass('bg-warning');
                date.text(result[2]);
                date.addClass('item-selected');
                $('.set-record').addClass('bg-warning');
                // end record select
                index.endRecordSteps();
            }
            if (result[1] === 7) {
                $('#online-items').append(result[0]);
            } else {
                index.appendItems(result[0], result[1]);
            }
            if (result[1] === 5) {
                index.disableTomorrowDate();
            }
        });
        index.ajaxBackEnd();
        switch (turn) {
            case "1":
                this.completing('.grade');
                break;
            case "3":
                this.completeEnd('.grade')
                this.completedStep(step, '.grade');
                this.completing('.time');
                break;
            case "4":
                this.completeEnd('.time')
                this.completedStep(step, '.time');
                this.completing('.date');
                break;

            case "7":
                this.completeEnd('.set-record')
                this.completedStep(step, '.set-record');
                break;

        }
    }

    turnManager = (item) => {
        if ($(item).hasClass('bg-warning')) {
            this.stepOneStart();
        }
        // else  show select error
    }

}

