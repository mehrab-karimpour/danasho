class validate {
    constructor(props) {

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
                let parent = item.parents(".form-item-parent");
                const radioStatus = $('body input:radio:checked').val();
                const valEmpty = $('.val-empty').val();
                if (radioStatus === valEmpty) {
                    parent.find('p.text-danger').remove();
                    item.addClass('border border-danger');
                    parent.append("<p class='alert alert-danger'>" + param['message'] + "</p>");
                    this.addClassError(item, 'form-danger');
                } else {
                    $('.alert-danger').remove();
                    this.removeClassError(item, 'form-danger');
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

            if (param['type'] === 'file') {
                item[0].files[0].size > param['max']
                    ? this.addClassError(item, 'form-danger')
                    : this.removeClassError(item, 'form-danger');
            } else {
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
            }

            let parent = item.parents(".form-item-parent");
            if (item.hasClass('form-danger')) {
                parent.find('p.text-danger').remove();
                parent.append("<p class='text-danger'>" + param['message'] + "</p>");
            } else {
                parent.find('p.text-danger').remove();
            }

            let countAlertDanger = parent.find('.alert-danger').length;
            if (countAlertDanger > 1) {
                parent.find('.alert-danger').eq(1).remove();
            }
        }

        return !$('body *').hasClass('form-danger') && !$('body *').hasClass('alert-danger');
    }
}
