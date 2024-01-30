<link rel="shortcut icon" href="img/kinkan.jpg">
<?php
session_start();
include 'connect.php';
$sql="SELECT * FROM tb_order where order_id= '" . $_SESSION["order_id"] ."' " ;
$result = mysqli_query($connect,$sql);
$rs=mysqli_fetch_array($result);
$total_price=$rs['t_price'];
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
<div class="container">
  <div class="row">
    <div class="col-md-10">
    <div class="alert alert-success h4 text-center" role="alert">
        การสั่งซื้อเสร็จสมบูรณ์
    </div>
    เลขที่การสั่งซื้อ : <?=$rs['order_id']?> <br>
    ชื่อ-นามสกุล (ลูกค้า) : <?=$rs['cus_name']?><br>
    ที่อยู่การจัดส่ง : <?=$rs['address']?><br>
    เบอร์โทรศัพท์ : <?=$rs['phone']?><br>
    <br>
    <div class="card mb-4 mt-4">
      <div class="card-body">
    <table class="table">
  <thead>
    <tr>
      <th>รหัสสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>ราคา</th>
      <th>จำนวน</th>
      <th>ราคารวม</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql1="SELECT * FROM order_detall d,product p where d.pro_id=p.pro_id and d.order_id= '" . $_SESSION["order_id"] ."'" ;
  $result1 = mysqli_query($connect,$sql1);
  while($row=mysqli_fetch_array($result1)){ 
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
<h6 class="text-end">รวมเป็นเงิน <?=number_format($total_price,2);?>บาท</h6>
</div>
</div>
<h6>*** <font style="color:red">หมายเหตุ </font>กรุณาชำระเงินเข้ามาภายใน 3ชั่วโมง หากเกินกำหนดจะถือว่ายกเลิกออเดอร์โดยอัติโนมัติ ***<br>
  ***<font style="color:red">หมายเหตุ </font>กรุณาคัดลอกเลขที่การสั่งซื้อเพื่อใช้ในการตรวจสอบสถานะในการสั่งซื้อ***
</h6>
<br><br>
</div>
</div>
<a href="exindex.php" class="btn btn-outline-dark">กลับ</a>
<button onclick="window.print()" class="btn btn-outline-primary">print</button>
<a href="pay.php"><button type="button" class="btn btn-outline-secondary">ชำระเงิน</button></a>
</div>
</div>
</body>
</html>