<?php
                // Database connection details
                $servername = "localhost"; // Your server (usually 'localhost')
                $usernameDB = "readyof1"; // Your MySQL database username
                $passwordDB = "A*Password123123"; // Your MySQL database password
                $dbname = "readyof1_Aanyface"; // Your MySQL database name

                // Create a connection
                $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    // Query to check if user exists
    $sql = "SELECT * FROM verifay_user WHERE username='$username' OR useremail='$username' OR userphone='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Debugging output
        echo "Hashed password from DB: " . $row['password'] . "<br>"; // Check the stored hashed password

        // Verify the password
        if (password_verify($password, $row['password'])) {
            echo "<p style='color:green;'>Login successful! Welcome, " . htmlspecialchars($row['username']) . "</p>";
        } else {
            echo "<p style='color:red;'>Invalid password!</p>";
        }
    } else {
        echo "<p style='color:red;'>User not found!</p>";
    }
}


                // Close connection
                $conn->close();
                ?>