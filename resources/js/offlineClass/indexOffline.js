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
    static appendItems = (result, turn = 1) => {

        let offlineItems = $('#offline-items');
        offlineItems.fadeIn(200);
        $('#offline-items>div>ul').empty();
        window.turn_offline = turn;
        $('#turn-indexOffline').val(turn);
        $.each(result, function (key, value) {
            let tag = "<li onclick='offlineRecordEvent(this,window.turn_offline)' class='list-group-item indexOffline-items-select' data-id='" + value['id'] + "'" +
                ">" + value['title'] + "</li>";
            $('#offline-items>div>ul').append(tag);
        });
        setTimeout(() => {
            indexOffline.ajaxLoaderEnd();
        }, 200);

    }

    static ajaxLoaderEnd = () => {
        $('#ajax-loader').fadeOut();
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

    // show ajax items
    ajaxStart = () => {
        $(document).ajaxStart(function () {
            $('#ajax-loader').fadeIn();
            $('#ajax-leader-back').fadeIn(200);
            $('.ajax-back').fadeIn(200);
        })
    }



}
