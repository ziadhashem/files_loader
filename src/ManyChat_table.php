<?php
include_once(__DIR__.'/header.php');
?>
<div class="grid-panel">
    <div class="well well-lg">
        <div class="row">
            <table class="table" id="many_chat_grid">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First_name</th>
                    <th>Last_name</th>
                    <th>Gender</th>
                    <th>Phone_number</th>
                    <th>Phone_no</th>

                    <th>T_User_phone</th>
                    <th>Address</th>
                    <th>Mailing_Address</th>
                    <th>Email</th>
                    <th>T_email</th>
                    <th>Email_address</th>

                    <th>Catapult_System_Email_Used</th>
                    <th>Catapult_System_PayPal_Email_Address</th>
                    <th>Email_Free_Cartridge</th>
                    <th>Email_Free_Shower_Arm_PRSH</th>
                    <th>RSH_WOF_customer_rebate_email</th>
                    <th>ST_Amazon_Hashed_Email</th>

                    <th>ST_Customer_Rebate_Email</th>
                    <th>S.T.Customer.RebateInfo.Email</th>
                    <th>Opted_in_for_email</th>
                    <th>Opted_in_for_SMS</th>
                    <th>Amazon_Order_Number</th>
                    <th>Catapult_System_GC_Order_ID_Number</th>

                    <th>Catapult_System_Order_ID_Number</th>
                    <th>Catapult_System_PP_Order_ID_Number</th>
                    <th>FSH_1P_Order_ID_Walmart</th>
                    <th>PRSH-C_Order_ID_Walmart</th>
                    <th>RSH_C_Order_ID_Walmart</th>
                    <th>ST_Rebate_Order_ID</th>
                    <th>NOTES</th>
                    <th>note1</th>
                    <th>note2</th>
                    <th>note3</th>
                    <th>note4</th>
                    <th>note5</th>
                    <th>note6</th>
                    <th>note7</th>
                    <th>note8</th>
                    <th>note9</th>
                    <th>note10</th>
                </tr>
                </thead>
<!--                <tbody>-->
<!--                --><?php
//                $con = new DB_CONNECT();
//                $result = $con->getMysqli()->query("SELECT * FROM `manychat`");
//                if($result){
//                    if(mysqli_num_rows($result) > 0){
//                        while($row = mysqli_fetch_assoc($result)){
//                            echo  "<tr>";
//                            echo  "<td>".$row['ID']."</td>";
//                            echo  "<td>".$row['First_name']."</td>";
//                            echo  "<td>".$row['Last_name']."</td>";
//                            echo  "<td>".$row['Gender']."</td>";
//                            echo  "<td>".$row['Phone_number']."</td>";
//                            echo  "<td>".$row['Phone_no']."</td>";
//
//                            echo  "<td>".$row['T_User_phone']."</td>";
//                            echo  "<td>".$row['Address']."</td>";
//                            echo  "<td>".$row['Mailing_Address']."</td>";
//                            echo  "<td>".$row['Email']."</td>";
//                            echo  "<td>".$row['T_email']."</td>";
//                            echo  "<td>".$row['Email_address']."</td>";
//
//                            echo  "<td>".$row['Catapult_System_Email_Used']."</td>";
//                            echo  "<td>".$row['Catapult_System_PayPal_Email_Address']."</td>";
//                            echo  "<td>".$row['Email_Free_Cartridge']."</td>";
//                            echo  "<td>".$row['Email_Free_Shower_Arm_PRSH']."</td>";
//                            echo  "<td>".$row['RSH_WOF_customer_rebate_email']."</td>";
//                            echo  "<td>".$row['ST_Amazon_Hashed_Email']."</td>";
//
//                            echo  "<td>".$row['ST_Customer_Rebate_Email']."</td>";
//                            echo  "<td>".$row['S_T_Customer_RebateInfo_Email']."</td>";
//                            echo  "<td>".$row['Opted_in_for_email']."</td>";
//                            echo  "<td>".$row['Opted_in_for_SMS']."</td>";
//                            echo  "<td>".$row['Amazon_Order_Number']."</td>";
//                            echo  "<td>".$row['Catapult_System_GC_Order_ID_Number']."</td>";
//
//                            echo  "<td>".$row['Catapult_System_Order_ID_Number']."</td>";
//                            echo  "<td>".$row['Catapult_System_PP_Order_ID_Number']."</td>";
//                            echo  "<td>".$row['FSH_1P_Order_ID_Walmart']."</td>";
//                            echo  "<td>".$row['PRSH-C_Order_ID_Walmart']."</td>";
//                            echo  "<td>".$row['RSH_C_Order_ID_Walmart']."</td>";
//                            echo  "<td>".$row['ST_Rebate_Order_ID']."</td>";
//                            echo  "<td>".$row['NOTES']."</td>";
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
        $('#many_chat_grid').DataTable( {
            scrollX: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            ajax: "ManyChat_ajax.php"
        });
        $('#breadcrumb').append('<li class="breadcrumb-item active" aria-current="page">ManyChat Table</li>');
    });
</script>
<?php
include_once(__DIR__.'/footer.php');
?>
