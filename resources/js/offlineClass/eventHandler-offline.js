const stepOne = new StepOffline_1();
const stepTwo = new StepOffline_2();
const stepThree = new StepOffline_3();
const stepFour = new StepOffline_4();

const itemsStartOffline = (stepNumber, item = '') => {
    const actionType = '';//updateOrCreate(item);
    switch (stepNumber) {
        case 1 :
            stepOne.startStep(actionType);
            break
        case 2 :
            if (indexOffline.alertOnlineClass()) {
                stepTwo.startStep(actionType);
            }
            break
        case 3 :
            stepThree.startStep(actionType);
            break;
        case 4 :
            if (indexOffline.alertOnlineClass(4)) {
                stepFour.startStep(actionType);
            }
            break
    }
}

const recordHandleOffline = (tag, turn) => {
    const dataID = $(tag).attr('data-id');
    const value = $(tag).text();
    const data = {dataID: dataID, value: value};
    switch (turn) {
        case 1:
            stepOne.stepHandle(turn, data);
            break;
        case 2:
            stepOne.stepHandle(turn, data);
            break;
        case 3:
            stepOne.stepHandle(turn, data);
            break;
        case 4:
            stepTwo.stepHandle(turn, data);
            break;
        case 5:
            stepTwo.stepHandle(tag, data);
            break;
        case 6:
            stepThree.stepHandle(tag, data);
            break;
        case 7:
            stepThree.stepHandle(turn, data);
            break;
        case 8:
            stepFour.stepHandle(turn, data);
            break;
        case 9:
            stepFour.stepHandle(turn, data);
            break;
    }
}

backHandleOffline = (mainItem) => {
    stepOne.buttonBack(mainItem);
}

const formSubmitOffline = () => {
    $('form').submit();
}

