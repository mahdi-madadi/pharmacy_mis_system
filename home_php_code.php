<?php
//set default time zone to Kabul
date_default_timezone_set("Asia/Kabul");
//include database connection
include("dbConnection.php");

//select med_id where the purchase amount is zero
$med_id_select = mysqli_query($conn,"SELECT med_id FROM purchase WHERE purchase_amount = 0;");
while ($med_id = mysqli_fetch_assoc($med_id_select)){
    $row = $med_id['med_id'];
    //delete the empty row 
    mysqli_query($conn,"DELETE FROM medicine WHERE med_id = $row");
}

include("search.php");
?>