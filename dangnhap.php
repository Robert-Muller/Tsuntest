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
    if(isset($_POST['username']) && isset($_POST['password'])){
      $u = $_POST['username'];
      $p = $_POST['password'];
      $login = "SELECT * FROM  user WHERE email= '$u' AND password= '$p'";
      $result_login= mysqli_query($conn, $login);
      $data = mysqli_fetch_assoc($result_login);
          if(mysqli_num_rows($result_login)>0){
          $_SESSION['user'] = $data;
          echo "<script>
              alert('Đăng nhập thành công');
              window.location = 'TC.php';
              </script>";
      } else {
          echo "<script>
          alert('Đăng nhập thất bại');
          </script>";
      }}
    ?>
    <div class="dangnhap" >
      <div class="header_dangnhap"><span class="dangnhap">Đăng nhập</span>
        <div class="bottom_dn"></div>
      </div>
      <div class="content_account">
        <form action="" method="post">
          <div class="username">
            <input type="text" class="input_res" placeholder="username" name="username">
         </div>
          <div class="password">
            <input type="password" class="input_res" placeholder="password" name="password">
          </div>
          <div class="policy">This site is protected by reCAPTCHA and the Google <a href="" class="policy_login">Privacy Policy</a> and <a href="" class="policy_login">Terms of Service</a> apply.</div>
          <button class="login" type="submit">Đăng nhập</button>
		  <p class="form_forgot_password">
        <a href="#" class="password_forgot">Quên mật khẩu?</a> hoặc <a href="dangky.php" class="password_forgot">Đăng ký</a>
      </p>
		  </div>
    </form>
      <?php 
    include "footer.php";
    ?>