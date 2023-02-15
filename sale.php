<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang giảm giá</title>
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>
<body>
    <?php
    include 'a.php';
    if(isset($_GET['sale'])){
        $before=$_GET['sale']-10;
        $sql="SELECT * FROM product WHERE (100-round(Price_Sale/Price_default*100)) <=".$_GET['sale'] ." and (100-round(Price_Sale/Price_default*100)) >".$_GET['sale']-10;
    } else{
        $sql="SELECT * FROM product where Price_Sale is not null"; 
    }
    $result = mysqli_query($conn, $sql);
    include "header.php";
    ?>
    <div class="space">
        <p>Trang chủ / Danh mục / <?php 
            if(isset($_GET['sale'])){
            switch($_GET['sale']){
            case 10: echo "Sản phẩm Sale 10%"; break;
            case 20: echo "Sản phẩm Sale 20%"; break;
        }
    } else {
        echo "Tất cả sản phẩm";
    }?></p>
    </div>
    <section id="main-section">
        <div class="img-main-product">
            <img src="img-our-product.jpg" alt="Our Product">
        </div>
        <h1><?php 
            if(isset($_GET['sale'])){
            switch($_GET['sale']){
            case 10: echo "Sản phẩm Sale 10%"; break;
            case 20: echo "Sản phẩm Sale 20%"; break;
        }
    } else {
        echo "Sản phẩm khuyến mại";
    }?></h1>
        <div class="product">
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="slot">
                <a href="productdetails.php?id=<?php echo $row["ID"] ?>">
                <div class="image-product">
                    <div class="item-image">
                    <p>-<?php echo (round(100-$row["Price_Sale"]/$row["Price_default"]*100))?>%</p>
                    <i class="fa fa-search-plus plus-details"></i>
                    </div>
                    <img class="simage-product"
                    src="<?php echo $row["image_name"] ?>" onmouseover="this.src='<?php echo $row['image_name2'] ?>'" onmouseout="this.src='<?php echo $row['image_name'] ?>'">
                </div>
                </a>
                <div class="product-name">
                    <a href="productdetails.php?id=<?php echo $row["ID"] ?>"><h2><?php echo $row["Name"] ?></h2></a>
                    <p><?php echo $row["Price_Sale"]."đ" ?> <del><?php echo $row["Price_default"]."đ" ?></del></p>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </section>
    <?php 
    include 'footer.php';
    ?>