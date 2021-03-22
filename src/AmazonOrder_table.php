<?php
include_once(__DIR__.'/header.php');
?>
<div class="grid-panel">
    <div class="well well-lg">
        <div class="row">
            <table class="table" id="amazon_orders_grid">
                <thead>
                <tr>
                    <th>order_id</th>
                    <th>merchant_order_id</th>
                    <th>shipment_id</th>
                    <th>shipment_item_id</th>
                    <th>amazon_order_item_id</th>
                    <th>merchant_order_item_id</th>
                    <th>order_date</th>
                    <th>payments_date</th>
                    <th>shipment_date</th>
                    <th>reporting_date</th>
                    <th>Hashed_email</th>
                    <th>buyer_name</th>
                    <th>buyer_phone_number</th>
                    <th>sku</th>
                    <th>product_name</th>
                    <th>item_quantity</th>
                    <th>currency</th>
                    <th>item_price</th>
                    <th>item_tax</th>
                    <th>shipping_price</th>
                    <th>shipping_tax</th>
                    <th>gift_wrap_price</th>
                    <th>gift_wrap_tax</th>
                    <th>ship_service_level</th>
                    <th>recipient_name</th>
                    <th>ship-address-1</th>
                    <th>ship-address-2</th>
                    <th>ship-address-3</th>
                    <th>ship-city</th>
                    <th>ship-state</th>
                    <th>ship-postal-code</th>
                    <th>ship-country</th>
                    <th>ship_phone_number</th>
                    <th>bill_address_1</th>
                    <th>bill_address_2</th>
                    <th>bill_address_3</th>
                    <th>bill_city</th>
                    <th>bill_state</th>
                    <th>bill_postal_code</th>
                    <th>bill_country</th>
                    <th>item_promotion_discount</th>
                    <th>ship_promotion_discount</th>
                    <th>carrier</th>
                    <th>tracking_number</th>
                    <th>estimated_arrival_date</th>
                    <th>fulfillment_center_id</th>
                    <th>fulfillment_channel</th>
                    <th>sales_channel</th>
                    <th>buyer_name1</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>shipping_address1</th>
                    <th>shippping_address2</th>
                    <th>shipping_address3</th>
                    <th>city</th>
                    <th>state</th>
                    <th>zip</th>
                    <th>country</th>
                    <th>sku1</th>
                    <th>note</th>
                </tr>
                </thead>
<!--                <tbody>-->
<!--                --><?php
//                $con = new DB_CONNECT();
//                $result = $con->getMysqli()->query("SELECT * FROM `amazon_orders`");
//                if($result){
//                    if(mysqli_num_rows($result) > 0){
//                        while($row = mysqli_fetch_assoc($result)){
//                            echo  "<tr>";
//                            echo  "<td>".$row['order_id']."</td>";
//                            echo  "<td>".$row['merchant_order_id']."</td>";
//                            echo  "<td>".$row['shipment_id']."</td>";
//                            echo  "<td>".$row['shipment_item_id']."</td>";
//                            echo  "<td>".$row['amazon_order_item_id']."</td>";
//                            echo  "<td>".$row['merchant_order_item_id']."</td>";
//                            echo  "<td>".$row['order_date']."</td>";
//                            echo  "<td>".$row['payments_date']."</td>";
//                            echo  "<td>".$row['shipment_date']."</td>";
//                            echo  "<td>".$row['reporting_date']."</td>";
//                            echo  "<td>".$row['Hashed_email']."</td>";
//                            echo  "<td>".$row['buyer_name']."</td>";
//                            echo  "<td>".$row['buyer_phone_number']."</td>";
//                            echo  "<td>".$row['sku']."</td>";
//                            echo  "<td>".$row['product_name']."</td>";
//                            echo  "<td>".$row['item_quantity']."</td>";
//                            echo  "<td>".$row['currency']."</td>";
//                            echo  "<td>".$row['item_price']."</td>";
//                            echo  "<td>".$row['item_tax']."</td>";
//                            echo  "<td>".$row['shipping_price']."</td>";
//                            echo  "<td>".$row['shipping_tax']."</td>";
//                            echo  "<td>".$row['gift_wrap_price']."</td>";
//                            echo  "<td>".$row['gift_wrap_tax']."</td>";
//                            echo  "<td>".$row['ship_service_level']."</td>";
//                            echo  "<td>".$row['recipient_name']."</td>";
//                            echo  "<td>".$row['ship-address-1']."</td>";
//                            echo  "<td>".$row['ship-address-2']."</td>";
//                            echo  "<td>".$row['ship-address-3']."</td>";
//                            echo  "<td>".$row['ship-city']."</td>";
//                            echo  "<td>".$row['ship-state']."</td>";
//                            echo  "<td>".$row['ship-postal-code']."</td>";
//                            echo  "<td>".$row['ship-country']."</td>";
//                            echo  "<td>".$row['ship_phone_number']."</td>";
//                            echo  "<td>".$row['bill_address_1']."</td>";
//                            echo  "<td>".$row['bill_address_2']."</td>";
//                            echo  "<td>".$row['bill_address_3']."</td>";
//                            echo  "<td>".$row['bill_city']."</td>";
//                            echo  "<td>".$row['bill_state']."</td>";
//                            echo  "<td>".$row['bill_postal_code']."</td>";
//                            echo  "<td>".$row['bill_country']."</td>";
//                            echo  "<td>".$row['item_promotion_discount']."</td>";
//                            echo  "<td>".$row['ship_promotion_discount']."</td>";
//                            echo  "<td>".$row['carrier']."</td>";
//                            echo  "<td>".$row['tracking_number']."</td>";
//                            echo  "<td>".$row['estimated_arrival_date']."</td>";
//                            echo  "<td>".$row['fulfillment_center_id']."</td>";
//                            echo  "<td>".$row['fulfillment_channel']."</td>";
//                            echo  "<td>".$row['sales_channel']."</td>";
//                            echo  "<td>".$row['buyer_name1']."</td>";
//                            echo  "<td>".$row['First Name']."</td>";
//                            echo  "<td>".$row['Middle Name']."</td>";
//                            echo  "<td>".$row['Last Name']."</td>";
//                            echo  "<td>".$row['shipping_address1']."</td>";
//                            echo  "<td>".$row['shippping_address2']."</td>";
//                            echo  "<td>".$row['shipping_address3']."</td>";
//                            echo  "<td>".$row['city']."</td>";
//                            echo  "<td>".$row['state']."</td>";
//                            echo  "<td>".$row['zip']."</td>";
//                            echo  "<td>".$row['country']."</td>";
//                            echo  "<td>".$row['sku1']."</td>";
//                            echo  "<td>".$row['note']."</td>";
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
        $('#amazon_orders_grid').DataTable( {
            scrollX: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            ajax: "AmazonOrders_ajax.php"
        });
        $('#breadcrumb').append('<li class="breadcrumb-item active" aria-current="page">Amazon Orders Table</li>');
    });
</script>
<?php
include_once(__DIR__.'/footer.php');
?>
