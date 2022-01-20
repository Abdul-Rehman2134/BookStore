<!-- Header -->
<?php include 'layout/header.php';
if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'admin'){

$books_query = "SELECT B.id AS id,B.image AS `image`, B.name AS `name`, A.`name` AS author,B.price AS price, c.id AS category_id, A.id AS auth_id,c.`name` AS category,b.discreption AS 'description'
 FROM books B
 JOIN authors A ON A.id=B.auther_id
 JOIN categories c ON c.id=B.category_id"
;
$authors_query = "SELECT * from authors";
$categories_query = "SELECT * from categories";
$database = new Database();
$books = $database->query($books_query);
$authors = $database->query($authors_query);
$categories = $database->query($categories_query);
$database->close();
?>


<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="text-dark"><i class="fa fa-book"></i><b> Books</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i> <span>Add New Book</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $index=>$book): ?>
                    <tr>
                        <td class="text-danger"><b><?=$index + 1?></b></td>
                        <td><img height="50px" src="../assets/image/<?=$book['image']?>" alt="image"></td>
                        <td><a href="../book-details.php?id=<?=$book['id']?>"><?=$book['name']?></a></td>
                        <td class="text-capitalize"><?=$book['author']?></td>
                        <td class="text-capitalize"><?=$book['category']?></td>
                        <td><?=$book['price']?></td>
                        <td>
                                <!-- Edit Icon -->
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"
                                data-id="<?=$book['id']?>"
                                data-name="<?=$book["name"];?>"
                                data-price="<?=$book["price"];?>"
                                data-description="<?=$book["description"];?>">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                                <!-- Delete Icon -->
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"
                                data-id="<?=$book['id']?>"
                                data-name="<?=$book["name"];?>">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="book_create.php">
                <div class="modal-header">
                    <h4 class="modal-title">Add Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="book_name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" type="file" class="form-control pb-5"
                            accept="image/png, image/gif, image/jpeg" required>
                    </div>
                    <div class="form-group">
                        <label>Author Name </label>
                        <select name="author" class="form-control">
                            <option value="">Select Author</option>
                            <?php foreach ($authors as $author): ?>
                            <option value="<?=$author['id']?>"><?=$author['name']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                            <option value="<?=$category['id']?>"><?=$category['name']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input name="price" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input name="submit" type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="book_edit.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input value="" id="b_name" name="book_name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" id="b_img" type="file" class="form-control pb-5"
                            accept="image/png, image/gif, image/jpeg" required>
                    </div>
                    <div class="form-group">
                        <label>Author Name </label>
                        <select id="b_author" name="author" class="form-control">
                            <option value="">Select Author</option>
                            <?php foreach ($authors as $author): ?>
                            <option value="<?=$author['id']?>"><?=$author['name']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                            <option id="category" value="<?=$category['id']?>"><?=$category['name']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input value="" id="b_price" name="price" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="b_description" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="b_id" name="b_id" value="">
                    <input type="submit" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <a id="editBook"><input type="submit" class="btn btn-info" value="update"></a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="book_delete.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Book?</p>
                    <p class="text-warning"><small id="del_name"></small>.</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="b_del_id" name="b_del_id" value="">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <a id="delBook"><input type="submit" class="btn btn-danger" value="Delete"></a>
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
    //get cover id
    $('#b_del_id').val($(this).data('id'));
    $('#del_name').text($(this).data('name'));
    //set href for cancel button
})
// on clik Edit Icon
$('.edit').click(function() {
    //get cover id
    $('#b_id').val($(this).data('id'));
    $('#b_name').val($(this).data('name'));

    // $('#b_img').val($(this).data('image'));
    // $('#b_author').val($(this).data('author'));
    // $('#category').val($(this).data('category'));
    // var catId = $(this).data('category');
    // $("#category option[value='"+catId+"']").prop('selected', true)
    // $("select#measure").val(measureId).change();

    $('#b_price').val($(this).data('price'));
    $('#b_description').val($(this).data('description'));
})
</script>
<?php } 
else{
    header('Location: ../login.php');
}
?>