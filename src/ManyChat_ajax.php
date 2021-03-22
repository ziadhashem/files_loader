
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
$table = 'manychat';

// Table's primary key
$primaryKey = 'ID';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'ID', 'dt' => 0),
    array( 'db' => 'First_name', 'dt' => 1),
    array( 'db' => 'Last_name', 'dt' => 2),
    array( 'db' => 'Gender', 'dt' => 3),
    array( 'db' => 'Phone_number', 'dt' => 4),
    array( 'db' => 'Phone_no', 'dt' => 5),
    array( 'db' => 'T_User_phone', 'dt' => 6),
    array( 'db' => 'Address', 'dt' => 7),
    array( 'db' => 'Mailing_Address', 'dt' => 8),
    array( 'db' => 'Email', 'dt' => 9),
    array( 'db' => 'T_email', 'dt' => 10),
    array( 'db' => 'Email_address', 'dt' => 11),
    array( 'db' => 'Catapult_System_Email_Used', 'dt' => 12),
    array( 'db' => 'Catapult_System_PayPal_Email_Address', 'dt' => 13),
    array( 'db' => 'Email_Free_Cartridge', 'dt' => 14),
    array( 'db' => 'Email_Free_Shower_Arm_PRSH', 'dt' => 15),
    array( 'db' => 'RSH_WOF_customer_rebate_email', 'dt' => 16),
    array( 'db' => 'ST_Amazon_Hashed_Email', 'dt' => 17),
    array( 'db' => 'ST_Customer_Rebate_Email', 'dt' => 18),
    array( 'db' => 'S_T_Customer_RebateInfo_Email', 'dt' => 19),
    array( 'db' => 'Opted_in_for_email', 'dt' => 20),
    array( 'db' => 'Opted_in_for_SMS', 'dt' => 21),
    array( 'db' => 'Amazon_Order_Number', 'dt' => 22),
    array( 'db' => 'Catapult_System_GC_Order_ID_Number', 'dt' => 23),
    array( 'db' => 'Catapult_System_Order_ID_Number', 'dt' => 24),
    array( 'db' => 'Catapult_System_PP_Order_ID_Number', 'dt' => 25),
    array( 'db' => 'FSH_1P_Order_ID_Walmart', 'dt' => 26),
    array( 'db' => 'PRSH-C_Order_ID_Walmart', 'dt' => 27),
    array( 'db' => 'RSH_C_Order_ID_Walmart', 'dt' => 28),
    array( 'db' => 'ST_Rebate_Order_ID', 'dt' => 29),
    array( 'db' => 'NOTES', 'dt' => 30),
    array( 'db' => 'note1', 'dt' => 31),
    array( 'db' => 'note2', 'dt' => 32),
    array( 'db' => 'note3', 'dt' => 33),
    array( 'db' => 'note4', 'dt' => 34),
    array( 'db' => 'note5', 'dt' => 35),
    array( 'db' => 'note6', 'dt' => 36),
    array( 'db' => 'note7', 'dt' => 37),
    array( 'db' => 'note8', 'dt' => 38),
    array( 'db' => 'note9', 'dt' => 39),
    array( 'db' => 'note10', 'dt' => 40),
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
