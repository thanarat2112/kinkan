<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end navbar-dark " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Admin</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body navbar-dark bg-dark">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-ui-checks-grid" ></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="product.php"><i class="bi bi-cart4"></i> Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="reportall.php"><i class="bi bi-card-checklist"></i> สถานะการสั่งซื้อ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="chp.php"><i class="bi bi-currency-bitcoin"></i> หลักฐานการชำระเงิน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../logout.php"><i class="bi bi-box-arrow-right"></i> ออกจากระบบ</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
</body>
</html>