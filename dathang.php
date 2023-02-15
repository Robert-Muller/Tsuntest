<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="products.css">
    <title>Đơn hàng</title>
</head>

<body>
    <div id="wrapper">
                    </div>
                </section>
            </div>
        </header> 
        <?php
        require_once('a.php');
        session_start();
        require_once('header.php'); 
        if(isset($_POST['email'])){
            $insertorder="INSERT INTO `orders` (`id`, `fullname`, `phone_number`, `email`, `address`,`payment_method`) VALUES (NULL, '".$_POST['fullname']."', '".$_POST['phone_number']."', '".$_POST['email']."', '".$_POST['address']."', '".$_POST['method']."');";
            $result_insertorder = mysqli_query($conn, $insertorder);
            $orderid= mysqli_insert_id($conn);
        }
        ?>

        <!-- END HEADR -->
        <main>
            <section class="cart">
                    <div class="container">
                        <h3 style="text-align: center;">Đặt hàng thành công</h3>
                        <div class="row">
                            <div class="panel panel-primary col-md-6">
                                <h4 style="padding: 2rem 0; border-bottom:1px solid black;">Thông tin mua hàng </h4>
                                <div class="dathang">
                                    <p>Mã đơn hàng: <?= $orderid ?></p>
                                    <p>Họ và tên: <?= $_POST['fullname'] ?></p>
                                    <p>Email: <?= $_POST['email'] ?></p>
                                    <p>SĐT: <?= $_POST['phone_number'] ?></p>
                                    <p>Địa chỉ: <?= $_POST['address'] ?></p>
                                    <p>Phương thức thanh toán: <?= $_POST['method'] =='bacs' ? 'Chuyển khoản ngân hàng':'Thanh toán khi nhận hàng' ?></p>
                                </div>

                            </div>
                            <div class="panel panel-primary col-md-6">
                                <h4 style="padding: 2rem 0; border-bottom:1px solid black;">Đơn hàng</h4>
                                <table class="table table-bordered table-hover none">
                                    <thead>
                                        <tr style="font-weight: 500;text-align: center;">
                                            <td width="50px">STT</td>
                                            <td>Tên Sản Phẩm</td>
                                            <td>Size</td>
                                            <td>Số lượng</td>
                                            <td>Tổng tiền</td>
                                            <td>Size</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         
                                        $count = 0;
                                        $total = 0;
                                        foreach ($_SESSION['cart'] as $item) {
                                            $total += $item['price']*$item['number'];
                                            echo '
                                    <tr style="text-align: center;">
                                        <td width="50px">' . (++$count) . '</td>
                                        <td style="text-align:center; display:flex">
                                            <img src="' . $item['image'] . '" alt="" style="width: 50px;margin:0 1rem 0 1rem;"> <span>' . $item['name'] . '</span>
                                        </td>
                                        <td>' . $item['size'] . '</td>
                                        <td width="100px">' . $item['number'] . '</td>
                                        <td class="b-500 red">' . number_format($item['number'] * $item['price'], 0, ',', '.') . '<span> VNĐ</span></td>
                                        <td>'.$item['size'].'</td>
                                       
                                    </tr>
                                    ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <p>Tổng đơn hàng: <span class="bold red"><?= number_format($total, 0, ',', '.') ?><span> VNĐ</span></span></p>
                                <div class="btnsm">
                                    <a href="mainproduct.php" style="font-size:20px; padding:10px;border:1px solid">Tiếp tục mua hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </main>
        <?php
        if(!empty($_SESSION['cart'])){
            $cartsql = "SELECT * FROM product WHERE id IN (".implode(",", array_keys($_SESSION["cart"])).")";
            $result_cart = mysqli_query($conn, $cartsql);
            $total_cart=0;
            while ($row_cart = mysqli_fetch_assoc($result_cart)){
        if(isset($_SESSION['user'])){
            foreach ($_SESSION['cart'] as $item) {
                if($row_cart['ID'] == $item['id']){
            $insert_detail = "INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `size`,`Number`) VALUES (NULL,'".$orderid."','".$row_cart['ID']."','".$_SESSION['user']['id_user']."','".$item['size']."','".$item['number']."')";
            $result_order_detail= mysqli_query($conn, $insert_detail);
            }
        }
        } else{
            foreach ($_SESSION['cart'] as $item) {
                if($row_cart['ID'] == $item['id']){
            $insert_detail = "INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `size`,`Number`) VALUES (NULL,'".$orderid."','".$row_cart['ID']."', 'NULL','".$item['size']."','".$item['number']."')";
            $result_order_detail= mysqli_query($conn, $insert_detail);
            }
        }
        }
            }
        }
        unset($_SESSION['cart']);
        ?>
        <?php require_once('footer.php'); ?>
    </div>
</body>

</html>