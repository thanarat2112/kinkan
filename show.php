<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link rel="shortcut icon" href="img/kinkan.jpg">-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php
    include('navbar.php');
    //include('footer.php');
    ?>
</head>
<body>
<div class="container">
    <br><br><br><br><br>
    <div class="alert alert-danger h4 text-center mb-4 mt-5"  role="alert">
            เมนูทั้งหมด
            </div>
  <div class="row">
    <?php
    $sqlshow="SELECT * FROM product order by pro_id";
    $resultshow = mysqli_query($connect,$sqlshow);
    while($row=mysqli_fetch_array($resultshow)){
    ?>
    <div class="col-sm-3">

        <div class="text-center">
      <img src="img/<?=$row['image']?>" width="200px" height="250px" class="mt-5 p-2 my-2 border"> <br>
      <h5 class="text-dark"><?=$row['pro_name']?></h5>
      ราคา <b class="text-danger"><?=$row['price']?>บาท<br></b>
      <a class="btn btn-outline-dark" href ="sh_porduct.php?id=<?=$row['pro_id']?>">รายละเอียด</a>
      <a class="btn btn-outline-success" href ="order.php?id=<?=$row['pro_id']?>">สั่งซื้อ</a>
      </div>
        <br>
    </div>
    <?php
    }
    mysqli_close($connect);
    ?>
  </div>
</div>
  
</body>
</html>