<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $uploadDir = "php/data/";
    $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);
    
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    
    if (in_array($imageFileType, $allowedExtensions)) {
        
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
            echo "<h1>File uploaded successfully.</h1>";
        } else {
            echo "<h1>Error moving the uploaded file.</h1>";
        }
    } else {
        echo "";
    }
} else {
    echo "<h1>No file uploaded.</h1>";
}
?>
<!-- <script>window.location.href="/"</script> -->