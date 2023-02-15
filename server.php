<?php

session_start();
//Khởi tạo biến
$username = "";
$email = "";

$errors = array();

//Kết nối database

$db = mysqli_connect('localhost', 'root', '', 'practice') or die("Kết nối không thành công");

//Đăng kí người dùng
if (isset($_POST['reg_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    //form validation
    
    if(empty($username)) {array_push($errors, "Tên người dùng là bắt buộc");}
    if(empty($email)) {array_push($errors, "Email là bắt buộc");}
    if(empty($password_1)) {array_push($errors, "Mật khẩu là bắt buộc");}
    if($password_1 != $password_2) {array_push($errors, "Mật khẩu không phù hợp");}


    //kiểm tra db cho người dùng hiện tại có cùng tên người dùng 

    $user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

    $result = mysqli_query($db, $user_check_query);
    $user = $result->fetch_assoc();

    if($user) {
        if($user['username'] === $username){array_push($errors,"Tên đăng ký đã được sử dụng");}
        if($user['email'] === $email){array_push($errors,"Email này đã tồn tại");}
    }

    //Đăng ký người dùng nếu không có lỗi trong biểu mẫu

    if(count($errors) == 0) {
        $password = md5($password_1); //mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu 
        // print $password;
        $query = "INSERT INTO user (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";

        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Đăng nhập thành công";
        header('location: TC.php');
    }


};

//LOGIN USER

if(isset($_POST['login_user'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password_1']);

    if(empty($username)){
        array_push($errors, "Bắt buộc nhập tên người dùng");
    }
    if(empty($password)){
        array_push($errors, "Bắt buộc nhập mật khẩu");
    }

    if(count($errors) == 0) {
        // $password = md5($password);
        $query = "SELECT * FROM user WHERE `username`='$username' AND `password`='$password' ";
        $results = mysqli_query($db, $query);

        if(mysqli_num_rows($results)) {

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Đăng nhập thành công";
            header('location: TC.php');
        } else {
            array_push($errors, "Sai tên người dùng/ mật khẩu. Vui lòng nhập lại.");
        }
    }
}


?>