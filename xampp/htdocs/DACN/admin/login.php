<?php 
session_start();

include "class/user_class.php";
include "configUser.php";
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

if(isset($_POST['dangnhap'])) {
  $user_email = $_POST['email1'];
  $user_pass = $_POST['password1'];
  $sql = "SELECT * FROM tbl_user WHERE user_email = '$user_email' AND user_pass = '$user_pass' LIMIT 1";
  $sql1 = "SELECT * FROM tbl_user WHERE user_email = '$user_email' AND user_pass = '$user_pass' AND user_role = 'Admin' LIMIT 1";
  $row = mysqli_query($mysqli,$sql);
  $row1 = mysqli_query($mysqli,$sql1);
  $count = mysqli_num_rows($row);
  $count1 = mysqli_num_rows($row1);
  $get_user = $user -> get_user_email($user_email);
  if($get_user) {
      $result = $get_user -> fetch_assoc();
  }
  $user_address = $result['user_address'];
  $user_sdt = $result['user_sdt'];
  $user_name = $result['user_name'];
  if($count1 > 0) {
    $_SESSION['dangnhapAdmin'] = $user_email;
    $_SESSION['dangnhap'] = $user_email;
    header("location:category-add.php");
  } elseif($count > 0) {
    $_SESSION['dangnhap'] = $user_email;
    $_SESSION['address'] = $user_address;
    $_SESSION['sdt'] =  $user_sdt;
    $_SESSION['username'] =  $user_name;
    header("location:trangchu.php");
  } else {
    echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại");</script>';
    header("Location:login.php");
  }
  
}
?>


<body>
        <!-- Form Đăng nhập -->

        <form action="" style="display: block; margin: auto;" method="POST" class="form form-login" id="login-form ">
          <div class="validator-form-btn">
            <a style="display: block;" href="./trangchu.php">Trang chủ</a>
            <button id="validator-form-regist" class="validator-form-change">
              
              <a href="./register.php">Đăng ký</a>
            </button>
          </div>
          <h3 class="heading">Đăng nhập tài khoản</h3>
      
          <div class="spacer"></div>

          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email-login" name="email1" rules="required|email" type="text" placeholder="VD: email@domain.com" class="form-control">
            <span class="form-message"></span>
          </div>

          <div class="form-group">
            <label for="password" class="form-label">Mật khẩu</label>
            <input id="password-login" name="password1" rules="required|min:6" type="password" placeholder="Nhập mật khẩu" class="form-control">
            <span class="form-message"></span>
          </div>
          <input id="loginBtn" class="form-submit" type="submit" value="Đăng nhập" name="dangnhap">
        </form>
      
        <script src="./validator.js"></script>

        <!-- Register -->
        <script>
            validator('#register-form');
            validator('#login-form');
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      </div>
</body>
</html>