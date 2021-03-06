<?php include "header.php";?>
<link rel="stylesheet" href="assets/style/cart.css">

<!-- Title -->
<center>
  <div class="title">
    Shopping Bag
  </div>
</center>
<div class="tbl">
  <table class="tblCart_items">
    <tr class="tr">
      <th>#</th>
      <th style="width:200px;">Item</th>
      <th>Category</th>
      <th>Quantity</th>
      <th>Unit price</th>
      <th>Total price</th>
      <th>Action</th>
    </tr>
    <?php
$total_quantity = 0;
$total_price = 0;
if (!isset($_SESSION['cartItems']) || empty($_SESSION['cartItems'])) {
    ?>
    <tr class="trdEmpty">
      <td>
      <p><b><i>Your shopping cart is empty.please go back and purchase any books. Thanks:)</i></b></p>
      </td>
    </tr>
    <?php } else {

    foreach ($_SESSION['cartItems'] as $index => $item):
        $total_quantity += $item['qty'];
        $total_price += $item['qty'] * $item['price'];
        ?>
	    <tr class="trd">
      <td style="color: red;"><b><?= $index + 1 ?></b></td>
	      <td style="width:200px;"><?=$item['name']?></td>
	      <td align="center"><?=$item['author']?></td>
	      <td align="center"><?=$item['qty']?></td>
	      <td align="center"><?=$item['price']?></td>
	      <td align="right"><?=$item['qty'] * $item['price']?></td>
	      <td>
	        <form action="removecartItem.php" method="POST">
	          <input type="hidden" name="id" value="<?=$index?>">
	          <button class="submit1 danger" type=""><i class="fas fa-trash-alt"></i>
	        </form>
	      </td>
	    </tr>
	    <?php endforeach;}?>
    <tr class="trh">
      <th>total quantity</th>
      <th><?=$total_quantity?></th>
      <th>total price</th>
      <th><?=$total_price?></th>
      <th>
        <form action="order-post.php" method="POST">
          <input type="hidden" name="total_items" value="<?=$total_quantity?>">
          <input type="hidden" name="total_price" value="<?=$total_price?>">
       <?php if (!empty($_SESSION['user'])) {?>
    <button class="submit success" type="submit" <?=empty($_SESSION['cartItems']) ? 'disabled' : ''?>>Order Now</button>
  <?php } ?>
        </form>
      </th>
    </tr>
  </table>
</div>
<?php include "footer.php";?>