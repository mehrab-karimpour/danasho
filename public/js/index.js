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

class Step1 extends index {
    constructor() {
        super();

    }


    stepOneStart() {

        if (this.lengthLi() < 1) {
            this.ajaxStart();
            this.post('/online/GetGrades', {}).done(function (result) {
                index.appendItems(result);
                console.log(result);
            });
        } else {
            index.ajaxBackStart();
            this.showItem("#online-items");
        }
    }

    completedStep = (stepTitle, stepItem) => {
        $(stepItem).text(stepTitle);
        $(stepItem).addClass('item-selected');

    }

    completing = (stepItem) => {
        $(stepItem).addClass('bg-warning');
    }

    completeEnd = (stepItem) => {
        $(stepItem).removeClass('bg-warning');
    }


    recordHandle = (tag) => {
        let turn = $('#turn').val();
        let dataID = $(tag).attr("data-id");
        let step = $(tag).text();
        let data = {'turn': turn, 'step': step, 'dataID': dataID};
        index.ajaxBackStart()
        this.post('/online/recordHandle', data).done(function (result) {
            if (turn === "6") {
                const date = $('.date');
                date.removeClass('bg-warning');
                date.text(result[2]);
                date.addClass('item-selected');
                $('.set-record').addClass('bg-warning');
                // end record select
                index.endRecordSteps();
            }
            if (result[1] === 7) {
                $('#online-items').append(result[0]);
            } else {
                index.appendItems(result[0], result[1]);
            }
            if (result[1] === 5) {
                index.disableTomorrowDate();
            }
        });
        index.ajaxBackEnd();
        switch (turn) {
            case "1":
                this.completing('.grade');
                break;
            case "3":
                this.completeEnd('.grade')
                this.completedStep(step, '.grade');
                this.completing('.time');
                break;
            case "4":
                this.completeEnd('.time')
                this.completedStep(step, '.time');
                this.completing('.date');
                break;

            case "7":
                this.completeEnd('.set-record')
                this.completedStep(step, '.set-record');
                break;

        }
    }

    turnManager = (item) => {
        if ($(item).hasClass('bg-warning')) {
            this.stepOneStart();
        }
        // else  show select error
    }

}





let step1 = new Step1();

$('.grade').click(function () {
    step1.stepOneStart();
});

$('.public-items').click(function () {
    step1.turnManager(this);
})

$('.set-record').click(function () {
    step1.endRecordManager();
})

$('.online-steps-close').click(function () {
   step1.closeItem("#online-items");
});

$('.end-step-close').click(function () {
   step1.closeItem("#online-items-end-step");
});

function recordEvent(tag) {
    step1.recordHandle(tag);
}


