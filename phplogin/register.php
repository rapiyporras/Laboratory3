<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="reg.css">
  <style>
    .error{
      color: red;
    }
  </style>
</head>
<body>
  <h2>Registration Form</h2> <!-- Displays the title of the registration form -->
  <form action="register_process.php" method="POST"> <!-- Defines the form used for user registration and its method -->
    <label for="username">Username:</label><br> <!-- Label for the username input field -->
    <input type="text" id="username" name="username" required><br> <!-- Input field for the username with the 'required' attribute -->

    <label for="email">Email:</label><br> <!-- Label for the email input field -->
    <input type="email" id="email" name="email" required><br> <!-- Input field for the email with the 'required' attribute -->

    <label for="password">Password:</label><br> <!-- Label for the password input field -->
    <input type="password" id="password" name="password" required><br> <!-- Input field for the password with the 'required' attribute -->

    <label for="confirm_password">Confirm Password:</label><br> <!-- Label for the password confirmation input field -->
    <input type="password" id="confirm_password" name="confirm_password" required><br> <!-- Input field for the password confirmation with the 'required' attribute -->

    <button type="submit">Register</button> <!-- Submit button for the registration form -->
  </form>

  <?php <!-- PHP section to check for errors and display them if they exist -->
    if (isset($_GET['error'])){
      $error = $_GET['error'];
      echo "<p class='error'>$error</p>";
    }
  ?>
</body>
</html>