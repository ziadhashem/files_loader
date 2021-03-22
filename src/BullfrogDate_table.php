<?php
include_once(__DIR__.'/header.php');
?>
<div class="grid-panel">
    <div class="well well-lg">
        <div class="row">
            <table class="table" id="grid">
                <thead>
                <tr>
                    <th>#</th>
                    <th>FIRST_NAME</th>
                    <th>LAST_NAME</th>
                    <th>SHIPPING_ADDRESS1</th>
                    <th>SHIPPING_ADDRESS2</th>
                    <th>CITY</th>
                    <th>STATE</th>
                    <th>ZIP</th>
                    <th>HASHED_EMAIL</th>
                    <th>PHONE</th>
                    <th>REAL_EMAIL</th>
                    <th>NUMBER_OF_ORDERS</th>
                    <th>VALUE_OF_ORDERS</th>
                    <th>NOTES</th>
                    <th>other notes</th>
                </tr>
                </thead>
<!--                <tbody>-->
<!--                --><?php
//                $con = new DB_CONNECT();
//                $result = $con->getMysqli()->query("SELECT * FROM `bullfrog_data`");
//                if($result){
//                    if(mysqli_num_rows($result) > 0){
//                        while($row = mysqli_fetch_assoc($result)){
//                            echo  "<tr>";
//                            echo  "<td>".$row['id']."</td>";
//                            echo  "<td>".$row['FIRST_NAME']."</td>";
//                            echo  "<td>".$row['LAST_NAME']."</td>";
//                            echo  "<td>".$row['SHIPPING_ADDRESS1']."</td>";
//                            echo  "<td>".$row['SHIPPING_ADDRESS2']."</td>";
//                            echo  "<td>".$row['CITY']."</td>";
//                            echo  "<td>".$row['STATE']."</td>";
//                            echo  "<td>".$row['ZIP']."</td>";
//                            echo  "<td>".$row['HASHED_EMAIL']."</td>";
//                            echo  "<td>".$row['PHONE']."</td>";
//                            echo  "<td>".$row['REAL_EMAIL']."</td>";
//                            echo  "<td>".$row['NUMBER_OF_ORDERS']."</td>";
//                            echo  "<td>".$row['VALUE_OF_ORDERS']."</td>";
//                            echo  "<td>".$row['NOTES']."</td>";
//                            echo  "<td></td>";
//                            echo  "</tr>";
//                        }
//                    }
//                }
//                ?>
<!--                </tbody>-->
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        let table = $('#grid').DataTable( {
            scrollX: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            ajax: "BullfrogDate_ajax.php"
        });
        $('#breadcrumb').append('<li class="breadcrumb-item active" aria-current="page">Bullfrog Data</li>');
    });
</script>
<?php
include_once(__DIR__.'/footer.php');
?>
