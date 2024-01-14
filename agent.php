<?php require_once('./views/header.php') ?>
<?php require_once('./views/nav.php') ?>

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
        <div class="col">
            <table class="table myTable_player">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once('./views/footer.php') ?>