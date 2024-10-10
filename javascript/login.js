
function loginchick(){
    const verifay = localStorage.getItem("verifay");
    if (verifay == "true") {
     window.location.href="/";
    } else {
      window.location.href="/login";
    }
  }


  document.addEventListener("DOMContentLoaded", function () {
    // Username availability check
    document.getElementById("username").addEventListener("blur", function () {
        var username = this.value;
        checkAvailability('username', username, 'username-check');
    });

    // Email availability check
    document.getElementById("email").addEventListener("blur", function () {
        var email = this.value;
        checkAvailability('email', email, 'email-check');
    });

    // Phone availability check
    document.getElementById("phone").addEventListener("blur", function () {
        var phone = this.value;
        checkAvailability('phone', phone, 'phone-check');
    });

    // Function to check availability
    function checkAvailability(type, value, elementId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "data.php", true); // Send request to data.php
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById(elementId).innerHTML = xhr.responseText;
            }
        };
        xhr.send(type + '=true&' + type + '=' + encodeURIComponent(value));
    }

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
});
