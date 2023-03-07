<?php
$sql_danhmuc = "SELECT * FROM tbl_category ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>

<div class="app__container" style="padding-top: 190px ;">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-2">
                <nav class="category">
                    <h3 class="category__heading">All Departement</h3>
                    <ul class="category-list">
                        <?php
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {

                            ?>
                            <li class="category-item">
                                <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"
                                    class="category-item__link">
                                    <?php echo $row_danhmuc['tendanhmuc'] ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>