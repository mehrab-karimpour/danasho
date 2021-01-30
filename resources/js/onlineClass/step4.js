class Step4 extends index {

    constructor(props) {
        super(props);
    }

    startStep = (actionType) => {
        $('#online-items').fadeOut();
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
                    $('.resend-verify-token').empty();
                    this.ajaxStart();
                    const name = $("input[name='name']").val();
                    const mobile = $("input[name='mobile']").val();
                    const userData = {mobile: mobile, name: name};
                    window.mobile = mobile;
                    this.post('/online/mobileHandle', userData).then((response) => {
                        if (response === 'error') {
                            $('#last-step-record').prepend("<p class='alert direction-rtl alert-danger'>متاسفیم ! خطایی رخ داده است لطفا دوباره تلاش کنید . </p>");
                        } else {
                            $('.verify-password-button').attr("onclick", 'recordHandle(this,9)')
                            const passWordVerify = $('#password-verify-parent');
                            passWordVerify.removeClass('d-none');
                            let i = 45;
                            const timer = $('.timer');
                            let verifyTimer = setInterval(() => {
                                if (i > 0) {
                                    timer.text(i);
                                    i--;
                                } else {
                                    clearInterval(verifyTimer);
                                    this.endStep();
                                    return false;
                                }
                            }, 1000);
                        }
                        index.ajaxBackEnd();
                    });
                }
                break
            case 9:
                /*   check verify token  */
                formInfo = {
                    0: {
                        'name': 'verify-token',
                        'require': 'require',
                        'type': 'numeric',
                        'max': 12,
                        'min': 4,
                        'message': "لطفا رمز ارسال شده را وارد کنید "
                    }
                }

                if (this.formValidation(formInfo)) {
                    const checkVerifyPassword = $("input[name='verify-token']").val();
                    const formData = {checkVerifyPassword: checkVerifyPassword};
                    this.post('online/check-verify-password', formData).then((response) => {
                        Step4.ajaxBackEnd();

                        if (response) {
                            $('#last-step-record').hide();
                            $('.step-online-title').text('دانش آموزش گرامی آیا از درخواست خود اطمینان دارید ؟');
                            const grade = $('.grade').text();
                            const time = $('.time').text();
                            const date = $('.date').text();
                            const mobile = window.mobile;
                            const data = [
                                {
                                    id: 1,
                                    title: "<div class='alert alert-success col-12 d-flex justify-content-between'><p class='col-4 p-0 text-right direction-rtl'>درس :</p><p class='col-8 p-0 text-center'>" + grade + "</p></div>"
                                }, {
                                    id: 2,
                                    title: "<div class='alert alert-success col-12 d-flex justify-content-between'><p class='col-4 p-0 text-right direction-rtl'> مدت زمان و هزینه :</p><p class='col-8 p-0 text-center'>" + time + "</p></div>"
                                }, {
                                    id: 3,
                                    title: "<div class='alert alert-success col-12 d-flex justify-content-between'><p class='col-4 p-0 text-right direction-rtl'> روز و ساعت برگزاری :</p><p class='col-8 p-0 text-center'>" + date + "</p></div>"
                                }, {
                                    id: 4,
                                    title: "<div class='alert alert-success col-12 d-flex justify-content-between'><p class='col-4 p-0 text-right direction-rtl'> شماره موبایل :</p><p class='col-8 p-0 text-center'>" + mobile + "</p></div>"
                                },
                            ]
                            Step4.appendItems(data, 'last');
                            const onlineItems = $('#online-items')
                            onlineItems.find('button').remove();
                            onlineItems.find('.form-submit').append("<button onclick='formSubmit()' class='btn btn-success'>تایید</button>");

                        }
                    })
                }

        }
    }


    endStep = () => {
        $('.dont-show-password-section').addClass('d-none');
        $('.resend-verify-token').append("<p class='text-danger'>متاسفانه زمان شما به اتمام رسید </p> " +
            "<a class='text-primary cursor-pointer' onclick='recordHandle(this,8)'>ارسال مجدد رمز </a>");
    }

}
