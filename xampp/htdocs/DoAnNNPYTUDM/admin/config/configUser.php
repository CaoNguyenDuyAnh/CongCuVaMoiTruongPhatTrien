<?php 
    $mysqli = new mysqli("localhost","root", "", "csdl_dacn");
    if($mysqli ->connect_errno) {
        echo "kết nối MySQL lỗi: " . $mysqli -> connect_error;
        exit();
    }


?>