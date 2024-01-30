<?php
    include('connect.php');
    $ids=$_POST['pid'];
    $num=$_POST['pnum'];

    $sql="UPDATE product SET amont=amont + $num WHERE pro_id='$ids'";
    $hand=mysqli_query($connect,$sql);
    if($hand){
        echo"<script> alert(อัปเดตจำนวนสินค้าเรียบร้อย);</script>";
        echo"<script> window.location='product.php';</script>";
    }else{
        echo"<script> alert(ไม่สามารถอัปเดตจำนวนสินค้าได้);</script>";
    }
?>