<?php 
include "data/connection.php";
$id = $_POST['a_del_id'];
$database = new Database();
$book_query="SELECT * from books where auther_id = $id";
$books = $database->query($book_query);
if(count($books) > 0){
    header('Location: authors.php?msg=This author not deleted because its have books.');
    exit;
}

$query="DELETE from authors where id=$id";
$author = $database->query($query);
$database->close();
header('Location: authors.php');