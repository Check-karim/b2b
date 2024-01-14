<div class="container">
    <div class="row">
        <div class="col text-center">
            <?php print date('Y') ?> &copy; B2B
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('.myTable_player').DataTable({
            "pageLength": 5,
            "paging": false,
            "scrollCollapse": true,
            "scrollY": '40vh'
        });
    });
</script>
<script src="./public/js/login.js"></script>
<script src="./public/js/logout.js"></script>
<script src="./public/js/add_agent.js"></script>
<script src="./public/js/add_business.js"></script>
</body>

</html>