<?php
$ids=$_GET['order_id'];
include 'connect.php';
$sqli="SELECT * FROM tb_order t, payment m where t.order_id=m.order_id and t.order_id = '$ids'";
$result = mysqli_query($connect,$sqli);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการใบสั่งซื้อ</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-10">
    <div class="card mb-4 mt-4">
      <div class="card-body">
      <h5>เลขที่ใบสั่งซื้อ : <?=$ids?></h5>
    <table class="table">
  <thead>
    <tr>
      <th>รหัสสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>จำนวน</th>
      <th>ราคา</th>
      <th>ราคารวม</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql1="SELECT * FROM order_detall d,product p, tb_order t where d.pro_id=p.pro_id and d.order_id=t.order_id and d.order_id=$ids order by d.pro_id";
  $result1 = mysqli_query($connect,$sql1);
  $sum_tatal=0;
  while($row=mysqli_fetch_array($result1)){ 
    $sum_total=$row['t_price'];
  ?>
    <tr>
      <td><?=$row['pro_id']?></td>
      <td><?=$row['pro_name']?></td>
      <td><?=$row['order_price']?></td>
      <td><?=$row['order_qty']?></td>
      <td><?=$row['total']?></td>
    </tr>
  </tbody>
  <?php
  }
  ?>
</table>
<b>ราคารวมสุทธิ : <?=$sum_total?> บาท</b>
</div>
</div>
<br><br>
</div>
</div>
<center><a href="recan.php" class="btn btn-outline-dark">กลับ</a></center>
</div>
</div>
</body>
</html>