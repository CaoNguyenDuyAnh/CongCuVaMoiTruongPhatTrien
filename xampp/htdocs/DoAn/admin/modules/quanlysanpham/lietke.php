<?php
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham, tbl_category WHERE tbl_sanpham.id_danhmuc = tbl_category.id_danhmuc ORDER BY id_sanpham DESC";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>

<h1>Danh sách sản phẩm</h1>

<table width = 100%>
  <tr>
    <th>ID</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Trạng thái</th>
    <th>Quản lý</th>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_sp)) { $i++;?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['masanpham'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="" style="height:100px"></td>
    <td><?php echo $row['gia'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if ($row['tinhtrang'] == 1) {
      echo 'Kích hoạt';
    }else {
      echo 'Ẩn';
    } ?></td>
    <td>
        <a href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>">Xóa</a> |
         <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham']?>">Sửa</a>
    </td>
  </tr>
    <?php
    }
  ?>
</table>