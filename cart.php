<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้า</title>
    <link rel="shortcut icon" href="img/kinkan.jpg">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <?php
    session_start();
    include('na.php');
    ?>
</head>
<body>
    <div class="container">
        <br><br><br><br><br>
        <form id="form1" method="POST" action="incart.php">
            <div class="row">
                <div class="col-md-10">
                <div class="alert alert-danger h4 text-center mb-4 mt-5"  role="alert">
                    การสั่งซื้อสินค้า
            </div>
                <table class="table table-hover">
                    <tr>
                        <th>ลำดับที่</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวนที่สั่งซื้อ</th>
                        <th>ราคารวม</th>
                        <th>เพิ่ม-ลด</th>
                        <th>ลบรายการ</th>
                    </tr>
        <?php
        $total=0;
        $sumprice=0;
        $m=1;
        if(isset($_SESSION["intLine"])){
        for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
            if(($_SESSION["strProductID"][$i]) !=""){
                $sqli="select * from product where pro_id = '" . $_SESSION["strProductID"][$i] . "' ";
                $result1 = mysqli_query($connect,$sqli);
                $row_pro = mysqli_fetch_array($result1);

                $_SESSION["price"] = $row_pro['price'];
                $total = $_SESSION["strQty"][$i];
                $sum = $total * $row_pro['price'];
                $sumprice = $sumprice + $sum;
                $_SESSION["sum_price"] = $sumprice;
                //$sumprice = number_format($sumprice,2);// 
            
        ?>
                    <tr>
                        <td><?=$m?></td>
                        <td>
                            <img src="img/<?=$row_pro['image']?>" width="80" height="100" class="border">
                        <?=$row_pro['pro_name']?></td>
                        <td><?=$row_pro['price']?></td>
                        <td><?=$_SESSION["strQty"][$i]?></td>
                        <td><?=$sum?></td>
                        <td>
                        <a href="order.php?id=<?=$row_pro['pro_id']?>" class="btn btn-outline-primary">+</a>
                        <?php if($_SESSION["strQty"][$i] > 1){  ?>      
                        <a href="order_dell.php?id=<?=$row_pro['pro_id']?>"class="btn btn-outline-secondary">-</a> 
                        <?php } ?>
                        </td>
                        <td><a href="del.php?Line=<?=$i?>"><img src="img/delt.png" width="30"></a></td>
                    </tr>

        <?php
        $m=$m+1;
        }
        }
    }
        ?>
        <tr>
            <td class="text-end" colspan="4">รวมเป็นเงิน</td>
            <td><?=$sumprice?></td>
            <td >บาท</td>
        </tr>
                </table>
                <div style="text-align:right">
                <a href="exindex.php"><button type="button" class="btn btn-outline-secondary">เลือกสินค้า</button></a>
                <button type="submit" class="btn btn-outline-primary">ยืนยันการสั่งซื้อ</button>
                </div>
            </div>
            <?php
            if(isset($_SESSION['id'])){
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM mem WHERE id_user='$id' ";
                $result = mysqli_query($connect,$sql);
                $data = mysqli_fetch_array($result);
                ?>
            <div class="row">
    <div class="col-md-4">
    <div class="alert alert-danger"  h4  role="alert">
  ข้อมูลการจัดส่งสินค้า
</div>
 ชื่อ-นามสกุล:
 <input type="text" name="cus_name" class="form-control mt-4" required placeholder="ชื่อ-นามสกุล......" value="<?=$data["fullname"]?>">
 ที่อยู่จัดส่งสินค้า:
 <textarea class="form-control mt-4" required placeholder="ที่อยู่จัดส่งสินค้า....." name="cus_add" rows="3"><?=$data["address"]?></textarea>
 เบอร์โทรศัพท์:
 <input type="text" name="cus_tel" class="form-control mt-4" required placeholder="เบอร์โทรศัพท์......" value="<?=$data["phone"]?>">
</div>
  </div>
  <?php 
    }
    mysqli_close($connect);
?>
  ?>
        </form>
        <br><br><br>
    </div><br>
</body>

</html>