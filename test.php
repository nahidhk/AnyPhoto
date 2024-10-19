<?php
require_once('./php/configer.php');

// MySQL-এ কানেকশন তৈরি করা
$conn = mysqli_connect($servername, $username, $password, $dbname);

// কানেকশন চেক করা
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
