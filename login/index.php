<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/style/style.main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <section class="maincontect">
        <div class="melo">
            <center>
                <br><br>
                <div>
                    <img src="/icon.png" alt="" class="myimgproo1">
                    <h2>
                        Login
                    </h2>
                </div>
            </center>
            <blockquote>
                <form action="/login/login.php" method="post">
                    <label for="username"></label>
                    <input class="input" name="username" type="text" placeholder="username, phone or email" required><br><br>
                    <label for="password"></label>
                    <input class="input" name="password" type="password" placeholder="password" id="pass" required>
                    <input onclick="showpass()" class="ck" type="checkbox" id="chck">Show Password<br><br>
                    <button type="submit">Login</button>
                </form>
                <br><a href="#">Forget Password</a> & <a href="/singup">Singup</a>
            </blockquote>
        </div>
    </section>
    <script src="/javascript/login.js"></script>
</body>
</html>
