<?php
    session_start();
?>
<p>Giỏ hàng</p>
<?php 
    if(isset($_SESSION['cart'])){
        print_r($_SESSION['cart']);
    }


?>