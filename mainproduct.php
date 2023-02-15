<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
            if(isset($_GET['Class'])){
            switch($_GET['Class']){
            case 1: echo "Tee TSUN"; break;
            case 2: echo "Jacket TSUN"; break;
            case 3: echo "ACCESSORIES"; break;
            case 4: echo "Pants"; break;
            case 5: echo "Hoodie TSUN"; break;
            case 6: echo "Sweater TSUN"; break;
        }
    } else if(isset($_POST['s'])){
        echo "Sản phẩm tìm kiếm";
    } else{
        echo "Tất cả sản phẩm";
        }
    ?></title>
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>
<body>
    <?php
    include 'a.php';
    $current_page = !empty($_GET['page'])? $_GET['page']:1;
	$offset = ($current_page-1)*12;
    if(isset($_GET['Class'])){
        $sql="SELECT * FROM product WHERE Class =".$_GET['Class']." LIMIT 12 OFFSET ".$offset;
        $propage="SELECT * FROM product WHERE Class=".$_GET["Class"];
    } else if(isset($_POST['s'])){
        $sql="SELECT * FROM product WHERE Name LIKE '%".$_POST['s']."%' LIMIT 12 OFFSET ".$offset;
        $propage="SELECT * FROM product WHERE Name LIKE '%".$_POST['s']."%'";
    } else {
        $sql="SELECT * FROM product LIMIT 12 OFFSET ".$offset;
        $propage="SELECT * FROM product";
    }
    $result = mysqli_query($conn, $sql);
    $totalpro= mysqli_query($conn, $propage);
    $totalpro = $totalpro->num_rows;
	$totalpage = ceil($totalpro/12);
    include "header.php";
    ?>
    
    <div class="space">
        <p>Trang chủ / Sản phẩm / <?php 
        if(isset($_GET['Class'])){
            switch($_GET['Class']){
            case 1: echo "Tee"; break;
            case 2: echo "Jacket"; break;
            case 3: echo "ACCESSORIES"; break;
            case 4: echo "Pants"; break;
            case 5: echo "Hoodie"; break;
            case 6: echo "Sweater"; break;
        }
    } else if(isset($_POST['s'])){
        echo "Sản phẩm tìm kiếm";
    } else{
        echo "Tất cả sản phẩm";
        }?></p>
    </div>
    <section id="main-section">
        <div class="img-main-product">
            <img src="img-our-product.jpg" alt="Our Product">
        </div>
        <h1><?php 
            if(isset($_GET['Class'])){
            switch($_GET['Class']){
            case 1: echo "Tee TSUN"; break;
            case 2: echo "Jacket TSUN"; break;
            case 3: echo "ACCESSORIES"; break;
            case 4: echo "Pants"; break;
            case 5: echo "Hoodie TSUN"; break;
            case 6: echo "Sweater TSUN"; break;
        }
    } else if(isset($_POST['s'])){
        echo "Sản phẩm tìm kiếm";
    } else{
        echo "Tất cả sản phẩm";
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
        <div class="pagination">
                        <ul>
							<?php
							for($num =1; $num <= $totalpage;$num++){
								if(isset($_GET['Class'])){
									if($num != $current_page){
							?>
								<li><a href="?Class=<?= $_GET['Class'] ?>&page=<?= $num ?>"><?=$num?></a></li>
							<?php
									} else{
										echo "<li class='currentpag'><strong class='currentpag'>".$num."</strong></li>";
									}
								} else if(isset($_GET['s'])){
									if($num != $current_page){
							?>
								<li><a href="?s=<?=$_GET['s']?>&page=<?=$num?>"><?=$num?></a></li>
							<?php
									} else{
										echo "<li class='currentpag'><strong class='currentpag'>".$num."</strong></li>";
									}
								} else{
									if($num != $current_page){
							?>
								<li id="pag<?=$num?>"><a href="?page=<?=$num?>"><?=$num?></a></li>
							<?php
									} else{
										echo "<li class='currentpag'><strong class='currentpag'>".$num."</strong></li>";
									}
								}
							}
							?>
                        </ul>
                </div>
    </section>
    <?php 
    include "footer.php";
    ?>