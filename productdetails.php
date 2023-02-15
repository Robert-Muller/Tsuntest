<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
</head>
<body>
    <div id="topbar">
        <div id="contact">
            <ul>
                <li>TSUNSG@GMAIL.COM</li>
                <li>Hotline: 0934 076 342</li>
            </ul>
        </div>
        <div id="info-topbar">Tặng ngay 1 túi Tote Bag khi mua sản phẩm từ 300.000 vnđ 
            Đơn hàng được FreeShip khi mua từ 1.500.000 vnđ</div>
        <div id="search">
            <form action="" method="POST">
                <input id="text-search" type="text" placeholder="The shirt you need..." required>
                <button id="button-search" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <?php 
        include 'a.php';
        if(isset($_GET['id'])){
        $sql="SELECT * FROM product Where ID =".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        $item = mysqli_fetch_assoc($result);
        $sqlother="SELECT * FROM product Where ID =".$_GET['id'];
        $resultother = mysqli_query($conn, $sqlother);
        $itemother= mysqli_fetch_row($resultother);
        $category="SELECT * FROM product WHere Class= $itemother[8] ORDER BY rand() limit 5";
        $resultcate= mysqli_query($conn, $category);
        }
        include "header.php"
    ?>
    <div class="space">
        <p>Trang chủ / Sản phẩm / <?php echo $item['Name'] ?></p>
    </div>
    <section id="details-section">
    <div class="section-details">
        <div class="imagedetails">
            <div class="minidetails">
            <ul>
                <li><img src="<?php echo $item['image_name'] ?>" onclick="changImage('one')" id="one"></li>
                <li><img src="<?php echo $item['image_name2'] ?>" onclick="changImage('two')" id="two"></li>
                <li><img src="<?php echo $item['image_name3'] ?>" onclick="changImage('three')" id="three"></li>
                <li><img src="<?php echo $item['image_name4'] ?>" onclick="changImage('four')" id="four"></li>
            </ul>
        <script>
            function changImage(id){
                let imgPath = document.getElementById(id).getAttribute('src');
                document.getElementById('img-main').setAttribute('src',imgPath);
            }
        </script>
        </div>
        <div class="mainimagedetails">
            <img src="<?php echo $item['image_name'] ?>" id="img-main">
        </div>
        </div>
        <div class="info-detail">
            <h1><?php echo $item['Name'] ?></h1>
            <div class="price">
            <div class="giamgia">-<?php echo (round(100-$item["Price_Sale"]/$item["Price_default"]*100))?>%</div>
            <p><?php echo $item['Price_Sale']."đ" ?> <del><?php echo $item['Price_default']."đ" ?></del></p>
            </div>
            <div class="info-form">
            <form action="addcart.php" method="POST">
                <h4>SIZE:</h4><br>
                <input type="hidden" name="id" value="<?php echo $item['ID'] ?>">
                <input type="radio" id="S" name="size" value="S" style="margin-left: 0px;" checked>
                <label for="S">S</label>
                <input type="radio" id="M" name="size" value="M">
                <label for="M">M</label>
                <input type="radio" id="L" name="size" value="L">
                <label for="L">L</label>
                <input type="radio" id="XL" name="size" value="XL">
                <label for="XL">XL</label><br>
                <div class="forms3">
                <div class="minusplus">
                <input id="minus" type="button" value="-" onclick="subtract()">
                <input id="input-qty" min="1" type="number" value="1" name="number">
                <input id="plus" type="button" value="+" onclick="add()">
                <script>
                    function subtract(){
                     var s= document.getElementById('input-qty').value;
                     if(parseInt(s)>1){
                        document.getElementById('input-qty').value=parseInt(s)-1;
                         }
                     }
                    function add(){
                     var a= document.getElementById('input-qty').value;
                        document.getElementById('input-qty').value=parseInt(a)+1;
                    }
                 </script>
                </div>
                <input type="submit" value="Thêm vào giỏ">
                </div>
            </form>
            <div class="instruct">
                <nav id="nav-instruct">
                    <ul>
                        <li id="navins1" onclick="clicknav1()">Chính sách đổi trả hàng</li>
                        <li id="navins2" onclick="clicknav2()">Hướng dẫn mua hàng</li>
                        <script>
                            function clicknav1(){
                                var a=document.getElementById('navins1');
                                var b= document.getElementById('navins2');
                                a.style.color="gray";
                                a.style.borderBottom="1px solid black";
                                b.style.color="black";
                                b.style.border="none";
                                document.getElementById('aside1').style.display="block";
                                document.getElementById('aside2').style.display="none";
                            }
                            function clicknav2(){
                                var a=document.getElementById('navins1');
                                var b= document.getElementById('navins2');
                                b.style.color="gray";
                                b.style.borderBottom="1px solid black";
                                a.style.color="black";
                                a.style.border="none";
                                document.getElementById('aside2').style.display="block";
                                document.getElementById('aside1').style.display="none";
                            }
                        </script>
                    </ul>
                </nav>
                <aside>
                    <p id="aside1"><strong>- Điều kiện đổi trả</strong><br><br>
                        Quý Khách hàng cần kiểm tra tình trạng hàng hóa và có thể đổi hàng/ trả lại hàng trong 3 ngày tính tại thời  điểm nhận hàng trong những trường hợp sau:<br><br>
                        Hàng không đúng chủng loại, mẫu mã trong đơn hàng đã đặt hoặc như trên website tại thời điểm đặt hàng.<br><br><br>
                        Không đủ số lượng, không đủ bộ như trong đơn hàng. ( Khi nhận hàng các bạn sẽ được kiểm tra trước khi nhận, các bạn có quyền không nhận hàng khi không đủ số lượng hoặc sai mẫu. Các trường hợp đã nhận hàng xong Shop sẽ không giải quyết)<br><br>
                        Nếu trong trường hợp các bạn đã nhận hàng nhưng đặt nhầm Size:<br><br>
                        + Các bạn có thể nhắn tin cho TSUN để đổi hàng đúng Size cho các bạn, TSUN có dịch vụ đổi trả hàng tận nhà cho các bạn ( Phí Ship các bạn tự thanh toán nhé !)<br><br>
                        <strong>- Sản phẩm được đổi là khi :</strong><br><br>
                        + Trong 3 ngày tính từ ngày nhận hàng.<br><br>
                        + Chưa qua sử dụng ( mặc , giặt )<br><br>
                        + Mạc , tag áo còn đầy đủ.<br><br>
                        + Còn đầy đủ hóa đơn mua hàng.</p>
                    <p id="aside2">
                        <strong>1. Hướng dẫn sử dụng website TSUN:<br><br></strong>
                        - Các bước mua hàng tại Web TSUN:<br><br>
                        + Chọn sản phẩm -> chọn Size sản phẩm -> thêm vào giỏ hàng -> thanh toán<br><br>
                        (Trong trường hợp các bạn mua nhiều sản phẩm, các bạn thêm từng sản phẩm vào giỏ hàng, sau khi đã đủ sản phẩm và số lượng , các bạn vui lòng kiểm tra thật kỹ giỏ hàng và ấn THANH TOÁN)<br><br>
                        + Thanh toán -> Điền đầy đủ thông tin -> Tên -> Số Điện Thoại -> Địa chỉ nhận hàng - > Mail.<br><br>
                        ( Đơn hàng thành công là khi các bạn điền đầy đủ thông tin và chính xác, các bạn cần điền đầy đủ thông tin và Mail để TSUN có thể xác nhận đơn hàng qua Mail cho các bạn.)<br><br>
                        <strong>2. Hình thức mua hàng tại TSUN:</strong><br><br>
                        - Các bạn có thể mua hàng tại Web TSUN bằng các hình thức thanh toán sau đây:<br><br>
                        <strong>Cách 1:</strong> Thanh toán khi nhận hàng tại nhà (COD – giao hàng và thu tiền tận nơi)<br><br>
                        <strong>Cách 2:</strong> Thanh toán chuyển khoảng trước cho TSUN (Trước khi CHUYỂN KHOẢN các bạn vui lòng nhắn tin trước cho TSUN qua Ins hoặc FB để chúng tôi kiểm tra và xác nhận đơn hàng.)
                    </p>
                </aside>
            </div>
            </div>
        </div>
    </div>
    <div class="category">
        <h1>Sản phẩm liên quan</h1>
        <div class="detailscategory">   
        <?php
            while($cate = mysqli_fetch_assoc($resultcate)){
        ?>
            <div class="slot">
                <a href="productdetails.php?id=<?php echo $cate["ID"] ?>">
                <div class="image-product">
                    <div class="item-image">
                    <p>-<?php echo (round(100-$cate["Price_Sale"]/$cate["Price_default"]*100))?>%</p>
                    <i class="fa fa-search-plus plus-details"></i>
                    </div>
                    <img class="simage-product"
                    src="<?php echo $cate["image_name"] ?>" onmouseover="this.src='<?php echo $cate['image_name2'] ?>'" onmouseout="this.src='<?php echo $cate['image_name'] ?>'">
                </div>
                </a>
                <div class="product-name">
                    <a href="productdetails.php?id=<?php echo $cate["ID"] ?>"><h2><?php echo $cate["Name"] ?></h2></a>
                    <p><?php echo $cate["Price_Sale"]."đ" ?> <del><?php echo $cate["Price_default"]."đ" ?></del></p>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
    </section>
    <?php 
    include 'footer.php';
    ?>