<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>files loader</title>
        <script src="../js/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/grid_style.css">
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="../datatable/datatables.min.css"/>
        <script type="text/javascript" src="../datatable/datatables.min.js"></script>
    </head>
    <body style="background: #f1f6f9;">
    <!--data-target=".navbar-collapse"-->
        <input type="checkbox" id="check">
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse"  data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><span id="website_name">Files Loader</span></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li> <label for="check">
                        <i class="fa fa-bars" id="sidebar_btn"> </i>
                     </label>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="sidebar">
            <br> <br> <br>
            <a href="../src/LoadFileForm.php" data-toggle="tooltip" title="Upload File"><i class="fa fa-upload"></i><span>Upload File</span></a>
            <a href="../src/BullfrogDate_table.php" data-toggle="tooltip" title="Bullfrog Data"><i class="fa fa-th"></i><span>Bullfrog Data</span></a>
            <a href="../src/WalmartOrder_table.php" data-toggle="tooltip" title="Walmart Orders"><i class="fa fa-th"></i><span>Walmart Orders</span></a>
            <a href="../src/AmazonOrdersRaw_table.php" data-toggle="tooltip" title="Amazon Orders Raw"><i class="fa fa-th"></i><span>Amazon Orders Raw</span></a>
            <a href="../src/ManyChat_table.php" data-toggle="tooltip" title="Many Chat"><i class="fa fa-th"></i><span>Many Chat</span></a>
            <a href="../src/AmazonOrder_table.php" data-toggle="tooltip" title="Amazon Order"><i class="fa fa-th"></i><span>Amazon Order</span></a>
            <a href="../src/ShopifyOrders_table.php" data-toggle="tooltip" title="Shopify Orders"><i class="fa fa-th"></i><span>Shopify Orders</span></a>
            <a href="../src/Instant_data_table.php" data-toggle="tooltip" title="Instant Data"><i class="fa fa-th"></i><span>Instant Data</span></a>
        </div>
        <div class="content ">
            <!---breadcrumb--->
                <nav aria-label="breadcrumb" class="breadcrumb-area">
                  <ol  id="breadcrumb" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../src/LoadFileForm.php">Home</a></li>
                  </ol>
                </nav>
<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
?>