
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
    document.getElementById("username").addEventListener("blur", function () {
        var username = this.value;
        checkAvailability(username);
    });

    function checkAvailability(username) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "data.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText); // For debugging
            }
        };
        xhr.send("check_username=true&username=" + encodeURIComponent(username));
    }
});
