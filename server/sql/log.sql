-- atom the set all file  
 require_once('./php/configer.php');
--  save the data local point 
htmlspecialchars($row['email'])
-- create a tabel user 
 CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    photo VARCHAR(200) NOT NULL,
    bath VARCHAR(20) NOT NULL,
    verifay VARCHAR(40) NOT NULL,
    phone VARCHAR(13) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- profile photo chenge html 
 <form id="myform" action='/databases/account.php' method='POST' enctype='multipart/form-data'>
                <input oninput='editimg()' type='file' class='myinput' name='photo' id='editprofile' accept="image/*" >
            </form>