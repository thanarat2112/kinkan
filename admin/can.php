<?php
 include('connect.php');
 $ids=$_GET['order_id'];
 
 $sql1 = "SELECT * FROM order_detall where order_id='$ids' ";
 $hand = mysqli_query($connect,$sql1);
 while($row1=mysqli_fetch_array($hand)){
   $proid=$row1['pro_id'];
   $num=$row1['order_qty'];
   //เพิ่มสต็อกสินค้า
   $sql2="UPDATE product SET amont=amont + $num WHERE pro_id='$proid'";
   $result1=mysqli_query($connect,$sql2);
 }

 $sql="UPDATE tb_order SET order_status = 0 WHERE order_id='$ids'";
 $result=mysqli_query($connect,$sql);
 if($result){
    echo"<script>window.location='recan.php';</script>";
 }else{
    echo"<script>alert('ไม่สามารถยกเลิกได้');</script>";
 }

 mysqli_close($connect);

?>