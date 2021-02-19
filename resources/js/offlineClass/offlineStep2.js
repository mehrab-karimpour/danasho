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
