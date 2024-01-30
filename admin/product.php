<?php 
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <?php
            include('menu.php');

        ?>
    
    <body class="sb-nav-fixed">
     <div class="container">

    <br><br><br>
    <center><h1 class="alert alert-info">ข้อมูลสินค้า</h1></center>
    <form class="d-flex" method="POST" action="product.php">
          <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search" style=width:250px>
          <button class="btn btn-outline-success" type="submit">Search</button>
          &nbsp;
        </form><br>
    <a href="add.php"><button class="btn btn-outline-success"> add new product</button></a></center><br>
    <table class="table table-hover">
    
        <tr>
            <td align="center">รหัสสินค้า</td>
            <td align="center">ชื่อสินค้า</td>
            <td align="center">รายละเอียด</td>
            <td align="center">ประเภท</td>
            <td align="center">ราคา</td>
            <td align="center">จำนวน</td>
            <td align="center">รูปภาพ</td>
            <td align="center">แก้ไขข้อมูล</td>
        </tr>
        <?php
           $key_word = @$_POST['keyword'];
           if($key_word !=""){
               $read = "SELECT * FROM product WHERE pro_id='$key_word' OR pro_name LIKE '%$key_word%' ORDER BY pro_id";
           }else{
               $read = "SELECT * FROM product ORDER BY pro_id";
               }
            $result = mysqli_query($connect,$read);
            while($data=mysqli_fetch_array($result)){
            //$proid = $result['pro_id'];
        ?>
        <tr>
        <td align="center"><?php echo $data['pro_id'];?></td>
        <td align="center"><?php echo $data['pro_name'];?></td>
        <td align="center"><?php echo $data['details'];?></td>
        <td align="center"><?php echo $data['type_id'];?></td>
        <td align="center"><?php echo $data['price'];?></td>
        <td align="center"><?php echo $data['amont'];?></td>
        <td align="center"><img src="../img/<?php echo $data['image'];?>" width="70px" height="90px" alt="construction"></td>
        <td align="center"><a href="uppro.php?p_id=<?php echo $data['pro_id'];?>">
        <button class="btn btn-outline-success">add</button></a>&nbsp;<a href="product_type_del.php?pro_id=<?php echo $data['pro_id'];?>"><button class="btn btn-outline-dark">Delete</button></a></td>
        </td>
        </tr>
        <?php } ?>
        <tr>
            <!--<td align = "center" colspan="8"><a href="add.php"><button class="btn btn-outline-success">add new product</button></a></td>-->
        </tr>
        
    </table>
    </div>
    </body>
    
</html>