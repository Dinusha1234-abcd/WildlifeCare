//searh incidents according to the date
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.Content || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
//filter incidents according to the reporttype
function filterFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filter").value;
    switch (input) {
        case "1.Elephants are in The Village" || "1.අලි ගම් වලට පැමිණ ඇත" || "1.யானைகள் கிராமத்தில் உள்ளனயானைகள் கிராமத்தில் உள்ளன":
            filter = "Elephants are in The Village";
            break;
        case "2.Other Wild Animals are in The Village" || "2.අනෙකුත් වන සතුන් ගම් වලට පැමිණ ඇත" || " 2.மற்ற காட்டு விலங்குகள் கிராமத்தில் உள்ளன":
            filter = "Other Wild Animals are in The Village";
            break;
        case "3.Breakdown of Elephant Fences" || "3.අලි වැට කැඩීම" || "3.யானை வேலிகள் உடைப்பு":
            filter = "Breakdown of Elephant Fences";
            break;
        case "4.Wild Animal is in Danger" || "4.වන සතුන්ට අනතුරක්" || " 4.காட்டு விலங்கு ஆபத்தில் உள்ளது":
            filter = "Wild Animal is in Danger";
            break;
        case "5.Crop Damages" || "5.බෝග හානි" || " 5.பயிர் சேதங்கள்":
            filter = "Crop Damages";
            break;
        case "6.Illegal Things Happening" || "6.නීති විරෝධී දේ සිදුවෙමින් පවතී" || " 6.சட்டத்திற்குப் புறம்பான விஷயங்கள் நடக்கின்றன":
            filter = "Illegal Happing";
            break;
        default:
            filter = "default";
            break;
    }
    
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        if (filter == "default") {
            tr[i].style.display = "";
        } else {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.Content || td.innerText;
                if (txtValue == filter) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }

        }
    }
}


//accept , cancel button
function acceptFunction() {
    var acc = document.getElementById("acceptId");
    var can = document.getElementById("cancelId");
    if (can.style.display === "none") {
        can.style.display = "block";
        acc.style.display = "none";
    } else {
        can.style.display = "none";
        acc.style.display = "block";
    }
}

function cancelFunction() {
    var acc = document.getElementById("acceptId");
    var can = document.getElementById("cancelId");
    if (acc.style.display === "none") {
        acc.style.display = "block";
        can.style.display = "none";
    } else {
        can.style.display = "none";
        acc.style.display = "block";
    }
}