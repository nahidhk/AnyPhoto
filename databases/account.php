<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $uploadDir = 'photos/';
    $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);
    
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedExtensions)) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
            echo "<script>window.location.href='/'</script> ";
        } else {
            echo "<h1>Server Poblem <a href='mailto:nahidhk2007@gmail.com'>feedback</a> in Nahid HK.</h1>";
        }
    } else {
        echo "<h1>Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed. chenge your profile photo in the setting</h1>";
    }
} else {
    echo "<h1>Server Poblem <a href='mailto:nahidhk2007@gmail.com'>feedback</a> in Nahid HK.</h1>";
}
?>

