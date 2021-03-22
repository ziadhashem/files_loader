<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
$result = [];
$result['is_error'] = false;
$result['msg']= '';
$result['sheets_names'] = [];
if(isset($_FILES['FileLoaded']['name']))
{
    $arr_file = explode('.', $_FILES['FileLoaded']['name']);
    $extension = end($arr_file);
    $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($_FILES['FileLoaded']['tmp_name']);
    /**  Advise the Reader that we only want to load cell data  **/
    $reader->setReadDataOnly(true);
    $sheets_names = $spreadsheet->getSheetNames();
    $result['is_error'] = false;
    $result['msg']= 'done';
    $result['sheets_names'] = $sheets_names;
}
echo json_encode($result);
