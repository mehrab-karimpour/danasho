class Step1 extends index {
    constructor() {
        super();

    }

    stepOneStart() {
        this.ajaxStart();
        this.post('/GetGrades', {}).done(function (result) {
           // let thisClass = new Step1();

            index.appendItems(result);
        });
    }

}

