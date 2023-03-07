<?php
include "headerTC.php";
include "./admin/class/product_class.php";
include "configUser.php";
?>

<?php 
    require('mail/sendMail.php');
    $product_name =  $_GET['product_name'];
    $tieude = "Đặt hàng websitebanhangcongnghe.com thành công";
    $noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mặt hàng ' $product_name'</p> ";
    $maildathang = $_SESSION['dangnhap'];
    $mail = new Mailer();
    $mail -> dathangmail($tieude, $noidung, $maildathang);
    
    if(isset($_GET['partnerCode'])) {
        $partnerCode = $_GET['partnerCode'];
        $orderId = $_GET['orderId'];
        $amount = $_GET['amount'];
        $orderInfo = $_GET['orderInfo'];
        $orderType = $_GET['orderType'];
        $transId = $_GET['transId'];
        $payType = $_GET['transId'];
        $insert_momo = "INSERT INTO tbl_momo(partner_code,order_id,amount,order_info,order_type,trans_id,pay_type) VALUES ('$partnerCode','$orderId','$amount','$orderInfo','$orderType','$transId','$payType')";
        $momo_pay = mysqli_query($mysqli,$insert_momo);
        if($momo_pay) {
            echo '<h3>Giao dịch thanh toán bằng momo ATM thành công</h3>';
        } else 
        {
            echo 'Giao dịch thất bại';
        }
    }

?>


<style>
    .Thank_form{
        box-shadow: 4px 8px 40px 8px #e74c3c;
        height: 272px;
        width: 620px;
        margin: 50px auto;
        text-align: center;
    }
    .Thank_form h1{
        color:#e74c3c; 
        padding:30px 0;
    }
    .Thank_form button{
        margin-top: 10px;
        background-color:#e74c3c ; 
        color:#fff;
        padding: 12px ;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<div class="app__container">
            <div class="Thank_form">
                <h1>THANK YOU</h1>
                <h3>Cảm ơn bạn đã mua hàng <br> Chúng tôi sẽ liên hệ với bạn</h3>
                <a href="trangchu.php"><button>Tiếp tục mua hàng</button></a>
            </div>


<?php     
include "footerTC.php";     
?>