<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="/style/style.main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <section>
        <form action="" method="POST" id="signup-form">
            <label for="email">Email</label>
            <input name="email" type="email" id="email" required>
            <span id="email-check"></span><br>
            
            <label for="phone">Phone</label>
            <input type="number" name="phone" id="phone" required>
            <span id="phone-check"></span><br>

            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <span id="username-check"></span><br>

            <label for="bath">Date of Birth</label>
            <input type="date" name="bath" required><br>
            
            <label for="password">Password</label>
            <input type="password" name="password" required><br>
            
            <input type="submit" value="Sign Up">
        </form>
    </section>

    <script src="/javascript/jquery-3.7.1.main.js"></script>

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
                echo "<script>document.getElementById('username-check').innerHTML = '<span style=\"color: red;\">এই ব্যবহারকারীর নামটি ব্যবহার করা হয়েছে।</span>';</script>";
            } else {
                echo "<script>document.getElementById('username-check').innerHTML = '<span style=\"color: green;\">এই ব্যবহারকারীর নামটি উপলব্ধ।</span>';</script>";
            }
        } elseif (isset($_POST['check_email'])) {
            // Checking email availability
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $sql = "SELECT * FROM verifay_user WHERE useremail='$email'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<script>document.getElementById('email-check').innerHTML = '<span style=\"color: red;\">এই ইমেইলটি ব্যবহার করা হয়েছে।</span>';</script>";
            } else {
                echo "<script>document.getElementById('email-check').innerHTML = '<span style=\"color: green;\">এই ইমেইলটি উপলব্ধ।</span>';</script>";
            }
        } elseif (isset($_POST['check_phone'])) {
            // Checking phone availability
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $sql = "SELECT * FROM verifay_user WHERE userphone='$phone'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<script>document.getElementById('phone-check').innerHTML = '<span style=\"color: red;\">এই ফোন নম্বরটি ব্যবহার করা হয়েছে।</span>';</script>";
            } else {
                echo "<script>document.getElementById('phone-check').innerHTML = '<span style=\"color: green;\">এই ফোন নম্বরটি উপলব্ধ।</span>';</script>";
            }
        } else {
            // Register user
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $bathdate = mysqli_real_escape_string($conn, $_POST['bath']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            // SQL query
            $sql = "INSERT INTO verifay_user (username, useremail, userphone, bath, password) 
                    VALUES ('$username', '$email', '$phone', '$bathdate', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "নতুন রেকর্ড সফলভাবে যোগ হয়েছে";
            } else {
                echo "ত্রুটি: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
    ?>
</body>
</html>
