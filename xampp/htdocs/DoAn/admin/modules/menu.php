<section class="admin-content">
        <div class="admin-content-left">
            <ul>
                <li>
                    <a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a>
                </li>
                <li>
                    <a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a>
                </li>
                <li>
                    <a href="index.php?action=quanlynguoidung&query=them">Quản lý người dùng</a>
                </li>
                <li>
                    <a href="index.php?action=quanlydonhang&query=them">Quản lý đơn hàng</a>
                </li>
                <li>
                    <a href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a>
                </li>
                <li>
                    <a href="category-add.php?action=dangxuat">Đăng xuất <?php if(isset($_SESSION['user_email'])) {
                        echo $_SESSION['user_name'];
                    } ?></a>
                </li>
            </ul>
        </div>