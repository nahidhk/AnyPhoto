<?php
require_once('../php/configer.php');
$conn = new mysqli($servername, $username, $password, $dbname);

// সংযোগ চেক করা হচ্ছে
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));

    $sql = "SELECT * FROM users WHERE email='$email' OR phone='$phone'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if ($phone == $row['phone']) {
            echo "<script>
            window.history.back();
            sessionStorage.setItem('restuserid', '" . $row['id'] . "');
        </script>";
        
          
        } else {
            echo "<center><p style='background-color: red;color: #fff;padding: 13px;width: 300px;position: fixed; top: 10px;box-shadow: 0 0 20px 0 red; font-size: 15pt; border-radius: 5px;right: 20px;'>Phone number does not match!</p><br><br><br><br><h1><a href='/login'>Go Back</a></h1></center>";
        }
    } else {
        echo "<center><p style='background-color: red;color: #fff;padding: 13px;width: 300px;position: fixed; top: 10px;box-shadow: 0 0 20px 0 red; font-size: 15pt; border-radius: 5px;right: 20px;'>User Not Found!</p><br><br><br><br><h1><a href='/signup'>Sign Up</a></h1></center>";
    }
}
$conn->close();
?>
