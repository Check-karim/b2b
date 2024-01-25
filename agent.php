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

<?php if(isset($_GET['action']) && $_GET['action'] == 'edit-agent' ) { $agentID = $_GET['id'] ?>
    <div class="container">
        <div class="row justify-content-around0">
            <div class="col mt-4">
                <h2 class='p-4'>Edit Agent</h2>
            </div>
        </div>
        <?php 
            $sql_e = "SELECT * FROM Users WHERE id='$agentID'";
            $res_u = mysqli_query($conn, $sql_e);
            $row = mysqli_fetch_object($res_u);

        ?>
        <div class="row justify-content-around">
            <div class="col-6">
                        <ul id="msg_error_update_agent" class='text-center error_list'></ul>
                        <form>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Email</label>
                                <input value='<?php echo $row->email ?>' type="email" class="form-control" id="update_agent_email"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Username</label>
                                <input disabled value='<?php echo $row->username ?>' type="text" class="form-control" id="update_agent_username"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="login_username" class="form-label">Phone Number</label>
                                <input value='<?php echo $row->phone ?>' type="number" class="form-control" id="update_agent_phone"
                                    placeholder='0788995882'>
                            </div>

                            <div class="mb-3 text-center">
                                <a class='btn btn-danger' id='' href="./agent.php?page=Agent">Cancel </a>
                                <button class='btn btn-success' id='update_agent_btn' type="submit">Update Order</button>
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
<?php } ?>


<?php require_once('./views/footer.php') ?>