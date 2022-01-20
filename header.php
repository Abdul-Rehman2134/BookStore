<?php include "assets/data/connection.php";
session_start();
$cartItems = 0;
if (isset($_SESSION['cartItems']) && !empty($_SESSION['cartItems'])) {
    $cartItems = count($_SESSION['cartItems']);
}
?>

<!DOCTYPE html>

<head>
    <title>index</title>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" type="" href="assets/style/cart.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
</head>

<body>
    <!-- header start -->
    <header class="header">
        <h1 class="logo"><a href="#">BookStore <i style="color:#04aa6d;" class="fab fa-opencart"></i></a></h1>
        <ul class="main-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="contactus.php">Contact us</a></li>
            <?php
if (empty($_SESSION['user'])) {
    ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">register</a></li>
            <?php } else {?>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="order.php">My-Orders</a></li>
            <?php }?>
            <li><a href="cart.php" class="icon">Cart<i class="fa fa-shopping-cart">
                        <?php if ($cartItems > 0) {?>
                        <span class='badge badge-warning' id='lblCartCount'><?=$cartItems > 0 ? $cartItems : ''?></span>
                        <?php }?>
                    </i></a>
            </li>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'admin'){?>
            <li class="li_admin"><a href="admin/"><button class="btn_admin">Admin</button></a></li>
            <?php } ?>
        </ul>

    </header>
    <!--header end  -->