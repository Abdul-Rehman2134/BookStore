<?php  include "header.php";
$query = "SELECT * FROM orders WHERE user_id = ";
if(isset($_GET['id'])){
    $query = $query.$_GET['id'];
     }else{
        $query = $query.$_SESSION['user']['id'];
     };
// echo $query;exit;
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
        <?php if (!isset($orders) || empty($orders)){?>
        <tr class="trdEmpty">
            <td>
                <p><b><i><?='You have not any orders.please go back and purchase any books. Thanks:)';?></i></b></p>
            </td>
        </tr>
        <?php } else {
        foreach($orders as $index => $order): ?>
        <tr class="trd">
            <td style="color: red;"><b><?= $index + 1 ?></b></td>
            <td><?= $order['quantity'] ?></td>
            <td align="center"><?= $order['total_amount'] ?></td>
            <td align="right"><?= $order['date'] ?></td>
            <td align="right"><a href="order_items.php?id=<?= $order['id'] ?>" class="order_detail">Detail</a></td>
        </tr>
        <?php endforeach;}?>
    </table>
</div>
<?php include "footer.php" ?>