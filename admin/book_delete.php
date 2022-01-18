<?php 
include "data/connection.php";
$id=$_POST['b_del_id'];
$query="DELETE from books where ID=$id";
$database = new Database();
$book = $database->query($query);
$database->close();;
header('Location: index.php');