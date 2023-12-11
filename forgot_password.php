<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require __DIR__ . '/vendor/autoload.php'; // Include the Composer autoloader

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recoverPassword'])) {
    $forgotUsernameOrEmail = $_POST['forgotUsernameOrEmail'];

    // Validate user input (you might want to add more validation)
    // ...

    // Check if the entered username or email exists in the database
    $query = "SELECT * FROM register WHERE username='$forgotUsernameOrEmail' OR email='$forgotUsernameOrEmail'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Generate a random token for password reset
        $resetToken = bin2hex(random_bytes(32));

        // Update the user record with the reset token
        $updateQuery = "UPDATE register SET reset_token='$resetToken' WHERE username='$forgotUsernameOrEmail' OR email='$forgotUsernameOrEmail'";
        mysqli_query($conn, $updateQuery);

        // Send a password reset link to the user's email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'shyamsundarpujapanda998@gmail.com'; // Replace with your Gmail email address
            $mail->Password = 'efhx wslm kiqu fgwn'; // Replace with your App Password or Gmail password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('shyamsundarpujapanda998@gmail.com', 'Satyajit'); // Replace with your name
            $mail->addAddress($forgotUsernameOrEmail);

            $mail->Subject = 'Password Reset';
            $mail->Body = "Click the following link to reset your password: http://yourwebsite.com/reset_password.php?token=$resetToken";

            $mail->send();
            echo "Password reset link sent to your email.";
        } catch (Exception $e) {
            echo "Failed to send the reset link. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "User not found. Please check your input.";
    }
}
?>
<!-- Add the HTML form for password recovery -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content -->
</head>
<body>
    <div class="login-box">
        <h2 style="color: #ffffff;">Password Recovery</h2>
        <form action="forgot_password.php" method="post">
            <p>Enter your username or email to recover your password:</p>
            <input type="text" id="forgotUsernameOrEmail" name="forgotUsernameOrEmail" required>
            <button type="submit" name="recoverPassword">Recover Password</button>
        </form>
    </div>
</body>
</html>
