class validate extends index {
    constructor(props) {
        super(props);
    }

    addClassError = (item, classError) => {
        item.addClass(classError);
    }


    removeClassError = (item, classError) => {
        item.removeClass(classError);
    }

    formValidation = (formInfo = {}) => {
        let item;
        let param;
        for (let i = 0; i <= Object.keys(formInfo).pop(); i++) {
            item = $("*[name='" + formInfo[i].name + "']");
            let valItem = item.val();
            param = formInfo[i]; // parameter requirement is array . this array can be 'require' ,'string' ,'numeric'
            if (param['required'] === "required") {
                if (valItem === '') {
                    this.addClassError(item, 'form-danger');
                } else {
                    this.removeClassError(item, 'form-danger');
                }
            }
            if (param['type'] === "radio") {

                $("body").find("input[type=radio]").each(function (key, value) {
                    if ($(this).prop('checked')) {
                        return window.radioValid = true;
                    }
                });
                if (window.radioValid) {

                    this.removeClassError(item, 'form-danger');
                } else {
                    let parent = item.parents(".form-item-parent");
                    parent.find('p.text-danger').remove();
                    parent.append("<p class='text-danger'>" + param['message'] + "</p>");
                    this.addClassError(item, 'form-danger')
                }

            }
            if (param['type'] === "string") {
                if ($.isNumeric(valItem)) {
                    this.addClassError(item, 'form-danger')
                } else {
                    this.removeClassError(item, 'form-danger');
                }
            }
            if (param['type'] === "numeric") {
                if (!$.isNumeric(valItem)) {
                    this.addClassError(item, 'form-danger')
                } else {
                    this.removeClassError(item, 'form-danger');
                }
            }
            if (valItem.length > param['max']) {
                this.addClassError(item, 'form-danger')
            } else {
                this.removeClassError(item, 'form-danger');
            }
            if (valItem.length < param['min']) {
                this.addClassError(item, 'form-danger')
            } else {
                this.removeClassError(item, 'form-danger');
            }


            if (item.hasClass('form-danger')) {
                let parent = item.parents(".form-item-parent");
                parent.find('p.text-danger').remove();
                parent.append("<p class='text-danger'>" + param['message'] + "</p>");
            }
        }

        return !$('body *').hasClass('form-danger');
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
