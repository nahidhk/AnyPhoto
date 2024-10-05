<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $uploadDir = "php/data/";
    $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);
    $title = $_POST["title"];
    $username = $_POST["username"];
    $userimg = $_POST["userimg"];
    $date =$_POST["date"];
    
 
    $maxFileSize = 50 * 1024 * 1024;
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedExtensions)) {
        if ($_FILES["photo"]["size"] > $maxFileSize) {
            echo "<h1>File size exceeds the limit of 50 MB.</h1>";
            exit;
        }

        if ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
            echo "<h1>Error code: " . $_FILES['photo']['error'] . "</h1>";
            exit;
        }


        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
            $jsonFile = "/databases/photos.json";
            if (file_exists($jsonFile)) {
                $jsonData = json_decode(file_get_contents($jsonFile), true);
                if (!is_array($jsonData)) {
                    $jsonData = [];
                }
            } else {
                $jsonData = [];
            }

            $newData = [
                "date" => $date,
                "username" => $username,
                "userimg" => $userimg,
                "title" => $title,
                "img" => basename($_FILES["photo"]["name"])
            ];
            array_unshift($jsonData, $newData);
            file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT));

            echo "<h1>File uploaded successfully!</h1>";
        } else {
            echo "<h1>Error uploading file.</h1>";
        }
    } else {
        echo "<h1>Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.</h1>";
    }
} else {
    echo "<h1>No file uploaded.</h1>";
}
?>
<!-- <script>window.location.href="/"</script> -->
