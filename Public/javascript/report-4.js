function validation(){
    var errorMessage = document.getElementById('errorMessage');
    errorMessage.style.padding = "10px";
    if(document.getElementById('animal').value.length == 0){
        document.getElementById('message').style.display = "block";
        errorMessage.innerHTML = "Please Select The Animal";
        return false;
    }
    if(document.getElementById('place').value.length == 0){
        document.getElementById('message').style.display = "block";
        errorMessage.innerHTML = "Please Enter Your in Place Name";
        return false;
    } 
    if(document.getElementById('cCrop').value.length == 0){
        document.getElementById('message').style.display = "block";
      
        errorMessage.innerHTML = "Please Enter Cultivated Crop "
        return false;
    } 
    if(document.getElementById('eCrop').value.length == 0){   
        document.getElementById('message').style.display = "block";
        errorMessage.innerHTML = "Please Enter Extend Cultivated land:"
        return false;
    }
    if(document.getElementById('eLand').value.length == 0){   
        document.getElementById('message').style.display = "block";
        errorMessage.innerHTML = "Please Enter Extend Damaged land"
        return false;
    }
    if(document.getElementById('lat').value.length == 0 && document.getElementById('lang').value.length == 0){   
        document.getElementById('message').style.display = "block";
        errorMessage.innerHTML = "Please click the Track Location Button";
        return false;
    }

    return true;
}