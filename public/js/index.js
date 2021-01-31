class validate {
    constructor(props) {

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
                let parent = item.parents(".form-item-parent");
                const radioStatus = $('body input:radio:checked').val();
                const valEmpty = $('.val-empty').val();
                if (radioStatus === valEmpty) {
                    parent.find('p.text-danger').remove();
                    item.addClass('border border-danger');
                    parent.append("<p class='alert alert-danger'>"+param['message']+"</p>");
                    this.addClassError(item, 'form-danger');
                } else {
                    $('.alert-danger').remove();
                    this.removeClassError(item, 'form-danger');
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

            let parent = item.parents(".form-item-parent");
            if (item.hasClass('form-danger')) {
                parent.find('p.text-danger').remove();
                parent.append("<p class='text-danger'>" + param['message'] + "</p>");
            } else {
                parent.find('p.text-danger').remove();
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

class index extends validate {
    constructor(props) {
        super(props)
    }


    //  handle post request
    post = (url = '', data = {}) => {
        return $.post(
            url,
            data,
        );
    }

    static appendItems = (result = '', turn = 1) => {
        let onlineItems = $('#online-items');
        onlineItems.fadeIn(200);
        $('#turn').val(turn);
        $('#online-items>div>ul').empty();
        window.turn = turn;
        $.each(result, function (key, value) {
            let tag;
            let k = key + 1;
            if (turn === 'last') {
                tag = "<li onclick='itemsStart(" + k + ")' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                    ">" + value['title'] + "</li>";
            } else {
                tag = "<li onclick='recordHandle(this,window.turn)' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                    ">" + value['title'] + "</li>";
            }
            $('#online-items>div>ul').append(tag);
        });

    }

    static alertOnlineClass = (step = 2, type = 'online-alert') => {
        const date=$('.date');
        const grade=$('.grade');
        const time=$('.time');
        const onlineClassModal = $("#online-class-modal");
        let textAlert = '';
        let exampleModalCenterTitle = '';
        if (type === 'error') {
            exampleModalCenterTitle = "خطا !";
            textAlert = 'متاسفانه خطایی رخ داده است ! لطفا دوباره تلاش بفرمایید .';
        } else {
            exampleModalCenterTitle = "هشدار !";
            switch (step) {
                case 2:
                    if (grade.hasClass('item-selected') && !grade.hasClass('bg-warning')) {
                        window.gradeSelect = true;
                    } else {
                        textAlert = "لطفا پایه تحصیلی و عنوان درس را انتخاب کنید ";
                        window.gradeSelect = false;
                    }
                    if (window.gradeSelect) {
                        return true;
                    }

                case 4:
                    if (!date.hasClass('item-selected') || date.hasClass('bg-warning')) {
                        textAlert = "لطفا زمان برگزاری کلاس را انتخاب کنید";
                        window.dateSelect = false;
                    } else
                        window.dateSelect = true;

                    if (!time.hasClass('item-selected')|| time.hasClass('bg-warning')) {
                        textAlert = "لطفا ایتم مدت کلاس و هزینه را انتخاب کنید";
                        window.timeSelect = false;
                    } else
                        window.timeSelect = true;

                    if (!grade.hasClass('item-selected') || grade.hasClass('bg-warning')) {
                        textAlert = "لطفا پایه تحصیلی و عنوان درس را انتخاب کنید ";
                        window.gradeSelect = false;
                    } else
                        window.gradeSelect = true;

                    if (window.timeSelect && window.gradeSelect && window.dateSelect) {
                        return true;
                    }
            }
        }
        onlineClassModal.find('.modal-body').text(textAlert);
        $('#exampleModalCenterTitle').text(exampleModalCenterTitle);
        onlineClassModal.modal();
        return false;
    }

    addButtonBack = (mainItem) => {
        $('.go-back-button').remove();
        window.mainItem = mainItem;
        $('.go-back').append("<button class='btn go-back-button btn-primary mb-4' onclick='backHandle(window.mainItem)'>مرحله قبل</button>");
    }

    buttonBack = (mainItem) => {
        $(mainItem).click();
    }

    circleSelect = (countStep, activeCircle) => {
        const circleSelect = $('.circle-select');
        circleSelect.empty();
        let tag = "";
        switch (countStep) {
            case 1:
                tag = "<span></span>";
                break
            case 2:
                tag = "<span></span><span></span>";
                break
            case 3:
                tag = "<span></span><span></span><span></span>";
        }
        circleSelect.append(tag);
        circleSelect.find('span').eq(activeCircle).addClass('circle-select-active');


    }

    static stepsTitle = (text) => {
        $('.step-online-title').text(text);
    }

    static appendInput = (className, name, value) => {
        $('.' + className).remove();
        $('#online-form-items').append("<input type='text' class='" + className + "' value='" + value + "'  name='" + name + "'>")
    }

    static disableTomorrowDate = () => {
        let TomorrowItem = $('#list-group>li').eq(0);
        TomorrowItem.eq(0).addClass("bg-danger");
        TomorrowItem.removeAttr("onClick");
        $('#list-group>li').eq(1).addClass('after-day');
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
        $('#online-items').fadeOut();
        $('.ajax-back').fadeOut();
    }


}

class Step1 extends index {
    constructor() {
        super();
    }

    startStep = (actionType) => {
        $('.go-back').empty();
        this.circleSelect(3, 0);
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
        this.addButtonBack('.grade');
        switch (turn) {
            case 1:
                this.circleSelect(3, 1);
                // record grade
                window.grade_id = data.dataID;
                $('#online-form-items').append("<input type='hidden' name='grade_id' value='" + window.grade_id + "'>");
                index.stepsTitle('انتخاب پایه تحصیلی');
                index.appendInput('grade-input', 'grade', data.value);
                const units = window.units.filter((obg) => {
                    return obg.grade_id === parseInt(data.dataID);
                })
                console.log(units);
                Step1.appendItems(units, 2);
                break;
            case 2:
                this.circleSelect(3, 2);
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
        }else {
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

class Step4 extends index {

    constructor(props) {
        super(props);
    }

    startStep = (actionType) => {
        const descriptionLastItem = $('#online-items-end-step');
        descriptionLastItem.css('opacity', 1);
        descriptionLastItem.css('position', '');
        descriptionLastItem.css('z-index', '2200');

        $('#online-items').fadeOut();
        $('#online-items-end-step .alert-danger').remove();
        $('.ajax-back').fadeIn();
        $('#last-step-record').fadeOut();
        descriptionLastItem.fadeIn();
    }

    stepHandle = (turn, data) => {
        let formInfo = {};
        switch (turn) {
            case 7:
                formInfo = {
                    0: {
                        'name': 'level',
                        'require': 'require',
                        'type': 'radio',
                        'max': 25,
                        'min': 1,
                        'message': "لطفا سطح بندی را انتخاب کنید "
                    }, 1: {
                        'name': 'description',
                        'require': 'require',
                        'type': 'string',
                        'max': 255,
                        'min': 1,
                        'message': "لطفا توضیحات خود را وارد نمایید (حداکثر 255 کاراکتر )"
                    }
                }
                if (this.formValidation(formInfo)) {
                    const descriptionLastItem = $('#online-items-end-step');
                    descriptionLastItem.css('opacity', 0);
                    descriptionLastItem.css('position', 'absolute');
                    descriptionLastItem.css('z-index', '1');
                    $('#last-step-record').fadeIn();
                }
                break;
            case  8:
                formInfo = {
                    0: {
                        'name': 'name',
                        'require': 'require',
                        'type': 'string',
                        'max': 25,
                        'min': 1,
                        'message': "لطفا نام و نام خانوادگی خود را وارد کنید"
                    }, 1: {
                        'name': 'mobile',
                        'require': 'require',
                        'type': 'numeric',
                        'max': 11,
                        'min': 11,
                        'message': "لطفا شماره موبایل خود را وارد کنید "
                    }
                }

                if (this.formValidation(formInfo)) {
                    $('.resend-verify-token').empty();
                    this.ajaxStart();
                    const name = $("input[name='name']").val();
                    const mobile = $("input[name='mobile']").val();
                    const userData = {mobile: mobile, name: name};
                    window.mobile = mobile;
                    this.post('/online/mobileHandle', userData).then((response) => {

                        if (response === 'error') {
                            $('#last-step-record').prepend("<p class='alert direction-rtl alert-danger'>متاسفیم ! خطایی رخ داده است لطفا دوباره تلاش کنید . </p>");
                        } else {
                            $('#online-form-items').append("<input type='hidden' name='user_id' value='"+response['user_id']+"'>");
                            $('.verify-password-button').attr("onclick", 'recordHandle(this,9)')
                            const passWordVerify = $('#password-verify-parent');
                            passWordVerify.removeClass('d-none');
                            let i = 45;
                            const timer = $('.timer');
                            let verifyTimer = setInterval(() => {
                                if (i > 0) {
                                    timer.text(i);
                                    i--;
                                } else {
                                    clearInterval(verifyTimer);
                                    this.endStep();
                                    return false;
                                }
                            }, 1000);
                        }
                        index.ajaxBackEnd();
                    });
                }
                break
            case 9:
                /*   check verify token  */
                formInfo = {
                    0: {
                        'name': 'verify-token',
                        'require': 'require',
                        'type': 'numeric',
                        'max': 12,
                        'min': 4,
                        'message': "لطفا رمز ارسال شده را وارد کنید "
                    }
                }

                if (this.formValidation(formInfo)) {
                    const checkVerifyPassword = $("input[name='verify-token']").val();
                    const formData = {checkVerifyPassword: checkVerifyPassword};
                    this.post('online/check-verify-password', formData).then((response) => {
                        Step4.ajaxBackEnd();

                        if (response) {
                            $('#last-step-record').hide();
                            $('.step-online-title').text('دانش آموزش گرامی آیا از درخواست خود اطمینان دارید ؟');
                            const grade = $('.grade').text();
                            const time = $('.time').text();
                            const date = $('.date').text();
                            const mobile = window.mobile;
                            const data = [
                                {
                                    id: 1,
                                    title: "<div class='alert alert-success col-12 d-flex justify-content-between'><p class='col-4 p-0 text-right direction-rtl'>درس :</p><p class='col-8 p-0 text-center'>" + grade + "</p></div>"
                                }, {
                                    id: 2,
                                    title: "<div class='alert alert-success col-12 d-flex justify-content-between'><p class='col-4 p-0 text-right direction-rtl'> مدت زمان و هزینه :</p><p class='col-8 p-0 text-center'>" + time + "</p></div>"
                                }, {
                                    id: 3,
                                    title: "<div class='alert alert-success col-12 d-flex justify-content-between'><p class='col-4 p-0 text-right direction-rtl'> روز و ساعت برگزاری :</p><p class='col-8 p-0 text-center'>" + date + "</p></div>"
                                }, {
                                    id: 4,
                                    title: "<div class='alert alert-success col-12 d-flex justify-content-between'><p class='col-4 p-0 text-right direction-rtl'> شماره موبایل :</p><p class='col-8 p-0 text-center'>" + mobile + "</p></div>"
                                },
                            ]
                            Step4.appendItems(data, 'last');
                            const onlineItems = $('#online-items')
                            onlineItems.find('button').remove();
                            onlineItems.find('.form-submit').append("<button onclick='formSubmit()' class='btn btn-success'>تایید</button>");

                        }
                    })
                }

        }
    }


    endStep = () => {
        $('.dont-show-password-section').addClass('d-none');
        $('.resend-verify-token').append("<p class='text-danger'>متاسفانه زمان شما به اتمام رسید </p> " +
            "<a class='text-primary cursor-pointer' onclick='recordHandle(this,8)'>ارسال مجدد رمز </a>");
    }

}

let step1 = new Step1();
let step2 = new Step2();
let step3 = new Step3();
let step4 = new Step4();

const updateOrCreate = (item) => {
    if ($(item).hasClass('item-selected')) {
        return 'edit';
    } else {
        return 'create';
    }
}

const itemsStart = (stepNumber, item = '') => {
    const actionType = updateOrCreate(item);
    switch (stepNumber) {
        case 1 :
            step1.startStep(actionType);
            break
        case 2 :
            if (index.alertOnlineClass()) {
                step2.startStep(actionType);
            }
            break
        case 3 :
            step3.startStep(actionType);
            break;
        case 4 :
            if (index.alertOnlineClass(4)) {
                step4.startStep(actionType);
            }
            break
    }
}

const recordHandle = (tag, turn) => {
    const dataID = $(tag).attr('data-id');
    const value = $(tag).text();
    const data = {dataID: dataID, value: value};
    switch (turn) {
        case 1:
            step1.stepHandle(turn, data);
            break;
        case 2:
            step1.stepHandle(turn, data);
            break;
        case 3:
            step1.stepHandle(turn, data);
            break;
        case 4:
            step2.stepHandle(turn, data);
            break;
        case 5:
            step3.stepHandle(tag, data);
            break;
        case 6:
            step3.stepHandle(turn, data);
            break;
        case 7:
            step4.stepHandle(turn, data);
            break;
        case 8:
            step4.stepHandle(turn, data);
            break;
        case 9:
            step4.stepHandle(turn, data);
            break;
    }
}

backHandle = (mainItem) => {
    step1.buttonBack(mainItem);
}

const formSubmit = () => {
    $('form').submit();
}


function beforeItemNotSelectedShowError() {
    alert("لطفا آیتم قبلی را انتخاب نمیایید !");
}


class indexOffline {
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

    // append item in sections
    static offlineAppendItems = (result, turn = 1) => {
        let offlineItems = $('#offline-items'); // modal section .
        offlineItems.fadeIn(200);               // show modal
        $('#offline-items>div>ul').empty();     // list item may be empty . because we want append new item ans saved before items.
        $('#turn-offline').val(turn);      // We took turns managing the items
        window.turn = turn;
        $.each(result, function (key, value) {
            let tag = "<li onclick='offlineRecorder(this,window.turn)' " +
                "class='list-group-item indexOffline-items-select' data-id='" + value['id'] + "'" +
                ">" + value['title'] + "</li>";
            $('#list-group-offline').append(tag);
        });
        setTimeout(() => {
            indexOffline.ajaxLoaderEnd();
        }, 200);

    }

    /*
    * ajaxBack : A black layer that is placed behind the modal .
    * */
    ajaxBack = () => {
        $('.ajax-back').fadeIn(200);
    }

    /*
    * show ajax loader and show background ajax loader
    * */
    ajaxStart = () => {
        $(document).ajaxStart(function () {
            $('#ajax-loader').fadeIn();
            $('#ajax-leader-back').fadeIn(200);
            $('.ajax-back').fadeIn(200);
        });
    }

    /*
    * ajax and . ajax loader icon and ajax main background
    * */
    static ajaxLoaderEnd = () => {
        $('#ajax-loader').fadeOut();
        $('#ajax-leader-back').fadeOut(200);
    }

    static completedStep = (stepTitle, stepItem) => {
        $(stepItem).text(stepTitle);
        $(stepItem).addClass('item-selected');

    }

    static ajaxBackEnd = () => {
        $('#ajax-loader').fadeOut();
        $('#ajax-leader-back').fadeOut(200);
    }

    completing = (stepItem) => {
        $(stepItem).addClass('bg-warning');
    }

    static completeEnd = (stepItem) => {
        $(stepItem).removeClass('bg-warning');
    }


}

class StepOffline_1 extends indexOffline {
    constructor() {
        super();
        window.grades = {};
    }

    /*
     * every step has two main method . 1:start  , 2:handle
     * start method mey be constructor for every section .
     * handle method handled other items .
     * */
    static endStep = (stepTitle) => {
        indexOffline.completeEnd('.grade-offline');
        indexOffline.completedStep(stepTitle, '.grade-offline');
        $('#offline-items').fadeOut();
        $('.ajax-back').fadeOut();
    }

    startStep = (turn) => {
        $('.step-title-offline').text("انتخاب مقطع تحصیلی");
        $('.go-back-offline').empty();
        this.ajaxStart();
        const data = {'turn': turn};
        this.post('/online/GetGrades', data).then(function (result) {
            indexOffline.offlineAppendItems(result);
        });
        indexOffline.ajaxLoaderEnd();
    }

    handleStep = (url, data) => {
        this.ajaxStart();
        this.post('/offline/recordHandle', data).then(function (result) {
            if (data['turn'] === 3) {
                StepOffline_1.endStep(data['step']);

                // saved all questions in window.offlineQuestions because step two we have handel questions
                window.offlineQuestions = result;
            } else {
                indexOffline.offlineAppendItems(result[0], result[1]);
            }
        });
        indexOffline.ajaxLoaderEnd();
        /*
        * handle circle select .
        * */
        let circleSelect = $('.circle-select-offline span');
        circleSelect.removeClass('circle-select-active');
        const stepTitle=$('.step-title-offline');
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
    }


}

class StepOffline_2 extends indexOffline {
    constructor() {
        super();
    }

    /*
    *    END
    * */
    static endStep = (stepTitle) => {
        indexOffline.completeEnd('.question-count');
        indexOffline.completedStep(stepTitle, '.question-count');
        const offlineItem = $('#offline-items');
        offlineItem.fadeOut();
        $('.ajax-back').fadeOut();
        offlineItem.empty();
        offlineItem.append("<br><h5 class='step-title-offline text-center'>انتخاب روز مورد نظر</h5><input type='hidden'  id='turn-offline' name='turn-offline' value='6'><input type='hidden'  id='edit-offline' name='edit-offline' value='0'><span onclick='offlineModalClose()' class='d-block mt-2 ml-1 '><i class='fas fa-times offline-steps-close cursor-pointer'></i></span><div id='list-parent'></div><div class='col-12 d-flex justify-content-center'><ul class='list-group m-0 p-0' id='list-group-offline'></ul></div><div class='col-6 col-md-4 col-xl-2 circle-select-offline'><span class='circle-select-active'></span><span></span><span></span></div><br><div class='go-back-offline text-right'></div><br/>");
    }


    startStep = (turn) => {
        $('.step-title-offline').text('انتخاب تعداد سوال و هزینه آن ');
        $('.go-back-offline').empty();
        $('.ajax-back').fadeIn();
        indexOffline.offlineAppendItems(window.offlineQuestions[0], window.offlineQuestions[1]);
    }

    handleStep = (url, data, file = 0) => {
        if (file === 1) {
            /*
            * upload image questions
            * */
            const question_file = data.files[0];
            let formData = new FormData;
            formData.append('question_file', question_file);
            formData.append('turn', "5");

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                async: true,
                dataType: 'json',
                processData: false,
                cache: false,
                contentType: false,
                success: function (msg) {
                    window.offlineDate = msg;
                    StepOffline_2.endStep(window.stepTwoText);
                    setTimeout(() => {
                        StepOffline_2.ajaxBackEnd();
                    }, 400)
                },
                fail: function (msg) {
                }
            });

        } else {
            window.stepTwoText = data['step'];
            $('#offline-items').empty();
            window.uploadFileSection = "<h6>تصاویر سوالاتی که قصد رفع اشکال انها را دارید اپلود نمایید </h6><br><br><input " +
                "class='form-control' type='file' name='question-file' />";

            this.post('/offline/recordHandle', data).then(function (result) {
                $('#turn-offline').val(result[1]);
                $('#offline-items').append(result);
                $('.step-title-offline').text('ارسال سوالات');
                indexOffline.ajaxBackEnd();
            });
        }
    }

}

class StepOffline_3 extends indexOffline {
    constructor() {
        super();
    }

    static endStep = (stepTitle) => {
        indexOffline.completeEnd('.date-get-answer');
        indexOffline.completedStep(stepTitle, '.date-get-answer');
        let offlineItem = $('#offline-items');
        $('.ajax-back').fadeOut();
        offlineItem.css("opacity", "0");
        offlineItem.empty();
        offlineItem.append("<br><h5 class='step-title-offline text-center'></h5><input type='hidden' id='turn-offline' name='turn-offline' value='1'><input type='hidden' id='edit-offline' name='edit-offline' value='0'><span onclick='offlineModalClose()' class='d-block mt-2 ml-1 '><i class='fas fa-times offline-steps-close cursor-pointer'></i></span><div id='list-parent'></div><div class='form-item-parent'><div class='col-12 d-flex justify-content-around'><input class='form-control text-right col-12 col-md-5' name='offline_name' id='offline_name' type='text' placeholder='نام '><label for='offline_name' class='col-12 text-right direction-rtl col-md-6'>نام و نام خانوادگی :</label></div></div><br><div class='form-item-parent'><div class='col-12 d-flex justify-content-around'><input class='form-control text-right col-12 col-md-5' id='offline_mobile' type='number' name='offline_mobile' placeholder='شماره موبایل '><label for='offline_mobile' class='col-12 text-right direction-rtl col-md-6'>شماره موبایل خود را وارد کنید : </label></div></div><br><div class='col-12' id='verify-code-offline'></div><br><div class='form-item-parent'></div><div class='timer-parent-offline form-item-parent'></div><div class='col-12 d-flex justify-content-around'><br><br><br><br><br><br><br><button class='btn btn-primary last-record__submit-offline' onclick='offlineRecorder(this,8)'>تایید</button><button class='btn btn-secondary'>بازگشت به مرحله قبل</button></div><div class='col-6 col-md-4 col-xl-2 circle-select-offline'><span class='circle-select-active'></span></div><br><div class='go-back-offline text-right'></div><br/>");
        setTimeout(() => {
            $('#offline-items').fadeOut();
        }, 1000);
    }

    startStep = () => {
        $('.ajax-back').fadeIn(0);
        indexOffline.offlineAppendItems(window.offlineDate[0], window.offlineDate[1]);
        let firstItem = $('#list-group-offline li').eq(0);
        firstItem.removeAttr('onclick');
        firstItem.addClass('bg-danger');
    }

    handleStep = (url, data) => {
        let goBack = $('.go-back-offline');
        goBack.empty();
        goBack.append("<button class='btn btn-secondary' onclick='itemHandle(3,window.offlineDate,3)'>بازگشت به عقب</button>");
        let circleSelect = $('.circle-select-offline span');
        circleSelect.removeClass("circle-select-active");
        circleSelect.eq(1).addClass("circle-select-active");
        $('.step-title-offline').text('انتخاب محدوده زمانی مورد نظر');
        this.post(url, data).then(function (result) {
            indexOffline.offlineAppendItems(result[0], result[1]);
            if (result[2] === 1) {
                let firstItem = $('#list-group-offline li').eq(0);
                firstItem.removeAttr('onclick');
                firstItem.addClass('bg-danger');
            }
        });
        if (data['turn'] === 6) {
            window.dateOffline = data['step'];
        }
        if (data['turn'] === 7) {
            let stepThreeTitle = window.dateOffline + data['step'];
            StepOffline_3.endStep(stepThreeTitle);
        }
    }

}

class StepOffline_4 extends indexOffline {
    constructor(props) {
        super(props);
    }

    endStep = (url, data) => {
        this.post(url, data).then((response) => {
            console.log(response);
        });
    }

    startStep = () => {
        this.completing('.get-record-offline');
        let offlineItem = $('#offline-items');
        offlineItem.css("opacity", "1");
        offlineItem.fadeIn();
        $('.ajax-back').fadeIn();
    }

    handleStep = (url, data) => {
        let v = new validate();
        if (v.formValidation({
            0: {
                'name': 'offline_name',
                'require': 'require',
                'type': 'string',
                'max': 255,
                'min': 2,
                'message': "لطفا نام کامل خود را وارد نمایید"
            },
            1: {
                'name': 'offline_mobile',
                'require': 'require',
                'type': 'numeric',
                'max': 11,
                'min': 11,
                'message': "لطفا شماره موبایل را وارد نمایید (شماره باید 11 رقمی باشد)"
            }
        })) {
            const mobileOffline = $('#offline_mobile').val();
            const nameOffline = $('#offline_name').val();
            const data = {mobile: mobileOffline, name: nameOffline, turn: "8"};
            this.post(url, data).then((response) => {
                if (response['status'] === "success") {
                    $('#turn-offline').val("9");
                    const lastRecord = $('.last-record__submit-offline');
                    lastRecord.removeAttr("onclick");
                    lastRecord.attr("onclick", "offlineRecorder(this,9)");
                    StepOffline_4.ajaxBackEnd();
                    const tag = "<div class='col-12 d-flex justify-content-around'><input class='form-control text-right col-12 col-md-5' id='offline_verify_token' type='text' name='offline_verify_token' placeholder='رمز تایید را وارد کنید'><label for='offline_verify_token' class='col-12 text-right direction-rtl col-md-6'>رمز ارسال شده را وارد نمایید </label></div><div class='d-flex justify-content-center mt-2' id='timer-parent'><span class='offline-timer'></span></div>";
                    $('#verify-code-offline').append(tag);
                    let i = 120;
                    let timer = setInterval(() => {
                        let TimerSection = $('.offline-timer');
                        TimerSection.text(i);
                        i--;
                        if (i === 0) {
                            $('.last-record__submit-offline').remove();
                            $(".timer-parent-offline").append("<p class='text-center direction-rtl text-danger'>متاسفانه فرصت ارسال رمز عبور به اتمام رسید ! لطفا مجددا تلاش بفرمایید </p>")
                            clearInterval(timer);
                            TimerSection.remove();
                            return false;
                        }
                    }, 1000)

                }
            });
        }
    }

}

const stepOne = new StepOffline_1();
const stepTwo = new StepOffline_2();
const stepThree = new StepOffline_3();
const stepFour = new StepOffline_4();

/*
* get turn for easy management steps and items
* */

const Turn = () => {
    return $('#turn-offline').val();
}

/*
* grades and units lessons .
* */
One = (item, turn) => {
    stepOne.completing('.grade-offline');
    // we have create it .
    stepOne.startStep(turn);
}
/*
* count questions and prices
* */
Two = (item) => {
    stepTwo.completing('.question-count');
    stepTwo.startStep();
}

/*
* date get response questions
* */
Three = (item) => {
    stepThree.completing('date-get-answer');
    stepThree.startStep();
}


/*
* go record request
* */
Four = () => {
    alert("ok");
    stepFour.completing('get-record-offline');
    stepFour.startStep();
}

itemHandle = (stepNumber, tag, edit = '') => {
    const thisTag = $(tag);
    const turn = Turn();
    let circleSelect = $('.circle-select-offline span');
    const offlineItems = $('#offline-items');
    switch (stepNumber) {
        case 1:
            One(thisTag, turn);
            break;
        case 2:
            if (edit === '') {
                circleSelect.eq(0).remove();
                circleSelect.eq(1).addClass("circle-select-active");
            } else {
                offlineItems.empty();
                offlineItems.append("<br><h5 class='step-title-offline text-center'></h5><input type='hidden'  id='turn-offline' name='turn-offline' value='1'><input type='hidden'  id='edit-offline' name='edit-offline' value='0'><span onclick='offlineModalClose()' class='d-block mt-2 ml-1 '><i class='fas fa-times offline-steps-close cursor-pointer'></i></span><div id='list-parent'></div><div class='col-12 d-flex justify-content-center'><ul class='list-group m-0 p-0' id='list-group-offline'></ul></div><div class='col-6 col-md-4 col-xl-2 circle-select-offline'><span class='circle-select-active'></span><span></span></div><br><div class='go-back-offline text-right'></div><br/>");
            }
            Two(thisTag, turn);
            break;
        case 3:
            if (edit === 3) {
                circleSelect.removeClass("circle-select-active");
                circleSelect.eq(0).addClass("circle-select-active");
            } else {
                circleSelect.eq(0).remove();
                circleSelect.eq(1).addClass("circle-select-active");
            }
            if ($('.date-get-answer').hasClass('item-selected')) {
                offlineItems.empty();
                offlineItems.append("<br><h5 class='step-title-offline text-center'>انتخاب روز مورد نظر</h5><input type='hidden'  id='turn-offline' name='turn-offline' value='1'><input type='hidden'  id='edit-offline' name='edit-offline' value='0'><span onclick='offlineModalClose()' class='d-block mt-2 ml-1 '><i class='fas fa-times offline-steps-close cursor-pointer'></i></span><div id='list-parent'></div><div class='col-12 d-flex justify-content-center'><ul class='list-group m-0 p-0' id='list-group-offline'></ul></div><div class='col-6 col-md-4 col-xl-2 circle-select-offline'><span class='circle-select-active'></span><span></span></div><br><div class='go-back-offline text-right'></div><br/>");
                offlineItems.css('opacity', '1');
            }
            Three(thisTag, turn);
            break;
        case 4:
            Four(thisTag, turn);
            break;
    }
}

/*
* this method passed data to steps files for record all items .
* */

offlineRecorder = (tag, turn) => {
    const step = $(tag).text();
    const dataID = $(tag).attr('data-id');
    const data = {'turn': turn, 'step': step, 'dataID': dataID};
    const goBackButtonParent = $('.go-back-offline');
    switch (turn) {
        case 1 :
            window.offlineGrade = $('.grade-offline');
            goBackButtonParent.empty();
            goBackButtonParent.append("<button class='btn btn-secondary' onclick='itemHandle(1,window.offlineGrade)'>بازگشت به عقب</button>")
            stepOne.handleStep('/offline/recordHandle', data);
            break;
        case 2 :
            stepOne.handleStep('/offline/recordHandle', data);
            break;
        case 3 :
            stepOne.handleStep('/offline/recordHandle', data);
            break;
        case 4 :
            stepTwo.handleStep('/offline/recordHandle', data);
            break;
        case 6 :
            stepThree.handleStep('/offline/recordHandle', data);
            break;
        case 7 :
            stepThree.handleStep('/offline/recordHandle', data);
            break;
        case 8 :
            stepFour.handleStep('/offline/recordHandle', data);
            break;
        case 9 :
            const offline_verify_token = $("input[name='offline_verify_token']").val();
            let dataWithPassword = {
                'offline_verify_token': offline_verify_token,
                'turn': turn,
                'step': step,
                'dataID': dataID
            };
            stepFour.endStep('/offline/recordHandle', dataWithPassword);
            break;
    }
}

/*
* upload question file
* */

const uploadQuestionFile = (tag) => {
    stepTwo.handleStep('/offline/recordHandle', tag, 1)
}


/*
* close modal offline
* */
const offlineModalClose = () => {
    $("#offline-items").fadeOut();
    $('#online-items').fadeOut();
    $('#last-step-record').fadeOut();
    $('#online-items-end-step').fadeOut();
    $('.ajax-back').fadeOut();
}

$(() => {
    $('.ajax-back').click(() => {
        offlineModalClose();
    });
})


