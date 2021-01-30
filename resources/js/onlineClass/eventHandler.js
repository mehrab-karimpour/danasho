let step1 = new Step1();
let step2 = new Step2();
let step3 = new Step3();
let step4 = new Step4();

const updateOrCreate = (item) => {
    if ($(item).hasClass('item-selected')) {
        return 'edit';
    } else {
        return 'create';
    }
}

const itemsStart = (stepNumber, item = '') => {
    const actionType = updateOrCreate(item);
    switch (stepNumber) {
        case 1 :
            step1.startStep(actionType);
            break
        case 2 :
            step2.startStep(actionType);
            break
        case 3 :
            step3.startStep(actionType);
            break;
        case 4 :
            step4.startStep(actionType);
            break

    }
}

const recordHandle = (tag, turn) => {
    const dataID = $(tag).attr('data-id');
    const value = $(tag).text();
    const data = {dataID: dataID, value: value};
    switch (turn) {
        case 1:
            step1.stepHandle(turn, data);
            break;
        case 2:
            step1.stepHandle(turn, data);
            break;
        case 3:
            step1.stepHandle(turn, data);
            break;
        case 4:
            step2.stepHandle(turn, data);
            break;
        case 5:
            step3.stepHandle(tag, data);
            break;
        case 6:
            step3.stepHandle(turn, data);
            break;
        case 7:
            step4.stepHandle(turn, data);
            break;
        case 8:
            step4.stepHandle(turn, data);
            break;
        case 9:
            step4.stepHandle(turn, data);
            break;
    }
}

backHandle = (mainItem) => {
    step1.buttonBack(mainItem);
}

const formSubmit = () => {
    $('form').submit();
}


function beforeItemNotSelectedShowError() {
    alert("لطفا آیتم قبلی را انتخاب نمیایید !");
}

