<?php 
    include "a.php";
    session_start();
    if(isset($_POST['id']) && isset($_POST['number'])){
        $id = $_POST['id'];
        $number = $_POST['number'];
        $sql="SELECT * FROM product Where ID = " .$id;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $item = [
            'id' =>$id,
            'name'=>$row['Name'],
            'image'=>$row["image_name"],
            'price' =>$row['Price_Sale'],
            'number'=>$number,
            'size'=>$_POST['size']
        ];
    $_SESSION['cart'][$id] = $item;

    }
    if($_GET['action'] =='delete'){
        unset($_SESSION['cart'][$_GET['id']]);
    }
    header('location:cart.php');
?>