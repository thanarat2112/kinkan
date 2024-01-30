<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เมนูทั้งหมด</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?php
        include('na.php'); 
    ?>
    <br><br><br>
</head>
<body><br>
    <?php
        include('slideshow.php');
    ?>
    <!-- <br> -->
    <div class="container">
    <h1 class="alert h4 text-center mb-4 mt-5" style="background-color:#DE89A1 " role="alert"><font face="" color="#FFFFFF">เมนูทั้งหมด</font></font></h1>
        <div class="row">
        <?php
    $key_word = @$_POST['keyword'];
    if($key_word !=""){
        $sqlshow="SELECT * FROM product WHERE pro_id='$key_word' or pro_name like '%$key_word%' order by pro_id";
    }else{
    $sqlshow="SELECT * FROM product order by pro_id";
}
    $resultshow = mysqli_query($connect,$sqlshow);
    while($row=mysqli_fetch_array($resultshow)){
    ?>
            <div class="col-sm-1 col-md-3 col-ld-4">
                <div class="card" style="">
                <img src="img/<?=$row['image']?>" style="">
  <div class="card-body">
  <center><h5 class="card-title"><?=$row['pro_name']?></h5>
    ราคา <b class="card-text"><?=$row['price']?></b> บาท<br><br>
    <a class="btn btn-outline-dark" href ="order.php?id=<?=$row['pro_id']?>">สั่งซื้อ</a></center>
  </div>
</div>
<div class="my-4"></div>
            </div>
    <?php } ?>
        </div>
    </div>
    <?php 
                //include('foo.php');
            
            ?>
</body>
</html>