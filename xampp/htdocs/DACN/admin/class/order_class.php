<?php
include "database.php";
?>

<?php

class order {
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }

    public function show_category() {
        $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
        $result = $this ->db->select($query);
       return $result;
   }

   public function show_order() {
    $query = "SELECT * FROM tbl_order ORDER BY order_id DESC";
    $result = $this ->db->select($query);
   return $result;
}
   public function show_categoryItem() {
    //  $query = "SELECT * FROM tbl_categoryItem ORDER BY categoryItem_id DESC";
    $query = "SELECT tbl_categoryItem.*, tbl_category.category_name 
                FROM tbl_categoryItem 
                INNER JOIN tbl_category     
                ON tbl_categoryItem.category_id = tbl_category.category_id 
                ORDER BY tbl_categoryItem.categoryItem_id DESC";
     $result = $this ->db->select($query);
    return $result;
    }

    public function show_categoryItem_ajax($category_id) {
        $query = "SELECT * FROM tbl_categoryItem WHERE category_id = '$category_id'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function insert_product() {
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $categoryItem_id = $_POST['categoryItem_id'];
        $product_price = $_POST['product_price'];
        $product_price_new = $_POST['product_price_new'];
        $product_desc = $_POST['product_desc'];
        $product_img = $_FILES['product_img']['name'];
        $filetarget = basename($_FILES['product_img']['name']);
        $filetype = strtolower(pathinfo($product_img, PATHINFO_EXTENSION));
        if(file_exists("uploads/$filetarget")) {
            $alert = "File đã tồn tại";
            return $alert;
        }
        else {
            if ($filetype != "jpg" && $filetype !="png" && $filetype != "jpeg") {
                $alert = "Chỉ chọn file jpg hoặc png hoặc jpeg";
                return $alert;
            }

            else {
                move_uploaded_file( $_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
                $query = "INSERT INTO tbl_product(
                    product_name,
                    category_id,
                    categoryItem_id,
                    product_price,
                    product_price_new,
                    product_desc,
                    product_img) 
                VALUES (
                    '$product_name', 
                    '$category_id',
                    '$categoryItem_id',
                    '$product_price',
                    '$product_price_new',
                    '$product_desc',
                    '$product_img')";
                $result = $this ->db->insert($query);
                if($result) {
                    $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                    $result = $this ->db -> select($query) -> fetch_assoc();
                    $product_id = $result['product_id'];
                    $filename = $_FILES['product_img_desc']['name'];
                    $filetmp = $_FILES['product_img_desc']['tmp_name'];

                    foreach ($filename as $key => $value) {
                        move_uploaded_file( $filetmp[$key],"uploads/".$value);
                        $query = "INSERT INTO tbl_product_img_desc (product_id,product_img_desc) VALUES ('$product_id','$value')";
                        $result = $this ->db->insert($query);
                    }
                }   
            }

        }

        
        // header('location:categoryItemList.php');
        return $result;
    }

    public function  show_product() {
        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }

    public function  get_product_category($category_id) {
        $query = "SELECT *
        FROM tbl_product
        WHERE category_id = $category_id";
        $result = $this ->db->select($query);
        return $result;
    }

    public function  get_product($product_id) {
        $query = "SELECT tbl_product.*, tbl_categoryItem.*
        FROM tbl_product
        INNER JOIN tbl_categoryItem     
        ON tbl_categoryItem.categoryItem_id = tbl_product.categoryItem_id 
        WHERE product_id = $product_id";
        $result = $this ->db->select($query);
        return $result;
    }

    public function update_product($product_name, $category_id,$categoryItem_id, $product_price,$product_price_new,$product_desc, $product_img) {
        move_uploaded_file( $_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
        $product_img = $_FILES['product_img']['name'];
        $query = "UPDATE tbl_product 
        SET product_name = '$product_name',
        category_id = '$category_id',
        categoryItem_id = '$categoryItem_id',
        product_price = '$product_price',
        product_price_new = '$product_price_new',
        product_desc = '$product_desc',
        product_img = '$product_img'
        WHERE categoryItem_id = '$categoryItem_id'";
        $result = $this ->db->update($query);
        header('location:productList.php');
        return $result;
    }
    public function delete_product($product_id) {
        $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this ->db->delete($query);
        header('location:productList.php');
        return $result;
    }
    public function insert_order($user_name, $product_name, $product_price, $user_email, $user_sdt, $user_address) {
        $query = "INSERT INTO tbl_order (user_name, product_name, product_price, user_email, user_sdt, user_address) VALUES ('$user_name','$product_name','$product_price','$user_email','$user_sdt','$user_address')";
        $result = $this ->db->insert($query);
        header("location:thankForm.php?product_name= $product_name");
        return $result;
    }
}

?>