// Register the validate function for the form submit event
let form = document.getElementById("guestForm");
form.onsubmit = validate;

//Make all error messages invisible
function clearErrors()
{
    let errors = document.getElementsByClassName("text-danger");

    for(let i=0; i<errors.length; i++)
    {
        errors[i].classList.add("d-none");
    }
}

function validate()
{
    clearErrors(); // calls clearErrors to make all error message invisible.

    let isValid = true;

    // Validate first name
    let firstName = document.getElementById("firstname").value;
    if(firstName === "")
    {
        let errorFname = document.getElementById("errorFname");
        errorFname.classList.remove("d-none");
        isValid = false; // when isValid is false, it doesn't send the data to server. stays on the form page
    }

    // Validate lastname
    let lastName = document.getElementById("lastname").value;
    if(lastName === "")
    {
        let errorLname = document.getElementById("errorLname");
        errorLname.classList.remove("d-none");
        isValid = false;
    }

    // Validate Email, if supplied. Email is optional at this time.
    let email = document.getElementById("email").value;
    let emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(email !== "")
    {
        if (!email.match(emailRegex))
        {
            let invalidEmail = document.getElementById("invalidEmail");
            invalidEmail.classList.remove("d-none");
            isValid = false;
        }
    }

    // Validate LinkedIn URL, if supplied.
    let linkedInURL = document.getElementById("linkedin").value;
    let linkedInRegex = /(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/;

    if(linkedInURL !== "")
    {
        if (!linkedInURL.match(linkedInRegex))
        {
            let invalidLinkedIn = document.getElementById("invalidLinkedIn");
            invalidLinkedIn.classList.remove("d-none");
            isValid = false;
        }
    }

    // Validate How did we meet?
    let meetSelection = document.getElementById("meettype");
    if(meetSelection.options[meetSelection.selectedIndex].value == 0)
    {
        let errorMeetSelection = document.getElementById("errorMeetSelection");
        errorMeetSelection.classList.remove("d-none");
        isValid = false;
    }

    // Validate Email and make it required, if mailing list is checked.
    let mailingList = document.getElementById("mailinglistcheck");
    if(mailingList.checked)
    {
        let emailAsterisk = document.getElementById("emailAsterisk");
        emailAsterisk.classList.remove("d-none");

        if(!validateEmail())
        {
            isValid = false;
        }
    }

    return isValid;
}

function validateEmail()
{
    let email = document.getElementById("email").value;
    let emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    let isValid = true;

    if(email === "")
    {
        let noEmail = document.getElementById("noEmail");
        noEmail.classList.remove("d-none");
        isValid = false;
    }
    else if (!email.match(emailRegex))
    {
        let invalidEmail = document.getElementById("invalidEmail");
        invalidEmail.classList.remove("d-none");
        isValid = false;
    }

    return isValid;
}

document.getElementById("meettype").onchange = showOther;

function showOther()
{
    let dropselectionValue = document.getElementById("meettype").value;
    let otherText = document.getElementsByClassName("othertext")

    if(dropselectionValue !== "other")
    {
        for (let i=0; i<otherText.length; i++)
        {
            otherText[i].classList.add("d-none");
        }
    }
    else
    {
        for (let i=0; i<otherText.length; i++)
        {
            otherText[i].classList.remove("d-none");
        }
    }
}




