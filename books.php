<?php include "header.php";
$query = "SELECT B.id AS id, B.name AS `name`, A.`name` AS author, B.image AS image, B.price AS price  FROM books B
 JOIN authors A ON A.id=B.auther_id ";
$database = new Database();
$books = $database->query($query);
$database->close();

?>


<div class="search">
    <center>
        <input class="searchbox" type="search" name="" value="" placeholder="Books...... "> <button class="searchboxicon"><i class="fas fa-search"></i></button>
    </center>
</div>
<div class="carts">
    <div class="cards">
        <?php foreach ($books as $book) {
    ?>
            <div class="card">
               <a href="book-details.php?id=<?=$book['id']?>"><img src="<?=$book['image']?>" alt="Sample photo">
                    <h5><?=substr($book['name'], 0, 20) . " ... "?></h5>
                    <p>Author__<?=$book['author']?></p>
                    <h5 class="num">$<?=$book['price']?></h5>
                    </a>
                    <label for="name">QTY</label>
                    <form action="cart-post.php" method="POST">
                        <input type="hidden" name="id" value="<?=$book['id']?>">
                        <input type="hidden" name="name" value="<?=$book['name']?>">
                        <input type="hidden" name="author" value="<?=$book['author']?>">
                        <input class="box" name="qty" type="number" value="1" value="1">
                        <input type="hidden" name="price" value="<?=$book['price']?>">
                        <button class="button">Add To Cart</button>
                    </form>
            </div>
        <?php }?>
    </div>
</div>

<?php include "footer.php"?>