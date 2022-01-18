<?php include "data/connection.php";
    $id = $_POST['a_id'];
    $name = $_POST['a_name'];
    $database = new Database();
    $update_auther_query = "UPDATE authors SET `name` = '$name' WHERE id = $id";
    $result = $database->insert($update_auther_query);
    $database->close();
    if ($result === true) {
     header("Location: authors.php");
    } else {
     echo $result;
    }