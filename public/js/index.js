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
    post = (url = '', dataq = {}) => {
        //data['_token'] =
        let token = $("input[name='_token']").val();
        //console.log(data)
        let data = {"_token": token}
        return $.post(
            url,
            data,
            function (msg) {

            });
    }

    static appendItems = (result) => {

        let onlineItems = $('#online-items');
        onlineItems.fadeIn(200);
        $('#online-items>ul').empty();
        $.each(result, function (key, value) {
            let tag = "<li class='list-group-item' data-id='" + value['id'] + "'" +
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

    // hide ajax items
    ajaxEnd = () => {
        $('.ajax-back').fadeOut(200);
    }

    hideWindow = () => {

    }

    showWindows = () => {

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
        this.ajaxStart();
        this.post('/GetGrades', {}).done(function (result) {
           // let thisClass = new Step1();

            index.appendItems(result);
        });
    }

}





$(function () {
    let step1 = new Step1();

    $('.grade').click(function () {
        step1.stepOneStart();
    })
})
