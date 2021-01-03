class index {
    constructor() {

    }

    //  in this function we checked before items has selected .appendItems
    checkSelect = (step) => {

        let constSelected = $('.online-selected').length;
        if (step > constSelected + 1) {
            $('.error-select').fadeIn();
            setTimeout(function () {
                $('.error-select').fadeOut();
            }, 2000)
            return false;
        }
        return true;
    }

    //  handle post request
    post = (url = '', data = {}) => {
        return $.post(
            url,
            data,
        );
    }

    static appendItems = (result, turn = 1) => {

        let onlineItems = $('#online-items');
        onlineItems.fadeIn(200);
        $('#online-items>div>ul').empty();
        window.turn = turn;
        $('#turn').val(turn);
        $.each(result, function (key, value) {
            let tag = "<li onclick='recordEvent(this,window.turn)' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                ">" + value['title'] + "</li>";
            $('#online-items>div>ul').append(tag);
        });
        setTimeout(() => {
            index.ajaxLoaderEnd();
        }, 200);

        if (turn===5){
            let firstDateItem=$('#online-items>div>ul li').eq(0);
            firstDateItem.removeAttr("onclick");
            firstDateItem.addClass('bg-danger');
        }
    }

    static disableTomorrowDate = () => {
        let TomorrowItem = $('#list-group>li').eq(0);
        TomorrowItem.eq(0).addClass("bg-danger");
        TomorrowItem.removeAttr("onClick");
    }

    static ajaxBackStart = () => {
        $(document).ajaxStart(function () {
            $('#ajax-loader').fadeIn();
            $('#ajax-leader-back').fadeIn(200);
        })
    }
    static ajaxBackEnd = () => {
        $('#ajax-loader').fadeOut();
        $('#ajax-leader-back').fadeOut(200);
    }

    // show ajax items
    ajaxStart = () => {
        $(document).ajaxStart(function () {
            $('#ajax-loader').fadeIn();
            $('.ajax-back').fadeIn(200);
        })
    }

    lengthLi = () => {
        return $('#online-items>div>ul').find("li").length;
    }

    showItem = (item) => {
        $('.ajax-back').fadeIn(200);
        $(item).fadeIn();
    }


    static ajaxLoaderEnd = () => {
        $('#ajax-loader').fadeOut();

    }

    static endRecordSteps = () => {
        $('.online-steps-close').click();
        $('.ajax-back').fadeIn(0);
        $('#online-items-end-step').fadeIn(100);
    }

    endRecordManager = () => {
        if ($('.set-record').hasClass('bg-warning')) {
            $('.ajax-back').fadeIn(0);
            $('#online-items-end-step').fadeIn(100);
        }
    }

    closeItem = (item) => {
        $(item).fadeOut();
        $('.ajax-back').fadeOut();
    }


    static completedStep = (stepTitle, stepItem) => {
        $(stepItem).text(stepTitle);
        $(stepItem).addClass('item-selected');

    }

    completing = (stepItem) => {
        $(stepItem).addClass('bg-warning');
    }

    static completeEnd = (stepItem) => {
        $(stepItem).removeClass('bg-warning');
    }


}

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


class Step2 extends index {
    constructor() {
        super();
    }

    timeHandle = () => {
        this.ajaxStart();
        this.completing('.time');
        index.appendItems(window.time[0], window.time[1]);
        this.showItem('#online-items');
    }

    timeEdit = () => {
        this.ajaxStart();
        this.post('/online/getTime', {}).done(function (result) {
            index.appendItems(result[0], result[1]);
        });
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
        });
    }
}

class Step3 extends index {
    constructor(props) {
        super(props);
    }

    dateHandle = () => {
        this.ajaxStart();
        this.completing('.date');
        index.appendItems(window.date[0], window.date[1]);
        this.showItem('#online-items');
    }

    stepTreeHandle = (url, data) => {

        this.ajaxStart();
        this.post(url, data).done(function (result) {
            window.grades = result;
            if (data['turn'] === 6) {
                index.ajaxLoaderEnd();
                $("#online-items").fadeOut();
                $('.ajax-back').fadeOut();
                index.completeEnd('.date');
                index.completedStep(result[0], '.date');
                window.time = result;
            } else {
                index.appendItems(result[0], result[1]);
            }

            let circleSelect = $('.circle-select span');
            circleSelect.removeClass('circle-select-active');
            switch (data['turn']) {
                case 5:
                    circleSelect.eq(1).addClass("circle-select-active");
                    break;
            }
        });
    }

    getDate = () => {
        this.ajaxStart();
        this.post('/online/getDate', {}).done(function (result) {
            console.log(result);
            let onlineItems = $('#online-items');
            onlineItems.fadeIn(200);
            $('#online-items>div>ul').empty();

            $('#turn').val(result[1]);
            $.each(result[0], function (key, value) {
                let tag = "<li onclick='beforeItemNotSelectedShowError()' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                    ">" + value['title'] + "</li>";
                $('#online-items>div>ul').append(tag);
            });
            let firstDateItem=$('#online-items>div>ul li').eq(0);
            firstDateItem.removeAttr("onclick");
            firstDateItem.addClass('bg-danger');
            setTimeout(() => {
                index.ajaxLoaderEnd();
            }, 200)


        });

    }

}


let step1 = new Step1();
let step2 = new Step2();
let step3 = new Step3();

$('.online-steps-close').click(function () {
    step1.closeItem("#online-items");
})

$('.grade').click(function () {
    let parentCircleSelect=$('.circle-select');
    parentCircleSelect.empty();
    parentCircleSelect.append("<span class='circle-select-active'></span><span></span><span></span>")
    step1.gradeHandle();
});

$('.time').click(function () {
    let parentCircleSelect=$('.circle-select');
    parentCircleSelect.empty();
    parentCircleSelect.append("<span class='circle-select-active'></span>")
    if ($(this).hasClass('item-selected')) {
        $('#turn').val(4);
        step2.timeEdit();
    }else if ($('.grade').hasClass('item-selected')){
        step2.timeHandle();
    }
    else {
        beforeItemNotSelectedShowError();
    }
})

$('.date').click(function () {
    let parentCircleSelect=$('.circle-select');
    parentCircleSelect.empty();
    parentCircleSelect.append("<span class='circle-select-active'></span><span></span>")
    if ($('.time').hasClass('item-selected')) {
        step3.dateHandle();
    } else {
        step3.getDate();
    }
})


$('.set-record').click(function () {
    if ($(this).hasClass('item-selected')) {
        //$('#turn').val(8);
        //step2.timeEdit();
    }else if ($('.date').hasClass('item-selected')){
        //step2.timeHandle();
    }
    else {
        beforeItemNotSelectedShowError();
    }
})


function beforeItemNotSelectedShowError() {
    alert("لطفا آیتم قبلی را انتخاب نمیایید !");
}


function recordEvent(tag, turn) {
    let step = $(tag).text();
    let dataID = $(tag).attr('data-id');
    let data = {'turn': turn, 'step': step, 'dataID': dataID};

    switch (turn) {
        case 1 :
            step1.stepOneHandle('/online/recordHandle', data);
            break;
        case 2 :
            step1.stepOneHandle('/online/recordHandle', data);
            break;
        case 3 :
            step1.stepOneHandle('/online/recordHandle', data);
            break;
        case 4:
            step2.stepTwoHandle('/online/recordHandle', data);
            break;
        case 5:
            step3.stepTreeHandle('/online/recordHandle', data);
            break;
        case 6:
            step3.stepTreeHandle('/online/recordHandle', data);
            break;

    }
}


