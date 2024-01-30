<?php
    include('connect.php');

    if(isset($_POST['regis'])){
        $u          = $_POST['user'];
        $m          = $_POST['email'];
        $p1         = $_POST['pass'];
        // $p2         = $_POST['pass2'];
        $f          = $_POST['fullname'];
        $p          = $_POST['phone'];
        $a          = $_POST['add'];
        //เช็คพาสเวิร์ดทั้ง 2 ข้อความ ว่าตรงหรือไม่
        // if($p1 != $p2){
        //     echo "<script> alert('รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่'); window.location = 'regis.php'</script>"; 
        // }else{
            $sqlfind = "SELECT * FROM mem WHERE email='$m'";
            $findQuery = mysqli_query($connect,$sqlfind);
            $numrows = mysqli_num_rows($findQuery);
            if($numrows>0){
                echo "<script> alert('อีเมลนี้ถูกใช้งานแล้ว กรุณาเปลี่ยนหรือใช้อีเมลอื่น'); window.location = 'regis.php'</script>";
            }else{
                $newmail = ($m);
                $insertdata = "INSERT INTO mem (username,email,password,fullname,phone,status,address) VALUES('$u','$newmail','$p1','$f','$p','m','$a')";
                $result = mysqli_query($connect,$insertdata);
                if($result){
                    echo "<script> alert('สมัครสมาชิกเรียบร้อย'); window.location = 'login.php'</script>"; 
                }else{
                    echo "สมัครสมาชิกไม่สำเร็จ : ".$connect->error;
                }
            }
       }
    // }
//close($config);
?>