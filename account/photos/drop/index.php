<?php
if ( isset( $_GET[ 'id' ] ) ) {
    $id = $_GET[ 'id' ];
} 
require_once('../../../php/configer.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "DELETE FROM photos WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "<script> window.history.back();</script>";
} else {
    
}
$conn->close();
?>