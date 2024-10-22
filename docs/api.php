<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$jsonFile = 'docs.json';
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    echo $jsonData; 
} else {
    echo json_encode(["error" => "File not found"]);
}
?>
