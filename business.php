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
<?php require_once('./DB/DB.php') ?>
<?php if(isset($_GET['action']) && $_GET['action'] == 'edit-businsess' ) { $BusinessID = $_GET['id'] ?>
    <div class="container">
        <div class="row justify-content-around0">
            <div class="col mt-4">
                <h2 class='p-4'>Edit Business</h2>
            </div>
        </div>
        <?php 
            $sql_e = "SELECT * FROM Business WHERE id='$BusinessID'";
            $res_u = mysqli_query($conn, $sql_e);
            $row = mysqli_fetch_object($res_u);

        ?>
        <div class="row justify-content-around">
            <div class="col-6">
                        <ul id="msg_error_update_business" class='text-center error_list'></ul>
                        <form>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Email</label>
                                <input value='<?php echo $row->email ?>' type="email" class="form-control" id="update_business_email"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Username</label>
                                <input disabled value='<?php echo $row->username ?>' type="text" class="form-control" id="update_business_username"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Phone Number</label>
                                <input value='<?php echo $row->phone ?>' type="number" class="form-control" id="update_business_phone"
                                    placeholder='0788995882'>
                            </div>

                            <div class="mb-3 text-center">
                                <a class='btn btn-danger' id='' href="./business.php?page=Business">Cancel </a>
                                <button class='btn btn-success' id='update_business_btn' type="submit">Update Order</button>
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
            <?php if(isset($_GET['action']) && $_GET['action'] == 'delete-businsess' ) { ?>
                <div class="modal fade" id="onLoad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Business Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-around">
                                    <div class="col">
                                        <ul id="msg_error_delete_business" class='text-center error_list'></ul>
                                        <?php 
                                            $sql_e = "SELECT * FROM Business WHERE id='".$_GET['id']."'";
                                            $res_u = mysqli_query($conn, $sql_e);
                                            $row = mysqli_fetch_object($res_u);
                                        ?>
                                        <div class="mb-3">
                                            <h4>
                                                Are you sure you want to delete
                                                <?php echo $row->username; ?>'s Account 
                                            </h4>
                                            <input type='text' id='delete_business_id' value='<?php echo $row->id ?>' style='display:none' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" id='delete_business_btn' class="btn btn-primary">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    window.onload = () => {
                        $('#onLoad').modal('show');
                    }
                </script>
            <?php } ?>
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