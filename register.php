<?php
//include database connection
include("dbConnection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Check if username and password meet requirements
    if(strlen($username) < 6){
        $error_message = "Username must be at least 6 characters long.";
    } else if(strlen($password) < 8){
        $error_message = "Password must be at least 8 characters long.";
    } else{
        // add username and password into the database
        $query = "INSERT INTO pharmacist VALUES (?, ?, ?);";
        //Prepare the query
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sss', $username, $hashedPassword, $role);
        mysqli_stmt_execute($stmt);
        // header('location:home.php');
        $success_message = "Registration Successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <link rel="stylesheet" href="css/register.css">

    </head>
    <body>
        <div class="container">
            <h1 class="mt-5">Registration Form</h1>
            <?php if (isset($error_message)):?>
            <div id="error_message" class="alert alert-danger mt-3" role="alert"> <?php echo $error_message; ?> </div>
            <?php endif; ?>
            <?php if (isset($success_message)):?>
            <div class="alert alert-success mt-3" role="alert"> <?php echo $success_message; ?> </div>
            <?php endif; ?>
            <form method="post" action="register.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label><b>
                    <select id="role" name="role" class="form-control">
                        <option class="w3-text-black">admin</option>
                        <option class="w3-text-black">seller</option>
                        <option class="w3-text-black">visitor</option>      
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="login.php"><button type="button" class="btn btn-primary float-right">Login</button></a>
            </form>
        </div>
        <script src="js/jQuery.js"></script>
        <script>
            // Add event listener to hide error message when input is focused.
            $(document).ready(function(){
                $('#username').focus(function(){
                    $('#error_message').hide();
                });
                $('#password').focus(function(){
                    $('#error_message').hide();
                });
            });
        </script>
    </body>
</html>