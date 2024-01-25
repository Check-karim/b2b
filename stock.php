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
            <h2 class='p-4'>All Stock Inventory</h2>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <?php require_once('./request/show_stock.php') ?>
            <table class="table myTable_player">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Product</th>
                        <th scope="col">Status</th>
                        <th scope="col">Qty </th>
                    </tr>
                </thead>
                <tbody>
                    <?php show_stock($conn); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once('./views/footer.php') ?>