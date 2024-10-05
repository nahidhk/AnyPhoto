<?php
$servername = "localhost"; 
$username = "readyof1"; 
$password = "A*Password123123";
$dbname = "readyof1_Aanyface";


$conn = new mysqli($servername, $username, $password, $dbname);

// সংযোগ চেক করা
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

// সংযোগ বন্ধ করা
$conn->close();
?>
<script>
    window.location.href='/'
</script>
