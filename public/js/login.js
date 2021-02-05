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

    passwordRequestHandle = () => {

        if (this.valid()) {
            const token = $("input[name='_token']").val();
            const data = {_token: token};
            const url = "/password-request";
            $.post(
                url,
                data,
                function (msg) {
                    if (msg === 'success') {
                        $('.send-password-again').slideUp();
                        $('.timer').slideDown();
                        $('#send-password-request-click').hide();
                        $('.insert-password').fadeIn(400);
                        let i = 4;
                        let timer = setInterval(() => {
                            $(".timer").text(i);
                            if (i < 1) {
                                clearInterval(timer);
                                register.resendPassword();
                                return false;
                            } else {
                                i--;
                            }
                        }, 1000)
                    }
                }
            )
        }
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
