<?php
include "header.php";
include "slider.php";
include "class/user_class.php";
?>

<?php
$user = new user;
$show_user = $user -> show_user();
?>

<div class="admin-content-right">
        <div class="admin-content-right-category_list">
            <h1>Danh sách sản phẩm</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Vai trò</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Tùy chọn</th>

                    </tr>
                    <?php
                        if($show_user) { 
                           $i = 0; 
                            while($result = $show_user->fetch_assoc()) { 
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['user_id'] ?></td>
                        <td><?php echo $result['user_name'] ?></td>
                        <td><?php echo $result['user_role'] ?></td>
                        <td><?php echo $result['user_address'] ?></td>
                        <td><?php echo $result['user_email'] ?></td>
                        <td>
                            <a href="useredit.php?user_id=<?php echo  $result['user_id'] ?>">Sửa</a>
                            <a href="userdelete.php?user_id=<?php echo  $result['user_id'] ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
        </div>
        </div>
    </section>
</body>
</html>