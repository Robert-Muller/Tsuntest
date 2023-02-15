<?php 
include "a.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="http://kit.fontawesome.com/f20d460fd9.js" crossorigin="amonymous"></script>
    <link rel="stylesheet" href="./CSS/Trangchu.css">
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.7.0/css/all.css">
    <link rel="stylesheet" href="./CSS/dangnhap.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="./CSS/dangky2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fontsz.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <style>
    footer{
      margin-top: 650px;
    }

  </style>
</head>

        <?php 
        include "header.php";
        if(isset($_POST['email']) && isset($_POST['password'])){
            $u = $_POST['email'];
            $p = $_POST['password'];
            $register = "SELECT * FROM  user WHERE email= '$u' ";
            $result_register = mysqli_query($conn, $register);
            if (mysqli_num_rows($result_register) == 0) {
                $addaccount = "INSERT INTO `user` (`id_user`, `fullname`, `password`, `phone`, `email`) VALUES (NULL, '".$_POST['fullname']."', '".$_POST['password']."', '".$_POST['phone']."', '".$_POST['email']."')";
                $result_account = mysqli_query($conn, $addaccount);
                echo "<script>
                alert('Đăng ký thành công');
                window.location = 'dangnhap.php';
                </script>";
            } else {
                echo "<script>
                alert('email không hợp lệ hoặc đã tồn tại, vui lòng nhập email khác để đăng ký');
                </script>";
            }
        }
        ?>
        <div class="container">
            <div class="header_dangKy"><span class="ttk">Tạo tài khoản</span>
                <div class="bottom_dk"></div>
            </div>
            <div class="content_account">
                <form action="" method="post" class="form_dangKy ">
                    <div class="last_name">
                        <input type="text" class="input_res" placeholder="Họ và tên" name="fullname" required>
                    </div>
                    <div class="email">
                        <input type="email" class="input_res" placeholder="Email" name="email" required>
                    </div>
                    <div class="password">
                        <input type="password" class="input_res" placeholder="Password" name="password" required>
                    </div>
                    <div class="phone">
                        <input type="text" class="input_res" placeholder="SĐT" name="phone"
                            required>
                    </div>
                    <div class="form_submit">
                        <button type="submit" class="submit" name="reg_user">Submit</button>
                    </div>
                    <p>Người dùng đã có tài khoản <a href="dangnhap.php"><b> Đăng nhập</b></a></p>

                </form>
            </div>
        </div>
    </div>
    <?php 
        include "footer.php";
    ?>