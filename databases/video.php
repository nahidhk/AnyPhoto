<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $servername = "localhost";
    $username = "readyof1";
    $password = "A*Password123123";
    $dbname = "redayof1_Aanyface"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize form inputs
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $verifay = mysqli_real_escape_string($conn, $_POST['verifay']);
    $ip = mysqli_real_escape_string($conn, $_POST['ip']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $dvc = mysqli_real_escape_string($conn, $_POST['dvc']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $userimg = mysqli_real_escape_string($conn, $_POST['userimg']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);

    // Handle video file upload
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $video_name = $_FILES['video']['name'];
        $video_tmp_name = $_FILES['video']['tmp_name'];
        $video_size = $_FILES['video']['size'];
        $video_ext = pathinfo($video_name, PATHINFO_EXTENSION);

        // Define the allowed file extensions
        $allowed_exts = array('mp4', 'avi', 'mov', 'wmv');

        if (in_array($video_ext, $allowed_exts)) {
            $new_video_name = uniqid() . "." . $video_ext;
            $upload_path = "databases/video/" . $new_video_name;

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($video_tmp_name, $upload_path)) {
                // Insert the data into the database
                $sql = "INSERT INTO videos (username, userimg, title, verifay, date, created_at, video, `LIKE`, device, ip, loction) 
                        VALUES ('$username', '$userimg', '$title', '$verifay', '$date', '', '$new_video_name', 0, '$dvc', '$ip', '$location')";

                if ($conn->query($sql) === TRUE) {
                    echo "Video uploaded and data inserted successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Failed to upload video.";
            }
        } else {
            echo "Invalid file format. Only mp4, avi, mov, and wmv are allowed.";
        }
    } else {
        echo "Please select a video to upload.";
    }

    // Close connection
    $conn->close();
}
?>
