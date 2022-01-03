<?php
session_start();
array_splice($_SESSION['cartItems'], $_POST['id'], 1);
header('Location:cart.php');
