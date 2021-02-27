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
                    parent.append("<p class='alert alert-danger'>" + param['message'] + "</p>");
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
            if (param['type'] === 'file') {
                if (!item[0].files[0] === undefined) {
                    if (item[0].files[0].size !== "undefined") {
                        item[0].files[0].size > param['max']
                            ? this.addClassError(item, 'form-danger')
                            : this.removeClassError(item, 'form-danger');
                    }
                }

            } else {
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
        $('#online-form-items .' + className).remove();
        $('#online-form-items').append("<input type='text' class='" + className + "' value='" + value + "'  name='" + name + "'>")
    }

    static disableTomorrowDate = () => {
        let TomorrowItem = $('#list-group>li').eq(0);
        TomorrowItem.eq(0).addClass("bg-danger");
        TomorrowItem.removeAttr("onClick");
        $('#list-group>li').eq(1).addClass('after-day');
    }

    static ajaxBackStart = () => {
        alert("ok")
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
                if ($("#questions")[0].files.length === 0) {
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
                } else {
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
                        }, 2: {
                            'name': 'img',
                            'require': 'require',
                            'type': 'file',
                            'max': 26214400, // 26214400 = 25 mb
                            'min': 10,
                            'message': "لطفا توجه فرمایید که حجم عکس باید کمتر از 25 مگابایت باشد"
                        }
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
                            $('#online-form-items').append("<input type='hidden' name='user_id' value='" + response['user_id'] + "'>");
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
                    alert("ok")
                    this.post('/online/check-verify-password', formData).then((response) => {
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
                        }else {
                            const onlineClassModal = $("#online-class-modal");
                            onlineClassModal.find('.modal-body').text("کد وارد شده صحیح نیست !");
                            $('#exampleModalCenterTitle').text("هشدار !");
                            onlineClassModal.modal();
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


class indexOffline extends validate{
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

        let offlineItems = $('#offline-items');
        offlineItems.fadeIn(200);
        $('#turn-offline').val(turn);
        $('#offline-items>div>ul').empty();
        window.turn = turn;
        $.each(result, function (key, value) {
            let tag;
            let k = key + 1;
            if (turn === 'last') {
                tag = "<li onclick='itemsStartOffline(" + k + ")' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                    ">" + value['title'] + "</li>";
            } else {
                tag = "<li onclick='recordHandleOffline(this,window.turn)' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                    ">" + value['title'] + "</li>";
            }
            $('#offline-items>div>ul').append(tag);
        });

    }

    static alertOnlineClass = (step = 2, type = 'online-alert') => {
        const date=$('.date-get-answer');

        const grade=$('.grade-offline');
        const questionsCount=$('.question-count');
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

                    if (!questionsCount.hasClass('item-selected')|| questionsCount.hasClass('bg-warning')) {
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
        $('.go-back-offline').append("<button type='button' class='btn go-back-button btn-primary mb-4' onclick='backHandleOffline(window.mainItem)'>مرحله قبل</button>");
    }

    buttonBack = (mainItem) => {
        $(mainItem).click();
    }

    circleSelect = (countStep, activeCircle) => {
        const circleSelect = $('.circle-select-offline');
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
        $('.step-title-offline').text(text);
    }

    static appendInput = (className, name, value) => {
        $('#offline-form-items .' + className).remove();
        $('#offline-form-items').append("<input type='text' class='" + className + "' value='" + value + "'  name='" + name + "'>")
    }

    static disableTomorrowDate = () => {
        let TomorrowItem = $('#list-group-offline>li').eq(0);
        TomorrowItem.eq(0).addClass("bg-danger");
        TomorrowItem.removeAttr("onClick");
        $('#list-group-offline>li').eq(1).addClass('after-day');
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
        return $('#offline-items>div>ul').find("li").length;
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
        $('#offline-items').fadeOut();
        $('.ajax-back').fadeOut();
    }



}

class StepOffline_1 extends indexOffline {
    constructor() {
        super();
        window.grades = {};
    }

    startStep = (actionType) => {

        $('.go-back').empty();
        this.circleSelect(3, 0);
        this.completing('.grade-offline');
        indexOffline.stepsTitle('انتخاب مقطع تحصیلی');
        this.ajaxStart();
        this.post('/offline', {}).then((data) => {
            window.grades = data.grades;
            window.units = data.units;
            window.lessons = data.lessons;
            window.questions = data.questions;
            window.prices = data.prices;
            window.dates = data.dates;
            window.periods = data.periods;
            StepOffline_1.appendItems(window.grades, 1);
            setTimeout(() => {
                Step1.ajaxBackEnd();
            }, 200);
        });

    }

    stepHandle = (turn, data) => {
        this.addButtonBack('.grade-offline');
        switch (turn) {
            case 1:
                this.circleSelect(3, 1);
                // record grade
                window.grade_id = data.dataID;
                $('#online-form-items').append("<input type='hidden' name='grade_id' value='" + window.grade_id + "'>");
                indexOffline.stepsTitle('انتخاب پایه تحصیلی');
                indexOffline.appendInput('grade-input', 'grade', data.value);
                const units = window.units.filter((obg) => {
                    return obg.grade_id === parseInt(data.dataID);
                })
                indexOffline.appendItems(units, 2);
                break;
            case 2:
                this.circleSelect(3, 2);
                indexOffline.stepsTitle('انتخاب درس');
                indexOffline.appendInput('unit-input', 'unit', data.value);
                const lessons = window.lessons.filter((obg) => {
                    return obg.unit_id === parseInt(data.dataID);
                })
                indexOffline.appendItems(lessons, 3);
                break;

            case 3:
                this.endStep(data);
        }
    }

    endStep = (data) => {
        indexOffline.appendInput('lesson-input', 'lesson', data.value);
        indexOffline.completedStep(data.value, '.grade-offline');
        indexOffline.completeEnd('.grade-offline');

    }

}

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
                window.questions[i].title = window.questions[i].description + ' ' + window.questions[i].title * price[0].title + ' هزار تومان ';
            }
        }
        indexOffline.appendItems(window.questions, 4);
    }

    stepHandle = (turn, data) => {
        const mainParentItems = $("#main-parent-item-offline");
        if (turn === 4) {
            window.counQuestionsOffline = data;
            indexOffline.stepsTitle('ارسال سوالات');
            this.circleSelect(2, 1);
            mainParentItems.append("<div class='upload-questions'><br><br><h5 class='text-center direction-rtl'>لطفا تصویر سوالاتی را که قصد رفع اشکال انها را دارید را آپلود نمایید</h5><br><br><label for='questions-offline'><input onchange='recordHandleOffline(this,5)' type='file' name='questions-offline' id='questions-offline' class='form-control'></label><br><br></div>");
            mainParentItems.find('#list-group-offline').remove();
            //mainParentItems.hide();
            $('#turn-offline').val(5);
        } else {
            const questions = $('#questions-offline')[0];
            if (questions.files[0].size < 21002200) {
                mainParentItems.find('.upload-questions').fadeOut();
                //mainParentItems.find('.upload-questions').css('opacity', 0);
                //mainParentItems.find('.upload-questions').css('position', 'absolute');
                //mainParentItems.find('.upload-questions').css('z-index', '1');

                this.endStep(window.counQuestionsOffline);
            } else {
                $('#file-size-is-top').modal();
            }
        }
        //  this.endStep(data);
    }

    endStep = (data) => {
        indexOffline.appendInput('count-question', 'count-question', data.dataID);
        indexOffline.completedStep(data.value, '.question-count');
        indexOffline.completeEnd('.question-count');
    }

}

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
            data.value = window.dateTitle + data.value;
            $('#turn-offline').val(8);
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

