let FullName = document.querySelector('#fullname');
let PhoneNumber = document.querySelector('#numphone');
let PersonalEmail = document.querySelector('#personal');
let Domaine = document.querySelector('#drop-down');
let JobPosition = document.querySelector('#job-pos');
let Salary = document.querySelector('#fix-salary');
let JobSpec = document.querySelector('#job-requirements'); //textarea

let SubmitButton = document.querySelector('#submit-but');


SubmitButton.addEventListener('click', (eventt) => {
    if (redirect() === false) eventt.preventDefault();
})

function redirect() {
    checkInputs();
    if (
        checkIn(FullName) &&
        checkIn(PhoneNumber) &&
        checkIn(PersonalEmail) &&
        checkIn(JobPosition) &&
        checkIn(Salary) &&
        checkText(JobSpec) &&
        checkDrop(Domaine)
    ) {
        return true;
    } else {
        return false;
    }
}


function checkIn(input) {
    if (input.classList.contains('success')) return true;
    else return false;
}

function checkText(textarea) {
    if (textarea.classList.contains('success')) return true;
    else return false;
}

function checkInputs() {
    const FullNameValue = FullName.value.trim();
    const PhoneNumberValue = PhoneNumber.value.trim();
    const PersonalEmailValue = PersonalEmail.value.trim();
    const JobPositionValue = JobPosition.value.trim();
    const SalaryValue = Salary.value.trim();
    const JobSpecValue = JobSpec.value.trim();

    if (FullNameValue === '')
        setErrorClassFirst(FullName, 'full name field can not be left empty');
    else setSuccessClassFirst(FullName);


    if (PhoneNumberValue === '')
        setErrorClassFirst(PhoneNumber, 'please enter a phone number first')
    else if (!isPhoneNumber(PhoneNumberValue)) {
        setErrorClassFirst(PhoneNumber, 'please enter a valid phone number ')
    }
    else setSuccessClassFirst(PhoneNumber);


    if (PersonalEmailValue === '')
        setErrorClassFirst(PersonalEmail, 'please enter an email');
    else if (!isEmail(PersonalEmailValue))
        setErrorClass(PersonalEmail, 'please enter a valid email');
    else setSuccessClassFirst(PersonalEmail);

    if (JobPositionValue === '')
        setErrorClassFirst(JobPosition, 'Job position field can not be left empty');
    else setSuccessClassFirst(JobPosition);

    if (SalaryValue === '')
        setErrorClassFirst(Salary, 'please enter a salary');
    else setSuccessClassFirst(Salary);

    if (JobSpecValue === '')
        setErrorClassSecond(JobSpec, 'please enter job specifications');
    else setSuccessClassSecond(JobSpec);
}

function setErrorClassFirst(input, message) {
    const errorSpan = input.nextElementSibling;
    errorSpan.textContent = message;
    if (input.classList.contains("success")) input.classList.remove("success");
    input.classList.add("error");
}

function setErrorClassSecond(textarea, message) {
    const errorSpansec = textarea.nextElementSibling;
    errorSpansec.textContent = message;
    if (textarea.classList.contains("success")) textarea.classList.remove("success");
    textarea.classList.add("error");
}

function setSuccessClassFirst(input) {
    if (input.classList.contains("error")) input.classList.remove("error");
    input.classList.add("success");
}

function setSuccessClassSecond(textarea) {
    if (textarea.classList.contains("error")) textarea.classList.remove("error");
    textarea.classList.add("success");
}

function isEmail(Email) {
    return /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(Email);
}

function isPhoneNumber(PhoneNumber) {
    return /^([0]{1}[5-7]{1}[0-9]{8})$/.test(PhoneNumber);
}

function checkDrop() {
    var selectedValue = Domaine.value;
    const errorSpan = Domaine.nextElementSibling;

    if (selectedValue === '') {
        errorSpan.textContent = 'Please select an option';
        if (Domaine.classList.contains('success')) Domaine.classList.remove('success');
        Domaine.classList.add('error');
        return false;
    } else {
        errorSpan.textContent = ''; // Clear error message
        if (Domaine.classList.contains('error')) Domaine.classList.remove('error');
        Domaine.classList.add('success');
        return true;
    }
}

