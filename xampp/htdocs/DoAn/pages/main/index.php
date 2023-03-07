<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham, tbl_category 
                    WHERE tbl_sanpham.id_danhmuc = tbl_category.id_danhmuc 
                    ORDER BY id_sanpham DESC";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>

<span class="heading-info-line">
    <h1 class="heading-info">Sản phẩm mới nhất</h1>
</span>

<div class="grid__row ">
    <?php while ($row_product = mysqli_fetch_array($query_lietke_sp)) { ?>
        <div class="grid__column-2-4 product-sale-hover">
            <span class="product-sale-note">Sale!</span>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham'] ?>" class="product-sale-link">
                <img src="admin/modules/quanlysanpham/uploads/<?php echo $row_product['hinhanh'] ?>" alt=""
                    class="product-sale-img">
                <div class="product-sale-content">
                    <h2 class="product-sale-heading">
                        <?php echo $row_product['tensanpham'] ?>
                    </h2>
                    <span class="product-sale-price_sale">
                        <?php echo number_format($row_product['gia'], 0, ',', '.') . 'vnđ' ?>
                    </span>
                </div>
            </a>
            <button class="product-sale-btn">
                <a href="index.php?quanly=sanpham&id=<?php echo $row_product['id_sanpham'] ?>" class="product-sale-add">Add to cart</a>
                <p class="product-sale-test" style="display:none"></p>
            </button>
        </div>
        <?php
    }
    ?>
</div>

</div>