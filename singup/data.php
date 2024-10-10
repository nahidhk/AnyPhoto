<?php
$servername = "localhost"; 
$username = "readyof1"; 
$password = "A*Password123123";
$dbname = "readyof1_Aanyface";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("ডাটাবেজে সংযোগ করতে সমস্যা হয়েছে: " . $conn->connect_error);
}

$username = $_POST['username'];
$bath = $_POST['bath'];
$useremail = $_POST['email'];
$userphone = $_POST['phone'];
$password = $_POST['password'];

$sql = "INSERT INTO verifay_user (username, bath, useremail, userphone, password)
VALUES ('$username', '$bath', '$useremail', '$userphone',  '$password')";


if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "তথ্য সংরক্ষণ করতে সমস্যা হয়েছে: " . $conn->error;
}


$conn->close();
?>


<?php 

// POST রিকোয়েস্ট চেক
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ইউজারনেম চেক
    if (isset($_POST['check_username'])) {
        $username = $_POST['username']; // ডাটা সরাসরি নেওয়া
        $stmt = $conn->prepare("SELECT * FROM verifay_user WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<span style=\"color: red;\"><i class=\"fa-regular fa-circle-xmark fa-shake\"></i> This Username Not Available!</span>";
        } else {
            echo "<span style=\"color: green;\"><i class=\"fa-regular fa-circle-check\"></i>This Username is Available!</span>";
        }
        $stmt->close();
    }

    // ইমেইল চেক
    elseif (isset($_POST['check_email'])) {
        $email = $_POST['email']; // ডাটা সরাসরি নেওয়া
        $stmt = $conn->prepare("SELECT * FROM verifay_user WHERE useremail=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<span style=\"color: red;\"><i class=\"fa-regular fa-circle-xmark fa-shake\"></i> This Email Already registered!</span>";
        } else {
            echo "<span style=\"color: green;\"><i class=\"fa-regular fa-circle-check\"></i>This Email is Available!</span>";
        }
        $stmt->close();
    }

    // ফোন নম্বর চেক
    elseif (isset($_POST['check_phone'])) {
        $phone = $_POST['phone']; // ডাটা সরাসরি নেওয়া
        $stmt = $conn->prepare("SELECT * FROM verifay_user WHERE userphone=?");
        $stmt->bind_param("s", $phone);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<span style=\"color: red;\"><i class=\"fa-regular fa-circle-xmark fa-shake\"></i> This number Already registered!</span>";
        } else {
            echo "<span style=\"color: green;\"><i class=\"fa-regular fa-circle-check\"></i>This Number is Available!</span>";
        }
        $stmt->close();
    }
}

?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userEmail = $_POST["useremail"];
    // Assuming you have a password stored securely, otherwise never send passwords via email
    
    // Send confirmation email
    $to = $userEmail;
    $subject = "You Just Verifayed AnyFace Account !";
    $message = "
<center>
    <h1>Welcome $username</h1> 
    <h3>You Verifayed Anyface Original Account ! </h3>
</center>
<blockquote>
    <p>Your Data JSON</p>
    <pre style='background-color: #ddd;'>

        [
          {
            'username':'$username',
            'youremail':'$useremail',
            'yourphone':'$userphone',
            'yourpassword':'$password'
          }
        ]
    </pre>
    <center>
        <a style='background-color: orange;text-decoration: none;color: #fff;padding: 10px;border-radius: 10px;padding-left: 50px;padding-right: 50px;' target='_blank' href='https://anyface.readyoffercareer.com/account/verifay/'>
            Verifay
        </a>
    </center>
</blockquote>

    ";
    $headers = "From: anyface@anyface.readyoffercareer.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    mail($to, $subject, $message, $headers);

    // Respond to the client-side
  
}
?>