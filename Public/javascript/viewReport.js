function openView(idname) {
    document.getElementById('myview').style.display = 'block'
    console.log( idname.value) 

}

function closeView() {
    document.getElementById('myview').style.display = 'none';

    var model = document.getElementById('myview');

    //modal.display='block'
    window.onclick = function closeView(event) {
        if (event.target == view-1) {
            modal.style.display = "none";
        }
    }
}
// function myMap() {
//     var mapOptions = {
//         center: new google.maps.LatLng(51.5, -0.12),
//         zoom: 10,
//         mapTypeId: google.maps.MapTypeId.HYBRID
//     }
//     var map = new google.maps.Map(document.getElementById("map"), mapOptions);
//     }

//     function selectForm(x){
                  
//         var parent=document.getElementsByClassName("subcontainer_3-3");
//         var allForms=parent[0].children;
       
//         for(var i=0;i<allForms.length;i++)
//          {
//              allForms[i].style.display="none";
//          }
       
//                var form=document.getElementsByClassName(x);
                
//                  form[0].style.display="block";
                  
//        } 