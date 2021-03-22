<?php
include_once(__DIR__.'/header.php');
?>
<div class="grid-panel">
    <div class="well well-lg">
        <div class="row">
            <table class="table" id="walmart_orders_grid">
                <thead>
                <tr>
                    <th>Order_ID</th>
                    <th>PO_Number</th>
                    <th>Order_Date</th>
                    <th>Shipment_date</th>
                    <th>Delivery_Date</th>
                    <th>Customer_Name</th>
                    <th>Shipping_Address</th>
                    <th>Phone_Number</th>
                    <th>Hashed_Email</th>
                    <th>Shipping_Address1</th>
                    <th>Shipping_Address2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>FLIDS</th>
                    <th>Line_Number</th>
                    <th>UPC</th>
                    <th>Status</th>
                    <th>Product_name</th>
                    <th>Shipping_Method</th>
                    <th>Shipping_Tier</th>
                    <th>item_Quantity</th>
                    <th>SKU</th>
                    <th>Item_Price</th>
                    <th>Shipping_Cost</th>
                    <th>Tax</th>
                    <th>Update_Status</th>
                    <th>Update_Qty</th>
                    <th>Carrier</th>
                    <th>Tracking_Number</th>
                    <th>Tracking_Url</th>
                    <th>Seller_Order_NO</th>
                    <th>Fulfillment_Entity</th>
                    <th>recepient_name</th>
                    <th>First_Name</th>
                    <th>Middle_Name</th>
                    <th>Last_Name</th>
                    <th>Notes</th>
                </tr>
                </thead>
<!--                <tbody>-->
<!--                --><?php
//                $con = new DB_CONNECT();
//                $result = $con->getMysqli()->query("SELECT * FROM `walmart_orders`");
//                if($result){
//                    if(mysqli_num_rows($result) > 0){
//                        while($row = mysqli_fetch_assoc($result)){
//                            echo  "<tr>";
//                            echo "<td>".$row["Order_ID"]."</td>";
//                            echo "<td>".$row["PO_Number"]."</td>";
//                            echo "<td>".$row["Order_Date"]."</td>";
//                            echo "<td>".$row["Shipment_date"]."</td>";
//                            echo "<td>".$row["Delivery_Date"]."</td>";
//                            echo "<td>".$row["Customer_Name"]."</td>";
//                            echo "<td>".$row["Shipping_Address"]."</td>";
//                            echo "<td>".$row["Phone_Number"]."</td>";
//                            echo "<td>".$row["Hashed_Email"]."</td>";
//                            echo "<td>".$row["Shipping_Address1"]."</td>";
//                            echo "<td>".$row["Shipping_Address2"]."</td>";
//                            echo "<td>".$row["City"]."</td>";
//                            echo "<td>".$row["State"]."</td>";
//                            echo "<td>".$row["Zip"]."</td>";
//                            echo "<td>".$row["FLIDS"]."</td>";
//                            echo "<td>".$row["Line_Number"]."</td>";
//                            echo "<td>".$row["UPC"]."</td>";
//                            echo "<td>".$row["Status"]."</td>";
//                            echo "<td>".$row["Product_name"]."</td>";
//                            echo "<td>".$row["Shipping_Method"]."</td>";
//                            echo "<td>".$row["Shipping_Tier"]."</td>";
//                            echo "<td>".$row["item_Quantity"]."</td>";
//                            echo "<td>".$row["SKU"]."</td>";
//                            echo "<td>".$row["Item_Price"]."</td>";
//                            echo "<td>".$row["Shipping_Cost"]."</td>";
//                            echo "<td>".$row["Tax"]."</td>";
//                            echo "<td>".$row["Update_Status"]."</td>";
//                            echo "<td>".$row["Update_Qty"]."</td>";
//                            echo "<td>".$row["Carrier"]."</td>";
//                            echo "<td>".$row["Tracking_Number"]."</td>";
//                            echo "<td>".$row["Tracking_Url"]."</td>";
//                            echo "<td>".$row["Seller_Order_NO"]."</td>";
//                            echo "<td>".$row["Fulfillment_Entity"]."</td>";
//                            echo "<td>".$row["recepient_name"]."</td>";
//                            echo "<td>".$row["First_Name"]."</td>";
//                            echo "<td>".$row["Middle_Name"]."</td>";
//                            echo "<td>".$row["Last_Name"]."</td>";
//                            echo "<td>".$row["NOTES"]."</td>";
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
        $('#walmart_orders_grid').DataTable( {
            scrollX: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            ajax: "WalmartOrder_ajax.php"
        });
        $('#breadcrumb').append('<li class="breadcrumb-item active" aria-current="page">Walmart Orders Table</li>');
    });
</script>
<?php
include_once(__DIR__.'/footer.php');
?>

