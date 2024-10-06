<?php
if ( isset( $_GET[ 'username' ] ) && isset( $_GET[ 'userimg' ] ) ) {
    $username = $_GET[ 'username' ];
    $userimg = $_GET[ 'userimg' ];
} else {
    echo 'Username or User Image not provided.';
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
    <title><?php echo $username ?></title>
</head>

<body>
    <section class="maincontect">
    <div id="listio" class='step'>
        <center>
            <form id="myform" action='/databases/account.php' method='POST' enctype='multipart/form-data'>
                <input oninput='editimg()' type='file' class='myinput' name='photo' id='editprofile' accept="image/*" >
            </form>
            <span id="windto" class="vtext vcc">your Account Verifyed
            </span>
            <img class='myimgproo' id='userimg'>
            <h1><span id='showusername'></span>&nbsp;
             <span id="vicon">   <i onclick='editusername()' id='textediticon' title='Edit Your Name' class='bi bi-pencil-square'></i>
             <span>
            </h1>
           
            <p><span><b>Email : </b><span id='email'></span></p>
            <p><span><b>Phone : </b><span id='phone'></span></p>
            <div class="vcc" id="normalbox">
                <h3>UID : [SERVER NOT ALLOWED]<span id="uid"></span> </h3>
                <span class="notviy">Password in one time View</span>
                <p><b>Password :</b> <span id="password"></span></p>
            </div>
        </center>
    </div>

    </section>
    <script src='/javascript/license.js'></script>
</body>

</html>