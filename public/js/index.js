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
            function (msg) {

            });
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
    }

    ajaxBackStart = () => {
        $('.ajax-back').fadeIn(200);
    }
    ajaxBackend = () => {
        $('.ajax-back').fadeOut(200);
    }

    // show ajax items
    ajaxStart = () => {
        $(document).ajaxStart(function () {
            $('.ajax-back').fadeIn(200);
        })
    }

    lengthLi = () => {
        return $('#online-items>div>ul').find("li").length;
    }

    showItem = (item) => {
        $(item).fadeIn();
    }

    // hide ajax items
    ajaxEnd = () => {
        $('.ajax-back').fadeOut(200);
    }


    observeTurn = () => {

    }

    showMessage = () => {

    }

}

class Step1 extends index {
    constructor() {
        super();

    }

    stepOneStart() {

        if (this.lengthLi() < 1) {
            this.ajaxStart();
            this.post('/online/GetGrades', {}).done(function (result) {
                index.appendItems(result);

            });
        } else {
            this.ajaxBackStart();
            this.showItem("#online-items");
        }
    }

    recordHandle = (tag) => {
        let turn = $('#turn').val();
        let dataID = $(tag).attr("data-id");

        let step = $(tag).text();
        let data = {'turn': turn, 'step': step, 'dataID': dataID};
        this.post('/online/recordHandle', data).done(function (result) {
            console.log(result)
             index.appendItems(result[0],result[1]);
        });
    }

}





let step1 = new Step1();

$('.grade').click(function () {
    step1.stepOneStart();
});

$('.fa-times').click(function () {
    $('#online-items').fadeOut();
    step1.ajaxEnd();
});

function recordEvent(tag) {
    step1.recordHandle(tag);
}


