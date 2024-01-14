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
                <li class="nav-item">
                    <a class="nav-link <?php $title == 'Orders' ? print 'active' : print '' ?>" aria-current="page"
                        href="./">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php $title == 'Business' ? print 'active' : print '' ?>" aria-current="page"
                        href="./business.php?page=Business">Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php $title == 'Agent' ? print 'active' : print '' ?>" aria-current="page"
                        href="./agent.php?page=Agent">Agent</a>
                </li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-success" id='logout-user' type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>