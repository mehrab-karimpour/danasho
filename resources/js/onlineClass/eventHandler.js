let step1 = new Step1();
let step2 = new Step2();
let step3 = new Step3();
let step4 = new Step4();


$('.online-steps-close').click(function () {
    step1.closeItem("#online-items");
})

function goBackGrade() {
    $('.grade').click();
}

function goBackDate() {
    $('.date').click();
}
function goBackEnd() {
    $('.set-record').click();
}

$('.grade').click(function () {
    let parentCircleSelect = $('.circle-select');
    parentCircleSelect.empty();
    parentCircleSelect.append("<span class='circle-select-active'></span><span></span><span></span>")
    step1.gradeHandle();
});

$('.time').click(function () {
    $('.go-back').empty();
    let parentCircleSelect = $('.circle-select');
    parentCircleSelect.empty();
    parentCircleSelect.append("<span class='circle-select-active'></span>")
    if ($(this).hasClass('item-selected')) {
        $('#turn').val(4);
        step2.timeEdit();
    } else if ($('.grade').hasClass('item-selected')) {
        step2.timeHandle();
    } else {
        beforeItemNotSelectedShowError();
    }
})

$('.date').click(function () {
    let parentCircleSelect = $('.circle-select');
    parentCircleSelect.empty();
    parentCircleSelect.append("<span class='circle-select-active'></span><span></span>")
    if ($('.time').hasClass('item-selected')) {
        step3.dateHandle();
    } else {
        step3.getDate();
    }
})


$('.set-record').click(function () {

    $('.go-back').empty();
    if ($('.date').hasClass('item-selected')) {
        $('.ajax-back').fadeIn(200);
        $('#online-items-end-step').fadeIn();
    } else {
        beforeItemNotSelectedShowError();
    }
});

$('.end-step-close').click(function () {
    step1.closeItem('.ajax-back');
    step1.closeItem('.end-step-section');
})

$('.next-record').click(function () {
    if ($('.date').hasClass('item-selected')) {
        step4.lastRecordHandleStepOne();
    } else {
        beforeItemNotSelectedShowError();
    }
});

/*$("#name , #mobile , #password").change(function () {
    //step4.lastRecordHandleStepTwo();
    alert("ok");
});*/

$('.last-record__submit').click(function () {
    step4.lastRecordHandleStepTwo();
});


function beforeItemNotSelectedShowError() {
    alert("لطفا آیتم قبلی را انتخاب نمیایید !");
}


function recordEvent(tag, turn) {
    let step = $(tag).text();
    let dataID = $(tag).attr('data-id');
    let data = {'turn': turn, 'step': step, 'dataID': dataID};

    switch (turn) {
        case 1 :
            step1.stepOneHandle('/online/recordHandle', data);
            break;
        case 2 :
            step1.stepOneHandle('/online/recordHandle', data);
            break;
        case 3 :
            step1.stepOneHandle('/online/recordHandle', data);
            break;
        case 4:
            step2.stepTwoHandle('/online/recordHandle', data);
            break;
        case 5:
            step3.stepTreeHandle('/online/recordHandle', data);
            break;
        case 6:
            step3.stepTreeHandle('/online/recordHandle', data);
            break;

    }
}


