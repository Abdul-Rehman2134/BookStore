<?php include "header.php";
$query = "SELECT b.id AS id, b.image AS `image`, b.`name` AS `name`, c.`name` AS category_name, oi.quantity AS qty, oi.unit_price AS price
FROM order_items oi
JOIN books b ON oi.book_id = b.id
JOIN categories c ON c.id = b.category_id
WHERE oi.order_id ={$_GET['id']}";
// echo $query;exit;
$database = new Database();
$ordersItems = $database->query($query);
$database->close();
?>
<!-- Heading -->
<center>
    <div class="title">
        My Orders
    </div>
</center>

<div class="tbl">
    <table class="tblCart_items">
        <tr class="tr">
            <th>#</th>
            <th>Image</th>
            <th>Item</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Action</th>
        </tr>
        <?php foreach($ordersItems as $index => $items): ?>
        <tr class="trd">
            <td><?= $index + 1?></td>
            <td><img style="height: 60px;position: relative; right:20px;" src="<?= $items['image']?>" alt="image"></td>
            <td style="position: relative; right:15px;"><?= $items['name']?></td>
            <td align="left"><?= $items['category_name']?></td>
            <td align="center"><?= $items['qty']?></td>
            <td align="right"><?= $items['price']?></td>
            <td align="right"><a href="book-details.php?id=<?= $items['id'] ?>" class="order_detail"> View</a></td>
        </tr>
        <?php endforeach ?>
    </table>
</div>
<?php include "footer.php" ?>