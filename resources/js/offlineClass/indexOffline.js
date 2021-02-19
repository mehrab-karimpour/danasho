class indexOffline {
    constructor() {

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
