<?php session_start() ?>

<?php 
    if(isset($_GET['action']) == 'dangxuat') {
        unset($_SESSION['dangnhap']);
        header('Location:trangchu.php');
        if(isset($_SESSION['dangnhapAdmin'])){
            unset($_SESSION['dangnhapAdmin']);
            header('Location:trangchu.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website thương mại điện tử</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li><a href="TrangChu.php">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li>
                            <a href="#">Shop</a>
                            <i class="fas fa-chevron-down arrow-down" ></i>
                        </li>
                        <li><a href="#">Contact Us</a></li>
                        <li>
                            <a href="#">Pages</a>
                            <i class="fas fa-chevron-down arrow-down"></i>
                        </li>
                    </ul>
                    <div class="header__user">
                        <i class="far fa-user-circle header__user-icon"></i>
                        <div class="header__user-sign">
                                <p>Account</p>
                                <a href="./login.php" class="header__user-signin">Sign in</a>
                        </div>
                        <?php
                        if(isset($_SESSION['dangnhap'])){
                        ?>
                        <div class="header__user-sign">
                            <p>:<?php echo $_SESSION['dangnhap'] ?></p>
                            <a href="trangchu.php?action=dangxuat">Đăng xuất <?php ?></a>
                        </div>
                            <?php
                            }  
                        ?>
                    </div>
                </nav>

                <div class="header-with-search">
                    <img src="./assets/img/logo.png" alt="" class="header-logo">
                    <div class="header__search">
                        <input type="text" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm">
                        <button class="header__search-btn">
                            <i class="header__search-btn-icon fas fa-search"></i>
                        </button>
                    </div>
                    <div class="header__cart">
                        <div class="header__cart-wrap">
                            <i class="header__cart-icon fas fa-shopping-cart"></i>
                            <div class="header__cart-list">
                                <!-- No Cart: header__cart-list--no-cart -->
                                <img src="./assets/img/no-cart.png" alt="" class="header__cart-no-cart-img">
                                <p class="header__cart-list-no-cart-msg">
                                    Chưa có sản phẩm
                                </p>
                                <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                                <ul class="header__cart-list-item">
                                    
                                </ul>
                                <div class="header__cart-pay">
                                    <span class="header__cart-pay-head">Tổng tiền sản phẩm</span>
                                    <span class="header__cart-pay-total"></span>
                                </div>
                                <button class="header__cart-btn">Xem giỏ hàng</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>