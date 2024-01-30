<?php 
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <?php
            include('menu.php');

        ?>
    </head>
    <body class="sb-nav-fixed">
     <div class="container">

    <br><br><br><br>
    <center><h1>ยังไม่ได้ชำระ</h1></center>
  <center><a href="reportall.php"><button class="btn btn-outline-primary">สถานะการสั่งซื้อทั้งหมด</button></a> <a href="recon.php"><button class="btn btn-outline-success"> ชำระแล้ว</button></a> <a href="recan.php"><button class="btn btn-outline-danger"> ยกเลิกแล้ว</button></a> <a href="report.php"><button class="btn btn-outline-warning"> ยังไม่ได้ชำระ</button></a></center>
  <form class="d-flex" method="POST" action="reportall.php">
          <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search" style=width:250px>
          <button class="btn btn-outline-success" type="submit">ค้นหา</button>
          &nbsp;
        </form><br>
    
    <table class="table table-hover">
        
    
        <tr class="padding1">
            <td align="center">เลขที่ใบสั่งซื้อ</td>
            <td align="center">ชื่อลูกค้า</td>
            <td align="center">ที่อยู่</td>
            <td align="center">เบอร์โทร</td>
            <td align="center">ราคารวม</td>
            <td align="center">วันที่</td>
            <td align="center">สถานะการสั่งซื้อ</td>
            <td align="center">รายละเอียด</td>
            <td align="center">ปรับสถานะ</td>
            <td align="center">ยกเลิก</td>

        </tr>
        <?php
             $key_word = @$_POST['keyword'];
             if($key_word !=""){
                $read = "SELECT * FROM tb_order where order_status='1'='$key_word' OR cus_name LIKE '%$key_word%' ORDER BY order_id DESC";
             }else{
            $read = "SELECT * FROM tb_order where order_status='1' order by reg_date DESC";
              }
            $result = mysqli_query($connect,$read);
            while($data=mysqli_fetch_array($result)){
                $status = $data['order_status'];
        ?>
        <tr>
        <td align="center"><?php echo $data['order_id'];?></td>
        <td align="center"><?php echo $data['cus_name'];?></td>
        <td align="center"><?php echo $data['address'];?></td>
        <td align="center"><?php echo $data['phone'];?></td>
        <td align="center"><?php echo $data['t_price'];?></td>
        <td align="center"><?php echo $data['reg_date'];?></td>
        <td align="center">
                <?php
                 if($status == 1){
                    echo "ยังไม่ได้ชำระ";
                 }else if($status == 2){
                    echo "<b style='color:green'>ชำระแล้ว</b>";
                 }else if($status == 0){
                    echo "<b style='color:red'>ยกเลิกใบสั่งซื้อ</b>";
                 }
                ?>
        </td>
        <td align="center"><a href="reportdt.php?order_id=<?php echo $data['order_id'];?>"><button class="btn btn-outline-success">รายละเอียด</button></a></td>
        <td align="center"><a href="conf.php?order_id=<?php echo $data['order_id'];?>"><button class="btn btn-outline-warning">ปรับสถานะ</button></a></td>
        <td align="center"><a href="can.php?order_id=<?php echo $data['order_id'];?>"><button class="btn btn-outline-danger">ยกเลิก</button></a></td>
        </tr>
        <?php } ?>
    </table></cente>
    </div>
    </body>
</html>
