<?php
$product = new product;
$show_product = $product -> show_product();
$show_category = $product -> show_category();
?>


<div class="app__container" style="padding-top: 190px ;">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2">
                        <nav class="category">
                            <h3 class="category__heading">All Departement</h3>
                            <ul class="category-list">
                            <?php
                                if($show_category) { 
                                $i = 0; 
                                    while($result = $show_category->fetch_assoc()) { 
                                        $i++;
                            ?>
                                <li class="category-item">
                                    <a href="categorysearch.php?category_id=<?php echo  $result['category_id'] ?>" class="category-item__link">
                                        <?php echo $result['category_name'] ?>
                                    </a>
                                </li>
                            <?php
                                    }
                                }
                            ?>
                            </ul>
                        </nav>
                    </div>