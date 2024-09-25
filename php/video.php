<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["video"])) {
    $uploadDir = "video/";
    $uploadFile = $uploadDir . basename($_FILES["video"]["name"]);
    $title = $_POST["title"];
    $username = $_POST["username"];
    $userimg = $_POST["userimg"];
    $date = $_POST["date"];
    $videoFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("mp4");

    // Validate file type
    if (in_array($videoFileType, $allowedExtensions)) {
        // Check file size (limit to 500MB)
        if ($_FILES["video"]["size"] > 500 * 1024 * 1024) {
            echo "<h1>File size exceeds the limit of 500 MB.</h1>";
            exit;
        }

        // Check for file upload errors
        if ($_FILES['video']['error'] !== UPLOAD_ERR_OK) {
            echo "<h1>Error during upload. Error code: " . $_FILES['video']['error'] . "</h1>";
            exit;
        }

        // Debugging to check if file details are correct
        echo "<pre>";
        print_r($_FILES); // Debugging $_FILES array
        echo "</pre>";

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $uploadFile)) {
            // JSON file path
            $jsonFile = "video.json";

            // Read existing data from the JSON file
            if (file_exists($jsonFile)) {
                $jsonData = json_decode(file_get_contents($jsonFile), true);
                if (!is_array($jsonData)) {
                    $jsonData = [];
                }
            } else {
                $jsonData = [];
            }

            // Add new video details to the array
            $newData = [
                "date" => $date,
                "username" => $username,
                "userimg" => $userimg,
                "title" => $title,
                "video" => basename($_FILES["video"]["name"])
            ];
            array_unshift($jsonData, $newData); // Add new data at the beginning

            // Write updated data to the JSON file
            file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT));

            echo "<h1>File uploaded successfully!</h1>";
        } else {
            echo "<h1>Error moving the uploaded file.</h1>";
        }
    } else {
        echo "<h1>Invalid file type. Only MP4 files are allowed.</h1>";
    }
} else {
    echo "<h1>No file uploaded or wrong request method.</h1>";
}
echo "<pre>";
print_r($_SERVER); // Check request method and headers
print_r($_FILES);  // Check if file data is being sent
echo "</pre>";
?>


