<?php
    include("../connect.php");
    $pname = $_POST['pname'];
    $pDet = $_POST['det'];
    $pty = $_POST['typeid'];
    $pPrice = $_POST['price'];
    $pnum = $_POST['num'];
    //$image = $_FILES['p_image']['name'];
    $imgtype = strchr($_FILES['p_image']['name'],".");
    date_default_timezone_set('Asia/Bangkok');
    $date = date('Ymd');
    $numrand = (mt_rand());
    $newimgn = $date.$numrand.$imgtype;
    $pType = $_POST['typeid'];
    $target = "../img/";
    
    $tmp_name = $_FILES['p_image']['tmp_name'];
    //$location_img = $target.$image;
    $location_img = $target.$newimgn;
    move_uploaded_file($tmp_name,$location_img);

    $addsql = "INSERT INTO product VALUE('','$pname','$pDet','$pty','$pPrice','$pnum','$newimgn')";
    mysqli_query($connect,$addsql);
    header("location:product.php");
?>