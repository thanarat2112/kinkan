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

    </head>
    <?php
            include('menu.php');

        ?>
    
    <body class="sb-nav-fixed">
        <div class="container">
     

    <br><br><br>
    <center><h1 class="alert alert-info">หลักฐานการชำระเงิน</h1></center>
    <a href="chek.php"><button class="btn btn-outline-primary"> ตรวจสอบหลักฐานชำระเงิน</button></a>
    
    <table class="table table-hover">
    
        <tr>
            <td align="center">เลขที่ใบสั่งซื้อ</td>
            <td align="center">จำนวนเงิน</td>
            <td align="center">วันที่โอน</td>
            <td align="center">เวลาที่โอน</td>
            <td align="center">หลักฐานการชำระเงิน</td>
        </tr>
        <?php
            $read = "SELECT * FROM payment";
            $result = mysqli_query($connect,$read);
            while($data=mysqli_fetch_array($result)){
            //$proid = $result['pro_id'];
        ?>
        <tr>
        <td align="center"><?php echo $data['order_id'];?></td>
        <td align="center"><?php echo $data['pay_money'];?></td>
        <td align="center"><?php echo $data['pay_dat'];?></td>
        <td align="center"><?php echo $data['pay_time'];?></td>
        <td align="center"><img src="../payment/<?php echo $data['pay_img'];?>" width="100px" height="100px" alt="construction"></td>
        </td>
        </tr>
        <?php } ?>
        
    </table>
    </div>
    </body>
    
</html>