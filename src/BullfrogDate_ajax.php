
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
$table = 'bullfrog_data';

// Table's primary key
$primaryKey = 'ID';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'ID', 'dt' => 0 ),
    array( 'db' => 'FIRST_NAME', 'dt' => 1 ),
    array( 'db' => 'LAST_NAME', 'dt' => 2),
    array( 'db' => 'SHIPPING_ADDRESS1', 'dt' => 3 ),
    array( 'db' => 'SHIPPING_ADDRESS2', 'dt' => 4 ),
    array( 'db' => 'CITY', 'dt' => 5 ),
    array( 'db' => 'STATE', 'dt' => 6 ),
    array( 'db' => 'ZIP', 'dt' => 7 ),
    array( 'db' => 'HASHED_EMAIL', 'dt' => 8 ),
    array( 'db' => 'PHONE', 'dt' => 9 ),
    array( 'db' => 'REAL_EMAIL', 'dt' => 10 ),
    array( 'db' => 'NUMBER_OF_ORDERS', 'dt' => 11 ),
    array( 'db' => 'VALUE_OF_ORDERS', 'dt' => 12 ),
    array( 'db' => 'NOTES', 'dt' => 13 ),
    array( 'db' => 'NOTES2', 'dt' => 14 ),
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
