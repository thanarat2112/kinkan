<?php
    session_start();
    include('connect.php');
    $orderID=$_POST['orderID'];
    $totalPrice=$_POST['total_price'];
    $paydat=$_POST['pay_dat'];
    $paytime=$_POST['pay_time'];


    $imgtype = strchr($_FILES['file1']['name'],".");
    date_default_timezone_set('Asia/Bangkok');
    $date = date('Ymd');
    $numrand = (mt_rand());
    $newimgn = $date.$numrand.$imgtype;
    $target = "./payment/";
    
    $tmp_name = $_FILES['file1']['tmp_name'];
    //$location_img = $target.$image;
    $location_img = $target.$newimgn;
    move_uploaded_file($tmp_name,$location_img);
    $addsql = "INSERT INTO payment VALUE('$orderID','$totalPrice','$paydat','$paytime','$newimgn')";
    mysqli_query($connect,$addsql);
    if($addsql){
        echo"<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>;";
        echo"<script>window.location='pay_ment.php'; </script>;";
    }else{
        echo"<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>;";
    }//header("location:pay_ment.php");
    
        $sToken = "BHYxhdii6PwJFr1A5ikNj4e7ioAjqi8Kod3ofYjLMF6";
        $sMessage = "ชำระเงินแล้ว\n";
        $sMessage .= "เลขที่ใบสั่งซื้อ ". $orderID . "\n";
        $sMessage .= "ราคารวม ". $totalPrice . "\n";
        $sMessage .= "วันที่โอน ". $paydat . "\n";
        $sMessage .= "เวลาที่โอน ". $paytime . "\n";
    
        
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
            //header("location: fr_user_test.php");
        }else{
            $_SESSION['success'] = "ส่งข้อมูลการแจ้งเตือน Line Notify ไม่สำเร็จ";
            //header("location: fr_user_test.php");
        }


        curl_close( $chOne );   
    
    
    
    

    


?>