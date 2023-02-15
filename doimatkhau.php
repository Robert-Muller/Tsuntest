<?php
  session_start();
?>
<!DOCTYPE html>
<head>
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="dangnhap.css">
  <link rel="stylesheet" href="products.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <style>
    footer{
      margin-top: 450px;
    }

  </style>
</head>
  <?php 
    include "a.php";
    include "header.php";
    if(isset($_POST['passcu']) && isset($_POST['passmoi']) && isset($_POST['nhaplaipassmoi'])){
        $o = $_POST['passcu'];
        $n = $_POST['passmoi'];
        $r = $_POST['nhaplaipassmoi'];
        $changepass = "SELECT * FROM  user WHERE email= '".$_SESSION['user']['email']."' AND password= '$o'";
        $result_changepass= mysqli_query($conn, $changepass);
            if(mysqli_num_rows($result_changepass)>0){
                if($n == $r){
                $change = "UPDATE user SET `password` = '$n' WHERE email = '".$_SESSION['user']['email']."'";
                $result_change = mysqli_query($conn, $change);
                echo "<script>
                    alert('Đổi mật khẩu thành công');
                    window.location = 'thongtintaikhoan.php';
                    </script>";
                }
                else{
                    echo "<script>
                    alert('Mật khẩu nhập lại không trùng với mật khẩu mới');      
                    </script>";
                }
        } else {
            echo "<script>
            alert('Mật khẩu không đúng vui lòng thử lại');
            </script>";
        }
        }
    ?>
    <div class="dangnhap" >
      <div class="header_dangnhap"><span class="dangnhap">Đổi mật khẩu</span>
        <div class="bottom_dn"></div>
      </div>
      <div class="content_account">
        <form action="" method="post">
          <div class="password">
            <input type="password" class="input_res" placeholder="Mật khẩu cũ" name="passcu">
         </div>
          <div class="password">
            <input type="password" class="input_res" placeholder="Mật khẩu mới" name="passmoi">
          </div>
          <div class="password">
            <input type="password" class="input_res" placeholder="Nhập lại mật khẩu mới" name="nhaplaipassmoi">
          </div>
          <button class="login" type="submit">Đổi mật khẩu</button>

      </p>
		  </div>
    </form>
      <?php 
    include "footer.php";
    ?>