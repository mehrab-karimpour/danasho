class Step2 extends index {
    constructor() {
        super();
    }

    timeHandle = () => {
        $('.step-title').text('انتخاب مدت زمان کلاس انلاین و هزینه آن');
        this.ajaxStart();
        this.completing('.time');
        index.appendItems(window.time[0], window.time[1]);
        this.showItem('#online-items');
    }

    timeEdit = () => {

        $('.step-title').text('انتخاب مدت زمان کلاس انلاین و هزینه آن');

        this.ajaxStart();
        this.post('/online/getTime', {}).done(function (result) {
            index.appendItems(result[0], result[1]);
        });
        $('#ajax-loader').fadeOut();
        $('#ajax-leader-back').fadeOut(200);
    }


    stepTwoHandle = (url, data) => {
        this.ajaxStart();
        this.post(url, data).done(function (result) {
            index.ajaxLoaderEnd();
            $("#online-items").fadeOut();
            $('.ajax-back').fadeOut();
            index.completeEnd('.time');
            index.completedStep(data['step'], '.time');
            window.date = result;
            index.ajaxBackEnd();
        });
    }
}
