<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>
    <?php
     include 'a.php';
     session_start();
    include 'header.php';
    if(!empty($_SESSION['user'])){
        $account = "SELECT * FROM product, order_details WHERE order_details.id_user = ".$_SESSION['user']['id_user']." AND order_details.product_id= product.ID;";
        $result_account = mysqli_query($conn, $account);
    ?>
    <div class="space">
        <p>Đơn hàng của bạn</p>
    </div>
    <section id="cart-section">
        <h1>Sản phẩm bạn đã mua</h1>
        <?php
        while ($row= mysqli_fetch_assoc($result_account)) {
        ?>
        <div class="sanphamgiohang">
            <div class="hinhanhsp">
                <a><img src="<?php echo $row["image_name"]?>"></a>
            </div>
            <div class="infosp">
                <h2><?php echo $row["Name"] ?></h2>
                <p><?php echo number_format($row["Price_Sale"],0,",",",") ?>đ</p>
                <p><?php echo $row['size'] ?></p>
                <p><?php echo $row['Number'] ?></p>
            </div>
            <div class="end">
            <p><?php echo number_format($row["Price_Sale"]*$row['Number'],0,",",".") ?>đ</p>
            </div>
        </div>
        <?php } ?>
        <div class="righttk">
                <a href="mainproduct.php">Tiếp tục mua hàng</a>
                <a href="doimatkhau.php">Đổi mật khẩu</a>
                <a href="dangxuat.php">Đăng xuất</a>
        </div>
    </section>
    <style>
        .righttk{
            margin:100px 10px;
        }
        .righttk a{
            border: 1px solid black;
            border-radius: 3px;
            padding: 11px;
            font-size: 20px;
        }
    </style>
    <?php
    }
    include 'footer.php';
    ?>