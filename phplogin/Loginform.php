<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="stylesheet.css">

  <!-- The HTML document contains a simple login form with fields for user name and password -->
  <!-- If there are any error messages from the previous submission, they will be displayed using the "error" class -->
  <!-- The form uses the POST method to submit data to the "index.php" file -->

</head>
<body>
  <div class="wrapper">
    <form action="index.php" method="POST">
      <h2>Login</h2>
	  <?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
	  <?php } ?>

	  <!-- If the user has submitted the form and there is an error message, display the error message using the "error" class -->

      <div class="input-field">
        <input type="text" name="uname" placeholder="User Name" required><br>
        <label for="uname">User Name</label>
      </div>

      <!-- The user name input field is a required text field with a placeholder for user name input -->

      <div class="input-field">
	  <input type="password" name="password" placeholder="Password" required><br>
        <label for="password">Password</label>
      </div>

      <!-- The password input field is a required password field with a placeholder for password input -->

      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <span>Remember me</span>
        </label>
        <a href="forgotpassword_process.php">Forgot password?</a>
      </div>

      <!-- The "forget" section contains a checkbox for the user to choose if they want to be remembered and a link to the "forgot password" feature -->

      <button type="submit">Log In</button>

      <!-- The "Log In" button submits the login form data -->

      <div class="register">
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </div>

      <!-- The "register" section contains a link to the registration page for new users -->

    </form>
  </div>
</body>
</html>