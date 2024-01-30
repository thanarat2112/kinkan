<?php
    include('connect.php');

    // $id = $_POST['user_id'];
    if(isset($_POST['btnedit'])){
    $nuse = $_POST['username'];
    $nmail = $_POST['email'];
    $npass = $_POST['password'];
    $nname = $_POST['fullname'];
    $nphone = $_POST['phone'];
    $naddress = $_POST['address'];

        $sql = "UPDATE mem set  email='$nmail', password='$npass', fullname='$nname', phone='$nphone', address='$naddress' WHERE username='$nuse' ";
        $result = mysqli_query($connect,$sql);
        if($result){
            echo "<script> alert ('แก้ไขข้อมูลของคุณ $nname เรียบร้อย'); window.location = 'showProfile.php' </script>";
        }else{
            echo "<script> alert ('ขออภัย ไม่สามารถแก้ไขข้อมูลของคุณ $nname ได้'); window.location = 'editProfile.php' </script>";
    }
}
    mysqli_close($connect);
?>