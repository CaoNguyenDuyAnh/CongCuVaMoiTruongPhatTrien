<h1 >Thêm sản phẩm</h1>
<table >
  <form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data" >
    <tr>
      <td>Mã sản phẩm</td>
      <td><input type="text" name ="masp"></td>
    </tr>
    <tr>
      <td>Tên sản phẩm</td>
      <td><input type="text" name ="tensp"></td>
    </tr>
    <tr>
      <td>Hình ảnh sản phẩm</td>
      <td><input type="file" name ="hinhanh"></td>
    </tr>
    <tr>
      <td>Giá sản phẩm</td>
      <td><input type="text" name ="giasp"></td>
    </tr>
    <tr>
      <td>Số lượng</td>
      <td><input type="text" name ="soluong"></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><textarea rows="10" name ="noidung"></textarea></td>
    </tr>
    <tr>
      <td>Tóm tắt</td>
      <td><textarea rows="10" name ="tomtat"></textarea></td>
    </tr>
    <tr>
      <td>Danh mục sản phẩm</td>
      <td>
        <select name="danhmuc">
          <?php 
          $sql_danhmuc = "SELECT * FROM tbl_category ORDER BY id_danhmuc DESC";
          $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
          while($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
          ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Tình trạng</td>
      <td>
        <select name="tinhtrang">
          <option value="1">Kích hoạt</option>
          <option value="0">Ẩn</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="themsanpham" value="Thêm sản phẩm" style="padding-left:0, margin-top:0"></td>
    </tr>
  </form>
</table>