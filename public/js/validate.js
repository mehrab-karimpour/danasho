class validate {
    constructor() {
    }

    formValidation = async (formInfo = {}) => {
        let item;
        let param;
        for (let i = 0; i < Object.keys(formInfo).pop(); i++) {

            item = $("*[name='" + formInfo[i].name + "']");
            param = formInfo[i]; // parameter requirement is array . this array can be 'require' ,'string' ,'numeric'

            if (param['required'] === "required") {
                if (item.val() === '') {
                    item.addClass('form-danger');
                }
            }
            if (param['type'] === "string") {
                if ($.isNumeric(item.val())) {
                    item.addClass('form-danger');
                }
            }
            if (param['type'] === "numeric") {
                if (!$.isNumeric(item.val())) {
                    item.addClass('form-danger');
                }
            }
            if (item.val().length > param['max']) {
                item.addClass('form-danger');
            }
            if (item.val().length < param['min']) {
                item.addClass('form-danger');
            }

            if (item.hasClass('form-danger')) {
                let parent = item.parents(".form-item-parent");
                parent.append("<p class='text-danger'>" + param['message'] + "</p>");

            }
        }
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
