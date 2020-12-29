class Step1 extends index {
    constructor() {
        super();

    }

    stepOneStart() {

        if (this.lengthLi() < 1) {
            this.ajaxStart();
            this.post('/online/GetGrades', {}).done(function (result) {
                index.appendItems(result);

            });
        } else {
            this.ajaxBackStart();
            this.showItem("#online-items");
        }
    }

    recordHandle = (tag) => {
        let turn = $('#turn').val();
        let dataID = $(tag).attr("data-id");
        let step = $(tag).text();
        let data = {'turn': turn, 'step': step, 'dataID': dataID};

        index.ajaxBackStart()
        this.post('/online/recordHandle', data).done(function (result) {
            index.appendItems(result[0], result[1]);
        });
        index.ajaxBackEnd();
    }

}

