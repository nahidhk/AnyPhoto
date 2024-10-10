
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "readyof1";
    $password = "A*Password123123";
    $dbname = "readyof1_Aanyface";

    // ডাটাবেজ কানেকশন তৈরি
    $conn = new mysqli($servername, $username, $password, $dbname);

    // কানেকশন চেক করা
    if ($conn->connect_error) {
        die("কানেকশন ব্যর্থ: " . $conn->connect_error);
    }

    // ফর্মের ডেটা নিয়ে SQL ইনজেকশন থেকে রক্ষা পাওয়া
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $bathdate = mysqli_real_escape_string($conn, $_POST['bath']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // SQL কুয়েরি তৈরি
    $sql = "INSERT INTO verifay_user (username, useremail, userphone, bath, password) 
            VALUES ('$username', '$email', '$phone', '$bathdate', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "নতুন রেকর্ড সফলভাবে যোগ হয়েছে";
    } else {
        echo "ত্রুটি: " . $sql . "<br>" . $conn->error;
    }

    // কানেকশন বন্ধ করা
    $conn->close();
}
?>