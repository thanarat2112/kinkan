<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="shortcut icon" href="img/kinkan.jpg">
</head>
<body>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
                crossorigin="anonymous">
                
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
            <link rel="stylesheet" href="stl.css">
    
    <div id="form_wrap">
    <form action="regis_db.php" method="post">
        <div id="form_right">
            <h1>สมัครสมาชิก</h1>
                <div class="input_container">
                    <i class="fas fa-user"></i>
                    <input type="username" name="user" placeholder="ชื่อผู้ใช้งาน" id="field_user" class='input_field'>
                </div>
                <div class="input_container">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="อีเมล" id="field_email" class='input_field'>
                </div>
                <div class="input_container">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="pass" placeholder="รหัสผ่าน" id="field_password" class='input_field'>
                </div>
                <div class="input_container">
                    <i class="fas fa-user"></i>
                    <input type="text" name="fullname" placeholder="ชื่อ - นามสกุลผู้ใช้งาน"  id="field_full" class='input_field'>
                </div>
                <div class="input_container">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="phone" placeholder="หมายเลขโทรศัพท์" id="field_phone" class='input_field'>
                </div>
                <div class="input_container">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="add" placeholder="ที่อยู่" id="add" class='input_field'>
                </div>
                <input type="submit" value="สมัครสมาชิก" name="regis" id='input_submit' class='input_field'>
            </div>
            </form>
        </div>

</body>
</html>