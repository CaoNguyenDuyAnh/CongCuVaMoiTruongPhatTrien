<?php 
include "class/user_class.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký đăng nhập</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css">
</head>

<?php
$user = new user;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['fullname'];
    $user_email = $_POST['email'];
    $user_pass = $_POST['password'];
    $user_address = $_POST['address'];
    $user_passcheck = $_POST['password_confirmation'];
    $user_sdt = $_POST['sdt'];
    
    $check_user = $user ->check_user1($user_email);
    if ($check_user) {
        echo "Email đã có người dùng";
    } else if($user_pass != $user_passcheck) {
        echo "Các mật khẩu không khớp";
    } else
        {
            $insert_user = $user ->insert_user($user_name, $user_email,$user_pass,$user_address,$user_sdt);
            header("location:login.php");
        }
}   
?>


<body>
    <div class="validator-form">
        <form action="" method="POST" class="form form-register" id="register-form">
          <div class="validator-form-btn">
            
          <a style="display: block;" href="./trangchu.php">Trang chủ</a>
            <button id="validator-form-login" class="validator-form-change">
              <a href="./login.php">Đăng nhập</a>
            </button>
          </div>
          <h3 class="heading">Thành viên đăng ký</h3>
      
          <div class="spacer"></div>
      
          <div class="form-group">
            <label for="fullname" class="form-label">Họ và tên</label>
            <input id="fullname" name="fullname" rules="required" type="text" placeholder="VD: Duy Anh" class="form-control">
            <span class="form-message"></span>
            
            
          </div>
      
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" rules="required|email" type="text" placeholder="VD: email@domain.com" class="form-control">
            <span class="form-message"></span>
          </div>

          <div class="form-group">
            <label for="sdt" class="form-label">SĐT</label>
            <input id="sdt" name="sdt" rules="required" type="text" placeholder="VD: 0123456789" class="form-control">
            <span class="form-message"></span>
          </div>
      
          <div class="form-group">
            <label for="password" class="form-label">Mật khẩu</label>
            <input id="password" name="password" rules="required|min:6" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <span class="form-message"></span>
          </div>
      
          <div class="form-group">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
            <input id="password_confirmation" rules="required" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
            <span class="form-message"></span>
          </div>

          <div class="form-group">
            <label for="address" class="form-label">Địa chỉ giao hàng</label>
            <input id="address" name="address" rules="required" type="address" placeholder="Nhập địa chỉ" class="form-control">
            <span class="form-message"></span>
          </div>
      

          
          <button class="form-submit">Đăng ký</button>
        </form>
        <script src="./validator.js"></script>

        <!-- Register -->
        <script>
            validator('#register-form');
        </script>
      </div>
</body>
</html>