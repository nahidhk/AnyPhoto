
function loginchick(){
    const verifay = localStorage.getItem("verifay");
    if (verifay == "true") {
     window.location.href="/";
    } else {
      window.location.href="/login";
    }
  }


  $(document).ready(function() {
    $("#username").on("blur", function() {
        var username = $(this).val();
        $.ajax({
            url: '', // Same file
            type: 'POST',
            data: {check_username: true, username: username},
            success: function(response) {
                $("#username-check").html(response);
            }
        });
    });

    $("#email").on("blur", function() {
        var email = $(this).val();
        $.ajax({
            url: '', // Same file
            type: 'POST',
            data: {check_email: true, email: email},
            success: function(response) {
                $("#email-check").html(response);
            }
        });
    });

    $("#phone").on("blur", function() {
        var phone = $(this).val();
        $.ajax({
            url: '', // Same file
            type: 'POST',
            data: {check_phone: true, phone: phone},
            success: function(response) {
                $("#phone-check").html(response);
            }
        });
    });
});
