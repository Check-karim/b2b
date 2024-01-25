<?php require_once('./views/header.php') ?>
<?php
$user = '';
if(!isset($_COOKIE['user'])){
    header("Location: ./login.php");
}else{
    $user = $_COOKIE['user'];
}
$ID = '';
if(!empty($user)){
    include('./DB/DB.php');
    $getID = "SELECT id FROM Users WHERE username='".$user."' AND accountType='0' ";
    $run_getID = mysqli_query($conn, $getID);
    while ($row_getID = mysqli_fetch_assoc($run_getID)) {
        $ID = $row_getID['id'];
    }
}
?>
<?php require_once('./views/nav.php') ?>

<?php if(isset($_GET['action']) && $_GET['action'] == 'edit-order' ) { $orderID = $_GET['id'] ?>
    <div class="container">
        <div class="row">
            <h2 class='p-4'>UPDATE ORDER</h2>
            <hr />
            <?php 
                $sql_e = "SELECT * FROM Orders WHERE rowid='$orderID'";
                $res_u = mysqli_query($conn, $sql_e);
                $row = mysqli_fetch_object($res_u);
            ?>
            <div class="row justify-content-around">
            <div class="col-6">

                <div class="mb-3">
                    <label for="update_order_state" class='form control'>Update State of Order</label>
                    <select id='update_order_state' class="form-select" aria-label="Default select example">
                        <?php 
                            $getUser = "select * from  State ";

                            $run_getUser = mysqli_query($conn, $getUser);
                            while ($row_getUser = mysqli_fetch_assoc($run_getUser)) {
                                if($row->status == $row_getUser['status']){
                                    echo "<option value='".$row_getUser['status']."' selected>".$row_getUser['status']."</option>";
                                }else{
                                    echo "<option value=".$row_getUser['status'].">".$row_getUser['status']."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="update_order_business" class='form control'>Busines Name</label>
                    <select disabled id='update_order_business' class="form-select" aria-label="Default select example">
                        <option > Select Business </option>
                        <?php 
                            $getUser = "select * from  Business ";
                            $run_getUser = mysqli_query($conn, $getUser);
                            while ($row_getUser = mysqli_fetch_assoc($run_getUser)) {

                                if($row->businessId == $row_getUser['id']){
                                    echo "<option value='".$row_getUser['id']."' selected > ".$row_getUser['username']."</option>";
                                }else{
                                    echo "<option value='".$row_getUser['id']."' > ".$row_getUser['username']."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="create_order_product" class='form control'>Product Name</label>
                    <select disabled id='update_order_product' class="form-select" aria-label="Default select example">
                        <option value='' selected>Select Product</option>
                        <?php 
                            $getUser = "select * from  Product ";

                            $run_getUser = mysqli_query($conn, $getUser);
                            while ($row_getUser = mysqli_fetch_assoc($run_getUser)) {
                                if($row->productId == $row_getUser['rowid']){
                                    echo "<option value='".$row_getUser['rowid']."' selected>".$row_getUser['ref']."</option>";
                                }else{
                                    echo "<option value=".$row_getUser['rowid'].">".$row_getUser['ref']."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="update_order_qty" class='form control'>Product QTY</label>
                    <input disabled value="<?php echo $row->qty ?>" class="form-control" id='update_order_qty' type='number' placeholder='Add Qty' />
                </div>

                <div class="mb-3">
                    <label for="update_order_agentId" class='form control'>Agent Name</label>
                    <select disabled id='update_order_agentId' class="form-select" aria-label="Default select example">
                        <option value='' selected>Select Product</option>
                        <?php 
                            $getUser = "select * from  Users ";

                            $run_getUser = mysqli_query($conn, $getUser);
                            while ($row_getUser = mysqli_fetch_assoc($run_getUser)) {
                                if($row->agentId == $row_getUser['id']){
                                    echo "<option value='".$row_getUser['id']."' selected>".$row_getUser['username']."</option>";
                                }else{
                                    echo "<option value=".$row_getUser['id'].">".$row_getUser['username']."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="update_order_date" class='form control'>Date of creation</label>
                    <input disabled class="form-control" id='update_order_date' type='datetime' value='<?php echo $row->date; ?>' />
                </div>

                <div class="mb-3" style='display: none;'>
                    <input class="form-control" id='update_order_ID' type='number' value='<?php echo $orderID; ?>' />
                </div>
                <div class="mb-3 text-center">
                    <a class='btn btn-danger' id='' href="./">Cancel </a>
                    <button class='btn btn-success' id='update_order_btn' type="submit">Update Order</button>
                </div>
                <div class="mb-4 text-center m-3">
                    <ul id="msg_error_update_order" class='text-center error_list'></ul>
                </div>
            </div>
        </div>

        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="row">
                <h2 class='p-4'>Hello <?php print $user; ?> !</h2>
                <hr />
                
                <div class="row mt-5">
                    <div class="col">
                        <table class="table myTable_player">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Business</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Agent</th>
                                    <th scope="col">Status</th>
                                    <?php 
                                        if($user == 'admin'){
                                            echo '<th scope="col">ACTION</th>';
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    require_once('./request/show_order.php');
                                    show_order($conn, $ID);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
<?php } ?>
<?php require_once('./views/footer.php') ?>