<?php
include "class/product_class.php";
?>

<?php
$product = new product;
$show_product = $product -> show_product();
?>

<?php
include "headerTC.php";
include "categoryTC.php";
?>
                    <div class="grid__column-10">
                    
                        <span class="heading-info-line">
                            <h1 class="heading-info">Product</h1>
                        </span>
                        
                        <div class="grid__row ">
                        <?php
                        if($show_product) { 
                           $i = 0; 
                            while($result = $show_product->fetch_assoc()) { 
                                $i++;
                        ?>
                            <div class="grid__column-2-4 product-sale-hover">
                                <span class="product-sale-note">Sale!</span>
                                <a href="detailProduct.php?product_id=<?php echo  $result['product_id'] ?>" class="product-sale-link">
                                    <img  src="uploads/<?php echo $result['product_img'] ?>" alt="" class="product-sale-img">
                                    <div class="product-sale-content">
                                        <h2 class="product-sale-heading"><?php echo $result['product_name'] ?></h2>
                                        <span class="product-sale-price"><?php echo $result['product_price'] ?></span>
                                        <span class="product-sale-price_sale"><?php echo $result['product_price_new'] ?></span>
                                    </div>
                                </a>
                                <button class="product-sale-btn">
                                    <a href="" class="product-sale-add">Add to cart</a>
                                    <p class="product-sale-test" style = "display:none"></p>
                                </button>
                            </div>
                            <?php
                            }
                        }
                    ?>
                        </div>
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>


        <?php include "footerTC.php" ?>
    </div>

</body>

</html>
