<?php 

session_start();

if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = "Bạn phải đăng nhập để xem trang này";
    header("location:dangnhap.php");
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location:dangnhap.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
    <h1>Chào mừng bạn đến với trang chủ</h1>
    <?php
    if(isset($_SESSION['success'])) : ?>

    <div>
        <h3>
            <?php 
            echo $_SESSION['success'];
            unset($_SESSION['success']); 
            ?>
        </h3>
    </div>
<?php endif ?>

<!-- nếu người dùng đăng nhập thông tin về bản thân -->

<?php if(isset($_SESSION['username'])) : ?>
    <h3>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>

    <button> <a href="index.php?logout=true">Logout</a></button>
<?php endif ?>
</body>
</html>