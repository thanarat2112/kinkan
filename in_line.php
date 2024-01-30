<?php
session_start();
    if(isset($_POST['submit'])){
        $pname=$_POST['pname'];
        $email=$_POST['email'];
    
        $sToken = "65MPDIh2m9xgxWTopDjITV9tzSePSbGKjV53xX5rxt5";
        $sMessage = "ลงทะเบียนเรียบร้อย\n";
        $sMessage .= "ชื่อ ". $pname . "\n";
        $sMessage .= "email ". $email . "\n";
    
        
        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 
    
        if($result){
            $_SESSION['success'] = "ส่งข้อมูลการแจ้งเตือน Line Notify เรียบร้อยแล้ว";
            header("location: fr_user_test.php");
        }else{
            $_SESSION['success'] = "ส่งข้อมูลการแจ้งเตือน Line Notify ไม่สำเร็จ";
            header("location: fr_user_test.php");
        }


        curl_close( $chOne );   
    
    
    }
?>