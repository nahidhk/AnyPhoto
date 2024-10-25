<?php 
if (isset($_GET['id']) && isset($_GET['userid'])) {
    $id = intval($_GET['id']);
    $userid = intval($_GET['userid']); 
} else {
    echo "ID or User ID not set.";
    exit; 
}
require_once('../php/configer.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users WHERE id = $userid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); 
} else {
    exit;
    echo "error user";
}
$sql = "SELECT * FROM photos WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc(); 
} else {
    exit;
    echo "error user";
}
echo $user['username'];
echo $data['photoid'];
?>
<img src="/databases/photos/<?php echo $data['photo'] ?>"/>