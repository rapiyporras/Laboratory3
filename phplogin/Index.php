<?php

// Start the session to ensure the availability of session variables across pages
session_start();

// Include the database connection file
include "db_conn.php";

// Function to sanitize user inputs and prepare them for direct usage in the code
function validate($data) {
    // Trim the data to remove any leading or trailing spaces
    $data = trim($data);

    // Remove any backslashes from the data
    $data = stripslashes($data);

    // Convert special characters to their HTML entities to prevent any possible code injection
    $data = htmlspecialchars($data);

    // Return the sanitized data
    return $data;
}

if (isset($_POST['uname']) && isset($_POST['password'])) {
    // Validate the user inputs
    $username = validate($_POST['uname']);
    $password = validate($_POST['password']);

    // If the username is empty, display an error message and exit the script
    if (empty($username)) {
        header("Location: Loginform.php?error=Username is required");
        exit();
    }
    // If the password is empty, display an error message and exit the script
    elseif (empty($password)) {
        header("Location: Loginform.php?error=Password is required");
        exit();
    }
    // If the username and password are not empty, process the login
    else {
        // Prepare a query to select the user from the user table based on the provided username
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");

        // Bind the parameter to the query and execute the prepared statement
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // If the user exists, check if the provided password matches the one stored in the database
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                // Create a session with user-specific information and redirect to the home page
                $_SESSION['user_name'] = $row['username'];
                $_SESSION['last_name'] = $row['Lastname'];
                $_SESSION['first_name'] = $row['First_name'];
                $_SESSION['Middle_name'] = $row['Middle_name'];
                $_SESSION['user_id'] = $row['user_id'];
                header("Location: home.php");
                exit();
            }
            else {
                header("Location: Loginform.php?error=Incorrect password");
                exit();
            }
        }
        else {
            header("Location: Loginform.php?error=Incorrect username");
            exit();
        }
    }
}
else {
    header("Location: Loginform.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="stylesheet.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="index.php" method="POST">
            <!-- Login form layout and labels -->
        </form>
    </div>
</body>
</html>