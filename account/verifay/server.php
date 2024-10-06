<?php
$servername = "localhost"; 
$username = "readyof1"; 
$password = "A*Password123123";
$dbname = "readyof1_Aanyface";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("ডাটাবেজে সংযোগ করতে সমস্যা হয়েছে: " . $conn->connect_error);
}

$username = $_POST['username'];
$userimg = $_POST['userimg'];
$useremail = $_POST['useremail'];
$userphone = $_POST['userphone'];
$password = $_POST['password'];

$sql = "INSERT INTO verifay_user (username, userimg, useremail, userphone, password)
VALUES ('$username', '$userimg', '$useremail', '$userphone',  '$password')";


if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "তথ্য সংরক্ষণ করতে সমস্যা হয়েছে: " . $conn->error;
}


$conn->close();
?>
<script>
    window.location.href='/'
</script>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userEmail = $_POST["email"];
    // Assuming you have a password stored securely, otherwise never send passwords via email
    
    // Send confirmation email
    $to = $userEmail;
    $subject = "You Just Verifayed AnyFace Account !";
    $message = "
   <h1>Hellop</h1>

    ";
    $headers = "From: anyface@anyface.readyoffercareer.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    mail($to, $subject, $message, $headers);

    // Respond to the client-side
  
}
?>