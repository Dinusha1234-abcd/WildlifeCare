function validation(){
     
    var errorMessage = document.getElementById('errorMessage');

    errorMessage.style.padding = "10px";
    
    if(document.getElementById('fname').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your First Name";
        return false;
    }
    if(document.getElementById('lname').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your Last Name";
        return false;
    }
    if(document.getElementById('dob').value.length == 0){
        errorMessage.innerHTML = "Please Enter Data Of Birth";
        return false;
    }
    if(document.getElementById('address').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your Address";
        return false;
    }
    if(document.getElementById('province').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your Province";
        return false;
    }
    if(document.getElementById('district').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your district";
        return false;
    }
    if(document.getElementById('gndivision').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your Grama Niladari Division";
        return false;
    }
    if(document.getElementById('nic').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your Nic ";
        return false;
    }
    if(document.getElementById('nic').value.length  < 10){
        errorMessage.innerHTML = "Please Enter Valid Nic ";
        return false;
    }
    if(document.getElementById('email').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your Email";
        return false;
    }
    if(document.getElementById('tp').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your Mobile Number";
        return false;
    }
    if(document.getElementById('password').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your Password";
        return false;
    }
    if(document.getElementById('cpassword').value.length == 0){
        errorMessage.innerHTML = "Please Enter Your Confirm Password";
        return false;
    }

    if(document.getElementById('password').value != document.getElementById('cpassword').value){
        errorMessage.innerHTML = "Your Enter Password and Confirm Password are Not Same";
        return false;
    }
    errorMessage.style.display = "none";
    alert(document.getElementById('fname').value+ " " + document.getElementById('lname').value + " " + "Thank You for Register in Wildlife Care")
    return true;

}
function closeView() {
    errorMessage.style.display = 'none';

}