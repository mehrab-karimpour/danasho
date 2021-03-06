class Step3 extends index {
    constructor(props) {
        super(props);
    }

    startStep = (actionType) => {
        if (window.dates === window.periods) {
            this.ajaxStart();
            this.post('/online/getDates', {}).then((response) => {
                if (response === 'error') {
                    index.alertOnlineClass(0, 'error');
                } else {
                    window.dates = response['dates'];
                    window.periods = response['periods'];
                    $('.go-back').empty();
                    this.circleSelect(2, 0);
                    $('.ajax-back').fadeIn();
                    this.completing('.date');
                    index.stepsTitle('انتخاب روز و محدوده زمانی مورد نظر');
                    Step2.appendItems(window.dates, 5);
                    index.disableTomorrowDate();
                }
                Step3.ajaxBackEnd();

            })
        } else {
            $('.go-back').empty();
            this.circleSelect(2, 0);
            $('.ajax-back').fadeIn();
            this.completing('.date');
            index.stepsTitle('انتخاب روز و محدوده زمانی مورد نظر');
            Step2.appendItems(window.dates, 5);
            index.disableTomorrowDate();
        }

    }

    stepHandle = (tag, data) => {

        this.addButtonBack('.date');
        this.circleSelect(2, 1);
        if (tag === 6) {
            Step2.appendInput('periodID', 'periodId', data.dataID);
            data.value = window.dateTitle + data.value;
            this.endStep(data);
        } else {
            index.appendInput('date-input', 'date', data.dataID);
            Step2.appendItems(window.periods, 6);
            if ($(tag).hasClass('after-day')) {
                index.disableTomorrowDate();
            }
            window.dateTitle = data.value;
        }
    }


    endStep = (data) => {
        index.appendInput('period-input', 'period', data.value);
        Step1.completedStep(data.value, '.date ');
        Step1.completeEnd('.date');
    }


}
