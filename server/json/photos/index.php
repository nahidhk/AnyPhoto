<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "readyof1"; 
$password = "A*Password123123"; 
$dbname = "readyof1_Aanyface"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}


$sql = "SELECT * FROM `photos`;"; 
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
   
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}


echo json_encode($data);


$conn->close();
?>
