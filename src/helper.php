<?php

require 'connection.php';
class helper
{
    ////////////////////////// Instant_data //////////////////////////////
    public function insert_into_Instant_data_table($row)
    {
        return "INSERT INTO `Instant_data`(
                           `First Name`,
                            `Last Name`,
                              `Address`,
                                 `city`,
                                `state`,
                                  `Zip`,
                             `Order_ID`,
                         `Hashed_email`,
                           `Real_Email`,
                           `Match_type`
                    )VALUES (
                       " . $this->addQuota($row[0]) . ",    
                       " . $this->addQuota($row[1]) . ",
                       " . $this->addQuota($row[2]) . ",
                       " . $this->addQuota($row[3]) . ",
                       " . $this->addQuota($row[4]) . ",
                       " . $this->addQuota($row[5]) . ",
                       " . $this->addQuota($row[6]) . ",
                       " . $this->checkString($row[7]) . ",
                       " . $this->checkString($row[8]) . ",
                       " . $this->addQuota($row[9]) . ")";
    }

    public function set_date_into_Instant_data_table($highest_data_row, $sheetData)
    {
        $result['is_error'] = false;
        $result['msg_type'] = 's';
        $result['msg'] = 'data saved successfully';
        $exceptions = [];
        $result['there_is_exceptions'] = false;
        $con = new DB_CONNECT();
        for ($row = 1; $row < $highest_data_row; $row++) {
            $quary_String = $this->insert_into_Instant_data_table($sheetData[$row]);
            $statement = $con->getMysqli()->prepare($quary_String);
            $res = ($statement != false) ? $statement->execute() : $statement;
            if ($res == false) {
                $hit = 'The storage process for The Row ' . ($row + 1) . ' was failed '. $con->getMysqli()->error;
                array_push($exceptions, $hit);
                $result['there_is_exceptions'] = true;
            }
        }

        if($result['there_is_exceptions']){
            $result['msg'] = 'There are some errors';
            $result['msg_type'] = 'w';
        }
        $result['exceptions'] = $exceptions;
        return $result;
    }

    ////////////////////////// BULLFROG_DATA /////////////////////////////
    public function insert_into_BULLFROG_DATA_table($row)
    {
        return "INSERT INTO `BULLFROG_DATA`(
                            id,
                    FIRST_NAME,
                    LAST_NAME,
                    SHIPPING_ADDRESS1,	
                    SHIPPING_ADDRESS2,
                    CITY,	
                    STATE,	
                    ZIP,
                    HASHED_EMAIL,	
                    PHONE,
                    REAL_EMAIL,
                    NUMBER_OF_ORDERS,
                    VALUE_OF_ORDERS
                    )VALUES (
                         null,
                       " . $this->addQuota($row[0]) . ",    
                       " . $this->addQuota($row[1]) . ",
                       " . $this->addQuota($row[2]) . ",
                       " . $this->addQuota($row[3]) . ",
                       " . $this->addQuota($row[4]) . ",
                       " . $this->addQuota($row[5]) . ",
                       " . $this->addQuota($row[6]) . ",
                       " . $this->checkString($row[7]) . ",
                       " . $this->checkString($row[8]) . ",
                       " . $this->checkString($row[9]) . ",
                       " . $this->checkNull($row[10]) . ",
                       " . $this->checkNull($row[11]) . ")";
    }

    public function set_date_into_BullfogData_table($highest_data_row, $sheetData)
    {
        $result['is_error'] = false;
        $result['msg_type'] = 's';
        $result['msg'] = 'data saved successfully';
        $exceptions = [];
        $result['there_is_exceptions'] = false;
        $con = new DB_CONNECT();
        for ($row = 1; $row < $highest_data_row; $row++) {
            $quary_String = $this->insert_into_BULLFROG_DATA_table($sheetData[$row]);
            $statement = $con->getMysqli()->prepare($quary_String);
            $res = ($statement != false) ? $statement->execute() : $statement;
            if ($res == false) {
                $hit = 'The storage process for The Row ' . ($row + 1) . ' was failed '. $con->getMysqli()->error;
                array_push($exceptions, $hit);
                $result['there_is_exceptions'] = true;
            }
        }

        if($result['there_is_exceptions']){
            $result['msg'] = 'There are some errors';
            $result['msg_type'] = 'w';
        }
        $result['exceptions'] = $exceptions;
        return $result;
    }

    ////////////////////////// WalmartOrder /////////////////////////////
    public function insert_into_WalmartOrder_table($row)
    {
        return $formula = "INSERT INTO `walmart_orders` (
                     `Order_ID`,
                     `PO_Number`,		
                     `Order_Date`,	
                     `Shipment_date`,	
                     `Delivery_Date`,	
                     `Customer_Name`,
                     `Shipping_Address`,	
                     `Phone_Number`,	
                     `Hashed_Email`,	
                     `Shipping_Address1`,
                     `Shipping_Address2`,	
                     `City`,
                     `State`,
                     `Zip`,
                     `FLIDS`,	
                     `Line_Number`,
                     `UPC`,	
                     `Status`,	
                     `Product_name`,
                     `Shipping_Method`,
                     `Shipping_Tier`,	
                     `item_Quantity`,
                     `SKU`,	
                     `Item_Price`,
                     `Shipping_Cost`,	
                     `Tax`,	
                     `Update_Status`,
                     `Update_Qty`,
                     `Carrier`,
                     `Tracking_Number`,
                     `Tracking_Url`,	
                     `Seller_Order_NO`,
                     `Fulfillment_Entity`,	
                     `recepient_name`,	
                     `First_Name`,
                     `Middle_Name`,
                     `Last_Name`
      )VALUES(
                ".$this->addQuota($row[1]).",
                ".$this->addQuota($row[0]).",
                ".$this->addQuota($row[2]).",
                ".$this->addQuota($row[3]).",
                ".$this->addQuota($row[4]).",
                ".$this->addQuota($row[5]).",
                ".$this->addQuota($row[6]).",
                ".$this->checkString($row[7]).",
                ".$this->checkString($row[8]).",
                ".$this->addQuota($row[9]).",
                ".$this->addQuota($row[10]).",
                ".$this->addQuota($row[11]).",
                ".$this->addQuota($row[12]).",
                ".$this->addQuota($row[13]).",
                ".$this->addQuota($row[14]).",
                ".$this->checkNull($row[15]).",
                ".$this->addQuota($row[16]).",
                ".$this->addQuota($row[17]).",
                ".$this->addQuota($row[18]).",
                ".$this->addQuota($row[19]).",
                ".$this->addQuota($row[20]).",
                ".$this->checkNull($row[21]).",
                ".$this->addQuota($row[22]).",
                ".$this->checkNull($row[23]).",
                ".$this->checkNull($row[24]).",
                ".$this->checkNull($row[25]).",
                ".$this->addQuota($row[26]).",
                ".$this->addQuota($row[27]).",
                ".$this->addQuota($row[28]).",
                ".$this->addQuota($row[29]).",
                ".$this->addQuota($row[30]).",
                ".$this->addQuota($row[31]).",
                ".$this->addQuota($row[32]).",
                ".$this->addQuota($row[34]).",
                ".$this->addQuota($row[36]).",
                ".$this->addQuota($row[37]).",
                ".$this->addQuota($row[38]).")";
    }

    public function set_date_into_WalmartOrder_table($highest_data_row, $sheetData)
    {
        $result['is_error'] = false;
        $result['msg_type'] = 's';
        $result['msg'] = 'data saved successfully';
        $result['there_is_exceptions'] = false;
        $exceptions = [];
        $con = new DB_CONNECT();
        for ($row = 1; $row < $highest_data_row; $row++) {
            $quary = $this->insert_into_WalmartOrder_table($sheetData[$row]);
            $statement = $con->getMysqli()->prepare($quary);
            $res = ($statement != false) ? $statement->execute() : $statement;
            if ($res == false) {
                $hit = 'The storage process for The Row ' . ($row + 1) . ' was failed '. $con->getMysqli()->error;
                array_push($exceptions, $hit);
                $result['there_is_exceptions'] = true;
            }
        }
        if($result['there_is_exceptions']){
            $result['msg'] = 'There are some errors';
            $result['msg_type'] = 'w';
        }
        $result['exceptions'] = $exceptions;
        return $result;
    }

    ///////////////////////// ManyChat //////////////////////////////
    public function insert_into_ManyChat_table($row)
    {

        return "INSERT INTO `manychat`(
                    `ID`,
                    `First_name`,
                    `Last_name`,
                    `Gender`,
                    `Phone_number`,
                    `Phone_no`,
                    `T_User_phone`,
                    `Address`,
                    `Mailing_Address`,
                    `Email`,
                    `T_email`,
                    `Email_address`,
                    `Catapult_System_Email_Used`,
                    `Catapult_System_PayPal_Email_Address`,
                    `Email_Free_Cartridge`,
                    `Email_Free_Shower_Arm_PRSH`,
                    `RSH_WOF_customer_rebate_email`,
                    `ST_Amazon_Hashed_Email`,
                    `ST_Customer_Rebate_Email`,
                    `S_T_Customer_RebateInfo_Email`,
                    `Opted_in_for_email`,
                    `Opted_in_for_SMS`,
                    `Amazon_Order_Number`,
                    `Catapult_System_GC_Order_ID_Number`,
                    `Catapult_System_Order_ID_Number`,
                    `Catapult_System_PP_Order_ID_Number`,
                    `FSH_1P_Order_ID_Walmart`,
                    `PRSH-C_Order_ID_Walmart`,
                    `RSH_C_Order_ID_Walmart`,
                    `ST_Rebate_Order_ID`,
                    `NOTES`,
                    `note1`,
                    `note2`,
                    `note3`,
                    `note4`,
                    `note5`,
                    `note6`,
                    `note7`,
                    `note8`,
                    `note9`,
                    `note10`
                    )VALUES (
                        null,
                       " . $this->addQuota($row[0]) . ",    
                       " . $this->addQuota($row[1]) . ",
                       " . $this->addQuota($row[2]) . ",
                       " . $this->checkString($row[3]) . ",
                       " . $this->checkString($row[4]) . ",
                       " . $this->checkString($row[5]) . ",
                       " . $this->checkString($row[6]) . ",
                       " . $this->checkString($row[7]) . ",
                       " . $this->checkString($row[8]) . ",
                       " . $this->checkString($row[9]) . ",
                       " . $this->checkString($row[10]) . ",
                       " . $this->checkString($row[11]) . ",
                       " . $this->checkString($row[12]) . ",
                       " . $this->checkString($row[13]) . ",
                       " . $this->checkString($row[14]) . ",
                       " . $this->checkString($row[15]) . ",
                       " . $this->checkString($row[16]) . ",
                       " . $this->checkString($row[17]) . ",
                       " . $this->checkString($row[18]) . ",
                       " . $this->addQuota($row[19]) . ",
                       " . $this->addQuota($row[20]) . ",
                       " . $this->addQuota($row[21]) . ",
                       " . $this->addQuota($row[22]) . ",
                       " . $this->addQuota($row[23]) . ",
                       " . $this->addQuota($row[24]) . ",
                       " . $this->addQuota($row[25]) . ",
                       " . $this->addQuota($row[26]) . ",
                       " . $this->addQuota($row[27]) . ",
                       " . $this->addQuota($row[28]) . ",
                       
                       " . $this->addQuota($row[29]) . ",
                       " . $this->addQuota($row[30]) . ",
                       " . $this->addQuota($row[31]) . ",
                       " . $this->addQuota($row[32]) . ",
                       " . $this->addQuota($row[33]) . ",
                       " . $this->addQuota($row[34]) . ",
                       " . $this->addQuota($row[35]) . ",
                       " . $this->addQuota($row[36]) . ",
                       " . $this->addQuota($row[37]) . ",
                       " . $this->addQuota($row[38]) . ",
                       " . $this->addQuota($row[39]) . ")";
    }

    public function set_date_into_ManyChat_table($highest_data_row, $sheetData)
    {
        $result['is_error'] = false;
        $result['msg_type'] = 's';
        $result['msg'] = 'data saved successfully';
        $result['there_is_exceptions'] = false;
        $exceptions = [];
        $con = new DB_CONNECT();
        for ($row = 1; $row < $highest_data_row; $row++) {
            $quary_String = $this->insert_into_ManyChat_table($sheetData[$row]);
            $statement = $con->getMysqli()->prepare($quary_String);
            $res = ($statement != false) ? $statement->execute() : $statement;
            if ($res == false) {
                $hit = 'The storage process for The Row ' . ($row + 1) . ' was failed ' . $con->getMysqli()->error;
                array_push($exceptions, $hit);
                $result['there_is_exceptions'] = true;
            }
        }
        if($result['there_is_exceptions']){
            $result['msg'] = 'There are some errors';
            $result['msg_type'] = 'w';
        }
        $result['exceptions'] = $exceptions;
        return $result;
    }

    ///////////////////////// shopify_orders //////////////////////////////
    public function insert_into_shopify_orders_table($row)
    {
        return $formula = "INSERT INTO `shopify_orders` (
                    `Order_ID`,
                    `Email`,
                    `Financial_Status`,
                    `payment_date`,
                    `Fulfillment_Status`,
                    `shipment_date`,
                    `Accepts_Marketing`,
                    `Currency`,
                    `Subtotal`,
                    `Shipping`,
                    `Taxes`,
                    `Total`,
                    `Discount_Code`,
                    `Discount_Amount`,
                    `Shipping_Method`,
                    `order_date`,
                    `item_quantity`,
                    `product_name`,
                    `item_price`,
                    `item_compare_at_price`,
                    `sku`,
                    `item_requires_shipping`,
                    `item_taxable`,
                    `item_fulfillment_status`,
                    `Billing_Name`,
                    `Billing_Street`,
                    `Billing_Address1`,
                    `Billing_Address2`,
                    `Billing_Company`,
                    `Billing_City`,
                    `Billing_Zip`,
                    `Billing_Province`,
                    `Billing_Country`,
                    `Billing_Phone`,
                    `Recepient_Name`,
                    `Street`,
                    `Shipping_Address1`,
                    `Shipping_Address2`,
                    `Shipping_Company`,
                    `City`,
                    `Zip`,
                    `State`,
                    `Country`,
                    `Phone_number`,
                    `Notes`,
                    `Note_Attributes`,
                    `Cancelled_at`,
                    `Payment_Method`,
                    `Payment_Reference`,
                    `Refunded_Amount`,
                    `Vendor`,
                    `Id`,
                    `Tags`,
                    `Risk_Level`,
                    `Source`,
                    `item_discount`,
                    `Tax_1_Name`,
                    `Tax_1_Value`,
                    `Tax_2_Name`,
                    `Tax_2_Value`,
                    `Tax_3_Name`,
                    `Tax_3_Value`,
                    `Tax_4_Name`,
                    `Tax_4_Value`,
                    `Tax_5_Name`,
                    `Tax_5_Value`,
                    `Phone`,
                    `Receipt_Number`,
                    `Shipping_Name1`,
                    `First_Name`,
                    `Middle_Name`,
                    `Last_Name`
      )VALUES(
                " . $this->addQuota($row[0]) . ",
                " . $this->checkString($row[1]) . ",
                " . $this->addQuota($row[2]) . ",
                " . $this->preparDateTime($row[3]) . ",
                " . $this->addQuota($row[4]) . ",
                " . $this->preparDateTime($row[5]) . ",
                " . $this->addQuota($row[6]) . ",
                " . $this->addQuota($row[7]) . ",
                " . $this->checkNull($row[8]) . ",
                " . $this->checkNull($row[9]) . ",
                " . $this->checkNull($row[10]) . ",
                " . $this->checkNull($row[11]) . ",
                " . $this->addQuota($row[12]) . ",
                " . $this->checkNull($row[13]) . ",
                " . $this->addQuota($row[14]) . ",
                " . $this->preparDateTime($row[15]) . ",
                " . $this->checkNull($row[16]) . ",
                " . $this->addQuota($row[17]) . ",
                " . $this->checkNull($row[18]) . ",
                " . $this->checkNull($row[19]) . ",
                " . $this->addQuota($row[20]) . ",
                " . $this->addQuota($row[21]) . ",
                " . $this->addQuota($row[22]) . ",
                " . $this->addQuota($row[23]) . ",
                " . $this->addQuota($row[24]) . ",
                " . $this->addQuota($row[25]) . ",
                " . $this->addQuota($row[26]) . ",
                " . $this->addQuota($row[27]) . ",
                " . $this->addQuota($row[28]) . ",
                " . $this->addQuota($row[29]) . ",
                " . $this->addQuota($row[30]) . ",
                " . $this->addQuota($row[31]) . ",
                " . $this->addQuota($row[32]) . ",
                " . $this->checkString($row[33]) . ",
                " . $this->addQuota($row[34]) . ",
                " . $this->addQuota($row[35]) . ",
                " . $this->addQuota($row[36]) . ",
                " . $this->addQuota($row[37]) . ",
                " . $this->addQuota($row[38]) . ",
                " . $this->addQuota($row[39]) . ",
                " . $this->addQuota($row[40]) . ",
                " . $this->addQuota($row[41]) . ",
                " . $this->addQuota($row[42]) . ",
                " . $this->checkString($row[43]) . ",
                " . $this->addQuota($row[44]) . ",
                " . $this->addQuota($row[45]) . ",
                " . $this->addQuota($row[46]) . ",
                " . $this->addQuota($row[47]) . ",
                " . $this->addQuota($row[48]) . ",
                " . $this->checkNull($row[49]) . ",
                " . $this->addQuota($row[50]) . ",
                " . $this->addQuota($row[51]) . ",
                " . $this->addQuota($row[52]) . ",
                " . $this->addQuota($row[53]) . ",
                " . $this->addQuota($row[54]) . ",
                " . $this->checkNull($row[55]) . ",
                " . $this->addQuota($row[56]) . ",
                " . $this->checkNull($row[57]) . ",
                " . $this->addQuota($row[58]) . ",
                " . $this->checkNull($row[59]) . ",
                " . $this->addQuota($row[60]) . ",
                " . $this->checkNull($row[61]) . ",
                " . $this->addQuota($row[62]) . ",
                " . $this->checkNull($row[63]) . ",
                " . $this->addQuota($row[64]) . ",
                " . $this->checkNull($row[65]) . ",
                " . $this->checkString($row[66]) . ",
                " . $this->addQuota($row[67]) . ",
                " . $this->addQuota($row[69]) . ",
                " . $this->addQuota($row[70]) . ",
                " . $this->addQuota($row[71]) . ",
                " . $this->addQuota($row[72]) . ")";
                
    }

    public function set_date_into_ShopifyOrder_table($highest_data_row, $sheetData)
    {
        $result['is_error'] = false;
        $result['msg_type'] = 's';
        $result['msg'] = 'data saved successfully';
        $result['there_is_exceptions'] = false;
        $exceptions = [];
        $con = new DB_CONNECT();
        for ($row = 1; $row < $highest_data_row; $row++) {
            $quary_String = $this->insert_into_shopify_orders_table($sheetData[$row]);
            $statement = $con->getMysqli()->prepare($quary_String);
            $res = ($statement != false) ? $statement->execute() : $statement;
            if ($res == false) {
                $hit = 'The storage process for The Row ' . ($row + 1) . ' was failed '. $con->getMysqli()->error;
                array_push($exceptions, $hit);
                $result['there_is_exceptions'] = true;
            }
        }
        if($result['there_is_exceptions']){
            $result['msg'] = 'There are some errors';
            $result['msg_type'] = 'w';
        }
        $result['exceptions'] = $exceptions;
        return $result;
    }

    ///////////////////////// Amazon_orders_raw //////////////////////////////
    public function insert_into_Amazon_orders_raw_table($row)
    {
        return $formula = "INSERT INTO `Amazon_orders_raw` (
                    `order_id`,
                    `merchant_order_id`,
                    `shipment_id`,
                    `shipment_item_id`,
                    `amazon_order_item_id`,
                    `merchant_order_item_id`,
                    `order_date`,
                    `payments_date`,
                    `shipment_date`,	
                    `reporting_date`,	
                    `Hashed_email`,	
                    `buyer_name`,	
                    `buyer_phone_number`,	
                    `sku`,	
                    `product_name`,	
                    `item_quantity`,	
                    `currency`,	
                    `item_price`,	
                    `item_tax`,	
                    `shipping_price`,	
                    `shipping_tax`,	
                    `gift_wrap_price`,	
                    `gift_wrap_tax`,	
                    `ship_service_level`,	
                    `recipient_name`,	
                    `ship-address-1`,	
                    `ship-address-2`,	
                    `ship-address-3`,	
                    `ship-city`,	
                    `ship-state`,	
                    `ship-postal-code`,	
                    `ship-country`,	
                    `ship_phone_number`,	
                    `bill_address_1`,	
                    `bill_address_2`,	
                    `bill_address_3`,	
                    `bill_city`,	
                    `bill_state`,	
                    `bill_postal_code`,	
                    `bill_country`,	
                    `item_promotion_discount`,	
                    `ship_promotion_discount`,	
                    `carrier`,	
                    `tracking_number`,	
                    `estimated_arrival_date`,	
                    `fulfillment_center_id`,	
                    `fulfillment_channel`,	
                    `sales_channel`	
      )VALUES(
                " . $this->addQuota($row[0]) . ",
                " . $this->addQuota($row[1]) . ",
                " . $this->addQuota($row[2]) . ",
                " . $this->addQuota($row[3]) . ",
                " . $this->addQuota($row[4]) . ",
                " . $this->addQuota($row[5]) . ",
                " . $this->preparDateTime($row[6]) . ",
                " . $this->preparDateTime($row[7]) . ",
                " . $this->preparDateTime($row[8]) . ",
                " . $this->preparDateTime($row[9]) . ",
                " . $this->checkString($row[10]) . ",
                " . $this->addQuota($row[11]) . ",
                " . $this->checkString($row[12]) . ",
                " . $this->addQuota($row[13]) . ",
                " . $this->addQuota($row[14]) . ",
                " . $this->checkNull($row[15]) . ",
                " . $this->addQuota($row[16]) . ",
                " . $this->checkNull($row[17]) . ",
                " . $this->checkNull($row[18]) . ",
                " . $this->checkNull($row[19]) . ",
                " . $this->checkNull($row[20]) . ",
                " . $this->checkNull($row[21]) . ",
                " . $this->checkNull($row[22]) . ",
                " . $this->addQuota($row[23]) . ",
                " . $this->addQuota($row[24]) . ",
                " . $this->addQuota($row[25]) . ",
                " . $this->addQuota($row[26]) . ",
                " . $this->addQuota($row[27]) . ",
                " . $this->addQuota($row[28]) . ",
                " . $this->addQuota($row[29]) . ",
                " . $this->addQuota($row[30]) . ",
                " . $this->addQuota($row[31]) . ",
                " . $this->checkString($row[32]) . ",
                " . $this->addQuota($row[33]) . ",
                " . $this->addQuota($row[34]) . ",
                " . $this->addQuota($row[35]) . ",
                " . $this->addQuota($row[36]) . ",
                " . $this->addQuota($row[37]) . ",
                " . $this->addQuota($row[38]) . ",
                " . $this->addQuota($row[39]) . ",
                " . $this->checkNull($row[40]) . ",
                " . $this->checkNull($row[41]) . ",
                " . $this->addQuota($row[42]) . ",
                " . $this->addQuota($row[43]) . ",
                " . $this->preparDateTime($row[44]) . ",
                " . $this->addQuota($row[45]) . ",
                " . $this->addQuota($row[46]) . ",
                " . $this->addQuota($row[47]) . ")";
    }

    public function set_date_into_AmazonOrderRaw_table($highest_data_row, $sheetData)
    {
        $result['is_error'] = false;
        $result['msg_type'] = 's';
        $result['msg'] = 'data saved successfully';
        $result['there_is_exceptions'] = false;
        $exceptions = [];
        $con = new DB_CONNECT();
        for ($row = 1; $row < $highest_data_row; $row++) {
            $quary_String = $this->insert_into_Amazon_orders_raw_table($sheetData[$row]);
            $statement = $con->getMysqli()->prepare($quary_String);
            $res = ($statement != false) ? $statement->execute() : $statement;
            if ($res == false) {
                $hit = 'The storage process for The Row ' . ($row + 1) . ' was failed , '. $con->getMysqli()->error;
                array_push($exceptions, $hit);
                $result['there_is_exceptions'] = true;
            }
        }
        if($result['there_is_exceptions']){
            $result['msg'] = 'There are some errors';
            $result['msg_type'] = 'w';
        }
        $result['exceptions'] = $exceptions;
        return $result;
    }

    ///////////////////////// Amazon_orders //////////////////////////////
    public function insert_into_Amazon_orders_table($row)
    {
        return $formula = "INSERT INTO `amazon_orders` (
               `order_id`,	
               `merchant_order_id`,	
               `shipment_id`,	
               `shipment_item_id`,	
               `amazon_order_item_id`,	
               `merchant_order_item_id`,	
               `order_date`,	
               `payments_date`,	
               `shipment_date`,	
               `reporting_date`,	
               `Hashed_email`,	
               `buyer_name`,	
               `buyer_phone_number`,
               `sku`,	
               `product_name`,	
               `item_quantity`,	
               `currency`,	
               `item_price`,	
               `item_tax`,	
               `shipping_price`,	
               `shipping_tax`,	
               `gift_wrap_price`,	
               `gift_wrap_tax`,	
               `ship_service_level`,	
               `recipient_name`,	
               `ship-address-1`,	
               `ship-address-2`,	
               `ship-address-3`,	
               `ship-city`,	
               `ship-state`,	
               `ship-postal-code`,	
               `ship-country`,	
               `ship_phone_number`,	
               `bill_address_1`,	
               `bill_address_2`,	
               `bill_address_3`,	
               `bill_city`,	
               `bill_state`,	
               `bill_postal_code`,	
               `bill_country`,	
               `item_promotion_discount`,	
               `ship_promotion_discount`,	
               `carrier`,	
               `tracking_number`,	
               `estimated_arrival_date`,	
               `fulfillment_center_id`,	
               `fulfillment_channel`,	
               `sales_channel`,		
               `buyer_name1`,		
               `First Name`, 	
               `Middle Name`,	
               `Last Name`, 							
               `shipping_address1`,	
               `shippping_address2`,	
               `shipping_address3`,	
               `city`,	
               `state`,	
               `zip`,	
               `country`,	
               `sku1`        
        )VALUES(
               " . $this->addQuota($row[0]) . ",
               " . $this->addQuota($row[1]) . ",
               " . $this->addQuota($row[2]) . ",
               " . $this->addQuota($row[3]) . ",
               " . $this->addQuota($row[4]) . ",
               " . $this->addQuota($row[5]) . ",
               " . $this->preparDateTime($row[6]) . ",
               " . $this->preparDateTime($row[7]) . ",
               " . $this->preparDateTime($row[8]) . ",
               " . $this->preparDateTime($row[9]) . ",
               " . $this->checkString($row[10]) . ",
               " . $this->addQuota($row[11]) . ",
               " . $this->checkString($row[12]) . ",
               " . $this->addQuota($row[13]) . ",
               " . $this->addQuota($row[14]) . ",
               " . $this->checkNull($row[15]) . ",
               " . $this->addQuota($row[16]) . ",
               " . $this->checkNull($row[17]) . ",
               " . $this->checkNull($row[18]) . ",
               " . $this->checkNull($row[19]) . ",
               " . $this->checkNull($row[20]) . ",
               " . $this->checkNull($row[21]) . ",
               " . $this->checkNull($row[22]) . ",
               " . $this->addQuota($row[23]) . ",
               " . $this->addQuota($row[24]) . ",
               " . $this->addQuota($row[25]) . ",
               " . $this->addQuota($row[26]) . ",
               " . $this->addQuota($row[27]) . ",
               " . $this->addQuota($row[28]) . ",
               " . $this->addQuota($row[29]) . ",
               " . $this->addQuota($row[30]) . ",
               " . $this->addQuota($row[31]) . ",
               " . $this->checkString($row[32]) . ",
               " . $this->addQuota($row[33]) . ",
               " . $this->addQuota($row[34]) . ",
               " . $this->addQuota($row[35]) . ",
               " . $this->addQuota($row[36]) . ",
               " . $this->addQuota($row[37]) . ",
               " . $this->addQuota($row[38]) . ",
               " . $this->addQuota($row[39]) . ",
               " . $this->checkNull($row[40]) . ",
               " . $this->checkNull($row[41]) . ",
               " . $this->addQuota($row[42]) . ",
               " . $this->addQuota($row[43]) . ",
               " . $this->preparDateTime($row[44]) . ",
               " . $this->addQuota($row[45]) . ",
               " . $this->addQuota($row[46]) . ",
               " . $this->addQuota($row[47]) . ",
               
               " . $this->addQuota($row[49]) . ",
               " . $this->addQuota($row[51]) . ",
               " . $this->addQuota($row[52]) . ",                              
               " . $this->addQuota($row[53]) . ",
               
               " . $this->addQuota($row[60]) . ",
               " . $this->addQuota($row[61]) . ",
               " . $this->addQuota($row[62]) . ",
               " . $this->addQuota($row[63]) . ",                              
               " . $this->addQuota($row[64]) . ",
               " . $this->addQuota($row[65]) . ",
               " . $this->addQuota($row[66]) . ",  
               " . $this->addQuota($row[67]) . ")";
    }

    public function set_date_into_AmazonOrder_table($highest_data_row, $sheetData)
    {
        $result['is_error'] = false;
        $result['msg'] = 'data saved successfully';
        $result['there_is_exceptions'] = false;
        $result['msg_type'] = 's';
        $exceptions = [];
        $con = new DB_CONNECT();
        for ($row = 1; $row < $highest_data_row; $row++) {
            $q = $this->insert_into_Amazon_orders_table($sheetData[$row]);
            $statement = $con->getMysqli()->prepare($q);
            $res = ($statement != false) ? $statement->execute() : $statement;
            if ($res == false) {
                $hit = 'The storage process for The Row ' . ($row + 1) . ' was failed ,'. $con->getMysqli()->error;
                array_push($exceptions, $hit);
                $result['there_is_exceptions'] = true;
            }
        }

        if($result['there_is_exceptions']){
            $result['msg'] = 'There are some errors';
            $result['msg_type'] = 'w';
        }
        $result['exceptions'] = $exceptions;
        return $result;
    }
    ///////////////////////////////////////////////////////

    public function addQuota($name){
        $name = str_replace('"','\"',$name);
        return ($name == null) ? 'null' : '"'.$name.'"';
    }

    public function checkNull($var){
        return ($var == null) ? "null" : $var;
    }

    public function checkString($var){
        return ($var == null) ? '"N/A"' : '"'.$var.'"';
    }

    public function preparDateTime($string_value){
        $t_is_founded = false;
        $str = [];
        if (strpos($string_value, 'T') !== false) {
            $str = explode('T',$string_value);
            $t_is_founded = true;
        }
        $d= new DateTime();
        if($t_is_founded){
            $d->setTimestamp(strtotime($str[0]));
        }
        else {
            $d->setTimestamp(strtotime($string_value));
        }
        return '"'.$d->format('Y-m-d G:i').'"';
//        return '"'.$d->format('n/d/Y g:i:s A').'"';
    }

}