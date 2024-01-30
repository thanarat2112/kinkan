<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php
        include_once('navbar.php');
    ?>
</head>
<body>
    <center>
    <h1>การจัดการข้อมูล "ประเภทสินค้า"</h1>
    <br><br>
    <table width="800">
        <tr>
            <th>รหัสประเภทสินค้า</th>
            <th>รายการประเภทสินค้า</th>
            <th colspan="2">
                <a href="product_type_add.php">
                    <img src="every_image/add_box_FILL0_wght400_GRAD0_opsz48.png">
                </a>
            </th>
        </tr>
        <?php
            //ตัวแปรภาษา sql สำหรับดึงข้อมูลจากฐานข้อมูล ตารางประเภทสินค้า
            $SqlProType = "SELECT * FROM product_type Order by product_type_id ASC";
            //คำสั่งที่ทำให้ภาษา SQL ถูกใช้งาน
            $runSqlProType = mysqli_query($connect,$SqlProType);
            //ตรวจสอบว่า หากไม่สามารถสั่งให้ SQL ทำงานได้ ให้แสดง error
            if(!$runSqlProType){
                echo "ไม่พบข้อมูล".mysqli_error($connect);
            }///close if not $runSqlProType
            //แปลงข้อมูลให้อยู่ในรูปของ array พร้อมกับวนรอบเพื่อนำข้อมูลออกมาแสดง
            while($result=mysqli_fetch_array($runSqlProType)){
                $type_id = $result['product_type_id'];
                $type_name = $result['product_type_name'];
        ?>
            <tr>
                <td><?php echo $type_id; ?></td>
                <td><?php echo $type_name; ?></td>
                <td><a href="product_type_edit.php?type_id=<?php echo $type_id; ?>"><img src="every_image\settings_FILL0_wght400_GRAD0_opsz48.png" width="25" height="25"></a></td>
                <td><a href="product_type_del.php?type_id=<?php echo $type_id; ?>"><img src="every_image\delete_FILL0_wght400_GRAD0_opsz48.png" width="25" height="25"></a></td>
            </tr>
        <?php
            }///close while $result
        ?>


    </table>
    </center>
</body>
</html>