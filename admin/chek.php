<?php
    include('connect.php');
    session_start();
    if(isset($_POST['btn1'])){
        $key_word=$_POST['keyword'];
        if($key_word !=""){
        $sql="SELECT * FROM payment WHERE order_id='$key_word'";
        unset($_SESSION['error']);
    }else{
        echo"<script>window.location='chek.php';</script>;";
        unset($_SESSION['error']);
    }
    $hand=mysqli_query($connect,$sql);
    $num1=mysqli_num_rows($hand);
    if($num1 == 0){
    echo"<script>window.location='chek.php';</script>;";
    $_SESSION['error']="ไม่พบข้อมูลเลขที่ใบสั่งซื้อ";
    }else{

    
    $row=mysqli_fetch_array($hand);
    $order_id=$row['order_id'];
    $paymon=$row['pay_money'];
    $paydate=$row['pay_dat'];
    $paytime=$row['pay_time'];
    $payimg=$row['pay_img'];
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
            <div class="alert alert-success" role="alert">
  <center>ตรวจสอบหลักฐานชำระเงิน</center>
</div>
<div class="border mt-5 p-2 my-2">
                <form method="POST" action="chek.php">
                    <label>เลขที่ใบสั่งซื้อ</label>
                    <input type="text" name="keyword">
                    <button type="submit" name="btn1" class="btn btn-primary">ค้นหา</button><a href="chp.php" class="btn btn-danger">กลับ</a><br>
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
                <form method="POST" action="chek.php" enctype="multipart/form-data">
                    <lable class="mt-4">เลขที่ใบสั่งซื้อ</lable><br>
                    <input type="number" name="orderID" class="from-control" require value="<?=$order_id?>"><br>
                    
                    <lable class="mt-4">จำนวนเงิน</lable><br>
                    <input type="number" class="from-control" name="total_price" require value="<?=$paymon?>"><br>
                    <lable class="mt-4">วันที่โอน</lable><br>
                    <input type="date" class="from-control" name="total_price" require value="<?=$paydate?>"><br>
                    <lable class="mt-4">เวลาที่โอน</lable><br>
                    <input type="time" class="from-control" name="total_price" require value="<?=$paytime?>"></textarea><br>
                    <lable class="mt-4">หลักฐานการชำระเงิน</lable><br>
                    <img src="../payment/<?php echo $row['pay_img'];?>" width="300px" height="300px" alt="construction">
                     </form>
            </div>
        </div>
    </div>
</body>
</html>