class StepOffline_4 extends indexOffline {
    constructor(props) {
        super(props);
    }

    static endStep = (stepTitle) => {

    }

    startStep = () => {
        this.completing('.get-record-offline');
        let offlineItem = $('#offline-items');
        offlineItem.css("opacity", "1");
        offlineItem.fadeIn();
        $('.ajax-back').fadeIn();
    }

    handleStep = (url, data) => {
        let v = new validate();
        if (v.formValidation({
            0: {
                'name': 'offline_name',
                'require': 'require',
                'type': 'string',
                'max': 255,
                'min': 2,
                'message': "لطفا نام کامل خود را وارد نمایید"
            },
            1: {
                'name': 'offline_mobile',
                'require': 'require',
                'type': 'numeric',
                'max': 11,
                'min': 11,
                'message': "لطفا شماره موبایل را وارد نمایید (شماره باید 11 رقمی باشد)"
            }
        })) {
            const mobileOffline = $('#offline_mobile').val();
            const nameOffline = $('#offline_name').val();
            const data = {mobile: mobileOffline, name: nameOffline};
            this.post(url, data).then((response) => {
                if (response[0]['status'] === "success") {
                    const tag = "<div class='col-12 d-flex justify-content-around'><input class='form-control text-right col-12 col-md-5' id='offline_verify_token' type='text' name='offline_verify_token' placeholder='رمز تایید را وارد کنید'><label for='offline_verify_token' class='col-12 text-right direction-rtl col-md-6'>شماره موبایل خود را وارد کنید : </label></div><div class='d-flex justify-content-center mt-2' id='timer-parent'><span class='offline-timer'>46</span></div>";
                    $('#verify-code-offline').append(tag);
                    let i = 60;
                    let timer = setInterval(() => {
                        let TimerSection = $('.offline-timer');
                        TimerSection.text(i);
                        i--;
                        if (i === 0) {
                            $('.last-record__submit-offline').remove();
                            $("#timer-parent-offline").append("<p class='text-center direction-rtl text-danger'>متاسفانه فرصت ارسال رمز عبور به اتمام رسید ! لطفا مجددا تلاش بفرمایید </p>")
                            clearInterval(timer);
                            TimerSection.remove();
                            return false;
                        }
                    }, 1000)

                }
            });
        }
    }

}
