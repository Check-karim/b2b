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


<?php require_once('./views/footer.php') ?>