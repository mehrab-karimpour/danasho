class StepOffline_2 extends indexOffline {
    constructor() {
        super();
    }

    /*
    *    END
    * */
    static endStep = (stepTitle) => {
        indexOffline.completeEnd('.question-count');
        indexOffline.completedStep(stepTitle, '.question-count');
        const offlineItem = $('#offline-items');
        offlineItem.fadeOut();
        $('.ajax-back').fadeOut();
        offlineItem.empty();
        offlineItem.append("<br><h5 class='step-title-offline text-center'>انتخاب روز مورد نظر</h5><input type='hidden'  id='turn-offline' name='turn-offline' value='6'><input type='hidden'  id='edit-offline' name='edit-offline' value='0'><span onclick='offlineModalClose()' class='d-block mt-2 ml-1 '><i class='fas fa-times offline-steps-close cursor-pointer'></i></span><div id='list-parent'></div><div class='col-12 d-flex justify-content-center'><ul class='list-group m-0 p-0' id='list-group-offline'></ul></div><div class='col-6 col-md-4 col-xl-2 circle-select-offline'><span class='circle-select-active'></span><span></span><span></span></div><br><div class='go-back-offline text-right'></div><br/>");
    }


    startStep = (turn) => {
        $('.step-title-offline').text('انتخاب تعداد سوال و هزینه آن ');
        $('.go-back-offline').empty();
        $('.ajax-back').fadeIn();
        indexOffline.offlineAppendItems(window.offlineQuestions[0], window.offlineQuestions[1]);
    }

    handleStep = (url, data, file = 0) => {
        if (file === 1) {
            /*
            * upload image questions
            * */
            const question_file = data.files[0];
            let formData = new FormData;
            formData.append('question_file', question_file);
            formData.append('turn', "5");

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                async: true,
                dataType: 'json',
                processData: false,
                cache: false,
                contentType: false,
                success: function (msg) {
                    window.offlineDate = msg;
                    StepOffline_2.endStep(window.stepTwoText);
                },
                fail: function (msg) {
                }
            });
            StepOffline_2.ajaxBackEnd();


        } else {
            window.stepTwoText = data['step'];
            $('#offline-items').empty();
            window.uploadFileSection = "<h6>تصاویر سوالاتی که قصد رفع اشکال انها را دارید اپلود نمایید </h6><br><br><input " +
                "class='form-control' type='file' name='question-file' />";

            this.post('/offline/recordHandle', data).then(function (result) {
                $('#turn-offline').val(result[1]);
                $('#offline-items').append(result);
                $('.step-title-offline').text('ارسال سوالات');
                indexOffline.ajaxBackEnd();
            });
        }
    }

}
