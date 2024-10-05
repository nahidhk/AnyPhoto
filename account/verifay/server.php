<?php
// ডাটাবেজের জন্য তথ্য
$servername = "localhost"; // আপনার ডাটাবেজ সার্ভারের নাম
$username = "readyof1"; // আপনার ডাটাবেজের ইউজারনেম
$password = "A*Password123123"; // আপনার ডাটাবেজের পাসওয়ার্ড
$dbname = "readyof1_savedata"; // আপনার ডাটাবেজের নাম

// ডাটাবেজের সাথে সংযোগ স্থাপন
$conn = new mysqli($servername, $username, $password, $dbname);

// সংযোগ চেক করা
if ($conn->connect_error) {
    die("ডাটাবেজে সংযোগ করতে সমস্যা হয়েছে: " . $conn->connect_error);
}

// ফর্মের তথ্য গ্রহণ করা
$username = $_POST['username'];
$userimg = $_POST['userimg'];
$id = $_POST['id'];
$useremail = $_POST['useremail'];
$userphone = $_POST['userphone'];
$userbath = $_POST['userbath'];
$password = $_POST['password']; // সতর্কতা: নিরাপত্তার জন্য হ্যাশ করুন

// ডাটাবেজে তথ্য সন্নিবেশ করা
$sql = "INSERT INTO users (username, userimg, id, useremail, userphone, userbath, password)
VALUES ('$username', '$userimg', '$id', '$useremail', '$userphone', '$userbath', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "তথ্য সফলভাবে সংরক্ষিত হয়েছে।";
} else {
    echo "তথ্য সংরক্ষণ করতে সমস্যা হয়েছে: " . $conn->error;
}

// সংযোগ বন্ধ করা
$conn->close();
?>
