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
    <title>Thanh Toán</title>
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
        ?>

        <!-- END HEADR -->
        <main>
            <section class="cart">
                <form action="dathang.php" method="POST">
                    <div class="container">
                        <h3 style="text-align: center;">Tiến hành đặt hàng</h3>
                        <div class="row">
                            <div class="panel panel-primary col-md-6">
                                <h4 style="padding: 2rem 0; border-bottom:1px solid black;">Nhập thông tin mua hàng </h4>
                                <div class="form-group">
                                    <label for="usr">Họ và tên:</label>
                                    <input required="true" type="text" class="form-control" id="usr" name="fullname">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input required="true" type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Số điện thoại:</label>
                                    <input required="true" type="text" class="form-control" id="phone_number" name="phone_number">
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ:</label>
                                    <input required="true" type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="method">Phương thức thanh toán</label><br>
                                    <select name="method" id="method">
                                        <option value="bacs">Chuyển khoản ngân hàng</option>
                                        <option value="cod">Thanh toán khi nhận hàng</option>
                                    </select>
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
                                <input class="btn btn-submit" type="submit" value="Đặt hàng">
                            </div>
                        </div>

                    </div>
                </form>

            </section>
        </main>
        <?php require_once('footer.php'); ?>
    </div>
</body>
<style>
    .xemlai {
        font-size: 18px;
        font-weight: 500;
        color: blue;
    }

    .b-500 {
        font-weight: 500;
    }

    .bold {
        font-weight: bold;
    }

    .red {
        color: rgba(207, 16, 16, 0.815);
    }
    .btn-submit{
        background-color: rgb(46, 223, 214);
    }
</style>

</html>