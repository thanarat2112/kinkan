<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  
    <title>Document</title>
</head>
<body>
<?php
include('connect.php');
$id = $_GET['p_id'];
//echo $id ;
$sqlfind = "SELECT * from product where pro_id='$id'";
$resultfind = mysqli_query($connect,$sqlfind);
while($data = mysqli_fetch_array($resultfind)){
    $product_id     = $data['pro_id'];
    $product_name   = $data['pro_name'];
    $product_price  = $data['price'];
    $product_quantity =$data['amont'];
    $product_img    = $data['image']; 
}

?>
<form action="#" method="post" enctype="multipart/form-data">
<div class="container">   
    <div class="row">
        <div class="col-md-4">
        <table>
            <tr>
                <td  colspan="2">
                    <h2>
                        <?php echo $product_name;?>
                    </h2>
                </td>
            </tr>   
        
            <tr>
                <td  colspan="2">
                    <img src="./img/<?php echo $product_img;?>" width="50%" height = "50%"> 
                </td>
            </tr>
            <tr>
                <td  colspan="2">
                Click to Change Image: <input type="file" name="p_image"> 
                </td>
            </tr>
            <tr>
                <td>
                    Product Name
                </td>
                <td>
                    <input type="text" name="p_name" value="<?php echo $product_name;?>">
                </td>
            </tr>
            <tr>
                <td>
                    Price per unit
                </td>
                <td>
                    <input type="text" name="p_price" value="<?php echo $product_price;?>">
                </td>
            </tr> 
            <tr>
                <td>
                    Quantity Stock
                </td>
                <td>
                    <input type="text" name="p_qty" value="<?php echo $product_quantity;?>">
                </td>
            </tr> 
            <tr>
                <td colspan="2">
                    <input type="submit" value="Save">
                </td>
            </tr>
        </table>    
        </div>
    </div>
</div>
</form>
</body>
</html><?php