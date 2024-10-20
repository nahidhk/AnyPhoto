
var data = localStorage.getItem("user");
var userData = JSON.parse(data);

function checkdata(){
  var data1 = sessionStorage.getItem("user");
var cData = JSON.parse(data1);
  const email = document.getElementById("email");
  const phone = document.getElementById("phone");
  const password = document.getElementById("password");
  const penin = document.getElementById("penin");
  if (userData.email == cData.email && userData.phone == cData.phone && userData.id == cData.id ) {
   email.style.display="block";
   phone.style.display="block";
   password.style.display="block";
   penin.style.display="block";
  } else {
    email.style.display="none";
    phone.style.display="none";
    password.style.display="none";
    penin.style.display="none"; 
  }
}
checkdata();


//  Edit profile photo
function editimg() {
  var form = document.getElementById("myform");
    form.submit();
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
   
    let password = localStorage.getItem("password");
  
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


 
function logout(){
  localStorage.clear();
  sessionStorage.clear();
  window.location.href="/login/"
}

//  auto reload
function autoreload() {
  const urlParams = new URLSearchParams(window.location.search);
  const reloaded = urlParams.get('reloaded');  // URL e 'reloaded' parameter check korche

  if (!reloaded) {
    // Jodi 'reloaded' parameter na thake, tahole page ekbar reload hobe
    setTimeout(function() {
      // Check if 'id' already exists, use '&' instead of '?'
      const newUrl = window.location.href.includes('?') 
        ? window.location.href + '&reloaded=true' 
        : window.location.href + '?reloaded=true';
      
      window.location.href = newUrl;  // URL e 'reloaded=true' add kore reload korbe
    }, 200);  // 5000ms mane 5 second pore reload hobe
  }
}

autoreload();

function home(){
  window.location="/"
}