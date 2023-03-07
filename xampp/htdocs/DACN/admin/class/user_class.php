<?php
include "database.php";
?>

<?php

class user {
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }
    public function insert_category($category_name) {
        $query = "INSERT INTO tbl_category (category_name) VALUES ('$category_name')";
        $result = $this ->db->insert($query);
        header('location:categoryList.php');
        return $result;
    }

    public function insert_user($user_name, $user_email,$user_pass,$user_address,$user_sdt) {
        $query = "INSERT INTO tbl_user (user_name,user_pass,user_role,user_address,user_email,user_sdt) VALUES ('$user_name','$user_pass','User','$user_address','$user_email','$user_sdt')";
        $result = $this ->db->insert($query);
        return $result;
    }

    public function check_user1($user_email) {
        $query = "SELECT user_email FROM tbl_user WHERE user_email = '$user_email'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function check_user($user_email, $user_pass) {
        $query = "SELECT user_email, user_pass FROM tbl_user WHERE user_email = '$user_email' && user_pass = '$user_pass'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function check_admin($user_email, $user_pass) {
        $query = "SELECT user_role FROM tbl_user WHERE user_email = '$user_email' && user_pass = '$user_pass'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function check_admin1() {
        $query = "SELECT user_role FROM tbl_user WHERE user_role = 'Admin'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_user() {
        $query = "SELECT * FROM tbl_user ORDER BY user_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }

    public function get_user($user_id) {
        $query = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function get_user_email($user_email) {
        $query = "SELECT * FROM tbl_user WHERE user_email = '$user_email'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function get_Sdt_user($user_email) {
        $query = "SELECT user_sdt FROM tbl_user WHERE user_email = '$user_email'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function get_name_user($user_email) {
        $query = "SELECT user_name FROM tbl_user WHERE user_email = '$user_email'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function get_address_user($user_email) {
        $query = "SELECT user_address FROM tbl_user WHERE user_email = '$user_email'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function get_address($user_email) {
        $query = "SELECT user_address FROM tbl_user WHERE user_email = '$user_email'";
        $result = $this ->db->select($query);
        return $result;
    }
    

    public function update_user($user_role, $user_id) {
        $query = "UPDATE tbl_user SET user_role = '$user_role' WHERE user_id = '$user_id'";
        $result = $this ->db->update($query);
        header('location:userList.php');
        return $result;
    }

    public function delete_user($user_id) {
        $query = "DELETE FROM tbl_user WHERE user_id = '$user_id'";
        $result = $this ->db->delete($query);
        header('location:userlist.php');
        return $result;
    }
}

?>