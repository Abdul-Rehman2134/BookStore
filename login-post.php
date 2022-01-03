<?php include "assets/data/connection.php";

if(!empty($_POST['user']) && !empty($_POST['password']))
{   
$email=$_POST['user'];
$pass=$_POST['password'];

$query="SELECT * FROM users WHERE email = '$email' AND `password`='$pass'";
$database = new Database();
$user = $database->query($query);
$database->close();

if(count($user) === 1)
{
    session_start();
    $_SESSION['user'] = $user[0];
    if($_SESSION['user']['type'] === 'ADMIN')
    {
        header('Location:admin/');
    }
    else
    {
        header('Location:index.php');
    }

}else
    {
        header('Location:login.php?err=incorect your email or password');
    }
}
