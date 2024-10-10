
function loginchick(){
    const verifay = localStorage.getItem("verifay");
    if (verifay == "true") {
     window.location.href="/";
    } else {
      window.location.href="/login";
    }
  }
console.log("javascript check");
$(document).ready(function () {
    // Check username availability
    $("#username").on("blur", function () {
        var username = $(this).val();
        checkAvailability('username', username);
    });

    // Check email availability
    $("#email").on("blur", function () {
        var email = $(this).val();
        checkAvailability('email', email);
    });

    // Check phone availability
    $("#phone").on("blur", function () {
        var phone = $(this).val();
        checkAvailability('phone', phone);
    });

    function checkAvailability(type, value) {
        $.ajax({
            url: 'data.php', // PHP file to handle the request
            type: 'POST',
            data: { [type]: value }, // Sending data
            success: function (response) {
                if (type === 'username') {
                    $("#username-check").html(response);
                } else if (type === 'email') {
                    $("#email-check").html(response);
                } else if (type === 'phone') {
                    $("#phone-check").html(response);
                }
            }
        });
    }
});
