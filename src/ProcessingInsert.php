<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$data=null;
$result = [];
$result['is_error'] = false;
$result['msg']= '';
$result['there_is_exceptions'] = false;
try {
    if (isset($_FILES['FileLoaded']['name'])) {
        $table_name = $_POST['table_name'];
        $sheet_name_select = $_POST['sheet_name_select'];
        $read_until_line_number = (int) $_POST['read_until_line_number'];
        $arr_file = explode('.', $_FILES['FileLoaded']['name']);
        $extension = end($arr_file);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($_FILES['FileLoaded']['tmp_name']);
        /**  Advise the Reader that we only want to load cell data  **/
        $reader->setReadDataOnly(true);
        $sheet = $spreadsheet->getActiveSheet();
        if ($sheet_name_select != '') {
            $sheet = $spreadsheet->getSheetByName($sheet_name_select);
        }
        $sheetData = $sheet->toArray();
        $highest_data_column = $sheet->getHighestDataColumn();
        $highest_data_row = $sheet->getHighestDataRow();
        if(($read_until_line_number>1 and $read_until_line_number <= $highest_data_row) or ($read_until_line_number == 0)) {
            $highest_row = ($read_until_line_number != 0 )? $read_until_line_number:$highest_data_row;
            $exceptions = [];
            $NumberOfRows = Count($sheetData); // number of row.
            $helper = new helper();
            if ($table_name == 'BULLFROG_DATA') {
                $result = $helper->set_date_into_BullfogData_table($highest_row, $sheetData);
            } elseif ($table_name == 'Amazon_orders_raw') {
                $result = $helper->set_date_into_AmazonOrderRaw_table($highest_row, $sheetData);
            } elseif ($table_name == 'Amazon_orders') {
                $result = $helper->set_date_into_AmazonOrder_table($highest_row, $sheetData);
            } elseif ($table_name == 'Shopify_orders') {
                $result = $helper->set_date_into_ShopifyOrder_table($highest_row, $sheetData);
            } elseif ($table_name == 'Walmart_orders') {
                $result = $helper->set_date_into_WalmartOrder_table($highest_row, $sheetData);
            } elseif ($table_name == 'ManyChat') {
                $result = $helper->set_date_into_ManyChat_table($highest_row, $sheetData);
            } elseif ($table_name == 'Instant_data') {
                $result = $helper->set_date_into_Instant_data_table($highest_row, $sheetData);
            }
        }
        else{
            $result['is_error'] = true;
            $result['msg_type'] = 'w';
            $result['msg'] = 'Please check the line number';
            $result['there_is_exceptions'] = false;
        }
    }
}
catch (Exception $exception){
    $result['is_error'] = true;
    $result['msg'] = $exception->getMessage();
}

echo json_encode($result);