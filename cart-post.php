<?php
session_start();
if (!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['author']) && !empty($_POST['qty']) && !empty($_POST['price'])) {

    $_SESSION['cartItems'][] = $_POST;
    header('Location:cart.php');
}
?>
