<?php require_once('./views/header.php') ?>
<?php
$user = '';
if(!isset($_COOKIE['user'])){
    header("Location: ./login.php");
}else{
    $user = $_COOKIE['user'];
}
?>
<?php require_once('./views/nav.php') ?>

<?php if(isset($_GET['action']) && $_GET['action'] == 'edit-product' ) { $productID = $_GET['id'] ?>
    <div class="container">
        <div class="row justify-content-around0">
            <div class="col mt-4">
                <h2 class='p-4'>Edit Product</h2>
            </div>
        </div>
        <?php 
            $sql_e = "SELECT * FROM Product WHERE rowid='$productID'";
            $res_u = mysqli_query($conn, $sql_e);
            $row = mysqli_fetch_object($res_u);

        ?>
        <div class="row justify-content-around">
            <div class="col-6">
                        <ul id="msg_error_update_prod" class='text-center error_list'></ul>
                        <form>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Reference</label>
                                <input disabled value='<?php echo $row->ref ?>' type="email" class="form-control" id="update_prod_ref"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Label</label>
                                <input value='<?php echo $row->label ?>' type="text" class="form-control" id="update_prod_label"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Price</label>
                                <input value='<?php echo $row->price ?>' type="number" class="form-control" id="update_prod_price"
                                    placeholder='RWF'>
                            </div>

                            <div class="mb-3 text-center">
                                <a class='btn btn-danger' id='' href="./products.php?page=Products">Cancel </a>
                                <button class='btn btn-success' id='update_prod_btn' type="submit">Update Product</button>
                            </div>

                        </form>
                    </div>
                </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="row justify-content-around0">
            <div class="col mt-4">
                <h2 class='p-4'>List Of All Products</h2>
            </div>
            <div class="col mt-4">
                <button class='btn btn-success' data-bs-toggle="modal" data-bs-target="#addProduct">Add a Product</button>
            </div>
            <?php require_once('./modal.php') ?>
        </div>
        <div class="row mt-5">
            <?php require('./request/showProduct.php'); ?>
            <div class="col">
                <table class="table myTable_player">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ref</th>
                            <th scope="col">Label</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty in Stock</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php getProduct($conn); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>




<?php require_once('./views/footer.php') ?>