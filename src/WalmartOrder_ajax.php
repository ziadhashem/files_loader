
<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'walmart_orders';

// Table's primary key
$primaryKey = 'Order_ID';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'Order_ID', 'dt' => 0),
    array( 'db' => 'PO_Number', 'dt' => 1),
    array( 'db' => 'Order_Date', 'dt' => 2),
    array( 'db' => 'Shipment_date', 'dt' => 3),
    array( 'db' => 'Delivery_Date', 'dt' => 4),
    array( 'db' => 'Customer_Name', 'dt' => 5),
    array( 'db' => 'Shipping_Address', 'dt' => 6),
    array( 'db' => 'Phone_Number', 'dt' => 7),
    array( 'db' => 'Hashed_Email', 'dt' => 8),
    array( 'db' => 'Shipping_Address1', 'dt' => 9),
    array( 'db' => 'Shipping_Address2', 'dt' => 10),
    array( 'db' => 'City', 'dt' => 11),
    array( 'db' => 'State', 'dt' => 12),
    array( 'db' => 'Zip', 'dt' => 13),
    array( 'db' => 'FLIDS', 'dt' => 14),
    array( 'db' => 'Line_Number', 'dt' => 15),
    array( 'db' => 'UPC', 'dt' => 16),
    array( 'db' => 'Status', 'dt' => 17),
    array( 'db' => 'Product_name', 'dt' => 18),
    array( 'db' => 'Shipping_Method', 'dt' => 19),
    array( 'db' => 'Shipping_Tier', 'dt' => 20),
    array( 'db' => 'item_Quantity', 'dt' => 21),
    array( 'db' => 'SKU', 'dt' => 22),
    array( 'db' => 'Item_Price', 'dt' => 23),
    array( 'db' => 'Shipping_Cost', 'dt' => 24),
    array( 'db' => 'Tax', 'dt' => 25),
    array( 'db' => 'Update_Status', 'dt' => 26),
    array( 'db' => 'Update_Qty', 'dt' => 27),
    array( 'db' => 'Carrier', 'dt' => 28),
    array( 'db' => 'Tracking_Number', 'dt' => 29),
    array( 'db' => 'Tracking_Url', 'dt' => 30),
    array( 'db' => 'Seller_Order_NO', 'dt' => 31),
    array( 'db' => 'Fulfillment_Entity', 'dt' => 32),
    array( 'db' => 'recepient_name', 'dt' => 33),
    array( 'db' => 'First_Name', 'dt' => 34),
    array( 'db' => 'Middle_Name', 'dt' => 35),
    array( 'db' => 'Last_Name', 'dt' => 36),
    array( 'db' => 'NOTES', 'dt' => 37),
);

// import database connection variables
require_once __DIR__ . '/configration.php';

// SQL server connection information
$sql_details = array(
    'user' => DB_USER,
    'pass' => DB_PASSWORD,
    'db'   => DB_DATABASE,
    'host' => DB_SERVER
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('ssp.class.php');

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
