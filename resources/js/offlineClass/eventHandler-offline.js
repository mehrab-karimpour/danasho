const stepOne = new StepOffline_1();
const stepTwo = new StepOffline_2();
const stepThree = new StepOffline_3();
const stepFour = new StepOffline_4();

/*
* get turn for easy management steps and items
* */

const Turn = () => {
    return $('#turn-offline').val();
}

/*
* grades and units lessons .
* */
One = (item, turn) => {
    stepOne.completing('.grade-offline');
    // we have create it .
    stepOne.startStep(turn);
}
/*
* count questions and prices
* */
Two = (item) => {
    stepTwo.completing('.question-count');
    stepTwo.startStep();
}

/*
* date get response questions
* */
Three = (item) => {
    stepThree.completing('date-get-answer');
    stepThree.startStep();
}


/*
* go record request
* */
Four = () => {
    stepFour.completing('get-record-offline');
    stepFour.startStep();
}

itemHandle = (stepNumber, tag) => {
    const thisTag = $(tag);
    const turn = Turn();
    let circleSelect = $('.circle-select-offline span');

    switch (stepNumber) {
        case 1:
            One(thisTag, turn);
            break;
        case 2:
            circleSelect.eq(0).remove();
            circleSelect.eq(1).addClass("circle-select-active");
            Two(thisTag, turn);
            break;
        case 3:
            circleSelect.eq(0).remove();
            circleSelect.eq(1).addClass("circle-select-active");
            Three(thisTag, turn);
            break;
        case 4:
            Four(thisTag, turn);
            break;
    }
}

/*
* this method passed data to steps files for record all items .
* */

offlineRecorder = (tag, turn) => {
    const step = $(tag).text();
    const dataID = $(tag).attr('data-id');
    const data = {'turn': turn, 'step': step, 'dataID': dataID};
    const goBackButtonParent = $('.go-back-offline');
    switch (turn) {
        case 1 :
            window.offlineGrade = $('.grade-offline');
            goBackButtonParent.empty();
            goBackButtonParent.append("<button class='btn btn-secondary' onclick='itemHandle(1,window.offlineGrade)'>بازگشت به عقب</button>")
            stepOne.handleStep('/offline/recordHandle', data);
            break;
        case 2 :
            stepOne.handleStep('/offline/recordHandle', data);
            break;
        case 3 :
            stepOne.handleStep('/offline/recordHandle', data);
            break;
        case 4 :
            stepTwo.handleStep('/offline/recordHandle', data);
            break;
        case 6 :
            stepThree.handleStep('/offline/recordHandle', data);
            break;
        case 7 :
            stepThree.handleStep('/offline/recordHandle', data);
            break;
        case 8 :
            stepFour.handleStep('/offline/recordHandle', data);
            break;
        case 9 :
            const offline_verify_token = $("input[name='offline_verify_token']").val();
            let dataWithPassword = {'offline_verify_token':offline_verify_token,'turn': turn, 'step': step, 'dataID': dataID};
            stepFour.endStep('/offline/recordHandle', dataWithPassword);
            break;
    }
}

/*
* upload question file
* */

const uploadQuestionFile = (tag) => {
    stepTwo.handleStep('/offline/recordHandle', tag, 1)
}


/*
* close modal offline
* */
const offlineModalClose = () => {
    $("#offline-items").fadeOut();
    $('.ajax-back').fadeOut();
}

$(() => {
    $('.ajax-back').click(() => {
        offlineModalClose();
    });
})

