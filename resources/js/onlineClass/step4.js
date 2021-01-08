class Step4 extends validate {

    constructor(props) {
        super(props);
    }

    validateForm = (step = '') => {

        let arrayForm = {};
        if (step === '') {
            arrayForm = {
                0: {
                    'name': 'description',
                    'required': 'required',
                    'type': 'string',
                    'max': 255,
                    'min': 5,
                    'message': "لطفا توضیحات را وارد کنید ."
                }, 1: {
                    'name': 'level',
                    'required': 'required',
                    'type': 'radio',
                    'max': 255,
                    'min': 1,
                    'message': "لطفا سطح خود را انتخاب کنید ."
                }
            };
        } else if ('step2') {
            arrayForm = {
                0: {
                    'name': 'name',
                    'required': 'required',
                    'type': 'string',
                    'max': 255,
                    'min': 5,
                    'message': "لطفا نام خود را وارد کنید ."
                }, 1: {
                    'name': 'mobile',
                    'required': 'required',
                    'type': '',
                    'max': 11,
                    'min': 11,
                    'message': "لطفا شماره تماس خود را به درستی وارد کنید"
                }
            };
        }


        return this.formValidation(arrayForm);
    }
    lastRecordHandleStepTwo = () => {

        if (this.validateForm("step2")) {
            let name = $('#name').val();
            let mobile = $('#mobile').val();
            let data = {name: name, mobile: mobile};
            this.post('/online/recordNameMobile', data).done((response) => {
                if (response['status'] === 'success') {
                    Step4.ajaxBackEnd();
                    $('.last-record__submit').text('تایید رمز ارسال شده ');
                    $('#password-verify-parent').removeClass('dont-show-password-section');

                    let i = 60;
                    let timer = setInterval(() => {
                        let TimerSection=$('.timer');
                        TimerSection.text(i);
                        i--;
                        if (i === 0) {
                            $('.last-record__submit').remove();
                            $("#timer-parent").append("<p class='text-center direction-rtl text-danger'>متاسفانه فرصت ارسال رمز عبور به اتمام رسید ! لطفا مجددا تلاش بفرمایید </p>")
                            clearInterval(timer);
                            TimerSection.remove();
                            return false;
                        }
                    }, 1000)
                }
            });
        }
    }

    lastRecordHandleStepOne = () => {
        if (this.validateForm()) {
            let description = $("textarea[name='description']").val();
            let level = $("input[name='level']:checked").val();
            let data = {description: description, level: level};
            this.post('/online/descriptionHandle', data).done((response) => {
                Step4.ajaxBackEnd();
                if (response['status'] === 'success') {
                    $('#online-items-end-step').fadeOut();
                    $('#last-step-record').fadeIn();
                }
            });
        }
    }

}
