<?php
include "header.php";
$query = "SELECT B.id AS id, B.name AS `name`, A.`name` AS author, B.image AS image, B.price AS price  FROM books B
 JOIN authors A ON A.id=B.auther_id order by B.id DESC limit 5";
$database = new Database();
$books = $database->query($query);
$database->close();
?>

<!-- slider start -->
<div class="slideshow-container">
    <div class="mySlides fade">
        <img class="sl-img" src="assets/image/s4.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img class="sl-img" src="assets/image/s6.jpg" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
</div>
<!-- slider end -->
<div class="h">
    <div class="h1">
        <div class="hm">
            <img class="hm_img" src="assets/image/h1.png" alt="">
        </div>
        <div class="hm">
            <img class="hm_img" src="assets/image/h2.png" alt="">
        </div>
        <div class="hm">
            <img class="hm_img" src="assets/image/h3.png" alt="">
        </div>
    </div>
</div>
<div style="margin-top:20px;">
    <div>
        <center>
            <h1>Top interesting</h1>

            <p>Browse the collection of our best selling and top interresting products.<br>
                ll definitely find what you are looking for..</p>
        </center>
    </div>
</div>
<div>
    <ul class="book">
        <li class="link"><a href="">NEW ARRIVAL</a></li>
        <li class="link"><a href="">ONSALE</a></li>
        <li class="link"><a href="">FEATURED PRODUCTS</a></li>
    </ul>
</div>

<div class="carts">
    <div class="cards">
        <?php foreach ($books as $book) {
        ?>
        <div class="card">
            <a href="book-details.php?id=<?= $book['id'] ?>">
                <img src="<?= $book['image'] ?>" alt="Sample photo">
            
                    <h5><?= substr($book['name'], 0, 20) . " ... "  ?></h5>
                    <p>Author__<?= $book['author'] ?></p>
                    <h5 class="num">$<?= $book['price'] ?></h5>
            </a>
            <label for="name">QTY</label>
            <form action="cart-post.php" method="POST">
                <input type="hidden" name="id" value="<?= $book['id'] ?>">
                <input type="hidden" name="name" value="<?= $book['name'] ?>">
                <input type="hidden" name="author" value="<?= $book['author'] ?>">
                <input class="box" name="qty" type="number" value="1">
                <input type="hidden" name="price" value="<?= $book['price'] ?>">
                <button class="button">Add To Cart</button>
            </form>
            
        </div>
        <?php  } ?>
    </div>
</div>
</div>
</div>
<h1 class="h">Author of the Month</h1>
<div class="man">
    <div class="pr">
        <h2>Khaled Hosseini</h2>
        <p>Hosseini was born in Kabul, Afghanistan, in 1965. His
            Father Worked For The Embassy Of Afghanistan In Tehran,
            Iran. He Is Currently A Goodwill Envoy For The United Nations High
            Commissioner For Refugees (UNHCR) Has been Working To Provide Humanitarian
            Assistance In Afghanistan Through The Khaled Hosseini Foundation.</p>
    </div>
    <div>
        <img height="170" width="170" src="assets/image/logo.png" alt="">
    </div>
    <div>
        <div class="logo3">
            <img height="110" width="110" src="assets/image/logo1.png" alt="">
        </div>

        <div class="logo3">
            <img height="110" width="110" src="assets/image/logo2.png" alt="">
        </div>
        <div class="logo3">
            <img height="110" width="110" src="assets/image/logo3.png" alt="">
        </div>
    </div>

</div>
<?php
include "footer.php";
?>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    var intervalId = window.setInterval(function () {
        showSlides(slideIndex += 1);
    }, 5000)


    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }


    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>

</body>

</html>