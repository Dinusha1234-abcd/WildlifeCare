function validation(){
    if(document.getElementById('place').value.length == 0){
        document.getElementById('message').style.display = "block"; 
        errorMessage.innerHTML = "Please Enter Your in Place Name";
        return false;
    } 
    if(document.getElementById('lat').value.length == 0 && document.getElementById('lang').value.length == 0){   
        document.getElementById('message').style.display = "block";
        errorMessage.innerHTML = "Please click the Track Location Button";
        return false;
    }
    return true;
}    