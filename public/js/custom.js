class Index {
    constructor() {
    }

    ajaxPost = (data = {}) => {

    }

    validation = () => {
        alert("ok");
    }

    checkPassword = () => {

    }

    ajaxStart = () => {

    }

    ajaxEnd = () => {

    }

    ajaxFadeIn = () => {

    }

    ajaxFadeOut = () => {

    }


}

class Login extends Index {
    constructor() {
        super();
        this.validateLogin();
    }

    validateLogin() {
        this.validation();
    }
}

const auth = new Login();
