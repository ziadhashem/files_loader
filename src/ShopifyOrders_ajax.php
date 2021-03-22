
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
$table = 'shopify_orders';

// Table's primary key
$primaryKey = 'ID';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'Order_ID', 'dt' => 0),
    array( 'db' => 'Email', 'dt' => 1),
    array( 'db' => 'Financial_Status', 'dt' => 2),
    array( 'db' => 'payment_date', 'dt' => 3),
    array( 'db' => 'Fulfillment_Status', 'dt' => 4),
    array( 'db' => 'shipment_date', 'dt' => 5),
    array( 'db' => 'Accepts_Marketing', 'dt' => 6),
    array( 'db' => 'Currency', 'dt' => 7),
    array( 'db' => 'Subtotal', 'dt' => 8),
    array( 'db' => 'Shipping', 'dt' => 9),
    array( 'db' => 'Taxes', 'dt' => 10),
    array( 'db' => 'Total', 'dt' => 11),
    array( 'db' => 'Discount_Code', 'dt' => 12),
    array( 'db' => 'Discount_Amount', 'dt' => 13),
    array( 'db' => 'Shipping_Method', 'dt' => 14),
    array( 'db' => 'order_date', 'dt' => 15),
    array( 'db' => 'item_quantity', 'dt' => 16),
    array( 'db' => 'product_name', 'dt' => 17),
    array( 'db' => 'item_price', 'dt' => 18),
    array( 'db' => 'item_compare_at_price', 'dt' => 19),
    array( 'db' => 'sku', 'dt' => 20),
    array( 'db' => 'item_requires_shipping', 'dt' => 21),
    array( 'db' => 'item_taxable', 'dt' => 22),
    array( 'db' => 'item_fulfillment_status', 'dt' => 23),
    array( 'db' => 'Billing_Name', 'dt' => 24),
    array( 'db' => 'Billing_Street', 'dt' => 25),
    array( 'db' => 'Billing_Address1', 'dt' => 26),
    array( 'db' => 'Billing_Address2', 'dt' => 27),
    array( 'db' => 'Billing_Company', 'dt' => 28),
    array( 'db' => 'Billing_City', 'dt' => 29),
    array( 'db' => 'Billing_Zip', 'dt' => 30),
    array( 'db' => 'Billing_Province', 'dt' => 31),
    array( 'db' => 'Billing_Country', 'dt' => 32),
    array( 'db' => 'Billing_Phone', 'dt' => 33),
    array( 'db' => 'Recepient_Name', 'dt' => 34),
    array( 'db' => 'Street', 'dt' => 35),
    array( 'db' => 'Shipping_Address1', 'dt' => 36),
    array( 'db' => 'Shipping_Address2', 'dt' => 37),
    array( 'db' => 'Shipping_Company', 'dt' => 38),
    array( 'db' => 'City', 'dt' => 39),
    array( 'db' => 'Zip', 'dt' => 40),
    array( 'db' => 'State', 'dt' => 41),
    array( 'db' => 'Country', 'dt' => 42),
    array( 'db' => 'Phone_number', 'dt' => 43),
    array( 'db' => 'Notes', 'dt' => 44),
    array( 'db' => 'Note_Attributes', 'dt' => 45),
    array( 'db' => 'Cancelled_at', 'dt' => 46),
    array( 'db' => 'Payment_Method', 'dt' => 47),
    array( 'db' => 'Payment_Reference', 'dt' => 48),
    array( 'db' => 'Refunded_Amount', 'dt' => 49),
    array( 'db' => 'Vendor', 'dt' => 50),
    array( 'db' => 'Id', 'dt' => 51),
    array( 'db' => 'Tags', 'dt' => 52),
    array( 'db' => 'Risk_Level', 'dt' => 53),
    array( 'db' => 'Source', 'dt' => 54),
    array( 'db' => 'item_discount', 'dt' => 55),
    array( 'db' => 'Tax_1_Name', 'dt' => 56),
    array( 'db' => 'Tax_1_Value', 'dt' => 57),
    array( 'db' => 'Tax_2_Name', 'dt' => 58),
    array( 'db' => 'Tax_2_Value', 'dt' => 59),
    array( 'db' => 'Tax_3_Name', 'dt' => 60),
    array( 'db' => 'Tax_3_Value', 'dt' => 61),
    array( 'db' => 'Tax_4_Name', 'dt' => 62),
    array( 'db' => 'Tax_4_Value', 'dt' => 63),
    array( 'db' => 'Tax_5_Name', 'dt' => 64),
    array( 'db' => 'Tax_5_Value', 'dt' => 65),
    array( 'db' => 'Phone', 'dt' => 66),
    array( 'db' => 'Receipt_Number', 'dt' => 67),
    array( 'db' => 'Shipping_Name1', 'dt' => 68),
    array( 'db' => 'First_Name', 'dt' => 69),
    array( 'db' => 'Middle_Name', 'dt' => 70),
    array( 'db' => 'Last_Name', 'dt' => 71),
    array( 'db' => 'NOTE', 'dt' => 72),
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
