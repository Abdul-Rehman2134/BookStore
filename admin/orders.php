<!-- Header -->
<?php include('layout/header.php');
 $query = "SELECT U.id AS id, U.name AS `name`, COUNT(o.id) AS totalItems, SUM(O.total_amount) AS totalAmount
 FROM users U
 JOIN orders O ON U.id = O.user_id
 GROUP BY u.name";
 $database = new Database();
 $orders = $database->query($query);
 $database->close();
?>


<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="text-dark"><i class="fa fa-user-circle-o"></i><b> Users</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customers Name</th>
                        <th>Total Orders</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $indes=>$order):?>
                    <tr>
                        <td class="text-danger"><b><?= $indes+1 ?></b></td>
                        <td class="text-uppercase"><?= $order['name'] ?></td>
                        <td><?= $order['totalItems'] ?></td>
                        <td><?= $order['totalAmount'] ?></td>
                        <td><a href="../order.php?id=<?= $order['id'] ?>">View</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>