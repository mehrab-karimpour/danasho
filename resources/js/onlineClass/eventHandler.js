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


