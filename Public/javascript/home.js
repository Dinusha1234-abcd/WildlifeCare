function myFunction_1(x) {
    var y = document.getElementById("navbar");
    if (y.className === "mybar") {
        y.className += " responsive";
        x.classlist.toggle("change");
    } else {
        y.className = "mybar";
        x.classlist.toggle("icon");
    }
}
//language Select Option
function myFunction_2() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
window.onclick = function myFunction_2(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

