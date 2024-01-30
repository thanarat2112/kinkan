<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
    include("menu.php");
    include("connect.php");
?>
<br><br><br><br>
<body>
    <div class="container">
<div class="row">
<center><h1>Dashboard <b><?php echo date ('d/m/y'); ?> </b></h1></center>
<?php
        $repo = "SELECT * FROM tb_order where order_status";
        $sp = mysqli_query($connect,$repo);
        $st = mysqli_num_rows($sp);
    ?>
<div class="col-sm-3">
    <div class="card" style="background-color:blue; margin: 10px;">
      <div class="card-body">
      <h2 class="card-title"><b><font style="color:#FFFFFF">คำสั่งซื้อทั้งหมด</font></b></h2>
        <h4 class="card-title"><b><font style="color:#FFFFFF"><?php echo $st?> รายการ</b></font></h4>
        <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="reportall.php">รายละเอียด</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
  </div>
    <?php
        $read = "SELECT * FROM tb_order where order_status='1'";
        $result = mysqli_query($connect,$read);
        $toal = mysqli_num_rows($result);
    ?>
  <div class="col-sm-3">
    <div class="card"style="background-color:#9370DB; margin: 10px;">
      <div class="card-body">
      <h2 class="card-title"><b><font style="color:#FFFFFF">ยังไม่ได้ชำระ</font></b></h2>
        <h4 class="card-title"><b><font style="color:#FFFFFF"><?php echo $toal?> รายการ</font></b></h4>
        <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="report.php">รายละเอียด</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
  </div>
  <?php
        $rea = "SELECT * FROM tb_order where order_status='0'";
        $re = mysqli_query($connect,$rea);
        $to = mysqli_num_rows($re);
    ?>
  <div class="col-sm-3">
    <div class="card" style="background-color:red; margin: 10px;">
      <div class="card-body">
      <h2 class="card-title"><b><font style="color:#FFFFFF">ยกเลิกคำสั่งซื้อ</font></b></h2>
        <h4 class="card-title"><b><font style="color:#FFFFFF"><?php echo $to ?> รายการ</font></b></h4>
        <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="recan.php">รายละเอียด</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
  </div>
  <?php
        $re = "SELECT * FROM tb_order where order_status='2'";
        $r = mysqli_query($connect,$re);
        $t = mysqli_num_rows($r);
    ?>
  <div class="col-sm-3">
    <div class="card" style="background-color:green; margin: 10px;">
      <div class="card-body">
      <h2 class="card-title"><b><font style="color:#FFFFFF">ชำระแล้ว</font></b></h2>
        <h4 class="card-title"><b><font style="color:#FFFFFF"><?php echo $t ?> รายการ</font></b></h4>
        <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="recon.php">รายละเอียด</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
  </div>
  <?php
            $payment = "SELECT * FROM payment";
            $pay = mysqli_query($connect,$payment );
            $paym = mysqli_num_rows($pay);
        ?>
  <div class="col-sm-3">
    <div class="card" style="background-color:#0099FF; margin: 10px;">
      <div class="card-body">
      <h2 class="card-title"><b><font style="color:#FFFFFF">หลักฐานการชำระ</font></b></h2>
        <h4 class="card-title"><b><font style="color:#FFFFFF"><?php echo $paym ?> รายการ</font></b></h4>
        <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="chp.php">รายละเอียด</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
  </div>

<?php
            $pr = "SELECT * FROM product";
            $pro = mysqli_query($connect,$pr);
            $prod = mysqli_num_rows($pro);
        ?>
  <div class="col-sm-3">
    <div class="card" style="background-color:#FF66CC; margin: 10px;">
      <div class="card-body">
      <h2 class="card-title"><b><font style="color:#FFFFFF">สินค้า</font></b></h2>
        <h4 class="card-title"><b><font style="color:#FFFFFF"><?php echo $prod ?> ชิ้น</b></font></h4>
        <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="product.php">รายละเอียด</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>