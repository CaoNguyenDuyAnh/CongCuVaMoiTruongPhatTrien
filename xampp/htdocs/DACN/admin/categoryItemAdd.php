<?php
include "header.php";
include "slider.php";
include "class/categoryItem_class.php";
?>

<?php
$categoryItem = new categoryItem;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $categoryItem_name = $_POST['categoryItem_name'];
    $insert_categoryItem = $categoryItem ->insert_categoryItem($category_id, $categoryItem_name);
}   
?>

<style>
    select {
        height: 30px;
        width: 200px;
    }
</style>

<div class="admin-content-right">
            <div class="admin-content-right-category_add">
                <h1>Thêm loại danh mục</h1> <br>
                <form action="" method="POST">
                    <select name="category_id" id="">
                        <option value="#">--Chọn danh mục</option>
                        <?php 
                            $show_category = $categoryItem -> show_category();
                            if($show_category) {
                                while($result = $show_category -> fetch_assoc()) {

                                
                        ?>
                        <option value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                        <?php 
                                }
                            }
                        ?>
                    </select> <br>
                    <input name="categoryItem_name" type="text" placeholder="Nhập loại danh mục">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>