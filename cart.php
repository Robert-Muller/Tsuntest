<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/cart.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>
    <?php
     include 'a.php';
     session_start();
    include 'header.php';
    ?>
    <div class="space">
        <p>Trang chủ / Giỏ hàng</p>
    </div>
    <section id="cart-section">
        <h1>Giỏ hàng của bạn</h1>
        <?php 
            $total=0;
            $totalfull=0;
            $cart=(isset($_SESSION['cart']))? $_SESSION['cart']:[];
            foreach ($cart as $key => $value) {
        ?>
        <div class="sanphamgiohang">
            <div class="hinhanhsp">
                <a><img src="<?php echo $value["image"]?>"></a>
            </div>
            <div class="infosp">
                <h2><?php echo $value["name"] ?></h2>
                <p><?php echo $value["price"] ?>đ</p>
                <p><?php echo $value['size'] ?></p>
            <form action="thanhtoan.php" method="POST">
                <div class="minusplus">
                <input id="minus" type="button" value="-" onclick="subtract('number<?php echo $value['id'] ?>')" >
                <input id="number<?php echo $value['id'] ?>" min="1" type="number" value="<?php echo $value["number"] ?>" name="number">
                <input id="plus" type="button" value="+" onclick="add('number<?php echo $value['id'] ?>')">
                <script>
                    function subtract(id){
                     var s= document.getElementById(id).value;
                     if(parseInt(s)>1){
                        document.getElementById(id).value=parseInt(s)-1;
                        }
                     }
                    function add(id){
                     var a= document.getElementById(id).value;
                        document.getElementById(id).value=parseInt(a)+1;
                    }
                 </script>
                 </div>
            </div>
            <div class="end">
                <a href="addcart.php?id=<?php echo $value['id'] ?>&action=delete"><i class="fa fa-trash-alt bin"></i></a>
                <p id="total<?php echo $value['id']?>"><?php echo $total = $value["price"]*$value["number"]; $totalfull +=$total ?>đ</p>
            </div>
            </div>
        </div>
        <?php } ?>
        <div class="tongtien">
            <div class="area">
            <textarea placeholder="Ghi chú" name="ghichu"></textarea>
            </div>
            <div class="righttinhtien">
                <div class="tinhtien">
                    <p>Tổng tiền: <?php echo $totalfull ?>đ</p>
                    <input type="hidden" name="tinhtien" value="<?php echo $totalfull ?>">
                </div>
                <div class="btnsm">
                    <a href="mainproduct.php">Tiếp tục mua hàng</a>
                    <button id="reset" name="update" href="addcart.php?id=<?php echo $value['id'] ?>&action=update">Cập nhật</button>
                    <input type="submit" value="Thanh Toán">
                </div>
                </form>
            </div>
        </div>
    </section>
    <?php
    include 'footer.php';
    ?>