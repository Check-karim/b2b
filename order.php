<?php require_once('./views/header.php') ?>
<?php
$user = '';
if(!isset($_COOKIE['user'])){
    header("Location: ./login.php");
}else{
    $user = $_COOKIE['user'];
}
$agentID = '';

if($user){
    require_once('./DB/DB.php');
    $getUser = "select * from  Users where username='".$user."' ";

    $run_getUser = mysqli_query($conn, $getUser);
    while ($row_getUser = mysqli_fetch_assoc($run_getUser)) {
        $agentID =  $row_getUser['id'];
    }
}
?>
<?php require_once('./views/nav.php') ?>

<div class="container">
    <div class="row pb-4">
        <h2 class='p-4'>Create Order</h2>
        <hr />
        <div class="row justify-content-around">
            <div class="col-6">
                <div class="mb-3">
                    <select id='create_order_business' class="form-select" aria-label="Default select example">
                        <option value='' selected>Select Business name</option>
                        <?php 
                            $getUser = "select * from  Business ";

                            $run_getUser = mysqli_query($conn, $getUser);
                            while ($row_getUser = mysqli_fetch_assoc($run_getUser)) {
                                echo "<option value=".$row_getUser['id'].">".$row_getUser['username']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <select id='create_order_product' class="form-select" aria-label="Default select example">
                        <option value='' selected>Select Product</option>
                        <?php 
                            $getUser = "select * from  Product ";

                            $run_getUser = mysqli_query($conn, $getUser);
                            while ($row_getUser = mysqli_fetch_assoc($run_getUser)) {
                                echo "<option value=".$row_getUser['rowid'].">".$row_getUser['ref']."</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <input class="form-control" id='create_order_qty' type='number' placeholder='Add Qty' />
                </div>
                <div class="mb-3" style='display: none;'>
                    <input class="form-control" id='create_order_agentID' type='number' value='<?php echo $agentID; ?>' />
                </div>

                <div class="mb-3 text-center">
                    <button class='btn btn-success' id='create_order_btn' type="submit">Create Order</button>
                </div>
                <div class="mb-4 text-center m-3">
                    <ul id="msg_error_create_order" class='text-center error_list'></ul>
                </div>
            </div>
        </div>

    </div>
</div>
<?php require_once('./views/footer.php') ?>