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
            $('#ajax-leader-back').fadeIn(200);
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

class validate extends index {
    constructor(props) {
        super(props);
    }

    addClassError = (item, classError) => {
        item.addClass(classError);
    }


    removeClassError = (item, classError) => {
        item.removeClass(classError);
    }

    formValidation = (formInfo = {}) => {
        let item;
        let param;
        for (let i = 0; i <= Object.keys(formInfo).pop(); i++) {
            item = $("*[name='" + formInfo[i].name + "']");
            let valItem = item.val();
            param = formInfo[i]; // parameter requirement is array . this array can be 'require' ,'string' ,'numeric'
            if (param['required'] === "required") {
                if (valItem === '') {
                    this.addClassError(item, 'form-danger');
                } else {
                    this.removeClassError(item, 'form-danger');
                }
            }
            if (param['type'] === "radio") {

                $("body").find("input[type=radio]").each(function (key, value) {
                    if ($(this).prop('checked')) {
                        return window.radioValid = true;
                    }
                });
                if (window.radioValid) {

                    this.removeClassError(item, 'form-danger');
                } else {
                    let parent = item.parents(".form-item-parent");
                    parent.find('p.text-danger').remove();
                    parent.append("<p class='text-danger'>" + param['message'] + "</p>");
                    this.addClassError(item, 'form-danger')
                }

            }
            if (param['type'] === "string") {
                if ($.isNumeric(valItem)) {
                    this.addClassError(item, 'form-danger')
                } else {
                    this.removeClassError(item, 'form-danger');
                }
            }
            if (param['type'] === "numeric") {
                if (!$.isNumeric(valItem)) {
                    this.addClassError(item, 'form-danger')
                } else {
                    this.removeClassError(item, 'form-danger');
                }
            }
            if (valItem.length > param['max']) {
                this.addClassError(item, 'form-danger')
            } else {
                this.removeClassError(item, 'form-danger');
            }
            if (valItem.length < param['min']) {
                this.addClassError(item, 'form-danger')
            } else {
                this.removeClassError(item, 'form-danger');
            }


            if (item.hasClass('form-danger')) {
                let parent = item.parents(".form-item-parent");
                parent.find('p.text-danger').remove();
                parent.append("<p class='text-danger'>" + param['message'] + "</p>");
            }
        }

        return !$('body *').hasClass('form-danger');
    }
}


/*let v = new validate();
v.formValidation({
    0: {
        'name': 'email',
        'require': 'require',
        'type': 'string',
        'max': 15,
        'min': 15,
        'message': "لطفا فیلد ایمیل را به درستی وارد نمایید"
    },
    1: {
        'name': 'mobile',
        'require': 'require',
        'type': 'numeric',
        'max': 4,
        'min': 1,
        'message': "لطفا فیلد ایمیل را به درستی وارد نمایید"
    }
});*/

class Step1 extends index {
    constructor() {
        super();
        window.grades = {};
    }

    gradeHandle = () => {
        $('.step-title').text('انتخاب مقطع تحصیلی');
        let turn = $("input[name='turn']").val();
        step1.completing('.grade');
        this.ajaxStart();
        this.post('/online/GetGrades', {}).done(function (result) {
            index.ajaxBackEnd();
            window.grades = result;
            index.appendItems(result);
        });
    }

    goBack = () => {
        let goBack = $('.go-back');
        goBack.empty();
        goBack.append("<button onclick='goBackGrade()' class='btn float-right btn-secondary mb-5'> قبلی</button>");
    }

    stepOneHandle = (url, data) => {
        this.ajaxStart();
        this.post(url, data).done(function (result) {
            window.grades = result;
            if (data['turn'] === 3) {
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
            const stepTitle=$('.step-title');
            switch (data['turn']) {
                case 1:
                    circleSelect.eq(1).addClass("circle-select-active");
                    stepTitle.text('انتخاب پایه  تحصیلی');
                    break;
                case 2:
                    circleSelect.eq(2).addClass("circle-select-active");
                    stepTitle.text('انتخاب درس');
                    break;
            }
            index.ajaxBackEnd();
        });
        this.goBack();
    }


}


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

class Step3 extends index {
    constructor(props) {
        super(props);
    }

    dateHandle = () => {
        $('.step-title').text('انتخاب روز  مورد نظر');
        this.ajaxStart();
        this.completing('.date');
        index.appendItems(window.date[0], window.date[1]);
        this.showItem('#online-items');

    }

    stepTreeHandle = (url, data) => {
        $('.step-title').text('انتخاب محدوده زمانی مورد نظر');
        let firstDateSelected = $('#list-group li').eq(1).text();
        let firstPeriodSelect = 0;
        if (firstDateSelected === data['step']) {
            firstPeriodSelect = 1;
        }
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
            index.ajaxBackEnd();
        });
        this.goBack();
        if (firstPeriodSelect === 1) {
            setTimeout(() => {
                const onePeriodItem=$('#list-group li').eq(0);
                onePeriodItem.addClass('bg-danger');
                onePeriodItem.removeAttr('onclick');

            }, 300)
        }
    }

    goBack = () => {
        let goBack = $('.go-back');
        goBack.empty();
        goBack.append("<button onclick='goBackDate()' class='btn float-right  btn-secondary mb-5'> قبلی</button>");
    }

    getDate = () => {
        this.ajaxStart();
        this.post('/online/getDate', {}).done(function (result) {
            let onlineItems = $('#online-items');
            onlineItems.fadeIn(200);
            $('#online-items>div>ul').empty();

            $('#turn').val(result[1]);
            $.each(result[0], function (key, value) {
                let tag = "<li onclick='beforeItemNotSelectedShowError()' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                    ">" + value['title'] + "</li>";
                $('#online-items>div>ul').append(tag);
            });
            let firstDateItem = $('#online-items>div>ul li').eq(0);
            firstDateItem.removeAttr("onclick");
            firstDateItem.addClass('bg-danger');
            setTimeout(() => {
                index.ajaxLoaderEnd();
            }, 200)
            index.ajaxBackEnd();
        });

    }

}

