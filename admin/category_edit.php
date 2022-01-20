<?php include "data/connection.php";
    $id = $_POST['c_id'];
    $name = $_POST['c_name'];
    $database = new Database();
    $update_category_query = "UPDATE categories SET `name` = '$name' WHERE id = $id";
    $result = $database->insert($update_category_query);
    $database->close();
    if ($result === true) {
     header("Location: categories.php");
    } else {
     echo $result;
    }