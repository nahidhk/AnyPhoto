
function loginchick(){
    const verifay = localStorage.getItem("verifay");
    if (verifay == "true") {
     window.location.href="/";
    } else {
      window.location.href="/login";
    }
  }
console.log("javascript check");



function singupmod() {
    const newpass = document.getElementById('newpass').value;
    const conpass = document.getElementById('conpass').value;
    if (newpass == conpass) {
        blockbtn();
        document.getElementById('newpass').style.border = "2px solid green";
        document.getElementById('conpass').style.border = "2px solid green";
        document.getElementById('passck').style.display = "none";
    } else {
        nonebtn();
        document.getElementById('newpass').style.border = "2px solid red";
        document.getElementById('conpass').style.border = "2px solid red";
        document.getElementById('passck').innerHTML = "Password Don't match";
    }
}

function blockbtn() {
    document.getElementById("singbtn").style.display = "block";
}

function nonebtn() {
    document.getElementById("singbtn").style.display = "none";
}


function showpass() {
    const fields = ['passcode', 'newpass', 'conpass'];
    
    fields.forEach(field => {
        const input = document.getElementById(field);
        input.type = input.type === "password" ? "text" : "password";
    });
}