class Step4 extends validate {

    constructor(props) {
        super(props);
    }

    validateForm = (step = '') => {

        let arrayForm = {};
        if (step === '') {
            arrayForm = {
                0: {
                    'name': 'description',
                    'required': 'required',
                    'type': 'string',
                    'max': 255,
                    'min': 5,
                    'message': "لطفا توضیحات را وارد کنید ."
                }, 1: {
                    'name': 'level',
                    'required': 'required',
                    'type': 'radio',
                    'max': 255,
                    'min': 1,
                    'message': "لطفا سطح خود را انتخاب کنید ."
                }
            };
        } else if ('step2') {
            arrayForm = {
                0: {
                    'name': 'name',
                    'required': 'required',
                    'type': 'string',
                    'max': 255,
                    'min': 5,
                    'message': "لطفا نام خود را وارد کنید ."
                }, 1: {
                    'name': 'mobile',
                    'required': 'required',
                    'type': '',
                    'max': 11,
                    'min': 11,
                    'message': "لطفا شماره تماس خود را به درستی وارد کنید"
                }
            };
        }


        return this.formValidation(arrayForm);
    }
    lastRecordHandleStepTwo = () => {

        if (this.validateForm("step2")) {
            let name = $('#name').val();
            let mobile = $('#mobile').val();
            let data = {name: name, mobile: mobile};
            this.post('/online/recordNameMobile', data).done((response) => {
                if (response['status'] === 'success') {
                    Step4.ajaxBackEnd();
                    $('.last-record__submit').text('تایید رمز ارسال شده ');
                    $('#password-verify-parent').removeClass('dont-show-password-section');

                    let i = 60;
                    let timer = setInterval(() => {
                        let TimerSection=$('.timer');
                        TimerSection.text(i);
                        i--;
                        if (i === 0) {
                            $('.last-record__submit').remove();
                            $("#timer-parent").append("<p class='text-center direction-rtl text-danger'>متاسفانه فرصت ارسال رمز عبور به اتمام رسید ! لطفا مجددا تلاش بفرمایید </p>")
                            clearInterval(timer);
                            TimerSection.remove();
                            return false;
                        }
                    }, 1000)
                }
            });
        }
    }

    lastRecordHandleStepOne = () => {
        if (this.validateForm()) {
            let description = $("textarea[name='description']").val();
            let level = $("input[name='level']:checked").val();
            let data = {description: description, level: level};
            this.post('/online/descriptionHandle', data).done((response) => {
                Step4.ajaxBackEnd();
                if (response['status'] === 'success') {
                    $('#online-items-end-step').fadeOut();
                    $('#last-step-record').fadeIn();
                }
            });
        }
    }

}

let step1 = new Step1();
let step2 = new Step2();
let step3 = new Step3();
let step4 = new Step4();


$('.online-steps-close').click(function () {
    step1.closeItem("#online-items");
})

function goBackGrade() {
    $('.grade').click();
}

function goBackDate() {
    $('.date').click();
}
function goBackEnd() {
    $('.set-record').click();
}

$('.grade').click(function () {
    let parentCircleSelect = $('.circle-select');
    parentCircleSelect.empty();
    parentCircleSelect.append("<span class='circle-select-active'></span><span></span><span></span>")
    step1.gradeHandle();
});

$('.time').click(function () {
    $('.go-back').empty();
    let parentCircleSelect = $('.circle-select');
    parentCircleSelect.empty();
    parentCircleSelect.append("<span class='circle-select-active'></span>")
    if ($(this).hasClass('item-selected')) {
        $('#turn').val(4);
        step2.timeEdit();
    } else if ($('.grade').hasClass('item-selected')) {
        step2.timeHandle();
    } else {
        beforeItemNotSelectedShowError();
    }
})

$('.date').click(function () {
    let parentCircleSelect = $('.circle-select');
    parentCircleSelect.empty();
    parentCircleSelect.append("<span class='circle-select-active'></span><span></span>")
    if ($('.time').hasClass('item-selected')) {
        step3.dateHandle();
    } else {
        step3.getDate();
    }
})


$('.set-record').click(function () {

    $('.go-back').empty();
    if ($('.date').hasClass('item-selected')) {
        $('.ajax-back').fadeIn(200);
        $('#online-items-end-step').fadeIn();
    } else {
        beforeItemNotSelectedShowError();
    }
});

$('.end-step-close').click(function () {
    step1.closeItem('.ajax-back');
    step1.closeItem('.end-step-section');
})

$('.next-record').click(function () {
    if ($('.date').hasClass('item-selected')) {
        step4.lastRecordHandleStepOne();
    } else {
        beforeItemNotSelectedShowError();
    }
});

/*$("#name , #mobile , #password").change(function () {
    //step4.lastRecordHandleStepTwo();
    alert("ok");
});*/

$('.last-record__submit').click(function () {
    step4.lastRecordHandleStepTwo();
});


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


