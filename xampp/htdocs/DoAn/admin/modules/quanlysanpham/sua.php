<?php
    $sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
?>


<h1 >Sửa sản phẩm</h1>
<table >
  <?php while($row = mysqli_fetch_array($query_sua_sp)) {?>
  <form method="POST" action="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data" >
    <tr>
      <td>Mã sản phẩm</td>
      <td><input type="text" value="<?php echo $row['masanpham'] ?>" name ="masp"></td>
    </tr>
    <tr>
      <td>Tên sản phẩm</td>
      <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name ="tensp"></td>
    </tr>
    <tr>
      <td>Hình ảnh sản phẩm</td>
      <td>
        <input type="file"  name ="hinhanh">
        <img  src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="" style="height:180px">
      </td>

    </tr>
    <tr>
      <td>Giá sản phẩm</td>
      <td><input type="text"value="<?php echo $row['gia'] ?>" name ="giasp"></td>
    </tr>
    <tr>
      <td>Số lượng</td>
      <td><input type="text"value="<?php echo $row['soluong'] ?>" name ="soluong"></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><textarea rows="10" name ="noidung"><?php echo $row['noidung'] ?></textarea></td>
    </tr>
    <tr>
      <td>Tóm tắt</td>
      <td><textarea rows="10" name ="tomtat"><?php echo $row['tomtat'] ?></textarea></td>
    </tr>
    <tr>
      <td>Danh mục sản phẩm</td>
      <td>
        <select name="danhmuc">
          <?php 
          $sql_danhmuc = "SELECT * FROM tbl_category ORDER BY id_danhmuc DESC";
          $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
          while($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
            if($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']){
          ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
          <?php }else {?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
          <?php
          }
        }
          
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Tình trạng</td>
      <td>
        <select name="tinhtrang">
          <?php if($row['tinhtrang']== 1) {

          ?>
          <option selected value="1">Kích hoạt</option>
          <option value="0">Ẩn</option>
          <?php }else{ ?>
          <option value="1">Kích hoạt</option>
          <option selected value="0">Ẩn</option>
            <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="suasanpham" value="Sửa sản phẩm" style="padding-left:0, margin-top:0"></td>
    </tr>
  </form>
  <?php }?>

</table>