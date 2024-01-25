<?php 
$title = 'Login';
?>
<?php require_once('./views/header.php') ?>
<div class="container-fluid bg-black" style='padding-bottom: 10%'>
    <div class="row mb-5 pb-5 pt-5">
            <div class="row text-center justify-content-around">
                <h3 class='text-center'>Welcome To B2B</h3>
                <div class="col-md-4">
                    <ul id="msg_error_login" class='text-center error_list'></ul>
                    <form>
                        <div class="mb-3">
                            <label for="login_username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="login_username" aria-describedby="emailHelp">
                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                        <div class="mb-3">
                            <label for="login_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="login_password">
                        </div>
                        <div class="text-center">
                            <button type="submit" id='login-btn' class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
<?php require_once('./views/footer.php') ?>