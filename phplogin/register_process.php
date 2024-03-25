<?php
// Start a new session
session_start();

// Include database connection file
include "db_conn.php";

// Autoload PHPMailer files
require 'vendor/autoload.php';

// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Generate a random verification code with a specified length (default is 6)
 *
 * @param int $length
 * @return int
 */
function generateVerificationCode($length = 6) {
    return rand(pow(10, $length-1), pow(10, $length)-1);
}

// If username, email, and password are provided
if (isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password'])) {
    /**
     * Validate user input by removing leading and trailing spaces, stripping slashes, and converting special characters to HTML entities
     *
     * @param string $data
     * @return string
     */
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validate user input
    $username = validate($_POST['uname']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    // Check if the username field is empty
    if (empty($username)) {
        header("Location: register.php?error=Username is required");
        exit();
    }

    // Check if the email field is empty
    if (empty($email)) {
        header("Location: register.php?error=Email is required");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=Invalid email format");
        exit();
    }

    // Check if the password field is empty
    if (empty($password)) {
        header("Location: register.php?error=Password is required");
        exit();
    }

    // Generate a verification code
    $verificationCode = generateVerificationCode();

    // Configure PHPMailer to send an email
    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com';
        $mail->Password = 'your_password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('your_email@gmail.com', 'Your Name');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Verification Code';
        $mail->Body = 'Your verification code is: ' . $verificationCode;

        // Send the email with the verification code
        $mail->send();

        // Save the verification code to the session
        $_SESSION['verification_code'] = $verificationCode;

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        exit();
    }

    // Redirect to the verification page
    header("Location: verify.php");
    exit();

} else {
    // Redirect to the registration page
    header("Location: register.php");
    exit();
}
?>