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
        <title>ตรวจสอบสถานะการสั่งซื้อ</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>
    <?php
            include('na.php');

        ?>
    <body class="sb-nav-fixed">
     <div class="container">

    <br><br><br><br><br><br>
    <center><h1 class="alert alert-danger">ตรวจสอบสถานะการสั่งซื้อ</h1></center>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <input type="text" name="search" placeholder="กรอกเลขที่ใบสั่ง">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
    
        
        <?php
         isset( $_POST['search'] ) ? $search = $_POST['search'] : $search = "";
         if( !empty( $search ) ) {
             //echo "<table width='50%' border='1'><tr><td>เลขที่ใบสั่งซื้อ</td><td>ชื่อ-นามสกุล๙ื่อลูกค้า</td></tr>";
             ?>
                <table class="table table-bordered">
                    <tr>
                        <td align="center">เลขที่ใบสั่งซื้อ</td>
                        <td align="center">ชื่อ-นามสกุลลูกค้า</td>
                        <td align="center">ที่อยู่จัดส่งสินค้า</td>
                        <td align="center">เบอร์โทรศัพท์</td>
                        <td align="center">สถานะการสั่งซื้อ</td>
                    </tr>
                
                <?php
             $sql = " SELECT * FROM tb_order WHERE order_id='$search' ORDER BY order_id DESC ";
             $q = mysqli_query( $connect, $sql );
             while( $f = mysqli_fetch_assoc( $q ) ) {
                $status = $f['order_status'];
                ?>
                 <tr>
                 <td align="center"><?=$f['order_id']?></td>
                 <td align="center"><?=$f['cus_name']?></td>
                 <td align="center"><?=$f['address']?></td>
                 <td align="center"><?=$f['phone']?></td>
                 <td align="center">
                <?php
                 if($status == 1){
                    echo "อยู่ระหว่างตรวจสอบ";
                 }else if($status == 2){
                    echo "<b style='color:green'>ยืนยันการสั่งซื้อเรียบร้อย</b>";
                 }else if($status == 0){
                    echo "<b style='color:red'>ยกเลิกใบสั่งซื้อ</b>";
                 }
                ?>
        </td>
                 <?php
                 ?>
             </tr>
<?php
 }
?>
</table>
 <?php
}
?>
</div>
    </body>
</html>
