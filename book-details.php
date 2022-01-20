<?php include "header.php";
$query = "SELECT B.id AS id, B.name AS `name`, A.`name` AS author, B.image AS image, B.price AS price, C.name AS category ,B.discreption AS `desc` FROM books B
JOIN authors A ON A.id=B.auther_id join categories C ON B.category_id = C.id WHERE B.id={$_GET['id']}";
$database = new Database();
$books = $database->query($query);
$database->close();
?>
<link rel="stylesheet" href="assets/style/cart.css">
<center>
    <div class="title">
        Products
    </div>
</center>
<div class="containers">
    <div class="rows">
     <?php foreach ($books as $book) {
    ?>
        <div class="items">
            <img width="100%" src="assets/image/<?=$book['image']?>" alt="">
        </div>
        <div class="items">
            <h1><?=$book['name']?></h1>

            <p><b>Author :</b> <?=$book['author']?></p>
            <p><b>Category :</b><?=$book['category']?></p>
            <p><b>Price :</b> Rs. <?=$book['price']?></p>

            <h3>Description</h3>
            <p><?=$book['desc']?></p>

            <form action="cart-post.php" method="POST">
              <input type="hidden" name="id" value="<?=$book['id']?>">
              <input type="hidden" name="name" value="<?=$book['name']?>">
              <input type="hidden" name="author" value="<?=$book['author']?>">
              <input class="box" type="number" name="qty" value="1">
              <input type="hidden" name="price" value="<?=$book['price']?>">
              <button class="button">Add To Cart</button>
            </form>
        </div>
    <?php }?>
    </div>
</div>

<?php include "footer.php"?>