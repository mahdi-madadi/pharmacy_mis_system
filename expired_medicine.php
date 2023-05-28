<?php
//include database connection
include("dbConnection.php");
// count the number of medicines which will become expire 2 months later
// get current date
$date = getdate();
$year = $date['year'];
$mont = $date['mon'];
$day = $date['mday'];
// create current date with date_create() func
$curdate=date_create("$year-$mont-$day");
// add two months to the current date
date_add($curdate,date_interval_create_from_date_string("60 days"));
$two_month_later = date_format($curdate,"Y-m-d");
// select and count the short date medicine
$select_number = mysqli_query($conn, "SELECT 
COUNT(exp_date) AS c FROM medicine WHERE exp_date <= '$two_month_later'");
if (mysqli_num_rows($select_number) > 0){
    // number of short date medicine
    $number_of_medicine = mysqli_fetch_assoc($select_number)['c'];
}
else{
    $number_of_medicine = "0";
}
?>