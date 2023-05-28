<?php
include("dbConnection.php");
date_default_timezone_set("Asia/Kabul");
// prevent opening without login
if ( session_id() === "" ) { session_start(); }
if(!(isset($_SESSION['role_session']))){
    header('location:login.php');
}

// --------------------------------------------
// insert the medicines which are expired into expire_medicine talbe
$select_columns = mysqli_query($conn,"SELECT exp_date, purchase_amount,purchase_price FROM purchase
            INNER JOIN medicine ON purchase.med_id = medicine.med_id WHERE exp_date < CURDATE();");

if(mysqli_num_rows($select_columns) > 0){
    while ($columns = mysqli_fetch_assoc($select_columns)){
        // store each column in a variable 
        $expired_date = $columns['exp_date'];
        $amount = $columns['purchase_amount'];
        $whole_sale_price = $columns['purchase_price'];

        // insert data
        mysqli_query($conn,"INSERT INTO expire_medicine VALUES
         (NULL,'$expired_date',$amount,$whole_sale_price);");
        
        // delete expired medicine from database
        mysqli_query($conn,"DELETE FROM medicine WHERE exp_date = '$expired_date ' ");
    }
}

// -------------------------------------------------




// -------------------------------------------------
$benefit = array();
if(isset($_REQUEST['date'])){
    //Get the date which is sent
    $date = $_REQUEST['date'];
    //split date into to get month
    $split_date = str_split($date);
    // get only the month
    
    if(count($split_date) == 1){
        $_SESSION['err'] = "Choose A Date!";
    }
    else{
        $month = $split_date[5].$split_date[6];
        // select benefit which the date is entered by the client
        $select_benefit = mysqli_query($conn,"SELECT net_benefit FROM benefit WHERE month(date) = $month");
        if(mysqli_num_rows($select_benefit) > 0){
            while ($benefit_record = mysqli_fetch_assoc($select_benefit)){
                $benefit[count($benefit)] = $benefit_record['net_benefit'];
            }
        }

    }
    

}
?>