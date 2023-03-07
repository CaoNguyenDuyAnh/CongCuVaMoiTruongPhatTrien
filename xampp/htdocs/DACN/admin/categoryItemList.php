<?php
include "header.php";
include "slider.php";
include "class/categoryItem_class.php";
?>

<?php
$categoryItem = new categoryItem;
$show_categoryItem = $categoryItem -> show_categoryItem();
?>

<div class="admin-content-right">
        <div class="admin-content-right-category_list">
            <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên Danh mục</th>
                        <th>Danh mục</th>
                        <th>Tùy chọn</th>

                    </tr>
                    <?php
                        if($show_categoryItem) { 
                           $i = 0; 
                            while($result = $show_categoryItem->fetch_assoc()) { 
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['categoryItem_id'] ?></td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td><?php echo $result['categoryItem_name'] ?></td>
                        <td>
                            <a href="categoryItemEdit.php?categoryItem_id=<?php echo  $result['categoryItem_id'] ?>">Sửa</a>
                            <a href="categoryItemDelete.php?categoryItem_id=<?php echo  $result['categoryItem_id'] ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
        </div>
        </div>
    </section>
</body>
</html>