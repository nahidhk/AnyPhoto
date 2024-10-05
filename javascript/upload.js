
function displydatalopmuo(){
    var userimg = localStorage.getItem("userimg");
    var username = localStorage.getItem("username");
    let nameuser = document.getElementById("nameuser");
    let imguser = document.getElementById("imguser");
    let nameuser1 = document.getElementById("nameuser1");
    let imguser1 = document.getElementById("imguser1");
    nameuser.value=username;
    imguser.value=userimg;
    nameuser1.value=username;
    imguser1.value=userimg;
    
    
   document.getElementById("usernameshow").innerHTML=username;

}
displydatalopmuo();
function noteditmass(){
    alert("This Account Info is Not Edit!")
}
function showimgfx(){
    var input = document.getElementById("photofa");
    var file = input.files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById("filesetok").style.display="none"
        document.getElementById("myimge").src = e.target.result;
        document.getElementById("uploadbtn").classList=" animate__bounceInDown animate__animated btn systembtn";
      };
      reader.readAsDataURL(file);
    } else {
      alert("Please select an image.");
    }
}
function datenewappconvartapp() {
  const dateshowapps = document.getElementById("dateshowboxUp");
  const date = new Date();

  const day = String(date.getDate()).padStart(2, '0');
  const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", 
                      "July", "Augu", "Sep", "Oct", "Nov", "Dec"];
  const month = monthNames[date.getMonth()];
  const year = date.getFullYear();

  
  let hours = date.getHours();
  const minutes = String(date.getMinutes()).padStart(2, '0');
  const seconds = String(date.getSeconds()).padStart(2, '0');
  const ampm = hours >= 12 ? 'PM' : 'AM';

  hours = hours % 12;  
  hours = hours ? hours : 12;  

  dateshowapps.value = `${day} ${month} ${year} - ${hours}:${minutes}:${seconds} ${ampm}`;
  document.getElementById("updatemyxpz").value = `${day} ${month} ${year} - ${hours}:${minutes}:${seconds} ${ampm}`
}

datenewappconvartapp();



function videpupsystem(){
 var adminid =  prompt("You can Access for next update! only video upload in Admin , Input the admin id");
 if (adminid == 516148) {
  document.getElementById("showupvideo").classList= "maincontect"
  document.getElementById("showupphoto").classList="vcc"
 } else {
  alert("Error Admin ID bro!")
 }
}

// show user account img 
function userimgshow(){
  const userimg =document.getElementById("userimgshow");
  var myuserimg = localStorage.getItem("userimg");
  userimg.src=`//databases/photos//${myuserimg}`;
  }
  userimgshow();