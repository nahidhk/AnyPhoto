<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $uploadDir = "photos/";
    $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);
    $title = $_POST["title"];
    $date = $_POST["date"];
    $device = $_POST["dvc"];
    $ip = $_POST["ip"];
    $location = $_POST["location"];
    $userid = $_POST["userid"];

    $maxFileSize = 50 * 1024 * 1024;  
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

   
    if (in_array($imageFileType, $allowedExtensions)) {

        if ($_FILES["photo"]["size"] > $maxFileSize) {
            echo "<h1>Photo size exceeds the limit of 50 MB. <a href='mailto:nahidhk2007@gmail.com'>feedback</a> Nahid HK.</h1>";
            exit;
        }

 
        if ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
            echo "<h1>Error code: " . $_FILES['photo']['error'] . "</h1><br><h1>Server problem <a href='mailto:nahidhk2007@gmail.com'>feedback</a> Nahid HK.</h1>";
            exit;
        }

      
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
      
            require_once('../php/configer.php');
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM users WHERE id = $userid";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); 
            }
         
            $stmt = $conn->prepare("INSERT INTO photos (title, username, userimg, mydate, photo, device, ip, location , userid , verifay) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? , ?)");
            $stmt->bind_param("ssssssssss", $title, $row['username'], $row['photo'], $date, basename($_FILES["photo"]["name"]), $device,  $ip, $location , $row['id'] , $row['verifay']);
            
           
            if ($stmt->execute()) {
                echo "<script>window.location.href='/';</script>";
            } else {
                echo "<h1>Error uploading photo to database. <a href='mailto:nahidhk2007@gmail.com'>feedback</a> Nahid HK.</h1>";
            }
            
           
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
