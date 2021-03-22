<?php
include_once(__DIR__.'/header.php');
?>
<div class="grid-panel">
    <div class="well well-lg">
        <div class="row">
            <table class="table" id="grid">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>city</th>
                    <th>state</th>
                    <th>Zip</th>
                    <th>Order_ID</th>
                    <th>Hashed_email</th>
                    <th>Real_Email</th>
                    <th>Match_type</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        let table = $('#grid').DataTable( {
            // scrollX: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            ajax: "Instant_data_ajax.php"
        });
        $('#breadcrumb').append('<li class="breadcrumb-item active" aria-current="page">Instant Data</li>');
    });
</script>
<?php
include_once(__DIR__.'/footer.php');
?>
