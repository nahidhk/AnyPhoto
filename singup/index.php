<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="/style/style.main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="/javascript/jquery-3.6.0.min.js"></script>
</head>

<body style="background-color: aquamarine;">
    <section class="maincontect">
        <div class="melo">
            <form action="" method="POST" id="signup-form">
                <h2>
                    <center>Create Account</center>
                </h2>
                <blockquote>
                    <label for="email">Email</label>
                    <input name="email" type="email" id="email" required placeholder="youremail@exampule.com">
                    <span id="email-check"></span><br>

                    <label for="phone">Phone</label>
                    <input type="number" name="phone" id="phone" required placeholder="+880 18000000">
                    <span id="phone-check"></span><br>

                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required placeholder="input username">
                    <span id="username-check"></span><br>

                    <label for="bath">Date of Birth</label>
                    <input type="date" name="bath" required><br>

                    <label for="password">Password</label>
                    <input id="newpass" type="password" required placeholder="Type a Password"><br>

                    <label for="password"> Conform Password</label>
                    <input oninput="singupmod()" id="conpass" type="password" name="password" required
                        placeholder="Re type Password">
                    <span id="passck"></span>

                    <button id="singbtn" type="submit">Sing Up</button>
            </form>
            </blockquote>
        </div>
    </section>
    <script src="/javascript/login.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"
        integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    function singupmod() {
        const newpass = document.getElementById('newpass').value;
        const conpass = document.getElementById('conpass').value;
        if (newpass == conpass) {
            blockbtn();
            document.getElementById('newpass').style.border = "2px solid green";
            document.getElementById('conpass').style.border = "2px solid green";
            document.getElementById('passck').style.display = "none";
        } else {
            nonebtn();
            document.getElementById('newpass').style.border = "2px solid red";
            document.getElementById('conpass').style.border = "2px solid red";
            document.getElementById('passck').innerHTML = "Password Don't mach"
        }

    }

    function blockbtn() {
        document.getElementById("singbtn").style.display = "block";
    }

    function nonebtn() {
        document.getElementById("singbtn").style.display = "none";
    }
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const usernameInput = document.getElementById("username");
        const emailInput = document.getElementById("email");
        const phoneInput = document.getElementById("phone");

        usernameInput.addEventListener("blur", function() {
            const username = usernameInput.value;
            checkAvailability('username', username, 'username-check');
        });

        emailInput.addEventListener("blur", function() {
            const email = emailInput.value;
            checkAvailability('email', email, 'email-check');
        });

        phoneInput.addEventListener("blur", function() {
            const phone = phoneInput.value;
            checkAvailability('phone', phone, 'phone-check');
        });

        function checkAvailability(type, value, elementId) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "", true); // Same file
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById(elementId).innerHTML = xhr.responseText;
                }
            };
            xhr.send(`${type}=true&${type}=${value}`);
        }
    });
    </script>


    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $db_username = "readyof1";
        $db_password = "A*Password123123";
        $dbname = "readyof1_Aanyface";

        // Create connection
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['check_username'])) {
            // Checking username availability
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $sql = "SELECT * FROM verifay_user WHERE username='$username'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<script>document.getElementById('username-check').innerHTML = '<span style=\"color: red;\"><i class=\"fa-regular fa-circle-xmark fa-shake\"></i> This Username Not Available!</span>'; nonebtn();</script>";
            } else {
                echo "<script>document.getElementById('username-check').innerHTML = '<span style=\"color: green;\"><i class=\"fa-regular fa-circle-check\"></i>This Username is Available!</span>';blockbtn();</script>";
            }
        } elseif (isset($_POST['check_email'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $sql = "SELECT * FROM verifay_user WHERE useremail='$email'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<script>document.getElementById('email-check').innerHTML = '<span style=\"color: red;\"><i class=\"fa-regular fa-circle-xmark fa-shake\"></i> This Email Already registered!</span>'; nonebtn();</script>";
            } else {
                echo "<script>document.getElementById('email-check').innerHTML = '<span style=\"color: green;\"><i class=\"fa-regular fa-circle-check\"></i>This Eamil is Available!</span>';blockbtn();</script>";
            }
        } elseif (isset($_POST['check_phone'])) {
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $sql = "SELECT * FROM verifay_user WHERE userphone='$phone'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<script>document.getElementById('phone-check').innerHTML = '<span style=\"color: red;\"><i class=\"fa-regular fa-circle-xmark fa-shake\"></i> This number Already registered!</span>'; nonebtn();</script>";
            } else {
                echo "<script>document.getElementById('phone-check').innerHTML = '<span style=\"color: green;\"><i class=\"fa-regular fa-circle-check\"></i>This Number is Available!</span>';blockbtn();</script>";
            }
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $bathdate = mysqli_real_escape_string($conn, $_POST['bath']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $sql = "INSERT INTO verifay_user (username, useremail, userphone, bath, password) 
                    VALUES ('$username', '$email', '$phone', '$bathdate', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>window.location.href='/'</script>";
            } else {
                echo "ত্রুটি: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
    ?>
</body>

</html>