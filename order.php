<?php include "header.php";
$query = "SELECT * FROM orders WHERE user_id = {$_SESSION['user']['id']}";
$database = new Database();
$orders = $database->query($query);
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
            <th>Items</th>
            <th>Total Amount</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php foreach($orders as $index => $order): ?>
        <tr class="trd">
            <td><?= $index + 1 ?></td>
            <td><?= $order['quantity'] ?></td>
            <td align="center"><?= $order['total_amount'] ?></td>
            <td align="right"><?= $order['date'] ?></td>
            <td align="right"><a href="order_items.php?id=<?= $order['id'] ?>" class="order_detail">Deatil</a></td>
        </tr>
        <?php endforeach ?>
    </table>
</div>
<?php include "footer.php" ?>