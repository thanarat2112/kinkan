<?php
include_once('connect.php');
    $pro_id = $_GET['pro_id'];
    //echo $type_id;
    $sqlDel="DELETE FROM product Where pro_id='$pro_id'";
    $statmemt = mysqli_query($connect, $sqlDel);
    header('location: product.php');
   
?>