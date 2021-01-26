class Step4 extends index {

    constructor(props) {
        super(props);
    }

    startStep = (actionType) => {
        $('#online-items-end-step .alert-danger').remove();
        $('.ajax-back').fadeIn();
        $('#last-step-record').fadeOut();
        $('#online-items-end-step').fadeIn();
    }

    stepHandle = (turn, data) => {
        let formInfo = {};
        switch (turn) {
            case 7:
                formInfo = {
                    0: {
                        'name': 'level',
                        'require': 'require',
                        'type': 'radio',
                        'max': 25,
                        'min': 1,
                        'message': "لطفا سطح بندی را انتخاب کنید "
                    }, 1: {
                        'name': 'description',
                        'require': 'require',
                        'type': 'string',
                        'max': 255,
                        'min': 1,
                        'message': "لطفا توضیحات خود را وارد نمایید (حداکثر 255 کاراکتر )"
                    }
                }
                if (this.formValidation(formInfo)) {
                    $('#online-items-end-step').hide();
                    $('#last-step-record').fadeIn();
                }
                break;
            case  8:
                formInfo = {
                    0: {
                        'name': 'name',
                        'require': 'require',
                        'type': 'string',
                        'max': 25,
                        'min': 1,
                        'message': "لطفا نام و نام خانوادگی خود را وارد کنید"
                    }, 1: {
                        'name': 'mobile',
                        'require': 'require',
                        'type': 'numeric',
                        'max': 11,
                        'min': 11,
                        'message': "لطفا شماره موبایل خود را وارد کنید "
                    }
                }

                if (this.formValidation(formInfo)) {
                    const name = $("input[name='name']").val();
                    const mobile = $("input[name='mobile']").val();
                    const userData = {mobile: mobile, name: name};
                    this.post('/online/mobileHandle', userData).then((response) => {
                        if (response === 'error') {
                            $('#last-step-record').prepend("<p class='alert direction-rtl alert-danger'>متاسفیم ! خطایی رخ داده است لطفا دوباره تلاش کنید . </p>");
                        } else {
                            const passWordVerify = $('#password-verify-parent');
                            passWordVerify.css('opacity', 1);
                            passWordVerify.css('position', 'relative');
                            let i = 119;
                            const timer = $('.timer');
                            let verifyTimer = setInterval(() => {
                                if (i > 0) {
                                    timer.text(i);
                                    i--;
                                } else {
                                    clearInterval(verifyTimer);
                                    return false;
                                }
                            }, 1000);
                        }
                    });
                }
        }
    }


    endStep = (data) => {
        index.appendInput('period-input', 'period', data.value);
        Step1.completedStep(data.value, '.date ');
        Step1.completeEnd('.date');
    }

}
