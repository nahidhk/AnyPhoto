
function loginchick(){
    const verifay = localStorage.getItem("verifay");
    if (verifay == "true") {
     window.location.href="/";
    } else {
      window.location.href="/login";
    }
  }
console.log("javascript check");

document.addEventListener("DOMContentLoaded", function () {
    // Check username availability
    document.getElementById("username").addEventListener("blur", function () {
        var username = this.value;
        checkAvailability("username", username);
    });

    // Check email availability
    document.getElementById("email").addEventListener("blur", function () {
        var email = this.value;
        checkAvailability("email", email);
    });

    // Check phone availability
    document.getElementById("phone").addEventListener("blur", function () {
        var phone = this.value;
        checkAvailability("phone", phone);
    });

    function checkAvailability(type, value) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "data.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (type === "username") {
                    document.getElementById('username-check').innerHTML = xhr.responseText;
                } else if (type === "email") {
                    document.getElementById('email-check').innerHTML = xhr.responseText;
                } else if (type === "phone") {
                    document.getElementById('phone-check').innerHTML = xhr.responseText;
                }
            }
        };
        xhr.send(type + '=true&' + type + '=' + encodeURIComponent(value));
    }
});



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