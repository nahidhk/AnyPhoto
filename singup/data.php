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

    if (isset($_POST['check_username'])) {
        // Checking username availability
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $sql = "SELECT * FROM verifay_user WHERE username='$username'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<span style='color: red;'><i class='fa-regular fa-circle-xmark fa-shake'></i> This Username Not Available!</span>";
        } else {
            echo "<span style='color: green;'><i class='fa-regular fa-circle-check'></i>This Username is Available!</span>";
        }
    } elseif (isset($_POST['check_email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql = "SELECT * FROM verifay_user WHERE useremail='$email'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<span style='color: red;'><i class='fa-regular fa-circle-xmark fa-shake'></i> This Email Already registered!</span>";
        } else {
            echo "<span style='color: green;'><i class='fa-regular fa-circle-check'></i>This Email is Available!</span>";
        }
    } elseif (isset($_POST['check_phone'])) {
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $sql = "SELECT * FROM verifay_user WHERE userphone='$phone'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<span style='color: red;'><i class='fa-regular fa-circle-xmark fa-shake'></i> This number Already registered!</span>";
        } else {
            echo "<span style='color: green;'><i class='fa-regular fa-circle-check'></i>This Number is Available!</span>";
        }
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $bathdate = mysqli_real_escape_string($conn, $_POST['bath']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $sql = "INSERT INTO verifay_user (username, useremail, userphone, bath, password) 
                VALUES ('$username', '$email', '$phone', '$bathdate', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='/'</script>";
        } else {
            echo "ত্রুটি: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
