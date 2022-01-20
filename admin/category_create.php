<?php include "data/connection.php";
    $name = $_POST['category'];
    $query = "INSERT INTO categories (`name`) VALUES( '$name')";
    $database = new Database();
    $book = $database->query($query);
    $database->close();
    header('Location: categories.php');
