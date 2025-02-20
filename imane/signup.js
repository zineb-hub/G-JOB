let FirstName = document.querySelector('#ftname');
let LastName = document.querySelector('#ltname');
let Email = document.querySelector('#email');
let PasswordFt = document.querySelector('#pswd');
let PasswordConf = document.querySelector('#pwdc');
let TermsCheck = document.querySelector('#terms-conditions');
let small = document.querySelector('span');


let SubmitButton = document.querySelector('#next');

SubmitButton.addEventListener('click', (ev) => {
    if (redirect() === false) ev.preventDefault();
})

function isEmail(Email) {
    return /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(Email);
}


function setSuccessClass(input) {
    if (input.classList.contains("error")) input.classList.remove("error");
    input.classList.add("success");
}

function check(input) {
    if (input.classList.contains('success')) return true;
    else return false;
}

function redirect() {
    checkInputs();
    if (check(FirstName) == true && check(LastName) == true && check(Email) == true && check(PasswordFt) == true && check(PasswordConf) == true && check(TermsCheck) == true) {
        return true;
    }
    else {
        return false;
    }
}

function checkInputs() {
    const FirstNameValue = FirstName.value.trim();
    const LastNameValue = LastName.value.trim();
    const EmailValue = Email.value.trim();
    const PasswordValue = PasswordFt.value.trim();
    const CPasswordValue = PasswordConf.value.trim();

    if (FirstNameValue === '')
        setErrorClass(FirstName, 'first name field can not be left empty');
    else setSuccessClass(FirstName);

    if (LastNameValue === '')
        setErrorClass(LastName, 'Last name field can not be left empty');
    else setSuccessClass(LastName);

    if (isEmail(EmailValue) == false)
        setErrorClass(Email, 'please enter a valid email');
    else setSuccessClass(Email);

    if (PasswordValue === '')
        setErrorClass(PasswordFt, 'please enter a password first');
    else setSuccessClass(PasswordFt);

    if (CPasswordValue === '')
        setErrorClass(PasswordConf, 'please confirm your password first');
    else if (CPasswordValue !== PasswordValue)
        setErrorClass(PasswordConf, 'password confirmation does not match');
    else setSuccessClass(PasswordConf);

    if (TermsCheck.checked)
        setSuccessClass(TermsCheck);
    else setErrorClass(TermsCheck, 'please make sure to agree on the terms and condition beforehand');
}


function setErrorClass(input, message) {
    const errorSpan = input.nextElementSibling;
    errorSpan.textContent = message;
    if (input.classList.contains("success")) input.classList.remove("success");
    input.classList.add("error");
}
