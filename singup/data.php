<?php
require_once('../php/configer.php');

// MySQL-এ কানেকশন তৈরি করা
$conn = mysqli_connect($servername, $username, $password, $dbname);

// কানেকশন চেক করা (procedural পদ্ধতিতে)
if (!$conn) {
    die("poblem: " . mysqli_connect_error());
}
echo "Conn test ok";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ইনপুট ডেটা
$username = $_POST['username'];
$bath = $_POST['bath'];
$useremail = $_POST['email'];
$userphone = $_POST['phone'];
$password = $_POST['password'];
$photo = '';
$verifay = '';


// পাসওয়ার্ড হ্যাশ করা
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


$stmt = $conn->prepare("INSERT INTO users (username, bath, email, phone, photo, verifay, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $username, $bath, $useremail, $userphone, $photo, $verifay, $hashedPassword);

if ($stmt->execute()) {
    echo "তথ্য সফলভাবে সংরক্ষিত হয়েছে।";
    // রিডিরেক্ট করার জন্য জাভাস্ক্রিপ্ট ব্যবহার করতে পারেন:
    echo "<script>window.location.href='/';</script>";
} else {
    echo "তথ্য সংরক্ষণ করতে সমস্যা হয়েছে: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
