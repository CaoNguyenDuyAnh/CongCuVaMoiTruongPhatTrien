<?php
include "header.php";
include "slider.php";
include "class/order_class.php";
?>

<?php
$order = new order;
$show_order = $order -> show_order();
?>

<div class="admin-content-right">
        <div class="admin-content-right-category_list">
            <h1>Danh sách Order</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ email khách</th>
                        <th>Địa chỉ khách</th>
                        <th>SĐT khách</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                    </tr>
                    <?php
                        if($show_order) { 
                           $i = 0; 
                            while($result = $show_order->fetch_assoc()) { 
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['order_id'] ?></td>
                        <td><?php echo $result['user_name'] ?></td>
                        <td><?php echo $result['user_email'] ?></td>
                        <td><?php echo $result['user_address'] ?></td>
                        <td><?php echo $result['user_sdt'] ?></td>
                        <td><?php echo $result['product_name'] ?></td>
                        <td><?php echo $result['product_price'] ?></td>
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