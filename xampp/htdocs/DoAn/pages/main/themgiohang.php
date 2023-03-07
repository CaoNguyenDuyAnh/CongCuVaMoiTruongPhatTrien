<?php
session_start();
include('../../admin/config/config.php');

if (isset($_POST['themgiohang'])) {
    $id = $_GET['idsanpham'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham ='" . $id . "' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = array((array('tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' =>  $soluong, 'gia' => $row['gia'], 'hinhanh' => $row['hinhanh'], 'masanpham' => $row['masanpham'])));
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id'] == $id) {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id']
                        ,
                        'soluong' => $cart_item['soluong'] + 1,
                        'gia' => $cart_item['gia'],
                        'hinhanh' => $cart_item['hinhanh']
                        ,
                        'masanpham' => $cart_item['masanpham']
                    );
                    $found = true;

                } else {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id']
                        ,
                        'soluong' => $cart_item['soluong'],
                        'gia' => $cart_item['gia'],
                        'hinhanh' => $cart_item['hinhanh']
                        ,
                        'masanpham' => $cart_item['masanpham']
                    );
                }
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}

?>