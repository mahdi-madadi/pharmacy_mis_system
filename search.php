<?php
    //include database connection
    include("dbConnection.php");
    // user input
    if(isset($_POST["search_query"])){
        $search_query = strtolower($_POST["search_query"]);
    }
    else{
        $search_query = "";
    }
    
    // select the the medicine if matched the input value
    $select_query = mysqli_query($conn,"SELECT medicine.generic_name,medicine.comm_name,medicine.exp_date,
                    purchase.purchase_amount,medicine.retail_price,medicine_catagory.catagory_name
                    FROM ((purchase
                    INNER JOIN medicine ON purchase.med_id = medicine.med_id)
                    INNER JOIN medicine_catagory ON medicine.catagory_id = medicine_catagory.catagory_id)
                    WHERE medicine.generic_name
                    LIKE  '%$search_query%' OR medicine.comm_name 
                    LIKE '%$search_query%'");
    // if($select_query){
    //     $data = array();
    //     while ($row = mysqli_fetch_assoc($select_query)){
    //         $data[] = $row;
    //     }
    //     $serializedData = urldecode(serialize($data));
    //     header('location:index.php?data=' .$serializedData);
    // }
?>