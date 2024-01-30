<?php
 include('connect.php');
 $ids=$_GET['order_id'];

 $sql="UPDATE tb_order SET order_status = 2 WHERE order_id='$ids'";
 $result=mysqli_query($connect,$sql);
 if($result){
    echo"<script>window.location='recon.php';</script>";
 }else{
    echo"<script>alert('ไม่สามารถยกเลิกได้');</script>";
 }

 mysqli_close($connect);

?>