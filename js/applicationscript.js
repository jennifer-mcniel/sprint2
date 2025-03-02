// const status = document.getElementById("application-status");
const status = document.getElementsByTagName("option");
const submit = document.getElementById("submit-btn");
const jobName = document.getElementById("job-name");
const employer = document.getElementById("employer-name");
const jobURL = document.getElementById("job-url");
const appDate = document.getElementById("app-date");
const followupDate = document.getElementById("two-weeks");

const STATUS_VALUES= ["select", "need-to-apply", "applied", "interviewing", "rejected", "accepted", "inactive"];
const MAX_CHARACTERS = 60;
const MAX_URL = 500;

window.addEventListener('load', function() {
    setTodayDate();
    set2WeekDate();
});

function validateForm() {
    // let selection = status.options[status.selectedIndex].value;
    // var tinyText = document.getElementById("application-wrong")
    // if(selection === "select") {
    //     tinyText.innerHTML = "Please select an option."
    //     status.focus();
    //     return false;
    // }
    let isJobNameValid = validateJobName();
    let isEmployerValid = validateEmployer();
    let isJobURLValid = validateJobURL();
    let isAppDateValid = validateDate(appDate.value);
    let isFollowupDateValid = validateDate(followupDate.value);
    let isStatusValid = validateStatus();

    let isValid = isJobNameValid && isEmployerValid &&isJobURLValid && isAppDateValid && isFollowupDateValid && isStatusValid;

    if(isValid === false) {
        window.scroll({
            top: 70,
            left: 100,
            behavior: "smooth",
        });
    }

    return isValid;
}

function validateJobName() {
    let isValidLength = jobName.value.length <= MAX_CHARACTERS;
    let isNotEmpty = jobName.value.length > 0;
    let isValid = isValidLength && isNotEmpty;
    let jobNameError = document.getElementById("app-job-name-error");

    if(isValid === false) {
        jobNameError.innerText = "Must be 60 characters or less";
        jobNameError.style.visibility = "visible";
    } else {
        jobNameError.style.visibility = "hidden";
    }

    if(isNotEmpty === false) {
        jobNameError.innerText = "Please enter a job name";
        jobNameError.style.visibility = "visible";
    } else {
        jobNameError.style.visibility = "hidden";
    }

    return isValid;
}

function validateEmployer() {
    let isValidLength = employer.value.length <= MAX_CHARACTERS;
    let isNotEmpty = employer.value.length > 0;
    let isValid = isValidLength && isNotEmpty;
    let jobNameError = document.getElementById("app-employer-error");

    if(isValid === false) {
        jobNameError.innerText = "Must be 60 characters or less";
        jobNameError.style.visibility = "visible";
    } else {
        jobNameError.style.visibility = "hidden";
    }

    if(isNotEmpty === false) {
        jobNameError.innerText = "Please enter an employer name";
        jobNameError.style.visibility = "visible";
    } else {
        jobNameError.style.visibility = "hidden";
    }

    return isValid;
}

function validateJobURL() {
    let re = /((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w]+@)[A-Za-z0-9\.\-]+)((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-\+=&;%@\.\w_]*)#?(?:[\.\!\/\\\w]*))?)/;
    let isValidLength = jobURL.value.length <= MAX_URL;
    let isValidFormat = re.test(jobURL.value);
    let isValid = isValidLength && isValidFormat;
    let jobNameError = document.getElementById("app-url-error");

    if(isValid === false) {
        jobNameError.innerText = "Must be 500 characters or less";
        jobNameError.style.visibility = "visible";
    } else {
        jobNameError.style.visibility = "hidden";
    }

    if(isValidFormat === false) {
        jobNameError.innerText = "Please enter a valid url";
        jobNameError.style.visibility = "visible";
    } else {
        jobNameError.style.visibility = "hidden";
    }

    return isValid;
}

function validateDate(date) {
    let isValid = date !== null;
    let jobNameError = document.getElementById("app-date-error");

    if(isValid === false) {
        jobNameError.innerText = "Please select a date";
        jobNameError.style.visibility = "visible";
    } else {
        jobNameError.style.visibility = "hidden";
    }

    return isValid;
}

function validateStatus() {
    let isValid = true;
    let isValidStatus = false;
    let checked = 0;

    for(let i = 0; i < status.length; i++) {
        if(status[i].selected === true) {
            isValidStatus = STATUS_VALUES.includes(status[i].value);
            checked++;
        }
    }

    isValid = isValidStatus === true && checked === 1;
    const statusError = document.getElementById("app-status-error");

    if(isValid === false) {
        statusError.style.visibility = "visible";
    } else {
        statusError.style.visibility = "hidden";
    }

    return isValid;
}

function setTodayDate() {
    var today = new Date();
    var day = today.getDate();
    var month = today.getMonth()+1;
    var year = today.getFullYear();

    if(day<10) {
        day = '0'+day;
    }

    if(month<10) {
        month = '0'+month;
    }

    today = year + '-' + month + '-' + day;
    document.getElementById('today').value = today;
}
function set2WeekDate() {
    var twoWeekDay = new Date(Date.now() + 12096e5);
    var day = twoWeekDay.getDate();
    var month = twoWeekDay.getMonth()+1;
    var year = twoWeekDay.getFullYear();

    if(day<10) {
        day = '0'+day;
    }

    if(month<10) {
        month = '0'+month;
    }

    twoWeekDay = year + '-' + month + '-' + day;
    document.getElementById('two-weeks').value = twoWeekDay;
}

