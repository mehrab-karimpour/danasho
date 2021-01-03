class validate {
    constructor() {
    }

    formValidation = (formInfo = {}) => {
        let item;
        let param;
        for (let i = 0; i < formInfo.length; i++) {
            item = $("*[name='" + formInfo[0] + "']");
            param = formInfo[1]; // parameter requirement is array . this array can be 'require' ,'string' ,'numeric'
            for (let j = 0; j < param.length; j++) {

            }
        }
    }
}

let v = new validate();
v.formValidation({
    'email': {
        'require': 'require',
        'type': 'string',
        'max': 15,
        'min': 15
    },
    'mobile': {
        'require': 'require',
        'type': 'numeric',
        'max': 4,
        'min': 1
    }
});
