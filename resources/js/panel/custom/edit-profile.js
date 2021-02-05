window.formatPersian = false;
$('#birthDate').persianDatepicker({
    initialValueType: 'gregorian',
    responsive: true,
    autoClose: true,
    format: 'YYYY-MM-DD',
    "toolbox": {
        "calendarSwitch": {
            "enabled": false
        }
    },
});

window.password = true;
window.repeatPassword = true;

const checkPassword = () => {
    const passwordRepeat = $("input[name='repeat-password']");
    const password = $("input[name='password']");
    const parentRepeatPassword = passwordRepeat.parents('.form-group');
    const parentPassword = password.parents('.form-group');
    parentPassword.find('.alert').remove();
    parentRepeatPassword.find('.alert').remove();
    if (password.val().length < 6) {
        window.password = false;
        parentPassword.append("<p class='alert alert-danger'>رمز عبور باید حداقل 6 کاراکتر باشد</p>");
    } else if (password.val().length > 12) {
        window.password = false;
        parentPassword.append("<p class='alert alert-danger'>رمز عبور باید حداکثر 12 کاراکتر باشد</p>");
    } else {
        window.password = true;
    }
    if (passwordRepeat.val() === password.val()) {
        window.repeatPassword = true;
        //parentRepeatPassword.append("<p class='alert alert-success'>تکرار رمز عبور صحیح میباشد </p>");
    } else {
        window.repeatPassword = false;
        parentRepeatPassword.append("<p class='alert alert-danger'>تکرار رمز عبور با مقدار ان برابر نیست </p>");
    }
}

$("input[type='password']").keyup(function () {
    checkPassword();
})


$("button[type='button']").click(function () {
    if (window.password && window.repeatPassword){
        $('#edit-profile').submit();
    }else{
        alert("error")
    }

})

$(function () {
    $("select").change(function () {
        if ($(this).val().trim() === '') {
            $(this).removeClass('form-validate-success');
            $(this).addClass('form-validate-warning');
        } else {
            $(this).removeClass('form-validate-warning');
            $(this).addClass('form-validate-success');
        }

    })
})

$(function () {
    const input = $("#edit-profile input");
    input.each((key, item) => {
        const valInput = input.eq(key).val();
        if (valInput === "") {
            input.eq(key).addClass('form-validate-warning');
        } else {
            input.eq(key).addClass('form-validate-success');
        }
    });

    const select = $("#edit-profile select");
    select.each((key, item) => {
        const valSelect = select.eq(key).val();
        if (valSelect === "") {
            select.eq(key).addClass('form-validate-warning');
        } else {
            select.eq(key).addClass('form-validate-success');
        }
    });


})

