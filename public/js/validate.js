class validate {
    constructor() {
    }

    formValidation =  (formInfo = {}) => {
        let item;
        let param;
        for (let i = 0; i < Object.keys(formInfo).pop(); i++) {

            item = $("*[name='" + formInfo[i].name + "']");
            param = formInfo[i]; // parameter requirement is array . this array can be 'require' ,'string' ,'numeric'

            if (param['required'] === "required") {
                if (item.val() === '') {
                    item.addClass('form-danger');
                }else {
                    item.removeClass('form-danger');
                }
            }
            if (param['type'] === "string") {
                if ($.isNumeric(item.val())) {
                    item.addClass('form-danger');
                }else {
                    item.removeClass('form-danger');
                }
            }
            if (param['type'] === "numeric") {
                if (!$.isNumeric(item.val())) {
                    item.addClass('form-danger');
                }else {
                    item.removeClass('form-danger');
                }
            }

            if (item.val().length > param['max']) {
                item.addClass('form-danger');
            }else {
                item.removeClass('form-danger');
            }

            if (item.val().length < param['min']) {
                item.addClass('form-danger');
            }else {
                item.removeClass('form-danger');
            }
            let parent = item.parents(".form-item-parent");
            if (item.hasClass('form-danger')) {
                parent.find('.text-danger').remove();
                parent.append("<p class='text-danger mt-2'>" + param['message'] + "</p>");
            } else {
                parent.find('.text-danger').remove();
            }
        }

        return  !$('form input').hasClass('form-danger');
    }


}


/*let v = new validate();
v.formValidation({
    0: {
        'name': 'email',
        'require': 'require',
        'type': 'string',
        'max': 15,
        'min': 15,
        'message': "لطفا فیلد ایمیل را به درستی وارد نمایید"
    },
    1: {
        'name': 'mobile',
        'require': 'require',
        'type': 'numeric',
        'max': 4,
        'min': 1,
        'message': "لطفا فیلد ایمیل را به درستی وارد نمایید"
    }
});*/
