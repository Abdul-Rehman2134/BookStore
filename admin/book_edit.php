<?php include "data/connection.php";
    $id = $_POST['b_id'];
    $name = $_POST['book_name'];
    $image = $_POST['image'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    $database = new Database();
    $Update_Book_query = "UPDATE books SET `name` = '$name', `image` = '$image', auther_id = $author, category_id = $category, price = $price, `discreption` = '$description' WHERE id = $id";
    //  echo $Update_Book_query;
    $result = $database->insert($Update_Book_query);
    $database->close();
    if ($result === true) {
     header("Location: index.php");
    } else {
     echo $result;
    }