<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/kinkan.jpg">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
<nav class="navbar navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="shc.php"><img src="img/kinkan.jpg" alt="" style="width: 70px; height: 70px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><i class="bi bi-person-circle"></i></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house"></i> หน้าแรก</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php"><i class="bi bi-person"></i> เข้าสู่ระบบ</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page"><i class="bi bi-exclamation-circle"></i> เข้าสู่ระบบก่อนสั่งซื้อสินค้านะคะ</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
</body>
</html>