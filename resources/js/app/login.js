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
