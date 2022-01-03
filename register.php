<?php include "header.php"; ?>

<link rel="stylesheet" href="assets/style/register.css">


<div class="main">
    <center>
        <div class="title">
            Register
        </div>
    </center>
    <form class="row" action="register-post.php" method="POST">

        <label class="text" for="">Full Name:</label>
        <a class="input">
            <button class="icone" type=""><i class="fas fa-comment-alt"> </i></button>
            <input class="un" type="text" name="name" placeholder="Full Name">
        </a>

        <label class="text" for="">Email:</label>
        <a class="input">
            <button class="icone" type=""><i class="fas fa-envelope"></i></button>
            <input class="un" type="email" name="email" placeholder="Email"> <br>
        </a>

        <label class="text" for="">Password:</label>
        <a class="input">
            <button class="icone" type=""><i class="fas fa-key"></i></button>
            <input class="un" type="text" name="password" placeholder="Password">
            <br>
            <i style="position: relative; bottom: 52px; left: 20%; " class="fas fa-eye"></i>
        </a>

        <label class="text" for="">Confirm Password:</label>
        <a class="input">
            <button class="icone" type=""><i class=" fas fa-key"></i></button>
            <input class="un" type="text" name="confirmpassword" placeholder="Repeat password">
            <br>
            <i style="position: relative; bottom: 52px; left: 20%; " class="fas fa-eye"></i>
        </a>
        <select class="select" type="select" name="type">
            <option value="ADMIN">ADMIN</option>
            <option value="CUSTOMER">CUSTOMER</option>
        </select>
        <center>
            <button type="submit" class="submit success">register</button>
        </center>
    </form>
</div>

<?php include "footer.php"; ?>