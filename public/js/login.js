class login extends validate {
    constructor() {
        super();
    }

    valid = () => {
        let formData = {};

        formData = {
            0: {
                'name': 'mobile',
                'require': 'require',
                'type': 'numeric',
                'max': 11,
                'min': 11,
                'message': "لطفا شماره موبایل را وارد کنید"
            }, 1: {
                'name': 'password',
                'require': 'require',
                'type': '',
                'max': 12,
                'min': 6,
                'message': "لطفا رمز عبور خود را وارد کنید"
            }, 2: {
                'name': 'password',
                'require': 'require',
                'type': '',
                'max': 12,
                'min': 6,
                'message': "لطفا رمز عبور خود را وارد نمایید"
            }

        }
        return this.formValidation(formData);
    }

    static resendPassword = () => {
        $(".timer").slideUp();
        $(".timer").text("120");
        $('.send-password-again').fadeIn();
    }

    recoveryPasswordHandleStepOne = () => {
        const getMobileNumberTemplate = "<form action='/login' method='post' id='recovery-password' class='myForm text-center needs-validation'><div></div><div class='form-group mt-5 form-item-parent direction-rtl'><i class='fas fa-user'></i><input class='myInput text-center' name='mobile-recovery' type='text' placeholder='شماره موبایل' id='username' required></div><div><button type='button' onclick='mobileHandler()' id='send-mobile-number' class='butt login-submit'>ارسال</button></div></form>";
        const leftLoginSection = $('.myLeftCtn-login');
        leftLoginSection.hide(0);
        leftLoginSection.empty();
        leftLoginSection.append(getMobileNumberTemplate);
        leftLoginSection.fadeIn(600);
    }

    recoveryPasswordHandleStepTwo = (resendToken = false) => {
        // validation and send mobile number
        let formData = {};
        if (resendToken === false) {
            const formData = {
                0: {
                    'name': 'mobile-recovery',
                    'require': 'require',
                    'type': 'numeric',
                    'max': 11,
                    'min': 11,
                    'message': "لطفا شماره موبایل را وارد کنید"
                }
            }
        }

        if (this.formValidation(formData) || resendToken) {
            const mobile = $("input[name='mobile-recovery']").val();
            window.mobile = mobile;
            const url = "/recovery-password";
            const _token = $("input[name='_token']").val();
            let data = {};
            if (resendToken) {
                data = {_token: _token, mobile: window.mobile};
            } else {
                data = {_token: _token, mobile: mobile};
            }

            this.ajaxBackStart();
            $.post(
                url,
                data,
                function (msg) {
                    const loginModal = $("#loginModal");
                    if (msg['status'] === 'success') {
                        loginClass.ajaxHide();
                        loginClass.recoveryPasswordHandleStepTree();
                    } else if (msg['status'] === "undefined") {

                        loginModal.find('.modal-body').append("<div class='alert text-right alert-danger'>شماره تلفنی که وارد کرده اید در سامانه داناشو ثبت نشده است </div>");
                        loginModal.modal();
                        loginClass.ajaxHide();
                    } else {
                        loginModal.find('.modal-body').append("<div class='alert text-right alert-danger'>با عرض پوزش ! متاسفانه خطایی رخ داده است لطقا دوباره تلاش بفرمایید </div>");
                        loginModal.modal();
                        loginClass.ajaxHide();
                    }
                }
            )

        }
    }

    recoveryPasswordHandleStepTree = () => {
        // get verify token
        const getMobileNumberTemplate = "<form action='/login' method='post' id='recovery-password' class='myForm text-center needs-validation'><div></div><div class='form-group form-item-parent direction-rtl'><i class='fas fa-lock'></i><input class='myInput text-center' name='verify-token' type='number' id='verify-token' placeholder='کد ارسال شده را وارد نمایید ' required><br><br><div id='timer-section' class='d-flex justify-content-around col-8 col-sm-6 col-md-4 col-lg-2 m-auto m-0 direction-ltr'><strong class='minutes'>1</strong><strong class='colon'>:</strong><strong class='second'>59</strong></div></div><div><button type='button' onclick='checkTokenHandler()' id='submit-verify-token' class='butt login-submit'>ارسال</button></div></form>";
        const leftLoginSection = $('.myLeftCtn-login');
        leftLoginSection.hide(0);
        leftLoginSection.empty();
        leftLoginSection.append(getMobileNumberTemplate);
        leftLoginSection.fadeIn(600);
        let i = 58;  // 58
        const setSecondInterval = setInterval(() => {
            $('.second').text(i);
            i--;
            if (i === 0) {
                clearInterval(setSecondInterval);
                setMinuteInterVal();
            }
        }, 1000);
        const setMinuteInterVal = () => {
            let j = 59; // 59
            const setMinuteInterval = setInterval(() => {
                $('.second').text(j);

                $('.minutes').text(0);
                j--;
                if (j === 0) {
                    const alertDanger = $('.alert-danger');
                    alertDanger.css('opacity', '0');
                    if (alertDanger.length === 2) {
                        window.location = "/login";
                    }
                    $("#timer-section").remove();
                    clearInterval(setMinuteInterval);
                    const btnSubmitVerify = $("#submit-verify-token");
                    btnSubmitVerify.removeAttr("onclick");
                    btnSubmitVerify.css('opacity', '30%');
                    const loginModal = $("#loginModal");
                    loginModal.find('.modal-body').append("<div class='alert text-right alert-danger'>زمان شما به اتمام رسید ! لطفا دوباره تلاش بفرمایید  </div>");
                    loginModal.modal();
                    $("#recovery-password").append("<a class='text-primary cursor-pointer' onclick='mobileHandler(true)'>ارسال دوباره</a>");
                }

            }, 1000);
        }
    }

    recoveryPasswordHandleStepFour = () => {
        // send verify token
        const formData = {
            0: {
                'name': 'verify-token',
                'require': 'require',
                'type': 'numeric',
                'max': 4,
                'min': 4,
                'message': "لطفا کد چهار رقمی ارسال شده را وارد نمایید"
            }
        }

        if (this.formValidation(formData)) {
            const verifyToken = $("input[name='verify-token']").val();
            const url = "/recovery-password-check-verify";
            const _token = $("input[name='_token']").val();
            const data = {_token: _token, verifyToken: verifyToken};
            $.post(
                url,
                data,
                function (msg) {
                    if (msg['status'] === 'success') {
                        loginClass.recoveryPasswordHandleStepFive();
                    } else {
                        loginClass.ajaxHide();
                        const loginModal = $("#loginModal");
                        loginModal.find('.modal-body').append("<div class='alert text-right alert-danger'>کد وارد شده صحیح نیست </div>");
                        loginModal.modal();
                    }
                }
            )
        }
    }

    recoveryPasswordHandleStepFive = () => {
        // insert new password template
        loginClass.ajaxHide();
        const getNewPasswordTemplate = "<form action='/login' method='post' id='login-form' class='myForm text-center needs-validation'><div class='form-group form-item-parent direction-rtl'><i class='fas fa-lock'></i><input class='myInput text-center' name='new-password' type='password' id='password' placeholder='رمز عبور جدید' required></div><div class='form-group form-item-parent direction-rtl'><i class='fas fa-lock'></i><input class='myInput text-center' name='new-password-repeat' type='password' id='password' placeholder='تکرار رمز عبور جدید' required></div><button type='button' onclick='sendNewPasswordHandler()' id='submit-new-password' class='butt login-submit'>ورود</button></form>";
        const leftLoginSection = $('.myLeftCtn-login');
        leftLoginSection.hide(0);
        leftLoginSection.empty();
        leftLoginSection.append(getNewPasswordTemplate);
        leftLoginSection.fadeIn(600);
    }

    recoveryPasswordHandleStepSix = () => {
        const formData = {
            0: {
                'name': 'new-password',
                'require': 'require',
                'type': '',
                'max': 12,
                'min': 6,
                'message': "لطفا رمز عبور خود را وارد نمایید . (حداقل 6 کاراکتر و حداکثر 12 کاراکتر باشد)"
            }
        }
    }


    ajaxBackStart = () => {
        $(document).ajaxStart(function () {
            $('#ajax-loader').fadeIn();
            $('#ajax-leader-back').fadeIn(200);
        })
    }

    ajaxHide = () => {
        $('#ajax-loader').fadeOut();
        $('#ajax-leader-back').fadeOut(200);
        $('.ajax-back').fadeOut();
    }

    sendForm = () => {
        if (this.valid()) {
            $('#login-form').submit();
        }
    }

}

const loginClass = new login();

$('.login-submit').click(function () {
        loginClass.sendForm();
    }
)

$('#recovery-password').click(function () {
    loginClass.recoveryPasswordHandleStepOne();
});

const mobileHandler = (resendToken = false) => {
    loginClass.recoveryPasswordHandleStepTwo(resendToken);
}

const checkTokenHandler = () => {
    loginClass.recoveryPasswordHandleStepFour();
}

const sendNewPasswordHandler = () => {
    loginClass.recoveryPasswordHandleStepSix();
}
