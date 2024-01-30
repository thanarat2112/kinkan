<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add product</title>
    <?php
        include('connect.php')
    ?>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="alert alert-primary h4 text-center mb-4 mt-5"  role="alert">
            เพิ่มข้อมูลสินค้า
            </div>
                <form name="formi" method="post" action="addnewResult.php" enctype="multipart/form-data">
                    <label>ชือสินค้า</label>
                <input type="text" name="pname" class="form-control" placeholder="ชือสินค้า...." required> <br>
                <label>รายละเอียด</label>
                <input type="text" name="det" class="form-control" placeholder="รายละเอียด...." required> <br>
                <label>ประเภทสินค้า</label>
                <select class="form-select" name="typeid">
                    <?php
                    $sql="SELECT * FROM product_type order by type_id";
                    $hand=mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_array($hand)){
                    ?>
                    <option value="<?=$row['type_id']?>"><?=$row['type_name']?></option>
                    <?php
                    }
                    mysqli_close($connect);
                    ?>
                </select>

                <label>ราคา</label><br>
                <input type="number" name="price" class="" placeholder="ราคา...." required> <br>
                <label>จำนวน</label><br>
                <input type="number" name="num" class="" placeholder="จำนวน...." required> <br>
                <label>รูปภาพ</label>
                <input type="file" name="p_image" class=""  required> <br>

                <button type="submit" class="btn btn-primary">เพิ่ม</button>
                </form>
                <a href="product.php"><button class="btn btn-outline-danger">กลับ</button></a>
            </div>
        </div>
    </div>
</body>
</html>