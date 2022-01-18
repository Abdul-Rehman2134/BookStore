<!-- Header -->
<?php include('layout/header.php');
 $query = "SELECT * FROM authors ";
 $database = new Database();
 $authors = $database->query($query);
 $database->close();
 if (isset($_GET['msg'])) {
    echo "<script>alert('{$_GET['msg']}');
    window.location.href = 'authors.php'</script>";
}
?>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="text-dark"><i class="fa fa-user"></i><b> Authors</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i> <span>Add New Author</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($authors as $author):?>
                    <tr>
                        <td></td>
                        <td class="text-danger"><b><?= $author['id'] ?></b></td>
                        <td class="text-capitalize"><?= $author['name'] ?></td>
                        <td>
                                <!-- Edit Icon -->
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"
                                data-id="<?= $author['id'] ?>"
                                data-name="<?= $author['name'] ?>">
                                <i class="material-icons"data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                                <!-- Delete Icon -->
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"
                                data-id="<?= $author['id'] ?>"
                                data-name="<?= $author['name'] ?>">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  action="author_create.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Author</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="author" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="author_edit.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Author</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input  id="a_name" name="a_name" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="a_id" id="a_edit_id" value="">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="author_delete.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Author</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small id="del_auth"></small></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="a_del_id" id="a_del_id" value="">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'layout/footer.php';?>
<script>
// on clik Delete Icon
$('.delete').click(function() {
    $('#a_del_id').val($(this).data('id'));
    $('#del_auth').text($(this).data('name'));
    //set href for cancel button
})
// on clik Edit Icon
$('.edit').click(function(){
    $('#a_edit_id').val($(this).data('id'));
    $('#a_name').val($(this).data('name'));
    //set href for cancel button
})
</script>