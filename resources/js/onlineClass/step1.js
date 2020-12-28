class Step1 extends index {
    constructor() {
        super();
    }

    stepOneStart() {
        this.ajaxStart();
        this.post('/onlineClass/step1/one', {}).done(function (result) {
            let thisClass = new Step1();
            thisClass.appendItems(result);
        });

    }

}

