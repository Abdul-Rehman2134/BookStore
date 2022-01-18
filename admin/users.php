<!-- Header -->
<?php include('layout/header.php');
 $query = "SELECT * FROM users ";
 $database = new Database();
 $users = $database->query($query);
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
                        <th>Name</th>
                        <th>Type</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user):?>
                    <tr>
                        <td class="text-danger"><b><?= $user['id'] ?></b></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['type'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td class="text-right"><?= $user['password'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>