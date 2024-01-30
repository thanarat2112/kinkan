<?php
include_once('connect.php');
    $order_id = $_GET['order_id'];
    //echo $type_id;
    $sqlDel="DELETE FROM tb_order Where order_id='$order_id'";
    $statmemt = mysqli_query($connect, $sqlDel);
    header('location: report.php');
   
?>