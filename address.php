<?php 
    session_start();
    include('connect.php');
    
    // session_start();
    // include('connect.php');

    if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM mem WHERE id_user='$id' ";
    $result = mysqli_query($connect,$sql);
    $data = mysqli_fetch_array($result);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
                crossorigin="anonymous">
</head>
<body>
        <!-- <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="h4 text-center alert alert-success mb-4 mt-4" role="alert">เพิ่มข้อมูลที่อยู่</div>
                        <form action="addAddress.php" method="post">
                        <php 
                            if(isset($_SESSION['id'])){
                                $id = $_SESSION['id'];
                                $sql = "SELECT * FROM mem WHERE id_user='$id' ";
                                $result = mysqli_query($conn,$sql);
                                $data = mysqli_fetch_array($result);
                        ?>
                            <label class="form-label">เพิ่มที่อยู่</label> -->
                            <!-- <input type="text" name="ad_dress" class="form-control"  placeholder="เพิ่มที่อยู่ของคุณที่นี่">
                            <br>
                            <input type="submit" value="บันทึกข้อมูล" name="btnadd" class="btn btn-primary"> -->
                            <!-- <a href="address.php?username=<php echo $data['username'];?>" class="btn btn-primary">เพิ่มที่อยู่</a> -->
                            <!-- <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary"> -->
                            <!-- <a href="showProfile.php" class="btn btn-danger">ยกเลิก</a>
                            <php
                                }
                                mysqli_close($conn);
                            ?>
                        </form>
                </div>
            </div>
        </div> -->
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="h4 text-center alert alert-success mb-4 mt-4" role="alert">เพิ่มข้อมูลที่อยู่</div>
                        <form action="addAddress.php" method="post">
                            <!-- <label class="form-label">รหัสสมาชิก</label><br>
                            <input type="text" name="username" class="form-control" readonly value="<=$data["id_user"]?>">
                            <br>
                            <label class="form-label">ชื่อผู้ใช้งาน</label>
                            <input type="text" name="username" class="form-control" readonly value="<=$data["username"]?>">
                            <br>
                            <label class="form-label">อีเมล</label>
                            <input type="email" name="email" class="form-control" required value="<=$data["email"]?>">
                            <br>
                            <label class="form-label">รหัสผ่าน</label>
                            <input type="password" name="password" class="form-control" required value="<=$data["password"]?>">
                            <br>
                            <label class="form-label">ชื่อ - นามสกุลผู้ใช้งาน</label>
                            <input type="text" name="fullname" class="form-control" required value="<=$data["fullname"]?>">
                            <br>
                            <label class="form-label">หมายเลขโทรศัพท์</label>
                            <input type="text" name="phone" class="form-control" required value="<=$data["phone"]?>">
                            <br> -->
                            <label class="form-label">ที่อยู่</label>
                            <input type="text" name="address" class="form-control" required value="<?=$data["address"]?>" placeholder="เพิ่มข้อมูลที่อยู่ของคุณที่นี่">
                            <br>
                            <input type="submit" value="บันทึกข้อมูล" class="btn btn-primary" name="btnad">
                            <a href="showProfile.php" class="btn btn-danger">ยกเลิก</a>
                        </form>
                </div>
            </div>
        </div>
</body>
</html>