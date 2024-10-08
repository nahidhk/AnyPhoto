<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $uploadDir = "photos/";
    $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);
    $title = $_POST["title"];
    $username = $_POST["username"];
    $userimg = $_POST["userimg"];
    $date = $_POST["date"];
    $verifay = $_POST["verifay"];
    $device = $_POST["dvc"];
    $ip = $_POST["ip"];
    $location = $_POST["location"];

    $maxFileSize = 50 * 1024 * 1024;  // 50MB
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    // Check if file type is allowed
    if (in_array($imageFileType, $allowedExtensions)) {
        // Check if file size exceeds limit
        if ($_FILES["photo"]["size"] > $maxFileSize) {
            echo "<h1>Photo size exceeds the limit of 50 MB. <a href='mailto:nahidhk2007@gmail.com'>feedback</a> Nahid HK.</h1>";
            exit;
        }

        // Check for upload errors
        if ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
            echo "<h1>Error code: " . $_FILES['photo']['error'] . "</h1><br><h1>Server problem <a href='mailto:nahidhk2007@gmail.com'>feedback</a> Nahid HK.</h1>";
            exit;
        }

        // Move uploaded file
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
            // Database connection
            $conn = new mysqli("localhost", "readyof1", "A*Password123123", "readyof1_Aanyface");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and bind SQL statement
            $stmt = $conn->prepare("INSERT INTO photos (title, username, userimg, date, verifay, img, device, ip, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $title, $username, $userimg, $date, $verifay, basename($_FILES["photo"]["name"]), $device, $ip, $location);
            
            // Execute statement and check success
            if ($stmt->execute()) {
                echo "<script>window.location.href='/';</script>";
            } else {
                echo "<h1>Error uploading photo to database. <a href='mailto:nahidhk2007@gmail.com'>feedback</a> Nahid HK.</h1>";
            }
            
            // Close the statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "<h1>Error moving uploaded file.</h1>";
        }
    } else {
        echo "<h1>Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.</h1>";
    }
} else {
    echo "<h1>No photo uploaded.</h1>";
}
?>
