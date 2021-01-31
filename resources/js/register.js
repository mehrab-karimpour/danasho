class register extends validate {
    constructor() {
        super();

    }

    valid = (typeValidate = '') => {
        let formData = {};

        if (typeValidate === 'form') {
            formData = {
                0: {
                    'name': 'fullName',
                    'require': 'require',
                    'type': 'string',
                    'max': 4,
                    'min': 1,
                    'message': "لطفا نام و نام خانوادگی را وارد کنید"
                }, 1: {
                    'name': 'mobile',
                    'require': 'require',
                    'type': 'numeric',
                    'max': 11,
                    'min': 11,
                    'message': "لطفا شماره موبایل خود را وارد کنید"
                }, 2: {
                    'name': 'password',
                    'require': 'require',
                    'type': 'numeric',
                    'max': 12,
                    'min': 6,
                    'message': "لطفا رمز ارسال شده را وارد نمایید"
                }, 3: {
                    'name': 'password',
                    'require': 'require',
                    'type': 'numeric',
                    'max': 12,
                    'min': 6,
                    'message': "لطفا رمز ارسال شده را وارد نمایید"
                }
            }
        } else {
            formData = {
                0: {
                    'name': 'fullName',
                    'require': 'require',
                    'type': 'string',
                    'max': 4,
                    'min': 1,
                    'message': "لطفا نام و نام خانوادگی را وارد کنید"
                }, 1: {
                    'name': 'mobile',
                    'require': 'require',
                    'type': 'numeric',
                    'max': 11,
                    'min': 11,
                    'message': "لطفا شماره موبایل خود را وارد کنید"
                }, 2: {
                    'name': 'mobile',
                    'require': 'require',
                    'type': 'numeric',
                    'max': 11,
                    'min': 11,
                    'message': "لطفا شماره موبایل خود را وارد کنید"
                }
            }
        }
        return this.formValidation(formData);
    }

    static
    resendPassword = () => {
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
        if (this.valid('form')) {
            $('form').submit();
        }
    }

}

const registerClass = new register();

$(
    '.submit-register-form'
).click(
    function () {
        registerClass.sendForm();
    }
)


$(
    '#send-password-request-click'
).click(
    function () {

        registerClass.passwordRequestHandle();
    }
)

$(
    '.send-password-again'
).click(
    function () {
        const registerClass = new register();
        registerClass.passwordRequestHandle();
    }
)


$(
    function () {
        const carouselItem = $('.box-item');
        const countCarouselItem = carouselItem.length;
        carouselItem.eq(0).show(0);
        let i = 2;
        setInterval(() => {
            if (i < countCarouselItem) {
                carouselItem.hide(0);
                carouselItem.eq(i - 1).fadeIn(1000);
                i++;
            } else {
                i = 0;
            }
        }, 5500)
    }
)


