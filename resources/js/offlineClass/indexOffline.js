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
