<?php 
    session_start();
    include("connect.php");
        
    // // if(isset($_POST['btnadd'])){
    // $adr = $_POST['ad_dres'];

    // $addSql = "INSERT INTO mem VALUE('','','','','','','','$adr')";
    // mysqli_query($conn,$addSql);
    //     header('location: showProfile.php');
    // //     echo "<script> alert ('บันทึกข้อมูลที่อยู่ของคุณ $nname เรียบร้อย'); window.location = 'showProfile.php' </script>";
    // // }else{
    // //     echo "<script> alert ('ไม่สามารถบันทึกข้อมูลที่อยู่ของคุณ $nname ได้ กรุณาลองใหม่อีกครั้ง'); window.location = 'showProfile.php' </script>";
    // // }


//     include('connect.php');

//     // $id = $_POST['user_id'];
    if(isset($_POST['btnad'])){
        // $nuse = $_POST['username'];
//     // $nmail = $_POST['email'];
//     // $npass = $_POST['password'];
//     // $nname = $_POST['fullname'];
//     // $nphone = $_POST['phone'];
        $nid = $_SESSION['userid'];
        $address = $_POST['address'];

        $sql = "UPDATE mem set address='$address' WHERE username='$nid' ";
        $result = mysqli_query($connect,$sql);
        if($result){
            echo "<script> alert ('บันทึกข้อมูลของคุณ $nid เรียบร้อย'); window.location = 'showProfile.php' </script>";
        // }else{
        //     echo "<script> alert ('ขออภัย ไม่สามารถแก้ไขข้อมูลของคุณ $nname ได้'); window.location = 'editProfile.php' </script>";
        }else{
            echo "<script> alert ('ขออภัย ไม่สามารถบันทึกข้อมูลของคุณ $nid ได้'); window.location = 'address.php' </script>";
    }
}
    mysqli_close($connect);

?>