<?php
    $sql_sua_danhmucsp = "SELECT * FROM tbl_category WHERE id_danhmuc = '$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
?>


<h1 >Sửa danh mục sản phẩm</h1>
<table >
  <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
    <?php   while($dong = mysqli_fetch_array($query_sua_danhmucsp)){?>
    <tr>
      <td>Tên danh mục</td>
      <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name ="tendanhmuc"></td>
    </tr>
    <tr>
      <td>Thứ tự</td>
      <td><input type="text" value="<?php echo $dong['thutu'] ?>" name ="thutu"></td>
    </tr>
    <tr>
      <td><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm" style="padding-left:0, margin-top:0"></td>
    </tr>
    <?php } ?>
  </form>
</table>