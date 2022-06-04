//make a reference for the form tag
const form = document.querySelector("form");
//access the input feild dev class
fieldfName = form.querySelector(".firstName"),
//acess the input field
    inpfName = fieldfName.querySelector("input");

fieldlName = form.querySelector(".lastName"),
    inplName = fieldlName.querySelector("input");
fieldNumber = form.querySelector(".mobNum"),
    inpNumber = fieldNumber.querySelector("input");

fieldEmail = form.querySelector(".email"),
    inpEmail = fieldEmail.querySelector("input");

fieldAddress = form.querySelector(".address"),
    inpAddress = fieldAddress.querySelector("input");

fieldAddress1 = form.querySelector(".address1"),
    inpAddress = fieldAddress1.querySelector("input");


//check all fieds are validated or not when saving data
function submitRequestForm() {
    if (nameValF() && nameValL() && mobileVal() && emailVal()) {
        return true;
    }
    return false;

}

//validate first name
function nameValF() {

    var regName = new RegExp('^[-a-zA-Z ]+$');
    if (inpfName.value != "") {
        if (!inpfName.value.match(regName)) {
            showNotification("First name can only contain English letters");
            return false;
        } else {
            return true;
        }
    } else {
        showNotification("First Name can't be blank");
        return false;
    }

}
//validate first name
function nameValL() {

    var regName = new RegExp('^[-a-zA-Z ]+$');
    if (inplName.value != "") {
        if (!inplName.value.match(regName)) {
            showNotification("Last name can only contain English letters");
            return false;
        } else {
            return true;
        }
    } else {
        showNotification("Last Name can't be blank");
        return false;
    }

}


//validate mobile number
function mobileVal() {
    var regName = new RegExp("^[0]{1}[0-9]{9}$");


    if (inpNumber.value.match(regName)) {

        return true;


    } else {

        if (inpNumber.value != "") {


            if (((inpNumber.value).substr(0, 1) != "0")) {
                showNotification("First digit should be 0");
                return false;
            } else if (inpNumber.value.length == 10) {
                showNotification("The contact number should only consist of digits");
                return false;

            } else {
                showNotification("Contact Number must have 10 digits");
                return false;
            }



        } else {

            showNotification("Number field can't be blank");
            return false;

        }

    }
}

//validate email address

function emailVal() {

    var regName = new RegExp("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$");

    if (inpEmail.value != "") {
        if (inpEmail.value.match(regName)) {
            return true;

        } else {
            showNotification("Enter a valid email");
            return false;
        }
    } else {
        showNotification("Email field can't be blank");
        return false;
    }
}





//show error messages
function showNotification(msg) {
    var note = document.getElementById("note");
    note.innerHTML = msg;
    note.style.display = "block";
  
    setTimeout(function() {

        document.getElementById("note").style.display = "none";

    }, 4000);

}