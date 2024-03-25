<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="reg.css">
  <style>
    .error{
      color: red;
    }
  </style>
</head>
<body>
  <h2>Forgot Password</h2> <!-- Title of the page, indicating the process to reset a forgotten password. -->
  <div class="wrapper"> <!-- Container to hold the form for email input. -->
    <form action="forgotpassword_process.php" method="POST"> <!-- Form for handling the email input and sending it to the server-side script. -->
      <label for="email">Email:</label><br> <!-- Label for the email input field, indicating the type of information required. -->
      <input type="email" id="email" name="email" required><br><!-- Email input field, accepting user's email address for password reset. The 'required' attribute ensures that the user has to input a valid email address. -->
      <button type="submit">Reset Password</button> <!-- Button to submit the email input for password reset process. -->
    </form>
  </div>

  <!-- Display error message if one exists. -->
  <?php
    if (isset($_GET['error'])){
      $error = $_GET['error'];
      echo "<p class='error'>$error</p>";
    }
  ?>
</body>
</html>