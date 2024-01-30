<?php
    $host="localhost";
    $user="root";
    $pass="";
    $dbname="project";
    $connect = mysqli_connect($host,$user,$pass,$dbname);
    if(!$connect){ //ถ้าเชื่อมต่อไม่ได้
        die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ กรุณาตรวจสอบ <br><hr>".mysqli_connect_error());
    }
    //setให้หน้าเพจใช้ภาษาไทยได้ หรือข้อมูลภาษาไทย
    mysqli_query($connect,"set names utf8");
?>