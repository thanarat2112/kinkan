<?php
include('connect.php');
$ids=$_GET['p_id'];
$sql="SELECT * FROM product WHERE pro_id='$ids'";
$hand=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($hand);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสต็อกสินค้า</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
            <div class="alert alert-primary text-center" role="alert">
                เพิ่มสต็อกสินค้า
            </div>
                <form name="form1" method="post" action="upprodb.php">
                    <div class="mb-3 mt-3">
                        <label>รหัสสินค้า</label>
                        <input type="text" name="pid" class="form-control" readonly value="<?=$row['pro_id']?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label>ชื่อสินค้า</label>
                        <input type="text" name="pname" class="form-control" readonly value="<?=$row['pro_name']?>" >
                    </div>
                    <div class="mb-3 mt-3">
                        <label>จำนวนสินค้า</label>
                        <input type="text" name="pnum" class="form-control" reaquired>
                    </div>
                    <button type="submit" class="btn btn-success">เพิ่ม</button>
                    <!--<input type="submit" class="btn btn-success" valus="submit">-->
                    <a href="product.php" class="btn btn-outline-primary" >กลับ</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>