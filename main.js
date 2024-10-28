var counter = 0;
var durl="";
var categ = 0;

function openNav() {

    document.getElementById("mySidenav").style.width = "70%";
    var x = document.getElementsByTagName("BODY")[0];
    x.style.overflow = "hidden";
  }
  
  function closeNav() {
 
    document.getElementById("mySidenav").style.width = "0";
    var x = document.getElementsByTagName("BODY")[0];
    x.style.overflow = "auto";
  
  }


  function opencloseCateg() {
    var x = document.getElementById("category");
    var z = document.getElementsByClassName("intro");
    var y = document.getElementById("cbtn");
    var k = document.getElementById("ar");
    
    if(x.className === "categclosed") {
      x.className = "categopened";
      x.style.height = "auto";
      k.className = "fa fa-angle-up";
      y.className = "pctext active";
    } else {
      x.className = "categclosed";
      x.style.height = "0px";
      k.className = "fa fa-angle-down";
      y.className = "pctext";
    }
  }

 

window.onscroll = function (e) {  
  // called when the window is scrolled.  
  var x = document.getElementById("category");
  var k = document.getElementById("ar");
  var y = document.getElementById("cbtn");
  x.className = "categclosed";
  x.style.height = "0px";
  y.className = "pctext";
  k.className = "fa fa-angle-down";
  } 

  function show_hide()
  {
 
    var d=document.getElementById("mccontent");
    var k = document.getElementById("arrow");
    if(d.style.display==="none")
    {
      d.style.display="block";
      k.className = "fa fa-angle-up";

    }else{
      d.style.display="none";
      k.className = "fa fa-angle-down";
    }
  }




function openCateg(evt, categName) {
  var i,h, tabcontent;

  if(categName == "animal") {
    categ = 1;
  } else {
    categ = 0;
  }

  h=document.getElementById("home");
  tabcontent = document.getElementsByClassName("categcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  h.style.display="none"
  document.getElementById(categName).style.display = "block";
  evt.currentTarget.className += " cactive";
  closeNav();
}



$(document).ready(function(){
  
  
  $(".column img").click(function(){
    var x = document.getElementsByTagName("BODY")[0];
    var getlink=$(this).attr("src");
    $(".popup").fadeIn();
    $(".popcontent img").attr("src",getlink);
    $("#dbtn").attr("href",getlink);
    x.style.overflow = "hidden";

  });

  $(".closeb").click(function(){
    var x = document.getElementsByTagName("BODY")[0];
    $(".popup").fadeOut();
    x.style.overflow = "auto";
  });

});

var image1 = [];

var i=image1.length;

function nextImage()
{
  var p=document.getElementById('ipopcontent'); 
  if(categ == 0){
     image1=['t1','t3','t5','t7','t9','t11','t2','t4','t8','t6','t17','t18','t4',
    't10','t12','t19','t20','t22','t27','t25','t21','t28','t26','t23','t19','t15'];

    if(i<image1.length)
    {
      i=i+1;
    }else{
      i=1;
    }
    p.innerHTML="<img src=Trending/"+image1[i-1]+".jpeg>";
    durl = "Trending/"+image1[i-1]+".jpeg";

  } else {
     image1=['a1','a3','a5','a7','a9','a11','a2','a4','a8','a6','a17','a18','a14',
    'a10','a12','a19','a20','a22','a27','a25','a21','a28','a26','a23','a19','a15'];

    if(i<image1.length)
    {
      i=i+1;
    }else{
      i=1;
    }
    p.innerHTML="<img src=Animal/"+image1[i-1]+".jpeg>";
    durl = "Animal/"+image1[i-1]+".jpeg";

  }

  $("#dbtn").attr("href",durl);

  image1 = null;
}

function prevImage()
{

  var p=document.getElementById('ipopcontent'); 
  if(categ == 0){
    image1=['t1','t3','t5','t7','t9','t11','t2','t4','t8','t6','t17','t18','t4',
   't10','t12','t19','t20','t22','t27','t25','t21','t28','t26','t23','t19','t15'];

        if(i<image1.length+1 && i>1)
        {
          i=i-1;
        }else{
          i=image1.length;
        }
      p.innerHTML="<img src=Trending/"+image1[i-1]+".jpeg>";
      durl = "Trending/"+image1[i-1]+".jpeg";

 } else {
    image1=['a1','a3','a5','a7','a9','a11','a2','a4','a8','a6','a17','a18','a14',
   'a10','a12','a19','a20','a22','a27','a25','a21','a28','a26','a23','a19','a15'];

      if(i<image1.length+1 && i>1)
      {
        i=i-1;
      }else{
        i=image1.length;
      }
    p.innerHTML="<img src=Animal/"+image1[i-1]+".jpeg>";
    durl = "Animal/"+image1[i-1]+".jpeg";

 }

$("#dbtn").attr("href",durl);

image1 = null;

}


function share() {
  document.getElementById("shareDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.sharebtn')) {
    var dropdowns = document.getElementsByClassName("share-Dropdown");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

window.onclick = function(event) {
  if (!event.target.matches('.sharebtn i')) {
    var dropdowns = document.getElementsByClassName("share-Dropdown");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
