<?php
    session_start();
?>
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
            <form action="mainproduct.php" method="POST">
                <input id="text-search" name="s" type="text" placeholder="The shirt you need..." required>
                <button id="button-search" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <header id="main-header">
        <div id="logo">
            <a href="">
            <img src="logo_300x83-01_c28ebaeb04454bdd8fe8a9538f0e659a.png" alt="Logo trang web">
            </a>
        </div>
        <div id="nav-header">
            <nav id="nav-link">
                <ul>
                    <li><a href="TC.php">TRANG CHỦ</a></li>
                    <div class="dropdown">
                    <li>
                        <a href="mainproduct.php">SẢN PHẨM
                            <i class="fa fa-chevron-down arrown"></i>
                        </a>
                        <div class="dropdown-content">
                        <ul>
                            <li><a href="mainproduct.php?Class=1">Tee</a></li>
                            <li><a href="mainproduct.php?Class=2">Jacket</a></li>
                            <li><a href="mainproduct.php?Class=3">ACCESSORIES</a></li>
                            <li><a href="mainproduct.php?Class=4">Pants</a></li>
                            <li><a href="mainproduct.php?Class=5">Hoodie</a></li>
                            <li><a href="mainproduct.php?Class=6">Sweater</a></li>
                        </ul>
                        </div>
                    </li>
                    </div>
                    <div class="dropdown">
                    <li>
                        <a href="sale.php">ĐANG GIẢM GIÁ
                            <i class="fa fa-chevron-down arrown"></i>
                        </a>
                        <div class="dropdown-content" style="width: 100px;">
                        <ul>
                            <li><a href="sale.php?sale=10">10%</a></li>
                            <li><a href="sale.php?sale=20">20%</a></li>
                        </ul>
                        </div>
                    </li>
                    </div>
                    <div class="dropdown">
                    <li>
                        <a href="Huongdan.php">HƯỚNG DẪN
                            <i class="fa fa-chevron-down arrown"></i>
                        </a>
                        <div class="dropdown-content">
                        <ul>
                            <li><a href="Baomat.php">Bảo mật</a></li>
                            <li><a href="doitra.php">Đổi trả sản phẩm</a></li>
                            <li><a href="lienhe.php">Liên hệ</a></li>
                            <li><a href="Huongdan.php">Hướng dẫn mua hàng</a></li>
                        </ul>
                        </div>
                    </li>
                    </div>
                    <li><a href="Size.php">BẢNG SIZE</a></li>
                    <li><a href="Gioithieu.php">GIỚI THIỆU TSUN</a></li>
                </ul>
            </nav>
        </div>
        <div id="user">
            <?php
                if(isset($_SESSION['user'])){
            ?>
            <a href="thongtintaikhoan.php"><i class="fa fa-user"></i><?= $_SESSION['user']['fullname']?></a>
            <?php
                } else {
            ?>
            <a href="dangnhap.php"><i class="fa fa-user"></i> Đăng nhập/ Đăng kí</a>
            <?php } ?>
            <a href="cart.php"><i class="fa fa-cart-arrow-down cart"></i></a>
        </div>
    </header>