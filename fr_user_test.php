<?php
    session_start();
?>
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
    <div class="container">
        <form method="POST" action="in_line.php">
            <h4>แจ้งเตือนผ่านไลน์</h4>
            <br>
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['success'] ;
                    unset($_SESSION['success'])
                    ?>
              </div>
            <?php } ?>
            <?php if(isset($_SESSION['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error'] ;
                    unset($_SESSION['error'])
                    ?>
              </div>
            <?php } ?>
            <br>
            Name:<br>
            <input type="text" name="pname" class="from-control" required placeholder="Name - Surname"><br>
            e-mail:<br>
            <input type="text" name="email" class="from-control" required placeholder="name@xample.com"><br>
            address:<br>
            <textarea class="from-control" required name="address" rows="3" placeholder="Address"></textarea>
            <br>
            <button type="submit" name="submit" class="btn btn-primary mt-4">submit</button>
        </form>
    </div>
</body>
</html>