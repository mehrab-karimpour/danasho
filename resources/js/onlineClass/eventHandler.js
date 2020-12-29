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


