<?php include "data/connection.php";
if (isset($_POST['submit'])) {
    $name = $_POST['book_name'];
    $image = $_POST['image'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $query = "INSERT INTO books (`name` , `image`, auther_id, category_id, price, `discreption`) VALUES( '$name', '$image', $author, $category, $price, '$description')";
    $database = new Database();
    $book = $database->query($query);
    $database->close();
    header('Location: index.php');
}
