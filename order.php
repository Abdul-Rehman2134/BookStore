<?php include "header.php";
if (empty($_SESSION['user'])) {
  header('Location:login.php');
}

$query = "SELECT * FROM orders WHERE order.user_id = {$_SESSION['user']['id']}";
$database = new Database();
$orders = $database->query($query);
$database->close();
?>

<center>
  <div class="title">
    My Orders
  </div>
</center>
<div class="tbl order">
  <table class="customers">
    <tr class="tr">
      <th>#</th>
      <th>Date </th>
      <th>Total items</th>
      <th>Total price</th>
      <th>Action</th>
    </tr>
    <?php
    foreach ($orders as $index => $item) {
    ?>
      <tr class="trd">
        <td><?= $index + 1 ?></td>
        <td><?= $item[''] ?></td>
        <td><?= $item['quantity'] ?></td>
        <td><?= $item['quantity'] ?></td>
        <td><button class="submit success" type="submit">View detail</button></td>
      </tr>
    <?php } ?>
  </table>
</div>
<?php include "footer.php" ?>