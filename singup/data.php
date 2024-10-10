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
$bath = $_POST['bath'];
$useremail = $_POST['email'];
$userphone = $_POST['phone'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO verifay_user (username, bath, useremail, userphone, password)
VALUES ('$username', '$bath', '$useremail', '$userphone',  '$hashedPassword')";


if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "তথ্য সংরক্ষণ করতে সমস্যা হয়েছে: " . $conn->error;
}


$conn->close();
?>
<script>window.location.href="/"</script>