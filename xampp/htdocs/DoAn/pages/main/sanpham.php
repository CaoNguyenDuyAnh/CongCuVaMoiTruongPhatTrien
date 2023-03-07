<?php
$sql_sanpham = "SELECT * FROM tbl_sanpham, tbl_category WHERE tbl_sanpham.id_danhmuc =  tbl_category.id_danhmuc  AND id_sanpham = '$_GET[id]' LIMIT 1";
$query_sanpham = mysqli_query($mysqli, $sql_sanpham);
?>

<span class="heading-info-line">
    <h2 class="heading-info">Chi tiết sản phẩm</h2>
</span>
<?php while ($row_product = mysqli_fetch_array($query_sanpham)) { ?>
    <div class="detail-product">
        <img src="admin/modules/quanlysanpham/uploads/<?php echo $row_product['hinhanh'] ?>" alt=""
            class="detail-product_img">
        <form  method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_product['id_sanpham'] ?>">
            <div class="detail-product-info">
                <div class="info-detail">
                    <h1 class="detail-product-h1">
                        <?php echo $row_product['tensanpham'] ?>
                    </h1>
                    <h3><a style="text-decoration:none"
                            href="index.php?quanly=danhmucsanpham&id=<?php echo $row_product['id_danhmuc'] ?>"><?php echo $row_product['tendanhmuc'] ?> </a></h3>
                    <!-- <h3 class="detail-product-brand">Thương hiệu <a style="color: #E74C3C; text-decoration:none" href="">
                        
                                </a></h3> -->
                    <span class="etail-product-price-sale" style="color: #E74C3C; font-size: 18px;">
                        <?php echo number_format($row_product['gia'], 0, ',', '.') . 'vnđ' ?>
                    </span>
                </div>

                <span style="text-decoration:none; color:#fff"
                    href=""><input type="submit" value="Thêm vào giỏ hàng" name="themgiohang"
                        class="detail-product-btn"/></span>
            </div>
        </form>

    </div>
    <div class="grid">
        <div class="detail-product-desc">
            <h3 class="detail-product-desc-heading">Mô tả sản phẩm</h3>
            <p class="detail-product-desc-p">
                <?php echo $row_product['noidung'] ?>
            </p>
        </div>
    </div>
    <?php
}
?>