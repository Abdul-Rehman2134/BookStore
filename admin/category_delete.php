<?php 
include "data/connection.php";
$id = $_POST['c_del_id'];
$database = new Database();
$book_query="SELECT * from books where category_id=$id";
$books = $database->query($book_query);
if(count($books) > 0){
    header('Location: categories.php?msg=This category not deleted because its have books.');
    exit;
}

$query="DELETE from categories where id=$id";
$category = $database->query($query);
$database->close();
header('Location: categories.php');