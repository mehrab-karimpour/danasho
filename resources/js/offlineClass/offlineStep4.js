class StepOffline_4 extends indexOffline {

    constructor(props) {
        super(props);
    }

    startStep = (actionType) => {
        $("#list-group-offline").remove();
        $("#offline-item-end-step").append("<br><br><div class='d-flex justify-content-between direction-rtl'><p class='col-5'>نام و نام خانوادگی :</p><input type='text' id='name' name='name' placeholder='نام و نام خانوادگی' class='form-control col-7'></div><br><div class='d-flex justify-content-between direction-rtl'><p class='col-5'>شماره تماس :</p><input type='text' id='name' name='name' placeholder='شماره تماس' class='form-control col-7'></div><br><button onclick='recordHandleOffline(this,8)' class='btn btn-primary' type='button'>ارسال</button>");
        $('.go-back-offline').empty();
        this.circleSelect(2, 0);
        this.completing('.get-record-offline');
        indexOffline.stepsTitle('لطفا مشخصات خود را وارد نمایید ');
        $('.ajax-back').fadeIn();
        $('#offline-items').fadeIn();
    }

    stepHandle = (turn, data) => {
        let formInfo = {};
        switch (turn) {
            case 7:
                if ($("#questions")[0].files.length === 0) {
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
                } else {
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
                        }, 2: {
                            'name': 'img',
                            'require': 'require',
                            'type': 'file',
                            'max': 26214400, // 26214400 = 25 mb
                            'min': 10,
                            'message': "لطفا توجه فرمایید که حجم عکس باید کمتر از 25 مگابایت باشد"
                        }
                    }
                }

                if (this.formValidation(formInfo)) {
                    const descriptionLastItem = $('#online-items-end-step');
                    descriptionLastItem.css('opacity', 0);
                    descriptionLastItem.css('position', 'absolute');
                    descriptionLastItem.css('z-index', '1');
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
                            $('#online-form-items').append("<input type='hidden' name='user_id' value='" + response['user_id'] + "'>");
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
                    alert("ok")
                    this.post('/online/check-verify-password', formData).then((response) => {
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
                        } else {
                            const onlineClassModal = $("#online-class-modal");
                            onlineClassModal.find('.modal-body').text("کد وارد شده صحیح نیست !");
                            $('#exampleModalCenterTitle').text("هشدار !");
                            onlineClassModal.modal();
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
