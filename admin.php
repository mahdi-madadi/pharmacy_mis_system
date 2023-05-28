<?php
include("expired_medicine.php");
if (!isset($_GET['role'])){
    header('location:login.php');
} elseif ($_GET['role'] !== 'admin'){
    header('location:login.php');
}
$role = $_GET['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="w3.css/w3.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .overflow{
            overflow:auto;
        }
    </style>
</head>

<body class="w3-container-fluide" style="background-image:url('image/suspinision.jpg');">

    <!-- Sidebar -->
    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large w3-dark-gray">Close &times;</button>
        <a href="index.php?role=<?php echo $role; ?>" class="w3-bar-item w3-green w3-button"><i class="fa fa-home"></i></a>
        <a href="addNewMedicine.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button">ADD NEW MEDICINE</a>
        <a href="sellMedicine.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button">SELL MEDICINE</a>
        <a href="createReport.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button">REPORT <span class="w3-badge w3-red"><?php echo $number_of_medicine; ?></span></a>
        <a href="owed_customer.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button">OWED CUSTOMER</a>
        <a href="developers.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button">About Us</a>
        <a href="login.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button">LOGIN</a>
        <span> <form method="POST" action="logout.php">
                <input class="w3-bar-item w3-button" type="submit" value="LOGOUT">
            </form>
        </span>
    </div>
    
    <!-- Header -->
    <div id="header" class="w3-light-gray w3-row" style="width:100%;">
        <div class="w3-quarter w3-section w3-mobile">
            <form id="search-form" method="post" action="index.php?role=<?php echo $role; ?>" onsubmit="clearTable()">
                <input id="search_query" type="text" name="search_query" placeholder="Search medicine"
                    class="w3-input w3-border w3-round-large w3-margin-left" style="width:94%"/>
            </form> 
        </div>
        <div id="title" class="w3-half w3-padding w3-mobile">
            <h3 class="w3-opacity w3-center"><b>Pharmacy Management System</b></h3>
        </div>
        <div class="w3-mobile w3-quarter w3-center w3-section">
            <div class="w3-container">
                <?php
                    echo date("l,M d,Y") . "<br>";
                ?>
            </div>
            <div class="w3-container" id="time">
            </div>
        </div>
    </div>
    <div class="w3-bar w3-sand w3-topbar w3-border-dark-blue">
        <a href="index.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button w3-green w3-hide-small w3-hide-medium"><i class="fa fa-home"></i></a>
        <a href="addNewMedicine.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button w3-hide-small w3-hide-medium">ADD NEW MEDICINE</a>
        <a href="sellMedicine.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button w3-hide-small w3-hide-medium">SELL MEDICINE</a>
        <a href="createReport.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button w3-hide-small w3-hide-medium">REPORT <span class="w3-badge w3-red"><?php echo $number_of_medicine; ?></span></a>
        <a href="owed_customer.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button w3-hide-small w3-hide-medium">OWED CUSTOMER</a>
        <a href="developers.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button w3-hide-small w3-hide-medium">About Us</a>
        <a href="login.php?role=<?php echo $role; ?>" class="w3-bar-item w3-button w3-hide-small w3-hide-medium">LOGIN</a>
        <span> <form method="POST" action="logout.php">
                <input class="w3-bar-item w3-button w3-hide-small w3-hide-medium" type="submit" value="LOGOUT">
            </form>
        </span>
        <a href="#" class="w3-bar-item w3-button w3-left
            w3-hide-large" onclick="w3_open()">
            <i class="fa-solid fa-align-justify w3-xlarge"></i>
        </a>
    </div>
    <!-- content of the page -->
    <div class="w3-container w3-content w3-mobile w3-margin-top" style="width:80%;height:480px; overflow:auto;">
        <table class="w3-table-all overflow" id='myTable'>
            <thead>
                <tr>
                    <th class="w3-light-grey" style="position:sticky;top:0;">ID</th>
                    <th class="w3-light-grey" style="position:sticky;top:0;">Gen Name</th>
                    <th class="w3-light-grey" style="position:sticky;top:0;">Com Name</th>
                    <th class="w3-light-grey" style="position:sticky;top:0;">Expire Date</th>
                    <th class="w3-light-grey" style="position:sticky;top:0;">Price</th>
                    <th class="w3-light-grey" style="position:sticky;top:0;">Amount</th>
                    <th class="w3-light-grey" style="position:sticky;top:0;">Catagory</th>
                </tr>
            </thead>
            <?php
                $i = 0;
                foreach($data as $row){
                    $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['generic_name']; ?></td>
                            <td><?php echo $row['comm_name']; ?></td>
                            <td><?php echo $row['exp_date']; ?></td>
                            <td><?php echo $row['retail_price']; ?></td>
                            <td><?php echo $row['purchase_amount']; ?></td>
                            <td><?php echo $row['catagory_name']; ?></td>
                        </tr>
                    <?php 
                }
                ?>
        </table>
    </div>
    <div class="w3-dark-gray w3-center w3-margin-top w3-display-bottom" style="height:100px;">
        <footer>
            <div class="footer-content">
                <h3>Student Project</h3>
                <p>This ofline website is developed by Kabul University students for a local pharmacy to have more control over their business.</p>
                <ul class="socials">
                    <li><a href="https://www.facebook.com/Mahdi Madadi"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://www.teitter.come/Mujtab123"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="https://www.google.com"><i class="fa-brands fa-google-plus"></i></a></li>
                    <li><a href="https://www.youtube.com/mahdiAndmujtabaChanel22"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
                <p style="margin-top:0;"> &copy;<?php echo date("Y");?>. Developed by <span>Mahdi and Mujtaba</span></p>
            </div>
        </footer>
    </div>
    <script src="js/home.js"></script>
</body>
</html>
