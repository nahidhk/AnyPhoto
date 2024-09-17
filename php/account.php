<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $uploadDir = "data/";
    $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);
    
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    // Check if the file has an allowed extension
    if (in_array($imageFileType, $allowedExtensions)) {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
            echo "<h1>File uploaded successfully.</h1>";
        } else {
            echo "<h1>Error moving the uploaded file.</h1>";
        }
    } else {
        echo "<h1>Invalid file type. Only JPG, JPEG, PNG & GIF are allowed.</h1>";
    }
} else {
    echo "<h1>No file uploaded.</h1>";
}
?>
