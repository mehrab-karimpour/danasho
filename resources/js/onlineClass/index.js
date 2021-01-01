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

        $('#turn').val(turn);
        $.each(result, function (key, value) {
            let tag = "<li onclick='recordEvent(this)' class='list-group-item online-items-select' data-id='" + value['id'] + "'" +
                ">" + value['title'] + "</li>";
            $('#online-items>div>ul').append(tag);
        });
        setTimeout(() => {
            index.ajaxLoaderEnd();
        }, 200)

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


}
