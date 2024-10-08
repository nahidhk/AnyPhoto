<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $uploadDir = "photos/";
    $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);
    $title = $_POST["title"];
    $username = $_POST["username"];
    $userimg = $_POST["userimg"];
    $date = $_POST["date"];
    $verifay = $_POST["verifay"];

    $maxFileSize = 50 * 1024 * 1024;
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedExtensions)) {
        if ($_FILES["photo"]["size"] > $maxFileSize) {
            echo "<h1>Photo size exceeds the limit of 50 MB. or Poblem <a href='mailto:nahidhk2007@gmail.com'>feedback</a> in Nahid HK.</h1> ";
            exit;
        }

        if ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
            echo "<h1>Error code: " . $_FILES['photo']['error'] . "</h1><br><h1>Server Poblem <a href='mailto:nahidhk2007@gmail.com'>feedback</a> Nahid HK.</h1>";
            exit;
        }

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
            // Database connection
            $conn = new mysqli("localhost", "readyof1", "A*Password123123", "readyof1_Aanyface");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO photos (title, username, userimg, date, verifay, img) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $title, $username, $userimg, $date, $verifay, basename($_FILES["photo"]["name"]));
            
            if ($stmt->execute()) {
                echo "<script>window.location.href='/'</script>";
            } else {
                echo "<h1>Error uploading Photo to database. <a href='mailto:nahidhk2007@gmail.com'>feedback</a> Nahid HK.</h1>";
            }
            
            $stmt->close();
            $conn->close();
        } else {
            echo "<h1>Error uploading photo</h1>";
        }
    } else {
        echo "<h1>Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed. </h1>";
    }
} else {
    echo "<h1>No photo uploaded.</h1>";
}
?>

