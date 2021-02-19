class StepOffline_3 extends indexOffline {
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
                    this.completing('.date-get-answer');
                    indexOffline.stepsTitle('انتخاب روز و محدوده زمانی مورد نظر');
                    indexOffline.appendItems(window.dates, 5);
                    indexOffline.disableTomorrowDate();
                }
                indexOffline.ajaxBackEnd();

            })
        } else {

            console.log(window.periods);
            if ($('#list-group-offline').length === 0) {
                $('#main-parent-item-offline').append("<ul class='list-group m-0 p-0' id='list-group-offline'></ul>");
            }
            $('.go-back-offline').empty();
            this.circleSelect(2, 0);
            $('.ajax-back').fadeIn();
            this.completing('.date-get-answer');
            indexOffline.stepsTitle('انتخاب روز و محدوده زمانی مورد نظر');
            indexOffline.appendItems(window.dates, 6);
            indexOffline.disableTomorrowDate();
        }

    }

    stepHandle = (tag, data) => {
        this.addButtonBack('.date-get-answer');
        this.circleSelect(2, 1);
        if (tag === 7) {
            alert("ok 7")
            data.value = window.dateTitle + data.value;
            this.endStep(data);
        } else {
            indexOffline.appendInput('date-offline-input', 'date-get-answer', data.dataID);
            indexOffline.appendItems(window.periods, 7);
            if ($(tag).hasClass('after-day')) {

                indexOffline.disableTomorrowDate();
            }
            window.dateTitle = data.value;
        }
    }


    endStep = (data) => {
        indexOffline.appendInput('period-offline-input', 'period-offline', data.value);
        indexOffline.completedStep(data.value, '.date-get-answer ');
        indexOffline.completeEnd('.date-get-answer');
    }


}
