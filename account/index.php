<?php
if (isset($_GET['username']) && isset($_GET['userimg'])) {
    $username = $_GET['username'];
    $userimg = $_GET['userimg'];
} else {
    echo "Username or User Image not provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/style/style.main.css">
    <link rel="shortcut icon" href="/php/data/<?php echo $userimg?>" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username ?></title>
</head>
<body>
    <div class="step">
       <center>
        <input oninput="editimg()" type="file" class="myinput" name="" id="editprofile">
            <img class="myimgproo" id="userimg">
        </center>
        </div>
    <script src="/javascript/license.js"></script>
</body>
</html>
