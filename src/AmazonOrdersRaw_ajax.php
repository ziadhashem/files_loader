
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
$table = 'Amazon_orders_raw';

// Table's primary key
$primaryKey = 'order_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'order_id', 'dt' => 0),
    array( 'db' => 'merchant_order_id', 'dt' => 1),
    array( 'db' => 'shipment_id', 'dt' => 2),
    array( 'db' => 'shipment_item_id', 'dt' => 3),
    array( 'db' => 'amazon_order_item_id', 'dt' => 4),
    array( 'db' => 'merchant_order_item_id', 'dt' => 5),
    array( 'db' => 'order_date', 'dt' => 6),
    array( 'db' => 'payments_date', 'dt' => 7),
    array( 'db' => 'shipment_date', 'dt' => 8),
    array( 'db' => 'reporting_date', 'dt' => 9),
    array( 'db' => 'Hashed_email', 'dt' => 10),
    array( 'db' => 'buyer_name', 'dt' => 11),
    array( 'db' => 'buyer_phone_number', 'dt' => 12),
    array( 'db' => 'sku', 'dt' => 13),
    array( 'db' => 'product_name', 'dt' => 14),
    array( 'db' => 'item_quantity', 'dt' => 15),
    array( 'db' => 'currency', 'dt' => 16),
    array( 'db' => 'item_price', 'dt' => 17),
    array( 'db' => 'item_tax', 'dt' => 18),
    array( 'db' => 'shipping_price', 'dt' => 19),
    array( 'db' => 'shipping_tax', 'dt' => 20),
    array( 'db' => 'gift_wrap_price', 'dt' => 21),
    array( 'db' => 'gift_wrap_tax', 'dt' => 22),
    array( 'db' => 'ship_service_level', 'dt' => 23),
    array( 'db' => 'recipient_name', 'dt' => 24),
    array( 'db' => 'ship-address-1', 'dt' => 25),
    array( 'db' => 'ship-address-2', 'dt' => 26),
    array( 'db' => 'ship-address-3', 'dt' => 27),
    array( 'db' => 'ship-city', 'dt' => 28),
    array( 'db' => 'ship-state', 'dt' => 29),
    array( 'db' => 'ship-postal-code', 'dt' => 30),
    array( 'db' => 'ship-country', 'dt' => 31),
    array( 'db' => 'ship_phone_number', 'dt' => 32),
    array( 'db' => 'bill_address_1', 'dt' => 33),
    array( 'db' => 'bill_address_2', 'dt' => 34),
    array( 'db' => 'bill_address_3', 'dt' => 35),
    array( 'db' => 'bill_city', 'dt' => 36),
    array( 'db' => 'bill_state', 'dt' => 37),
    array( 'db' => 'bill_postal_code', 'dt' => 38),
    array( 'db' => 'bill_country', 'dt' => 39),
    array( 'db' => 'item_promotion_discount', 'dt' => 40),
    array( 'db' => 'ship_promotion_discount', 'dt' => 41),
    array( 'db' => 'carrier', 'dt' => 42),
    array( 'db' => 'tracking_number', 'dt' => 43),
    array( 'db' => 'estimated_arrival_date', 'dt' => 44),
    array( 'db' => 'fulfillment_center_id', 'dt' => 45),
    array( 'db' => 'fulfillment_channel', 'dt' => 46),
    array( 'db' => 'sales_channel', 'dt' => 47),
    array( 'db' => 'note', 'dt' => 48),
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
