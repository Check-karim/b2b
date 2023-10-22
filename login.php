<?php 
$title = 'Login';
?>
<?php require_once('./views/header.php') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <img class='backgroundLogin' src="./public/images/backgroundLogin.jpg" alt="backgroundLogin">
        </div>
        <div class="col-md-8">
            <div class="row">
                <h3 class='text-center'>Welcome</h3>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once('./views/footer.php') ?>