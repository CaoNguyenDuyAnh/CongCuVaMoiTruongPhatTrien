<?php 
include "class/product_class.php";
$product = new product;

$category_id = $_GET['category_id'];
?>


<?php 
$show_categoryItem_ajax = $product->show_categoryItem_ajax($category_id);
if($show_categoryItem_ajax) {
    while($result = $show_categoryItem_ajax ->fetch_assoc()){
?>
    <option value="<?php echo $result['categoryItem_id'] ?>"><?php echo $result['categoryItem_name'] ?></option>
<?php 
    }}
?>