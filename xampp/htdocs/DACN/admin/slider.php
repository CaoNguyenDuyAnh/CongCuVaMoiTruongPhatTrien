<?php 
    if(isset($_GET['action']) == 'dangxuat') {
        unset($_SESSION['dangnhapAdmin']);
        unset($_SESSION['dangnhap']);
        header('Location:login.php');
    }

?>

<section class="admin-content">
        <div class="admin-content-left">
            <ul>
                <li>
                    <a href="#">Danh mục</a>
                    <ul>
                        <li><a href="category-add.php">Thêm danh mục</a></li>
                        <li><a href="categoryList.php">Danh sách danh mục</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Loại danh mục</a>
                    <ul>
                        <li><a href="categoryItemAdd.php">Thêm loại danh mục</a></li>
                        <li><a href="categoryItemList.php">Danh sách loại danh mục</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Sản phẩm</a>
                    <ul>
                        <li><a href="productAdd.php">Thêm sản phẩm</a></li>
                        <li><a href="productList.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Người dùng</a>
                    <ul>
                        <li><a href="userlist.php">Danh sách người dùng</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Đơn hàng</a>
                    <ul>
                        <li><a href="orderList.php">Đơn hàng</a></li>
                    </ul>
                </li>
                <li>
                    <a href="category-add.php?action=dangxuat">Đăng xuất <?php if(isset($_SESSION['user_email'])) {
                        echo $_SESSION['user_name'];
                    } ?></a>
                </li>
            </ul>
        </div>