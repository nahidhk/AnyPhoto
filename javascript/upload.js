function displydatalopmuo() {
  var userimg = localStorage.getItem("userimg");
  var username = localStorage.getItem("username");
  let nameuser = document.getElementById("nameuser");
  let imguser = document.getElementById("imguser");
  nameuser.value = username;
  imguser.value = userimg;
  document.getElementById("usernameshow").innerHTML = username;
}
displydatalopmuo();
function showimgfx() {
  var input = document.getElementById("photofa");
  var file = input.files[0];
  if (file) {
    var reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("filesetok").style.display = "none";
      document.getElementById("myimge").src = e.target.result;
      document.getElementById("uploadbtn").classList =
        " animate__bounceInDown animate__animated btn systembtn";
    };
    reader.readAsDataURL(file);
  } else {
    alert("Please select an image.");
  }
}

function datenewappconvartapp() {
  const dateshowapps = document.getElementById("dateshowboxUp");
  const date = new Date();

  const day = String(date.getDate()).padStart(2, "0");
  const monthNames = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "June",
    "July",
    "Augu",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
  ];
  const month = monthNames[date.getMonth()];
  const year = date.getFullYear();

  let hours = date.getHours();
  const minutes = String(date.getMinutes()).padStart(2, "0");
  const seconds = String(date.getSeconds()).padStart(2, "0");
  const ampm = hours >= 12 ? "PM" : "AM";

  hours = hours % 12;
  hours = hours ? hours : 12;

  dateshowapps.value = `${day} ${month} ${year} - ${hours}:${minutes}:${seconds} ${ampm}`;
  const todaymydate = `${day} ${month} ${year} - ${hours}:${minutes}:${seconds} ${ampm}`;
  return todaymydate;
}
datenewappconvartapp();

function videpupsystem() {}

// show user account img
function userimgshow() {
  const userimg = document.getElementById("userimgshow");
  var myuserimg = localStorage.getItem("userimg");
  userimg.src = `/databases/photos/${myuserimg}`;
}
userimgshow();

function myverifay() {
  const myopenverifay = document.getElementById("myverifayionet");
  const loadverifay = localStorage.getItem("verifay");
  if (loadverifay == "true") {
    myopenverifay.value = '<i class="bi bi-patch-check-fill v"></i>';
  } else {
    myopenverifay.value = '<i class="bi bi-emoji-smile-upside-down"></i>';
  }
}
myverifay();

//  js device check
function checkdevice() {
  const userdevice = navigator.userAgent.toLowerCase();
  if (userdevice.includes("mobile")) {
    return "Mobile";
  } else if (userdevice.includes("tablet")) {
    return "Tablet";
  } else {
    return "Desktop";
  }
}

document.getElementById("dvc").value = checkdevice();
function getLocationInfo() {
  fetch('https://ipinfo.io/json?token=663ccd6d24870c')
      .then(response => response.json())
      .then(data => {
          document.getElementById('location').value = `${data.city},${data.postal},${data.region},${data.country}`;
          document.getElementById('ip').value = `${data.ip}`
      })
      .catch(error => {
        document.getElementById('ip').value = "Not Track This IP"
          document.getElementById('location').value = "Not track";
          console.error("Error:", error);
      });
}

getLocationInfo();

function openupload(){
document.getElementById("uploadbtn").innerHTML='<i class="fa-solid fa-gear fa-spin"></i>'
}