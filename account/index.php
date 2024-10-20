<?php
if ( isset( $_GET[ 'id' ] ) ) {
    $id = $_GET[ 'id' ];
} 

require_once('../php/configer.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
} else {
    echo "<center><p style='background-color: red;color: #fff;padding: 13px;width: 300px;position: fixed; top: 10px;box-shadow: 0 0 20px 0 red; font-size: 15pt; border-radius: 5px;right: 20px;'>User Not Found!</p><br><br><br><br><h1><a href='/singup'>Sing Up</a></h1></center>";
    exit;
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <link rel='stylesheet' href='/style/style.main.css'>
    <link rel='shortcut icon' href="//databases/photos//<?php echo $userimg?>" type='image/x-icon'>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?php echo $row["username"] ?> - Anyface</title>
</head>

<body>
    <div class="nav">
        <span class="navtext"><?php echo $row["username"] ?> - Anyface</span>
        <button onclick="home()" title="Logout" class="navbtn mybtn center"><i class="fa-solid fa-house"></i></button>
        <button onclick="logout()" title="Logout" class="navbtn mybtn right"><i class="fa-solid fa-right-from-bracket"></i></button>
        
    </div>
    <section class="maincontect">
    <div id="listio" class='melo'>
        <center>
           <br><br>
           <div class="ablot">
            <img class='myimgproo' src="/databases/photos/<?php echo $row['photo']; ?>">
            <form id="myform" action="/databases/account.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
    <input id="penin" oninput="editimg()" class="penin vcc" name="photo" type="file" accept="image/*">
</form>

            </div>
            <h1><span><?php echo $row["username"] ?></span>&nbsp;</h1>
            <p class="vcc" id="email"><span><b>Email : </b><?php echo $row["email"] ?></p>
            <p class="vcc" id="phone"><span><b>Phone : </b><?php echo $row["phone"] ?></p>
            <p><span><b>Bath of Date : </b><?php echo $row["bath"] ?></p>
            <p><span><b>joined : </b><?php echo $row["created_at"] ?></p>
            <div id="normalbox">
                <h3>UID : [<?php echo $row["id"] ?>] </h3>
                <p class="vcc" id="password"><b>Password :</b> <a href="#"> Chenge Password</a></p>
            </div>
            <br><br>
        </center>
    </div>

    </section>
    <script src='/javascript/license.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>

const user = {
  username : "<?php echo $row['username'] ?>",
  email : "<?php echo $row['email'] ?>",
  id : "<?php echo $row['id'] ?>",
  phone : "<?php echo $row['phone'] ?>",
}
const userstring = JSON.stringify(user);
    sessionStorage.setItem('user', userstring);
  </script>
</body>

</html>