<?php
include("search.php");
if($select_query){
    $data = array();
    while ($row = mysqli_fetch_assoc($select_query)){
        $data[] = $row;
    }
}
else {
    include("home_php_code.php");   
}

if (isset($_GET['role'])){
    $role = $_GET['role'];
}
else {
    $role = 'visitor';
}
if ( session_id() === "" ) { session_start(); }
if (isset($_SESSION['role_session'])){
    $role_session = $_SESSION['role_session'];
}
else{
    $role_session = 'visitor';
}
// prevent opening without login
if ($role === 'admin' and $role_session === 'admin') {
    include("admin.php");
} elseif ($role === 'seller' and $role_session === 'seller') {
    include("seller.php");
} else {
    include("visitor.php");
}

?>