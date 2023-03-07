<?php
    $mysqli = new mysqli("localhost", "root", "", "csdl_webtmdt");
    if($mysqli -> connect_errno) {
        echo "Kết nối mysqli bị lỗi ". $mysqli-> connect_error;
        exit();
    }


?>