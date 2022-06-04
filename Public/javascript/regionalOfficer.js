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
  function myFunction_3() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
window.onclick = function myFunction_2(event) {
    if (!event.target.matches('.user_btn')) {
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


 function selectForm(x){
                  
                var parent=document.getElementsByClassName("container2");
                var allForms=parent[0].children;

                for(var i=0;i<allForms.length;i++)
                {
                    allForms[i].style.display="none";
                }



                   



                 var form=document.getElementsByClassName(x);
                 
                  form[0].style.display="block";
                  
                 ;





              

               }


function selectInci(x){
                  
                var parent=document.getElementsByClassName("container2-inci");
                var allInci=parent[0].children;
                var mapHeader=document.getElementById("active-map-header");


                for(var i=0;i<allInci.length;i++)
                {
                    allInci[i].style.display="none";
                }



                   



                 var inci=document.getElementsByClassName(x);
                 
                  inci[0].style.display="block";

                  if(x=="active"){
                     mapHeader.style.display="block";
                  }
                  else
                  {
                    mapHeader.style.display="none";

                  }
                  


              

               }


      function selectDis(x){
                  
          var parent=document.getElementsByClassName("container3-dis");
          var allDis=parent[0].children;

          for(var i=0;i<allDis.length;i++)
            {
               allDis[i].style.display="none";
            }



                   



          var dis=document.getElementsByClassName(x);
                 
          dis[0].style.display="block";
                  
                 

               }



function searchVillagerTable(x,data)
{
  
  var filterData=[];
  for(var i=0;i<data.length;i++)
  {
    x=x.toLowerCase();
    var name=((data[i])["Fname"].toLowerCase()).concat(" ",(data[i])["Lname"].toLowerCase());
    if(name.includes(x))
      filterData.push(data[i]);
  }

  createSearchTableVillager("villagerTable",filterData);
  
 

}


function createSearchTableVillager(id,data)
{
  var table=document.getElementById(id);
  table.innerHTML='';

  for(var i=0;i<data.length;i++)
  {
    var row="<tr><td>"+(data[i])["NIC"]+"</td><td>"+(data[i])["Fname"]+"</td><td>"+(data[i])["Lname"]+"</td><td>"+(data[i])["BOD"]+"</td><td>"+(data[i])["mobileNo"]+"</td><td>"+(data[i])["Address"]+"</td><td>"+(data[i])["name"]+
            "</td><td>"+(data[i])["gnd_name"]+"</td><td>"+(data[i])["district_name"]+"</td><td>"+(data[i])["Name"]+
            "</td><td><ul><li><button ><img src='../Public/images/edit.png'></button></li><li><button ><label for='show1'><img src='../Public/images/delete.png'></label></button><input type=\"checkbox\"  id=\"show1\">"+
            "<div id=\"delete1\"> <p>Are You Sure Delete "+(data[i])["NIC"]+"? </p><button ><label for=\"show1\">Cancel</label></button><button onclick=\"location.href='deleteUser?type=villager&id="+(data[i])["NIC"]+"'\"><label for=\"show1\">Delete</label></button>"+
            "</div></li><li><button onclick=\"location.href='viewUserProfile?type=villager&id="+(data[i])["NIC"]+"'\"><img src='../Public/images/view.png'></button></li></ul></td></tr>";

    table.innerHTML+=row;
  }

}

function searchRegionalTable(x,data)
{
  
  var filterData=[];
  for(var i=0;i<data.length;i++)
  {
    x=x.toLowerCase();
    var name=((data[i])["Fname"].toLowerCase()).concat(" ",(data[i])["Lname"].toLowerCase());
    if(name.includes(x))
      filterData.push(data[i]);
  }

  createSearchTableRegional("regionalTable",filterData);
  
 

}

function createSearchTableRegional(id,data)
{
  var table=document.getElementById(id);
  table.innerHTML='';

  for(var i=0;i<data.length;i++)
  {
    var row="<tr><td>"+(data[i])["NIC"]+"</td><td>"+(data[i])["RID"]+"</td><td>"+(data[i])["Fname"]+"</td><td>"+(data[i])["Lname"]+"</td><td>"+(data[i])["BOD"]+"</td><td>"+(data[i])["mobileNo"]+"</td><td>"+(data[i])["officeNo"]+"</td><td>"+
            +(data[i])["district_name"]+"</td><td>"+(data[i])["Name"]+
            "</td><td><ul><li><button ><img src='../Public/images/edit.png'></button></li><li><button ><label for='show2'><img src='../Public/images/delete.png'></label></button><input type=\"checkbox\"  id=\"show2\">"+
            "<div id=\"delete2\"> <p>Are You Sure Delete "+(data[i])["NIC"]+"? </p><button ><label for=\"show2\">Cancel</label></button><button onclick=\"location.href='deleteUser?type=regional-officer&id="+(data[i])["NIC"]+"'\"><label for=\"show2\">Delete</label></button>"+
            "</div></li><li><button onclick=\"location.href='viewUserProfile?type=regionalOfficer&id="+(data[i])["NIC"]+"'\"><img src='../Public/images/view.png'></button></li></ul></td></tr>";

    table.innerHTML+=row;
  }

}

function searchWildlifeTable(x,data)
{
  
  var filterData=[];
  for(var i=0;i<data.length;i++)
  {
    x=x.toLowerCase();
    var name=((data[i])["Fname"].toLowerCase()).concat(" ",(data[i])["Lname"].toLowerCase());
    if(name.includes(x))
      filterData.push(data[i]);
  }

  createSearchTableWildlife("wildlifeTable",filterData);
  
 

}

function createSearchTableWildlife(id,data)
{
  var table=document.getElementById(id);
  table.innerHTML='';

  for(var i=0;i<data.length;i++)
  {
    var row="<tr><td>"+(data[i])["NIC"]+"</td><td>"+(data[i])["WID"]+"</td><td>"+(data[i])["Fname"]+"</td><td>"+(data[i])["Lname"]+"</td><td>"+(data[i])["BOD"]+"</td><td>"+(data[i])["mobileNo"]+"</td><td>"+(data[i])["officeNo"]+"</td><td>"+
            +(data[i])["district_name"]+"</td><td>"+(data[i])["Name"]+
            "</td><td><ul><li><button ><img src='../Public/images/edit.png'></button></li><li><button ><label for='show3'><img src='../Public/images/delete.png'></label></button><input type=\"checkbox\"  id=\"show3\">"+
            "<div id=\"delete3\"> <p>Are You Sure Delete "+(data[i])["NIC"]+"? </p><button ><label for=\"show3\">Cancel</label></button><button onclick=\"location.href='deleteUser?type=wildlife-officer&id="+(data[i])["NIC"]+"'\"><label for=\"show3\">Delete</label></button>"+
            "</div></li><li><button onclick=\"location.href='viewUserProfile?type=wildlifeOfficer&id="+(data[i])["NIC"]+"'\"><img src='../Public/images/view.png'></button></li></ul></td></tr>";

    table.innerHTML+=row;
  }

}

function searchVetTable(x,data)
{
  
  var filterData=[];
  for(var i=0;i<data.length;i++)
  {
    x=x.toLowerCase();
    var name=((data[i])["Fname"].toLowerCase()).concat(" ",(data[i])["Lname"].toLowerCase());
    if(name.includes(x))
      filterData.push(data[i]);
  }

  createSearchTableVet("vetTable",filterData);
  
 

}

function createSearchTableVet(id,data)
{
  var table=document.getElementById(id);
  table.innerHTML='';

  for(var i=0;i<data.length;i++)
  {
    var row="<tr><td>"+(data[i])["NIC"]+"</td><td>"+(data[i])["VID"]+"</td><td>"+(data[i])["Fname"]+"</td><td>"+(data[i])["Lname"]+"</td><td>"+(data[i])["BOD"]+"</td><td>"+(data[i])["mobileNo"]+"</td><td>"+(data[i])["officeNo"]+"</td><td>"+
            +(data[i])["district_name"]+"</td><td>"+(data[i])["Name"]+
            "</td><td><ul><li><button ><img src='../Public/images/edit.png'></button></li><li><button ><label for='show4'><img src='../Public/images/delete.png'></label></button><input type=\"checkbox\"  id=\"show4\">"+
            "<div id=\"delete4\"> <p>Are You Sure Delete "+(data[i])["NIC"]+"? </p><button ><label for=\"show4\">Cancel</label></button><button onclick=\"location.href='deleteUser?type=veterinarian&id="+(data[i])["NIC"]+"'\"><label for=\"show4\">Delete</label></button>"+
            "</div></li><li><button onclick=\"location.href='viewUserProfile?type=veterinarian&id="+(data[i])["NIC"]+"'\"><img src='../Public/images/view.png'></button></li></ul></td></tr>";

    table.innerHTML+=row;
  }

}


function searchGramaTable(x,data)
{
  
  var filterData=[];
  for(var i=0;i<data.length;i++)
  {
    x=x.toLowerCase();
    var name=((data[i])["Fname"].toLowerCase()).concat(" ",(data[i])["Lname"].toLowerCase());
    if(name.includes(x))
      filterData.push(data[i]);
  }

  createSearchTableGrama("gramaTable",filterData);
  
 

}

function createSearchTableGrama(id,data)
{
  var table=document.getElementById(id);
  table.innerHTML='';

  for(var i=0;i<data.length;i++)
  {
    var row="<tr><td>"+(data[i])["NIC"]+"</td><td>"+(data[i])["GID"]+"</td><td>"+(data[i])["Fname"]+"</td><td>"+(data[i])["Lname"]+"</td><td>"+(data[i])["BOD"]+"</td><td>"+(data[i])["mobileNo"]+"</td><td>"+(data[i])["officeNo"]+"</td><td>"+
            +(data[i])["Address"]+"</td><td>"+(data[i])["gnd_name"]+"</td><td>"+(data[i])["district_name"]+"</td><td>"+(data[i])["Name"]+
            "</td><td><ul><li><button ><img src='../Public/images/edit.png'></button></li><li><button onclick=\"location.href='viewUserProfile?type=gramaNiladhari&id="+(data[i])["NIC"]+"'\"><img src='../Public/images/view.png'></button></li></ul></td></tr>";

    table.innerHTML+=row;
  }

}



