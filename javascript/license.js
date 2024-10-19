
var data = localStorage.getItem("user");
var userData = JSON.parse(data);



function ckpprofilepic(){
 
  var showuserimg = document.getElementById("userimg");
  if (userData.photo == '') {
    showuserimg.src ='/img/usericon.png'
  } else {
     showuserimg.src = `/databases/photos/${data.photo}`;
  }
}
ckpprofilepic();
//  Edit profile photo

function editimg() {
  var form = document.getElementById("myform");
  const chosephoto = document.getElementById("editprofile").files[0];
  if (chosephoto) {
    var reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("userimg").src = e.target.result;
    };
    reader.readAsDataURL(chosephoto);

    const filePath = chosephoto.name;
    localStorage.setItem("userimg", filePath);
    form.submit();
  } else {
    alert("Please select an image.");
  }
}


function showusernameadta() {
  const myusername = document.getElementById("showusername");
  myusername.innerText = userData.username;
}
showusernameadta();

function editusername() {
  alert(
    "Changing your username will not change the username of any previous poster!"
  );
  const myusername = document.getElementById("showusername");
  myusername.innerHTML = `<input oninput="changethename()" type="text" id="setnewusername" value="${userData.username}"/>`;
  document.getElementById("textediticon").classList = "vcc";
}
function changethename(){
 const changename =  document.getElementById("setnewusername").value;


}
// addd the verifay sysem

function checkverfy() {
  var email = document.getElementById("email");
  var phone = document.getElementById("phone");
  var bate = document.getElementById("bate");
  let notverifay = `<span class="notviy">Account Not Verifay</span>`;
  const verifay = localStorage.getItem("verifay");
  const loademail = localStorage.getItem("email");
  const loadphone = localStorage.getItem("phonenum");

  if (verifay == "true") {
    //  verifay true hour por uid and password load hobe
    let password = localStorage.getItem("password");
    // document show password and Uid In onetime
    document.getElementById("password").innerText = password;
    email.innerHTML = loademail;
    phone.innerHTML = loadphone; 
    document.getElementById("editprofile").classList = "vcc";
    document.getElementById(
      "vicon"
    ).innerHTML = `<i class="bi bi-patch-check-fill v"></i>`;
    document.getElementById("listio").classList = "melo";
    document.getElementById("windto").style.display = "block";
    document.getElementById("normalbox").style.display = "block";
  } else {
    email.innerHTML = notverifay;
    phone.innerHTML = notverifay;
    bate.innerHTML = notverifay;
  }
}
checkverfy();

 