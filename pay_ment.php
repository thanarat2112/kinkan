<?php
    include('connect.php');
    session_start();
    $order_id="";
    $name="";
    $total=0;
    $orderStatus="";
    if(isset($_POST['btn1'])){
        $key_word=$_POST['keyword'];
        if($key_word !=""){
        $sql="SELECT * FROM tb_order WHERE order_id='$key_word'";
        unset($_SESSION['error']);
    }else{
        echo"<script>window.location='pay_ment.php';</script>;";
        unset($_SESSION['error']);
    }
    $hand=mysqli_query($connect,$sql);
    $num1=mysqli_num_rows($hand);
    if($num1 == 0){
    echo"<script>window.location='pay_ment.php';</script>;";
    $_SESSION['error']="ไม่พบข้อมูลเลขที่ใบสั่งซื้อ";
    }else{

    
    $row=mysqli_fetch_array($hand);
    $order_id=$row['order_id'];
    $name=$row['cus_name'];
    $total=$row['t_price'];
    $orderStatus=$row['order_status'];
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งชำระเงิน</title>
    <link rel="shortcut icon" href="img/kinkan.jpg">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<?php
    include('na.php');
?>
<br><br><br><br><br>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
            <div class="alert alert-success" role="alert">
  <center>แจ้งหลักฐานชำระเงิน</center>
</div>
<div class="border mt-5 p-2 my-2">
                <form method="POST" action="pay_ment.php">
                    <label>เลขที่ใบสั่งซื้อ</label>
                    <input type="text" name="keyword">
                    <button type="submit" name="btn1" class="btn btn-primary">ค้นหา</button>
                    <a href="exindex.php"><button type="button" class="btn btn-outline-secondary">หน้าแรก</button></a>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo"<div class='text-danger'>";
                            echo $_SESSION['error'];
                            echo"</div>";
                           
                        }
                    ?>
                </form>
</div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="insertPayment.php" enctype="multipart/form-data">
                    <lable class="mt-4">เลขที่ใบสั่งซื้อ</lable><br>
                    <input type="text" name="orderID" class="from-control" require value="<?=$order_id?>"><br>
                    <?php
                        if($orderStatus == '1'){
                            echo "ยังไม่ได้ชำระเงิน";
                        }elseif($orderStatus == '2')
                            echo "ชำระเงินแล้ว";
                    ?><br>
                    <lable class="mt-4">ชื่อ-นามสกุล</lable><br>
                    <textarea class="from-control" name="cusName" require rows="1"><?=$name?></textarea><br>
                    <lable class="mt-4">จำนวนเงิน</lable><br>
                    <input type="number" class="from-control" name="total_price" require value="<?=$total?>"><br>
                    <lable class="mt-4">วันที่โอน</lable><br>
                    <input type="date" class="from-control" name="pay_dat" require><br>
                    <lable class="mt-4">เวลาที่โอน</lable><br>
                    <input type="time" class="from-control" name="pay_time" require><br>
                    <lable class="mt-4">หลักฐานการชำระเงิน</lable><br>
                    <input type="file" class="from-control" name="file1" require><br>
                    <?php if($orderStatus == '1'){ ?>
                    <button type="submit" name="btn2" class="btn btn-primary">บันทึก</button>
                     <?php }else{ ?> 
                     <button type="submit" name="btn2" class="btn btn-primary" disabled >บันทึก</button>  
                     <?php }?> 
                     </form>
            </div>
        </div>
    </div>
</body>
</html>