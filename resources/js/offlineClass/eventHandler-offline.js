const StepOff_1 = new StepOffline_1();

const offlineRecordEvent = (tag, turn) => {
    let step = $(tag).text();
    let dataID = $(tag).attr('data-id');
    let data = {'turn': turn, 'step': step, 'dataID': dataID};
    switch (turn) {
        case 1 :
            StepOff_1.stepOneHandle('/offline/recordHandle', data);
            break;
        case 2 :
            StepOff_1.stepOneHandle('/offline/recordHandle', data);
            break;
        case 3 :
            StepOff_1.stepOneHandle('/offline/recordHandle', data);
            break;
        case 4:
            //step2.stepTwoHandle('/offline/recordHandle', data);
            break;
        case 5:
            //step3.stepTreeHandle('/offline/recordHandle', data);
            break;
        case 6:
            //step3.stepTreeHandle('/offline/recordHandle', data);
            break;

    }
}

$('.grade-offline').click(function () {
    $('.go-back-offline').empty();
    let circleSelect = $('.circle-select-offline span');
    circleSelect.removeClass('circle-select-active');
    circleSelect.eq(0).addClass('circle-select-active');
    let parentCircleSelect = $('.circle-select-indexOffline');
    parentCircleSelect.empty();
    parentCircleSelect.append("<span class='circle-select-active-indexOffline'></span><span></span><span></span>")
    StepOff_1.gradeHandle();
});

$('.question-count').click(() => {
    if ($('.grade-offline').hasClass('item-selected')) {

    } else {
        beforeItemNotSelectedShowError();
    }
})

function beforeItemNotSelectedShowError() {
    alert("لطفا آیتم قبلی را انتخاب نمیایید !");
}

// go back sections

const goBackGradeOffline = () => {
    $('.grade-offline').click();
}
