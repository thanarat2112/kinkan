<?php
session_start();
include 'connect.php';
$cusName=$_POST['cus_name'];
$cusAdd=$_POST['cus_add'];
$cusTrl=$_POST['cus_tel']; 

$sql="insert into tb_order(cus_name,address,phone,t_price,order_status)
values('$cusName','$cusAdd','$cusTrl','" . $_SESSION["sum_price"] . "','1')";
mysqli_query($connect,$sql);

$orderID = mysqli_insert_id($connect);
$_SESSION["order_id"] = $orderID ;

for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
    if(($_SESSION["strProductID"][$i]) !=""){
    
    $sql1="select * from product where pro_id = '" . $_SESSION["strProductID"][$i] ."' ";
    $resulti=mysqli_query($connect,$sql1);
    $row1=mysqli_fetch_array($resulti);
    $price = $row1['price'];
    $total=  $_SESSION["strQty"][$i] * $price;

    $sql2="insert into order_detall(order_id,pro_id,order_price,order_qty,total)
    values('$orderID','" . $_SESSION["strProductID"][$i] . "','$price','" . $_SESSION["strQty"][$i] ."','$total')";
    if(mysqli_query($connect,$sql2)){
      $sql3 ="update product set amont= amont - '" . $_SESSION["strQty"][$i] . "'
      where pro_id='" . $_SESSION["strProductID"][$i] . "'" ;
      mysqli_query($connect,$sql3);
      echo "<script> alert('บันทึกข้อมูลแล้ว') </script>" ;
      echo"<script> window.location='print_order.php';</script>";
    }

    }

}
$sql3="SELECT * FROM tb_order where order_id= '" . $_SESSION["order_id"] ."' " ;
 $result = mysqli_query($connect,$sql3);
 $rs=mysqli_fetch_array($result);

  $sToken = "BHYxhdii6PwJFr1A5ikNj4e7ioAjqi8Kod3ofYjLMF6";
  $sMessage = "มีออเดอร์\n";
  $sMessage .= "เลขที่ใบสั่งซื้อ ". $rs['order_id'] . "\n";
  $sMessage .= "ชื่อลูกค้า ". $cusName . "\n";
  $sMessage .= "โทรศัพท์ ". $cusTrl . "\n";
  $sMessage .= "ราคารวมสุทธิ ". $rs['t_price'] . "\n";


  
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
      header("location: print_order.php");
  }else{
      $_SESSION['success'] = "ส่งข้อมูลการแจ้งเตือน Line Notify ไม่สำเร็จ";
      header("location: print_order.php");
  }


curl_close( $chOne );   
mysqli_close($connect);
unset($_SESSION["intLine"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);
unset($_SESSION["sum_price"]);

?>