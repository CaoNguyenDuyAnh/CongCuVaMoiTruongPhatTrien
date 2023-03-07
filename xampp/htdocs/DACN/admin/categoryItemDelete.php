<?php
include "class/categoryItem_class.php";
    $categoryItem = new categoryItem;
    $categoryItem_id = $_GET['categoryItem_id'];
    $delete_categoryItem = $categoryItem -> delete_categoryItem($categoryItem_id);
    
?>