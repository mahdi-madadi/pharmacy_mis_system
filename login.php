<?php
include("login_php_code.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo "First Commit."; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="w3.css/w3.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/login.css">
    
   
</head>

<body class="w3-container" style="background-image:url('image/cupsol.jpg')">
    

    <div class="w3-content w3-card-4 w3-display-middle" style="width:50%;">
        <div class="tooltip w3-display-container w3-light-gray w3-center w3-round">
                <img src="image/Mahdi.jpg" alt="Avatar" class="w3-image w3-circle w3-margin-top" style="width:20%;">
                <div class="w3-container w3-padding-16">Authentication</div>
        </div>

        <form onsubmit="return validate();" name="login_form" class="w3-container w3-indigo" action='<?php echo htmlspecialchars("login.php");?>' method="post">
            <p class="w3-padding-16">
                <input autocomplete="off" id="user" onfocus="clean(this)" class="w3-input w3-border w3-round-large" type="text" name="username"
                placeholder="| Username" style="padding-left:40px;" required>
            </p>
            <p>
                <input autocomplete="off" id="pass" onfocus="clean(this)" class="w3-input w3-border w3-round-large" type="password" name="password" placeholder="| Password" style="padding-left:40px;" required>
            </p>
            <?php if (isset($error_message)):?>
            <div id="error_message" class="w3-container w3-padding-16 w3-red" role="alert"> <?php echo $error_message; ?> </div>
            <?php endif; ?>
            <p>
                <input type="submit" name="submit" value="LOGIN" class="w3-btn w3-black w3-round w3-mobile bottom-margin">
                <?php
                    if(!isset($_GET["role"])){
                        $_GET['role'] = "visitor";
                    }
                    if ($_GET["role"] === 'admin'){
                        ?>
                        <a href="register.php" class="w3-btn w3-light-blue w3-right w3-round w3-mobile bottom-margin">Regester</a>
                    <?php
                    }
                ?>
                <div class="cancel_container">
                    <a href="index.php?role=<?php echo $_GET['role']; ?>"class="w3-btn w3-green w3-round w3-mobile bottom-margin">Cancel</a>
                </div>
            </p>
        </form>   
    </div>
    <!-- <script src="js/login.js"></script> -->
    <script src="js/jQuery.js"></script>
        <script>
            // Add event listener to hide error message when input is focused.
            $(document).ready(function(){
                $('#user').focus(function(){
                    $('#error_message').hide();
                });
                $('#pass').focus(function(){
                    $('#error_message').hide();
                });
            });
        </script>

</body>
</html>