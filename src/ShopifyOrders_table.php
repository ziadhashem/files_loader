<?php
include_once(__DIR__.'/header.php');
?>
<div class="grid-panel">
    <div class="well well-lg">
        <div class="row">
            <table class="table" id="shopify_orders_grid">
                <thead>
                <tr>
                    <th>Order_ID</th>
                    <th>Email</th>
                    <th>Financial_Status</th>
                    <th>payment_date</th>
                    <th>Fulfillment_Status</th>
                    <th>shipment_date</th>
                    <th>Accepts_Marketing</th>
                    <th>Currency</th>
                    <th>Subtotal</th>
                    <th>Shipping</th>
                    <th>Taxes</th>
                    <th>Total</th>
                    <th>Discount_Code</th>
                    <th>Discount_Amount</th>
                    <th>Shipping_Method</th>
                    <th>order_date</th>
                    <th>item_quantity</th>
                    <th>product_name</th>
                    <th>item_price</th>
                    <th>item_compare_at_price</th>
                    <th>sku</th>
                    <th>item_requires_shipping</th>
                    <th>item_taxable</th>
                    <th>item_fulfillment_status</th>
                    <th>Billing_Name</th>
                    <th>Billing_Street</th>
                    <th>Billing_Address1</th>
                    <th>Billing_Address2</th>
                    <th>Billing_Company</th>
                    <th>Billing_City</th>
                    <th>Billing_Zip</th>
                    <th>Billing_Province</th>
                    <th>Billing_Country</th>
                    <th>Billing_Phone</th>
                    <th>Recepient_Name</th>
                    <th>Street</th>
                    <th>Shipping_Address1</th>
                    <th>hipping_Address2</th>
                    <th>Shipping_Company</th>
                    <th>City</th> <th>Zip</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Phone_number</th>
                    <th>Notes</th>
                    <th>Note_Attributes</th>
                    <th>Cancelled_at</th>
                    <th>Payment_Method</th>
                    <th>Payment_Reference</th>
                    <th>Refunded_Amount</th>
                    <th>Vendor</th>
                    <th>Id</th>
                    <th>Tags</th>
                    <th>Risk_Level</th>
                    <th>Source</th>
                    <th>item_discount</th>
                    <th>Tax_1_Name</th>
                    <th>Tax_1_Value</th>
                    <th>Tax_2_Name</th>
                    <th>Tax_2_Value</th>
                    <th>Tax_3_Name</th>
                    <th>Tax_3_Value</th>
                    <th>Tax_4_Name</th>
                    <th>Tax_4_Value</th>
                    <th>Tax_5_Name</th>
                    <th>Tax_5_Value</th>
                    <th>Phone</th>
                    <th>Receipt_Number</th>
                    <th>Shipping_Name1</th>
                    <th>First_Name</th>
                    <th>Middle_Name</th>
                    <th>Last_Name</th>
                    <th>Note </th>
                </tr>
                </thead>
