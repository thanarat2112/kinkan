<?php 
    session_start();
    include('connect.php');
  
    if(isset($_SESSION['id'])){
      $id = $_SESSION['id'];
      $sql = "SELECT * FROM mem WHERE id_user='$id' ";
      $result = mysqli_query($connect,$sql);
      $data = mysqli_fetch_array($result);
      // }else{
      //   echo "kinkan";
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/kinkan.jpg">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <?php
        // include('connect.php');
    ?>
</head>
<body>
<nav class="navbar navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="exindex.php"><img src="img/kinkan.jpg" alt="" style="width: 70px; height: 70px;"></a>
    <form class="d-flex" method="POST" action="exindex.php">
          <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">ค้นหา</button>
      </form>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?php echo $data['fullname']; ?></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="exindex.php"><i class="bi bi-house"></i> หน้าแรก</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cart.php"><i class="bi bi-handbag"></i> ตะกร้าสินค้า</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pay.php"><i class="bi bi-credit-card-fill"></i> ช่องทางการชำระเงิน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pay_ment.php"><i class="bi bi-cash-coin"></i> แนบหลักฐานชำระเงิน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="showProfile.php"><i class="bi bi-person-gear"></i> ข้อมูลส่วนตัว</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="chekus.php"><i class="bi bi-tags"></i> ตรวจสอบสถานะการสั่งซื้อ</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-chat-heart">
            ช่องทางการติดต่อเพิ่มเติม
            </i></a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              <li><a class="dropdown-item" href="https://web.facebook.com/profile.php?id=100094549972878&locale=th_TH"><i class="bi bi-facebook"></i> kinkan</a></li>
              <li><a class="dropdown-item" href="https://www.instagram.com/kinkan.20?fbclid=IwAR393CTCdeAFBYPCJh7HcIzmsLStbXfrwuSYKiXoPbklXaZgcmXSZRJunfE"></i><i class="bi bi-instagram"></i> kinkan.20</a></li>
              <li><a class="dropdown-item" href="http://line.me/ti/p/nukk2547"></i><i class="bi bi-line"></i> kinkan</a></li>
    </ul>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php"><i class="bi bi-box-arrow-right"></i> ออกจากระบบ</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
</body>
</html>
