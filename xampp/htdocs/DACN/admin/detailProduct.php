<?php
include "class/product_class.php";
include "headerTC.php";
include "categoryTC.php";
?>

<?php
$product = new product;
$product_id = $_GET['product_id'];
$get_product = $product -> get_product($product_id);
if($get_product) {
    $resultA = $get_product -> fetch_assoc();
}
?>
            <div class="grid__column-10">
                        <span class="heading-info-line">
                            <h2 class="heading-info">Chi tiết sản phẩm</h2>
                        </span>
                        
                        <div class="detail-product">
                            <img src="uploads/<?php echo $resultA['product_img']?>" alt="" class="detail-product_img">
                            <div class="detail-product-info">
                                <div class="info-detail">
                                    <h1 class="detail-product-h1"><?php echo $resultA['product_name']?></h1>
                                    <h3 class="detail-product-brand">Thương hiệu <a style="color: #E74C3C; text-decoration:none" href=""><?php echo $resultA['categoryItem_name']?></a></h3>
                                    <span class="etail-product-price-sale" style="color: #E74C3C; font-size: 18px;"><?php echo $resultA['product_price_new']?></span>
                                    <span class="detail-product-price"><?php echo $resultA['product_price']?></span>
                                </div>
                               
                                <a style="text-decoration:none; color:#fff" href="confirmProduct.php?product_id=<?php echo  $resultA['product_id'] ?>"> <button class="detail-product-btn">Mua hàng</button></a>
                            </div>
                            
                        </div>
                        <div class="grid">
                            <div class="detail-product-desc">
                                <h3 class="detail-product-desc-heading">Mô tả sản phẩm</h3>
                                <p class="detail-product-desc-p"><?php echo $resultA['product_desc']?></p>
                            </div>
            </div>
                        </div>
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>


        <?php include "footerTC.php" ?>
    </div>

</body>

</html>