<!--                <tbody>-->
<!--                --><?php
//                $con = new DB_CONNECT();
//                $result = $con->getMysqli()->query("SELECT * FROM `shopify_orders`");
//                if($result){
//                    if(mysqli_num_rows($result) > 0){
//                        while($row = mysqli_fetch_assoc($result)){
//                            echo  "<tr>";
//                            echo  "<td>".$row['Order_ID']."</td>";
//                            echo  "<td>".$row['Email']."</td>";
//                            echo  "<td>".$row['Financial_Status']."</td>";
//                            echo  "<td>".$row['payment_date']."</td>";
//                            echo  "<td>".$row['Fulfillment_Status']."</td>";
//                            echo  "<td>".$row['shipment_date']."</td>";
//                            echo  "<td>".$row['Accepts_Marketing']."</td>";
//                            echo  "<td>".$row['Currency']."</td>";
//                            echo  "<td>".$row['Subtotal']."</td>";
//                            echo  "<td>".$row['Shipping']."</td>";
//                            echo  "<td>".$row['Taxes']."</td>";
//                            echo  "<td>".$row['Total']."</td>";
//                            echo  "<td>".$row['Discount_Code']."</td>";
//                            echo  "<td>".$row['Discount_Amount']."</td>";
//                            echo  "<td>".$row['Shipping_Method']."</td>";
//                            echo  "<td>".$row['order_date']."</td>";
//                            echo  "<td>".$row['item_quantity']."</td>";
//                            echo  "<td>".$row['product_name']."</td>";
//                            echo  "<td>".$row['item_price']."</td>";
//                            echo  "<td>".$row['item_compare_at_price']."</td>";
//                            echo  "<td>".$row['sku']."</td>";
//                            echo  "<td>".$row['item_requires_shipping']."</td>";
//                            echo  "<td>".$row['item_taxable']."</td>";
//                            echo  "<td>".$row['item_fulfillment_status']."</td>";
//                            echo  "<td>".$row['Billing_Name']."</td>";
//                            echo  "<td>".$row['Billing_Street']."</td>";
//                            echo  "<td>".$row['Billing_Address1']."</td>";
//                            echo  "<td>".$row['Billing_Address2']."</td>";
//                            echo  "<td>".$row['Billing_Company']."</td>";
//                            echo  "<td>".$row['Billing_City']."</td>";
//                            echo  "<td>".$row['Billing_Zip']."</td>";
//                            echo  "<td>".$row['Billing_Province']."</td>";
//                            echo  "<td>".$row['Billing_Country']."</td>";
//                            echo  "<td>".$row['Billing_Phone']."</td>";
//                            echo  "<td>".$row['Recepient_Name']."</td>";
//                            echo  "<td>".$row['Street']."</td>";
//                            echo  "<td>".$row['Shipping_Address1']."</td>";
//                            echo  "<td>".$row['Shipping_Address2']."</td>";
//                            echo  "<td>".$row['Shipping_Company']."</td>";
//                            echo  "<td>".$row['City']."</td>"; echo  "<td>".$row['Zip']."</td>";
//                            echo  "<td>".$row['State']."</td>";
//                            echo  "<td>".$row['Country']."</td>";
//                            echo  "<td>".$row['Phone_number']."</td>";
//                            echo  "<td>".$row['Notes']."</td>";
//                            echo  "<td>".$row['Note_Attributes']."</td>";
//                            echo  "<td>".$row['Cancelled_at']."</td>";
//                            echo  "<td>".$row['Payment_Method']."</td>";
//                            echo  "<td>".$row['Payment_Reference']."</td>";
//                            echo  "<td>".$row['Refunded_Amount']."</td>";
//                            echo  "<td>".$row['Vendor']."</td>";
//                            echo  "<td>".$row['Id']."</td>";
//                            echo  "<td>".$row['Tags']."</td>";
//                            echo  "<td>".$row['Risk_Level']."</td>";
//                            echo  "<td>".$row['Source']."</td>";
//                            echo  "<td>".$row['item_discount']."</td>";
//                            echo  "<td>".$row['Tax_1_Name']."</td>";
//                            echo  "<td>".$row['Tax_1_Value']."</td>";
//                            echo  "<td>".$row['Tax_2_Name']."</td>";
//                            echo  "<td>".$row['Tax_2_Value']."</td>";
//                            echo  "<td>".$row['Tax_3_Name']."</td>";
//                            echo  "<td>".$row['Tax_3_Value']."</td>";
//                            echo  "<td>".$row['Tax_4_Name']."</td>";
//                            echo  "<td>".$row['Tax_4_Value']."</td>";
//                            echo  "<td>".$row['Tax_5_Name']."</td>";
//                            echo  "<td>".$row['Tax_5_Value']."</td>";
//                            echo  "<td>".$row['Phone']."</td>";
//                            echo  "<td>".$row['Receipt_Number']."</td>";
//                            echo  "<td>".$row['Shipping_Name1']."</td>";
//                            echo  "<td>".$row['First_Name']."</td>";
//                            echo  "<td>".$row['Middle_Name']."</td>";
//                            echo  "<td>".$row['Last_Name']."</td>";
//                            echo  "<td>".$row['NOTE']."</td>";
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
        $('#shopify_orders_grid').DataTable( {
            scrollX: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            ajax: "ShopifyOrders_ajax.php"
        });
        $('#breadcrumb').append('<li class="breadcrumb-item active" aria-current="page">Shopify Orders Table</li>');
    });
</script>
<?php
include_once(__DIR__.'/footer.php');
?>
