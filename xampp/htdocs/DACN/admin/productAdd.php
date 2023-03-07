<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>

<?php 
$product = new product;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $insert_product = $product ->insert_product($_POST, $_FILES);
} 
?>

<div class="admin-content-right">
<div class="admin-content-right-product_add">
                <h1>Sửa sản phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span> </label>
                    <input name="product_name" required type="text">
                    <label for="">Chọn danh mục <span style="color: red;">*</span> </label>
                    <select name="category_id"  id="category_id">
                        <option value="#">--Chọn--</option>
                        <?php 
                        $show_category = $product->show_category();
                        if($show_category) {
                            while($result = $show_category ->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                        <?php 
                            }}
                        ?>
                    </select>
                    <label for="">Chọn loại sản phẩm <span style="color: red;">*</span> </label>
                    <select name="categoryItem_id" id="categoryItem_id">
                        <option value="#">--Chọn--</option>
                        
                    </select>
                    <label for="">Giá sản phẩm <span style="color: red;">*</span> </label>
                    <input name="product_price" required type="text">
                    <label for="">Giá khuyến mãi <span style="color: red;">*</span> </label>
                    <input name="product_price_new" required type="text">
                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span> </label>
                    <textarea name="product_desc" required name="" id="" cols="30" rows="10"></textarea>
                    <label for="">Ảnh sản phẩm <span style="color: red;">*</span> </label>
                    <span style="color: red;"><?php if(isset($insert_product)) {
                        echo ($insert_product);
                    } ?></span>
                    <input name="product_img" required type="file" >
                    <label for="">Ảnh mô tả <span style="color: red;">*</span> </label>
                    <input name="product_img_desc[]" required multiple type="file">
                    <button type="submit">Thêm</button>
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