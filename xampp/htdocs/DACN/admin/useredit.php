<?php
include "header.php";
include "slider.php";
include "class/user_class.php";
?>

<?php
    $user = new user;
    $user_id = $_GET['user_id'];
    $get_user = $user -> get_user($user_id);
    if($get_user) {
        $result = $get_user -> fetch_assoc();
    }
?>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_role = $_POST['user_role'];
    $update_user = $user ->update_user($user_role, $user_id);
}   
?>

<div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Chỉnh sửa</h1>
                <form action="" method="POST">
                    <label for="">Tên người dùng</label>
                    <input name="user_name" type="text" value="<?php echo $result['user_name'] ?>" disabled>
                    <label for="">Vai người dùng</label>
                    <input name="user_role" type="text" value="<?php echo $result['user_role'] ?>">
                    <label for="">Địa chỉ người dùng</label>
                    <input name="user_address" type="text" value="<?php echo $result['user_address'] ?>" disabled>
                    <label for="">Email người dùng</label>
                    <input name="user_email" type="text" value="<?php echo $result['user_email'] ?>" disabled> 
                    
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>