<?php
    // prevent opening without login
    if ( session_id() === "" ) { session_start(); }
    if(!(isset($_SESSION['role_session']))){
        header('location:login.php');
    }
    include("dbConnection.php");

// Select records from customer table
$select_query = mysqli_query($conn,"SELECT customer.name,customer.father_name,customer.contact_num,debt_detail.debt_amount,debt_detail.debt_date
                                    FROM debt_detail INNER JOIN customer ON debt_detail.cust_id = customer.cust_id");
      ?>