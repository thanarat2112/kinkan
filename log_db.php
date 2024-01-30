<?php
session_start();
    include('connect.php');
    if(isset($_POST['signin'])){
        $logname        = trim($_POST['username']);
        $logpass        = trim($_POST['password']);
        $newlogpass     = ($logpass);

        $sqlMember = "SELECT * FROM mem WHERE username='$logname' AND password='$newlogpass'";
        $result = mysqli_query($connect,$sqlMember);
        $rows = mysqli_num_rows($result);

        if($rows == 1){
            $data = mysqli_fetch_array($result);

            $_SESSION['id'] = $data['id_user'];
            $_SESSION['userid'] = $data['username'];
            $_SESSION['userlogined'] = $data['email'];
            $_SESSION['name'] = $data['fullname'];
            $_SESSION['phone'] = $data['phone'];
            $_SESSION['status'] = $data['status'];
            $_SESSION['address'] = $data['address'];

            if($_SESSION['status']=='a'){
                while($data = mysqli_fetch_array($result)){
                    $_SESSION['userlogined'] = $data['email'];
                }
                // header("location: admin.php");
                echo "<script> alert ('ยินดีต้อนรับคุณ $logname เข้าสู่ระบบแอดมิน'); window.location = '../project/admin/index.php' </script>";
            }

            if($_SESSION['status']=='m'){
                while($data = mysqli_fetch_array($result)){
                    $_SESSION['userlogined'] = $data['email'];
                }
                // header("location: index.php");
                echo "<script> alert ('ยินดีต้อนรับคุณ $logname เข้าสู่ระบบ'); window.location = 'exindex.php' </script>";
            }

        }else{
            echo "<script> alert ('อีเมลหรือรหัสผ่านของคุณไม่ถูกต้อง'); window.location = 'login.php' </script>";
        }
    }
?>