class StepOffline_4 extends indexOffline {

    constructor(props) {
        super(props);
    }

    startStep = (actionType) => {
        $("#list-group-offline").remove();
        $("#offline-item-end-step").append("<br><br><div class='d-flex justify-content-between direction-rtl'><p class='col-5'>نام و نام خانوادگی :</p><input type='text' id='name' name='name-offline' placeholder='نام و نام خانوادگی' class='form-control col-7'></div><br><div class='d-flex justify-content-between direction-rtl'><p class='col-5'>شماره تماس :</p><input type='number' id='mobile' name='mobile-offline' placeholder='شماره تماس' class='form-control col-7'></div><br><button onclick='recordHandleOffline(this,8)' class='btn btn-primary' type='button'>ارسال</button>");
        $('.go-back-offline').empty();
        this.circleSelect(2, 0);
        this.completing('.get-record-offline');
        indexOffline.stepsTitle('لطفا مشخصات خود را وارد نمایید ');
        $('.ajax-back').fadeIn();
        $('#offline-items').fadeIn();
    }

    stepHandle = (turn, data) => {
        let formInfo = {};
        switch (turn) {
            case 8:
                formInfo = {
                    0: {
                        'name': 'name-offline',
                        'require': 'require',
                        'type': 'string',
                        'max': 25,
                        'min': 1,
                        'message': "لطفا نام کامل خود را وارد کنید "
                    }, 1: {
                        'name': 'mobile-offline',
                        'require': 'require',
                        'type': 'numeric',
                        'max': 11,
                        'min': 11,
                        'message': "لطفا شماره موبایل خود را وارد کنید"
                    }
                }

                if (this.formValidation(formInfo)) {
                    const offline_item_end_step = $("#offline-item-end-step");
                    this.post('offline/mobileHandle', formInfo).then(response => {
                        offline_item_end_step.find("button").remove();
                        offline_item_end_step.append("<br><div class='d-flex justify-content-between direction-rtl'><p class='col-5'>رمز ارشال شده :</p><input type='text' id='name' name='verify-password-offline' placeholder='رمز را وارد کنید' class='form-control col-7'></div><br><button onclick='recordHandleOffline(this,9)' class='btn btn-primary' type='button'>ارسال</button>");
                        indexOffline.ajaxLoaderEnd();
                        $("#ajax-leader-back").fadeOut();
                    }).catch(error => {
                        offline_item_end_step.find('.alert-danger').remove();
                        offline_item_end_step.prepend("<div class='alert alert-danger'>با عرض پوزش خطایی رخ داده است ! لطفا دوباره تلاش فرمایید </div>")
                        indexOffline.ajaxLoaderEnd();
                    })
                }
                break;
            case  9:
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
                    }, 2: {
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
                            $('#online-form-items').append("<input type='hidden' name='user_id' value='" + response['user_id'] + "'>");
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
            case 10:
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
                    this.post('/online/check-verify-password', formData).then((response) => {
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
                        } else {
                            const onlineClassModal = $("#online-class-modal");
                            onlineClassModal.find('.modal-body').text("کد وارد شده صحیح نیست !");
                            $('#exampleModalCenterTitle').text("هشدار !");
                            onlineClassModal.modal();
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

const stepOne = new StepOffline_1();
const stepTwo = new StepOffline_2();
const stepThree = new StepOffline_3();
const stepFour = new StepOffline_4();

const itemsStartOffline = (stepNumber, item = '') => {
    const actionType = '';//updateOrCreate(item);
    switch (stepNumber) {
        case 1 :
            stepOne.startStep(actionType);
            break
        case 2 :
            if (indexOffline.alertOnlineClass()) {
                stepTwo.startStep(actionType);
            }
            break
        case 3 :
            stepThree.startStep(actionType);
            break;
        case 4 :
            if (indexOffline.alertOnlineClass(4)) {
                stepFour.startStep(actionType);
            }
            break
    }
}

const recordHandleOffline = (tag, turn) => {
    const dataID = $(tag).attr('data-id');
    const value = $(tag).text();
    const data = {dataID: dataID, value: value};
    switch (turn) {
        case 1:
            stepOne.stepHandle(turn, data);
            break;
        case 2:
            stepOne.stepHandle(turn, data);
            break;
        case 3:
            stepOne.stepHandle(turn, data);
            break;
        case 4:
            stepTwo.stepHandle(turn, data);
            break;
        case 5:
            stepTwo.stepHandle(tag, data);
            break;
        case 6:
            stepThree.stepHandle(tag, data);
            break;
        case 7:
            stepThree.stepHandle(turn, data);
            break;
        case 8:
            stepFour.stepHandle(turn, data);
            break;
        case 9:
            stepFour.stepHandle(turn, data);
            break;
    }
}

backHandleOffline = (mainItem) => {
    stepOne.buttonBack(mainItem);
}

const formSubmitOffline = () => {
    $('form').submit();
}


$(function () {
    $("textarea").val('');
})
