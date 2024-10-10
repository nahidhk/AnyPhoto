<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $db_username = "readyof1";
    $db_password = "A*Password123123";
    $dbname = "readyof1_Aanyface";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['username'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $sql = "SELECT * FROM verifay_user WHERE username='$username'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo '<span style="color: red;"><i class="fa-regular fa-circle-xmark fa-shake"></i> This Username Not Available!</span>';
        } else {
            echo '<span style="color: green;"><i class="fa-regular fa-circle-check"></i> This Username is Available!</span>';
        }
    } elseif (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql = "SELECT * FROM verifay_user WHERE useremail='$email'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo '<span style="color: red;"><i class="fa-regular fa-circle-xmark fa-shake"></i> This Email Already registered!</span>';
        } else {
            echo '<span style="color: green;"><i class="fa-regular fa-circle-check"></i> This Email is Available!</span>';
        }
    } elseif (isset($_POST['phone'])) {
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $sql = "SELECT * FROM verifay_user WHERE userphone='$phone'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo '<span style="color: red;"><i class="fa-regular fa-circle-xmark fa-shake"></i> This number Already registered!</span>';
        } else {
            echo '<span style="color: green;"><i class="fa-regular fa-circle-check"></i> This Number is Available!</span>';
        }
    }

    $conn->close();
}
?>
