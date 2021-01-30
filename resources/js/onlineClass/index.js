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
                tag = "<li onclick='itemsStart(" + k+ ")' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                    ">" + value['title'] + "</li>";
            } else {
                tag = "<li onclick='recordHandle(this,window.turn)' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                    ">" + value['title'] + "</li>";
            }
            $('#online-items>div>ul').append(tag);
        });

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
