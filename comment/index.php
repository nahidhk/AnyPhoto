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
  echo "error user";
  exit;
}
$sql = "SELECT * FROM photos WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $data = $result->fetch_assoc();
} else {
  echo "error user";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/style/style.main.css" />
    <link rel="shortcut icon" href="/icon.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comment <?php echo $data['username'] ?> - AnyFace</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
    <div class="nav animate__slideInDown animate__animated">
        <span class="navtext"> Anyface</span>
        <button onclick="gobackio()" title="Go Back" class="navbtn mybtn center">
            <i class="fa-solid fa-less-than"></i>
        </button>
    </div>

    <section class="maincontect">
        <div class="main">
            <div class="photo">
                <div onclick="window.location.href='/account?id=<?php echo $data['userid'] ?>'" class="user">
                    <img src="/databases/photos/<?php echo $data['userimg'] ?>" alt="<?php echo $data['username'] ?>"
                        class="userimg" />
                    <p class="username">&nbsp;&nbsp;&nbsp;<b><span><?php echo $data['username'] ?></span></b></p>
                </div>
                <blockquote><span title="This is a Post Time" class="dateshow"><?php echo $data['mydate'] ?></span>
                </blockquote>
                <blockquote><?php echo $data['title'] ?></blockquote>
                <img src="/databases/photos/<?php echo $data['photo'] ?>" alt="<?php echo $data['username'] ?>"
                    class="imgdata" />
                <div class="sherarsystem">
                    <div class="aptmain"></div>
                </div>
                <div class="messege">
                    <div id="app"></div>
                </div>
            </div>
            <p id="true_data"></p>
        </div>

        <div class="sendbox">
            <div class="sendfile">
                <div class="div1 mydiv">
                    <img src="/databases/photos/<?php echo $user['photo'] ?>" alt="" class="userimg">
                </div>
                <div class="div2 mydiv">
                    <form id="sendnet" method="post" onsubmit="sendmymessege()">
                        <input class="sendin" type="text" name="messege" required>
                </div>
                <div class="div3 mydiv">
                    <center><button type="submit" class="sendbtn"><i class="fa-solid fa-paper-plane"></i></button>
                    </center>
                </div>
                </form>
            </div>
        </div>
    </section>
    <script src="/docs/docs.js"></script>
    <script>
      async function displayData() {
    try {
        const token ="<?php echo $data['photoid']; ?>"; // টোকেন হিসেবে সঠিকভাবে JSON.stringify প্রয়োগ
        const response = await fetch(`/comment/api.php?token=${token}`);
        const data = await response.json();
        const dataContainer = document.getElementById("app");

        if (!dataContainer) {
            throw new Error("Element with id 'app' not found.");
        }

        dataContainer.innerHTML = ""; // পুরনো ডেটা মুছে ফেলতে

        data.forEach((item) => { // data ব্যবহার করা হয়েছে filteredData এর পরিবর্তে
            const itemElement = document.createElement("div");
            itemElement.innerHTML = `
                <div class="chatuser">
                    <div class="user">
                        <img src="/databases/photos/${item.userimg}" alt="" class="userimg">
                        <p><strong>&nbsp;&nbsp;${item.userimg}</strong> - ${item.post}</p>
                    </div>
                    <div>
                        <blockquote>
                            ${item.comment}
                        </blockquote>
                    </div>
                </div>`
            ;

            dataContainer.appendChild(itemElement);
        });
    } catch (error) {
        console.error("Data error:", error);
    }
}

//displayData();

    </script>
</body>

</html>