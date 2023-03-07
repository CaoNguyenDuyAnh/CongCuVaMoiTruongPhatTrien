<?php
    include('../../config/config.php');
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $gia = $_POST['giasp'];
    $soluong = $_POST['soluong'];
    $noidung = $_POST['noidung'];
    $tomtat = $_POST['tomtat'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];
    
    if(isset($_POST['themsanpham'])){
        $sql_them = "INSERT INTO tbl_sanpham(masanpham,tensanpham, hinhanh, gia, soluong, noidung, tomtat, tinhtrang, id_danhmuc) 
                    VALUE('".$masp."','".$tensp."','".$hinhanh."','".$gia."','".$soluong."','".$noidung."','".$tomtat."','".$tinhtrang."','".$danhmuc."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    } elseif(isset($_POST['suasanpham'])) {
        if($hinhanh!='') {
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        $sql_update = "UPDATE tbl_sanpham 
                            SET tensanpham='".$tensp."',masanpham='".$masp."',hinhanh='".$hinhanh."',gia='".$gia."',soluong='".$soluong."',noidung='".$noidung."',tomtat='".$tomtat."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' 
                            WHERE id_sanpham='$_GET[idsanpham]'";
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)) {
            unlink('upload/'.$row['hinhanh']);
        }
        } else {
            $sql_update = "UPDATE tbl_sanpham 
                            SET tensanpham='".$tensp."',masanpham='".$masp."',gia='".$gia."',soluong='".$soluong."',noidung='".$noidung."',tomtat='".$tomtat."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."'  
                            WHERE id_sanpham='$_GET[idsanpham]'";
        }
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }else{
        $id = $_GET['idsanpham'];
        $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }


?>