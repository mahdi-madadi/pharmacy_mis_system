<?php
// prevent opening without login
if ( session_id() === "" ) { session_start(); }
if(!(isset($_SESSION['role_session']))){
    header('location:login.php');
}
//set default time zone to Kabul
date_default_timezone_set("Asia/Kabul");
//include database connection
include("dbConnection.php");

// Select catagory
$catagory_select = mysqli_query($conn,"SELECT catagory_name FROM medicine_catagory;");
?>