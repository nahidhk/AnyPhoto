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
              
                <form action="" method="post">
                    <label for="username"></label>
                    <input name="username" type="text" placeholder="username, phone or email" required><br><br>
                    <label for="password"></label>
                    <input name="password" type="password" placeholder="password" id="passcode" required>
                    Show Password <input onclick="showpass()" class="ck" type="checkbox" id="chck"><br><br>
                    <button type="submit">Login</button>
                </form>
            </blockquote>
        </div>
    </section>
    <script src="/javascript/login.js"></script>
</body>
</html>
