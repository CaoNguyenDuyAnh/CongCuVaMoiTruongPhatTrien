<?php
include "database.php";
?>

<?php

class categoryItem {
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }
    public function insert_categoryItem($category_id, $categoryItem_name) {
        $query = "INSERT INTO tbl_categoryItem (category_id, categoryItem_name) VALUES ('$category_id', '$categoryItem_name')";
        $result = $this ->db->insert($query);
        header('location:categoryItemList.php');
        return $result;
    }

    public function show_category() {
        $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
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

    public function get_categoryItem($categoryItem_id) {
        $query = "SELECT * FROM tbl_categoryItem WHERE categoryItem_id = '$categoryItem_id'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function update_categoryItem($category_id, $categoryItem_name, $categoryItem_id) {
        $query = "UPDATE tbl_categoryItem SET categoryItem_name = '$categoryItem_name',category_id = '$category_id' WHERE categoryItem_id = '$categoryItem_id'";
        $result = $this ->db->update($query);
        header('location:categoryItemList.php');
        return $result;
    }
    public function delete_categoryItem($categoryItem_id) {
        $query = "DELETE FROM tbl_categoryItem WHERE categoryItem_id = '$categoryItem_id'";
        $result = $this ->db->delete($query);
        header('location:categoryItemList.php');
        return $result;
    }
}

?>