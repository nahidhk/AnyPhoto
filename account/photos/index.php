<?php
if ( isset( $_GET[ 'id' ] ) ) {
    $id = $_GET[ 'id' ];
} 
require_once('../../php/configer.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM photos WHERE userid = $id";
$result = $conn->query($sql);
$photos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $photos[] = $row; 
    }  
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
    <title>Photos - Anyface</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
</head>

<body>
<div id="model"></div>
    <div class="nav animate__slideInDown animate__animated">
        <span class="navtext">Photos - Anyface</span>
        <button onclick="back()" title="Go back" class="navbtn mybtn center"><i class="fa fa-long-arrow-left"></i></button>
    </div>
    <div class="photo">
          <div onclick="accountprofile()" class="user">
            <img id="userimgtop" class="userimg">
            <p class="username">&nbsp;&nbsp;&nbsp;<b><span id="showthemyname"></span></b></p>
          </div>
          <center>
          <div class="aptmain"> 
            <a class="a" href="/upload/photo/"><i class="fa-regular fa-image"></i></a>
            <a class="a" href="/upload/video/"><i class="fa-solid fa-video"></i></a>
          </div>
        </center>
         </div>
    <div id="app"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function showtopuserthevideo(){
  var data = localStorage.getItem("user");
var userData = JSON.parse(data);
const myimg = document.getElementById("userimgtop");
const myname = document.getElementById("showthemyname");
myname.innerHTML=userData.username;
myimg.src=`/databases/photos/${userData.photo}`;

}
showtopuserthevideo();
        function back(){
        window.history.back();
        }
        const photos = <?php echo json_encode($photos); ?>;

        function displayData() {
            const dataContainer = document.getElementById("app");

            if (!dataContainer) {
                console.error("Element with id 'app' not found.");
                return;
            }

            dataContainer.innerHTML = "";
            photos.forEach((item) => {
                const itemElement = document.createElement("div");
                itemElement.innerHTML = `
                    <div class="photo" id="${item.userimg}">
                        <div onclick="window.location.href='/account?id=${item.userid}'" class="user">
                            <img src="/databases/photos/${item.userimg}" alt="${item.username}" class="userimg">
                            <p class="username">&nbsp;&nbsp;&nbsp;<b><span>${item.username}</span></b>  ${item.verifay}</p>
                        </div>
                        <blockquote>
                            <span title="This is a Post Time" class="dateshow">${item.mydate}</span>
                        </blockquote>
                        <blockquote>
                            ${item.title}
                        </blockquote>
                        
                        <img  src="/databases/photos/${item.photo}" alt="${item.username}" class="imgdata">
         <div class="aptmain"> 
            <a class="a" href="/upload/photo/"><i class="fa-solid fa-pen"></i></a>
            <a class="rr"onclick="myfun()" href="/account/photos/drop/?id=${item.id}" ><i class="fa-solid fa-trash-can"></i></a>
          </div>
                        </div>                  
                    </div>
                `;

                dataContainer.appendChild(itemElement);
            });
        }

        displayData();


function myfun() {   
document.getElementById("model").innerHTML=`<p class="animate__animated animate__bounceIn" style='background-color: green;color: #fff;padding: 13px;width: 300px;position: fixed; top: 10px;box-shadow: 0 0 20px 0 green; font-size: 15pt; border-radius: 5px;right: 20px;z-index:300;'>Deleted Successfully!</p>`;
    setTimeout(stim, 1000); 
    window.location.reload(); 
}
    </script>
    
</body>
</html>
