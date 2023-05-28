<?php
    // iclude connection with database
    include("dbConnection.php");
    // start session
    if ( session_id() == "" ) { session_start(); }

    
    // if user submits username and password
    if (isset($_POST['submit'])) {
        $username = $_POST['username']; // get username from input field
        $password = $_POST['password']; // get password from input field

        // Perform the validation checks
        if (strlen($username) < 6) {
            $error_message = "Username must be at least 6 characters long.";
        } else if (strlen($password) < 8) {
            $error_message = "Password must be at least 8 characters long.";
        } else {
            // Select username and password from user table in the database
            $query = "SELECT name, password, role FROM pharmacist WHERE name = ?";
            // Prepare the SQL statement
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Check if a matching user is found
            if ($row = mysqli_fetch_assoc($result)) {
                // Verify the password
                if (password_verify($password, $row['password'])) {
                    $role = $row['role'];
                    $_SESSION['role_session'] = $role;
                    header('Location: index.php?role='. $role);
                    exit;
                } else {
                    // Invalid password
                    $error_message = "Invalid password.";
                }
            } else {
                // Invalid username
                $error_message = "Invalid username.";
            }
        }

        // Display the error message, if any
        if (isset($error_message)) {
            echo $error_message;
        }
    }

?>