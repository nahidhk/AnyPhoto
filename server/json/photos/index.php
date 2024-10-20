<?php
header('Content-Type: application/json');
$conn = new mysqli('localhost', 'root', '51614824', 'anyface');
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}
$sql = "SELECT * FROM `photos`"; 
$result = $conn->query($sql);

$data = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
$data = array_reverse($data);
echo json_encode($data);
$conn->close();
?>
