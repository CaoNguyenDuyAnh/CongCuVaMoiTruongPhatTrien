<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>

<?php 
    $product = new product;
    $product_id = $_GET['product_id'];
    $get_product = $product -> get_product($product_id);
    if($get_product) {
        $resultA = $get_product -> fetch_assoc();
    }


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $categoryItem_id = $_POST['categoryItem_id'];
    $product_price = $_POST['product_price'];
    $product_price_new = $_POST['product_price_new'];
    $product_desc = $_POST['product_desc'];
    $product_img = $_POST['product_img'];
    $update_product = $product ->update_product($product_name, $category_id,$categoryItem_id, $product_price,$product_price_new,$product_desc, $product_img);
} 
?>

<div class="admin-content-right">
<div class="admin-content-right-product_add">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span> </label>
                    <input name="product_name" required type="text" value="<?php echo $resultA['product_name']?>">
                    <label for="">Chọn danh mục <span style="color: red;">*</span> </label>
                    <select name="category_id"  id="category_id">
                        <option value="#">--Chọn--</option>
                        <?php 
                        $show_category = $product->show_category();
                        if($show_category) {
                            while($result = $show_category ->fetch_assoc()){
                        ?>
                        <option <?php if($resultA['category_id'] == $result['category_id']){echo "SELECTED";} ?> value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                        <?php 
                            }}
                        ?>
                    </select>
                    <label for="">Chọn loại sản phẩm <span style="color: red;">*</span> </label>
                    <select name="categoryItem_id" id="categoryItem_id">
                        <option value="#">--Chọn--</option>
                        <?php 
                        $show_category = $product->show_category();
                        if($show_category) {
                            while($result = $show_category ->fetch_assoc()){
                        ?>
                        <option <?php if($resultA['category_id'] == $result['category_id']){echo "SELECTED";} ?> value="<?php echo $resultA['categoryItem_id'] ?>"><?php echo $resultA['categoryItem_name'] ?></option>
                        <?php 
                            }}
                        ?>
                    </select>
                    <label for="">Giá sản phẩm <span style="color: red;">*</span> </label>
                    <input name="product_price" required type="text" value="<?php echo $resultA['product_price']?>">
                    <label for="">Giá khuyến mãi <span style="color: red;">*</span> </label>
                    <input name="product_price_new" required type="text" value="<?php echo $resultA['product_price_new']?>">
                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span> </label>
                    <textarea name="product_desc" required name="" id="" cols="30" rows="10" ><?php echo $resultA['product_desc']?></textarea>
                    <label for="">Ảnh sản phẩm <span style="color: red;">*</span> </label>
                    <span style="color: red;"><?php if(isset($insert_product)) {
                        echo ($insert_product);
                    } ?></span>
                    <input name="product_img" required type="file" >
                    <label for="">Ảnh mô tả <span style="color: red;">*</span> </label>
                    <input name="product_img_desc[]" required multiple type="file">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $("#category_id").change(function() {
                var x = $(this).val()
                $.get("productAdd_Ajax.php",{category_id:x}, function(data) {
                    $("#categoryItem_id").html(data);
                })
            })
        })
    </script>
</body>
</html>