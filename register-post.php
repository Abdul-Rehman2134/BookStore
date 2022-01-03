<?Php include "assets/data/connection.php";

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['type']) && !empty($_POST['confirmpassword'])) {
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $cnfPass = $_POST['confirmpassword'];
    if ($pass === $cnfPass) {
        $query = "INSERT INTO users (`name`,`email`,`password`,`type`)  VALUES ('$name','$email','$pass','$type')";
        $database = new Database();
        $user = $database->insert($query);
        $database->close();

        if ($user === TRUE) {
            session_start();
            $_SESSION['user'] = $_POST;
            $_SESSION['user']['id'] = $database->getLastId();
            header('Location:Login.php');
        } else {
            header('Location:register.php?err=email%20is%20already%20register%20please%20login');
        }
    } else {
        header("Location: register.php?msg=confirm%20Password%20is%20incorrext");
    }
} else {
    header('Location:register.php');
}
