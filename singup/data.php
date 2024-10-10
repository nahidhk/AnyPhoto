<?php
$servername = "localhost"; 
$username = "readyof1"; 
$password = "A*Password123123";
$dbname = "readyof1_Aanyface";

// ডাটাবেজ কানেকশন তৈরি
$conn = new mysqli($servername, $username, $password, $dbname);

// সংযোগ চেক
if ($conn->connect_error) {
    die("ডাটাবেজে সংযোগ করতে সমস্যা হয়েছে: " . $conn->connect_error);
}

// POST রিকোয়েস্ট চেক
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ডাটাবেজে তথ্য চেক করার সাধারণ ফাংশন
    function checkAvailability($conn, $column, $value, $message) {
        $stmt = $conn->prepare("SELECT * FROM verifay_user WHERE $column=?");
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "<span style=\"color: red;\"><i class=\"fa-regular fa-circle-xmark fa-shake\"></i> $message Already Taken!</span>";
        } else {
            echo "<span style=\"color: green;\"><i class=\"fa-regular fa-circle-check\"></i> $message is Available!</span>";
        }
        $stmt->close();
    }

    // ইউজারনেম চেক
    if (isset($_POST['username_check'])) {
        checkAvailability($conn, 'username', $_POST['username'], 'Username');
    }

    // ইমেইল চেক
    elseif (isset($_POST['email_check'])) {
        checkAvailability($conn, 'useremail', $_POST['email'], 'Email');
    }

    // ফোন নম্বর চেক
    elseif (isset($_POST['phone_check'])) {
        checkAvailability($conn, 'userphone', $_POST['phone'], 'Phone number');
    }

    // যদি চেক রিকোয়েস্ট না হয়, তাহলে ডাটা ইনসার্ট করা হবে
    else {
        $username = $_POST['username'];
        $bath = $_POST['bath'];
        $useremail = $_POST['email'];
        $userphone = $_POST['phone'];
        $password = $_POST['password'];

        // প্রিপেয়ার্ড স্টেটমেন্ট ইনসার্ট করার জন্য
        $stmt = $conn->prepare("INSERT INTO verifay_user (username, bath, useremail, userphone, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $bath, $useremail, $userphone, $password);

        // ডাটা ইনসার্ট করা
        if ($stmt->execute()) {
            echo "তথ্য সফলভাবে সংরক্ষণ করা হয়েছে!";
        } else {
            echo "তথ্য সংরক্ষণ করতে সমস্যা হয়েছে: " . $stmt->error;
        }

        $stmt->close();
    }
}

// ডাটাবেজ সংযোগ বন্ধ
$conn->close();
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