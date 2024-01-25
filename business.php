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
<?php if(isset($_GET['action']) && $_GET['action'] == 'edit-business' ) { $BusinessID = $_GET['id'] ?>
    <div class="container">
        <div class="row justify-content-around0">
            <div class="col mt-4">
                <h2 class='p-4'>List Of All Business</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                        <ul id="msg_error_create_business" class='text-center error_list'></ul>
                        <form>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Email</label>
                                <input type="email" class="form-control" id="create_business_email"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="create_business_username"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="create_business_phone"
                                    placeholder='0788995882'>
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
                <h2 class='p-4'>List Of All Business</h2>
            </div>
            <div class="col mt-4">
                <button class='btn btn-success' data-bs-toggle="modal" data-bs-target="#addBusiness">ADD BUSINESS</button>
            </div>
            <?php require_once('./modal.php') ?>
        </div>
        <div class="row mt-5">
            <?php require('./request/showBusiness.php'); ?>
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
                        <?php getBussiness($conn); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<?php require_once('./views/footer.php') ?>