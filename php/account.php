<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["phto"])) {
    $uploadDir = "data/";
    $uploadFile = $uploadDir . basename($_FILES["phto"]["name"]);
    
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedExtensions)) {
       
        } else {
            echo "<h1>Error uploading file.</h1>";
        }
    } else {
       
    }

?>