<?php
    require_once('./DB/DB.php');

    $getUser = "select * from  Users where username='".$user."' ";

    $run_getUser = mysqli_query($conn, $getUser);
    $accountType = '';
    while ($row_getUser = mysqli_fetch_assoc($run_getUser)) {
        $accountType =  $row_getUser['accountType'];
    }

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php $title == 'Home' ? print 'active' : print '' ?>" aria-current="page"
                        href="./">Home</a>
                </li>
                <li class="nav-item" style='<?php $accountType == '1' ? print 'display: none;' : print '' ?>'>
                    <a class="nav-link <?php $title == 'Order' ? print 'active' : print '' ?>" aria-current="page"
                        href="./order.php?page=Order">Orders</a>
                </li>
                <li class="nav-item" style='<?php $accountType == '0' ? print 'display: none;' : print '' ?>'>
                    <a class="nav-link <?php $title == 'Business' ? print 'active' : print '' ?>" aria-current="page"
                        href="./business.php?page=Business">Business</a>
                </li>
                <li class="nav-item" style='<?php $accountType == '0' ? print 'display: none;' : print '' ?>'>
                    <a class="nav-link <?php $title == 'Agent' ? print 'active' : print '' ?>" aria-current="page"
                        href="./agent.php?page=Agent">Agent</a>
                </li>
                <li class="nav-item" style='<?php $accountType == '0' ? print 'display: none;' : print '' ?>'>
                    <a class="nav-link <?php $title == 'Products' ? print 'active' : print '' ?>" aria-current="page"
                        href="./products.php?page=Products">Products</a>
                </li>
                <li class="nav-item" style='<?php $accountType == '0' ? print 'display: none;' : print '' ?>'>
                    <a class="nav-link <?php $title == 'Inventory' ? print 'active' : print '' ?>" aria-current="page"
                        href="./stock.php?page=Inventory">Invetory</a>
                </li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-success" id='logout-user' type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>