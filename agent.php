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
<?php require_once('./DB/con.php') ?>

<div class="container">
    <div class="row justify-content-around0">
        <div class="col mt-4">
            <h2 class='p-4'>List Of All Agent</h2>
        </div>
        <div class="col mt-4">
            <button class='btn btn-success' data-bs-toggle="modal" data-bs-target="#addAgent">ADD AGENT</button>
        </div>
        <?php require_once('./modal.php') ?>
    </div>
    <div class="row mt-5">
        <?php require('./request/showAgent.php'); ?>
        <div class="col">
            <table class="table myTable_player">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">UserName</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php getAgent($conn); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once('./views/footer.php') ?>