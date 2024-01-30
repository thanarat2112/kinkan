<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="shortcut icon" href="img/kinkan.jpg">
</head>
<body>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
                crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
            <link rel="stylesheet" href="stl.css">

    <div id="form_wrapper">
        <div id="form_left">
            <img src="./img/kinkan.jpg">
        </div>
        <form action="log_db.php" method="post">
        <div id="form_right">
            <br><br>
            <h1>เข้าสู่ระบบ</h1>
            <br>
                <div class="input_container">
                    <i class="fas fa-envelope"></i>
                    <input placeholder="ชื่อผู้ใช้งาน" type="username" name="username" id="field_email" class='input_field'>
                </div>
                <div class="input_container">
                    <i class="fas fa-lock"></i>
                    <input  placeholder="รหัสผ่าน" type="password" name="password" id="field_password" class='input_field'>
                </div>
                <button type="submit" value="Login" name="signin" id='input_submit' class='input_field'>เข้าสู่ระบบ</button>
                <br>
                <!-- <span>คุณลืม <a href="#"> ชื่อผู้ใช้งานหรือรหัสผ่าน ใช่หรือไม่?</a></span> -->
                <br>
                <span id='create_account'>
                    <a href="regis.php">สมัครสมาชิกที่นี่ ➡ </a>
                </span>
            </div>
            </form>
        </div>
        
</body>
</html>