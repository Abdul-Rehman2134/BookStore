<?Php include "assets/data/connection.php";
session_start();
if(empty(!$_SESSION['user'])){
    header("Location: login.php?err=Please login and continue");
}
if (isset($_SESSION['cartItems']) && !empty($_SESSION['cartItems'])) {
    $total_items = $_POST['total_items'];
    $total_price = $_POST['total_price'];
    $user_id = $_SESSION['user']['id'];
    $date = date('Y-m-d');
    $query = "INSERT INTO orders ( user_id , total_amount , quantity, `date`) VALUES( $user_id, $total_price, $total_items, '$date')";
    $database = new Database();
    $database->insert($query);
    $orderId = $database->getLastId();
    foreach ($_SESSION['cartItems'] as $item) {
        $query = "INSERT INTO order_items ( book_id , order_id , quantity, unit_price) VALUES ({$item['id']} , $orderId, {$item['qty']}, {$item['price']})";
        $database->insert($query);
    }
    $database->close();
    unset($_SESSION['cartItems']);
    header("Location:order.php");
}
