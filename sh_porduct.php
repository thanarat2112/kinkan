<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        include('connect.php')
    ?>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
  <?php
    $sh=$_GET['id'];
    $sqlsh="SELECT * FROM product,product_type  WHERE product.type_id=product_type.type_id and product.pro_id='$sh'";
    $resultshow = mysqli_query($connect,$sqlsh);
    $row=mysqli_fetch_array($resultshow);
    ?>
    <div class="col-md-4">
      <img src="img/<?=$row['image']?>" width="350px" class="mt-5 p-2 my-2 border">
    </div>
    <div class="col-md-6">
      <br><br>
      ID:<?=$row['pro_id']?><br>
      <h5 class="text-success"><?=$row['pro_name']?></h5><br>
      ปะเภทสินค้า : <?=$row['type_name']?><br>
      รายละเอียด : <?=$row['details']?><br>
      ราคา <b class="text-danger"><?=$row['price']?>บาท<br></b>
      <a class="btn btn-outline-success mt-5" href ="order.php?id=<?=$row['pro_id']?>">เพิ่มลงตะกร้า</a>
      </div>
    </div>
  </div>
<?php
mysqli_close($connect);
?>
</body>
</html>