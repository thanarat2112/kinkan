<?php 
    session_start();
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Profile</title>
    <link rel="shortcut icon" href="img/kinkan.jpg">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
                crossorigin="anonymous">
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="h4 text-center alert alert-success mb-4 mt-4" role="alert">ข้อมูลส่วนตัว</div>
                        <form action="editProfile.php" method="post">
                        <?php 
                            if(isset($_SESSION['id'])){
                            $id = $_SESSION['id'];
                            $sql = "SELECT * FROM mem WHERE id_user='$id' ";
                            $result = mysqli_query($connect,$sql);
                            $data = mysqli_fetch_array($result);
                        ?>
                            <label class="form-label">รหัสสมาชิก</label><br>
                            <input type="text" name="username" class="form-control" readonly value="<?=$data["id_user"]?>">
                            <br>
                            <label class="form-label">ชื่อผู้ใช้งาน</label>
                            <input type="text" name="username" class="form-control" readonly value="<?=$data["username"]?>">
                            <br>
                            <label class="form-label">อีเมล</label>
                            <input type="email" name="email" class="form-control" readonly value="<?=$data["email"]?>">
                            <br>
                            <label class="form-label">รหัสผ่าน</label>
                            <input type="password" name="password" class="form-control" readonly value="<?=$data["password"]?>">
                            <br>
                            <label class="form-label">ชื่อ - นามสกุลผู้ใช้งาน</label>
                            <input type="text" name="fullname" class="form-control" readonly value="<?=$data["fullname"]?>">
                            <br>
                            <label class="form-label">หมายเลขโทรศัพท์</label>
                            <input type="text" name="phone" class="form-control" readonly value="<?=$data["phone"]?>">
                            <br>
                            <label class="form-label">ที่อยู่</label>
                            <input type="text" name="address" class="form-control" readonly value="<?=$data["address"]?>">
                            <br>
                            <a href="editProfile.php?username=<?php echo $data['username'];?>" class="btn btn-primary">แก้ไขข้อมูล</a>
                            <a href="address.php?username=<?php echo $data['username'];?>" class="btn btn-success">เพิ่มที่อยู่</a>
                            <!-- <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary"> -->
                            <a href="exindex.php" class="btn btn-danger">หน้าหลัก</a>
                            <?php
                                }
                                mysqli_close($connect);
                            ?>
                        </form>
                </div>
            </div>
        </div>
</body>
</html>