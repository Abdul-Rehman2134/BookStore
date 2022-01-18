<?php include "data/connection.php";
    $name = $_POST['author'];
    $query = "INSERT INTO authors (`name`) VALUES( '$name')";
    $database = new Database();
    $book = $database->query($query);
    $database->close();
    header('Location: authors.php');
