<?php
include "headerTC.php";
include "class/order_class.php";
?>
<?php 
    $order = new order;
    $product_id = $_GET['product_id'];
    $get_product = $order -> get_product($product_id);
    if($get_product) {
        $result = $get_product -> fetch_assoc();
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_name = $_POST['name'];
        $product_name =  $result['product_name'];
        $product_price =  $result['product_price_new'];
        $user_email = $_POST['email'];
        $user_sdt = $_POST['sdt'];
        $user_address = $_POST['address'];

        $insert_order = $order ->insert_order($user_name, $product_name, $product_price, $user_email, $user_sdt, $user_address);
    }  
    


?>


<div class="app__container">
            <form method="POST">

            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-10">
                        <table style="width: 100%">
                            <tr style="background-color: #000; color: #fff;">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Hình ảnh</th>

                            </tr>
                            <tr>
                                <td><?php echo $result['product_id'] ?></td>
                                <td><?php echo $result['product_name'] ?></td>
                                <td><?php echo $result['product_price_new'] ?></td>
                                <td><img src="uploads/<?php echo $result['product_img'] ?>" alt="" style="height: 100px ; width: 100px;"></td>
                            </tr>
                            <?php
                            ?>
                        </table>
                        <h2>Xác nhận đơn hàng và kiểm tra thông tin đặt hàng</h2>
                        <span style="color: red;"> <?php   if(isset($_SESSION['dangnhap'])){echo "Xin chào "; echo $_SESSION['dangnhap']; ?></span>
                        <p>Tên khách hàng</p>
                        <input name="name" type="text" value="<?php echo $_SESSION['username']?>" style="border: 1px solid #ccc ; width:50%; padding: 10px;">
                        <p>Email</p>
                        <input name="email" type="text" value="<?php echo $_SESSION['dangnhap']?>" style="border: 1px solid #ccc; width:50%; padding: 10px;">
                        <p>SĐT nhận hàng</p>
                        <input name="sdt" type="text" value="<?php echo $_SESSION['sdt']?>" style="border: 1px solid #ccc; width:50%; padding: 10px;">
                        <p>Địa chỉ nhận hàng</p>
                        <input name="address" type="text" value="<?php echo $_SESSION['address']?>" style="border: 1px solid #ccc; width:50%; padding: 10px;">
                            
                    </div>
                </div>
            
                <input style="padding: 12px; margin: 30px 0 10px 100px; background-color: #e74c3c; color:#fff; cursor: pointer;" type="submit" name="momo" value="Thanh toán bằng tiền mặt">
                
                </form>
                <form method="POST" target="_blank" enctype ="application/x-www-form-urlencoded" action="xulythanhtoanmomo.php">
                    <input style="padding: 12px; margin: 30px 0 10px 100px; background-color: #e74c3c; color:#fff; cursor: pointer;" type="submit" name="momo" value="Thanh toán MOMO QRCode">
                 </form>
                 <form method="POST" target="_blank" enctype ="application/x-www-form-urlencoded" action="xulythanhtoanmomo_atm.php">
                    <input style="padding: 12px; margin: 30px 0 10px 100px; background-color: #e74c3c; color:#fff; cursor: pointer;" type="submit" name="momo" value="Thanh toán bằng momo atm">
                 </form>
                
                <?php } else { ?>
                    <h3>Vui lòng đăng nhập để đặt hàng</h3>
                    <a href="login.php">Đăng nhập</a>
                    <?php } ?>

            </div>
                
            <div class="grid">
            
            </div>
        </div>
                            

<?php     
include "footerTC.php";     
?>