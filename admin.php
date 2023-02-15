<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'a.php';
    ?>
    <p>Cảm ơn khách hàng <?php echo $_POST['name'] ?> <br>Địa chỉ Email: <?php echo $_POST['email'] ?><br>SĐT:<?php echo $_POST['phone']?><br>Địa chỉ: <?php echo $_POST['diachi']?></p>
    <p> Tổng số tiền: <?php echo $_POST['tongtien'] ?>đ</p>
    
</body>
</html>