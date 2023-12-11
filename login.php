

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: url('harald-pliessnig-x6A4So-djxo-unsplash.jpg') center/cover no-repeat; /* Replace 'your-background-image.jpg' with the path to your background image */
    }

    .login-box {
      background-color: rgba(0, 0, 0, 0.282);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
      max-width: 400px;
      width: 100%;
      font-family: 'Alegreya Sc'; /* Change the font family */
      color: #fff; /* Change the text color to white */
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    button {
      background-color: #223f60;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%; /* Make the button full width */
    }

    .options a {
      display: block;
      color: #fff;
      text-decoration: none;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h2 style="color: #ffffff;">WELCOME TO FAMILY</h2>
    <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <!-- Add this inside your form in the login.php file -->



      <button type="submit" name="login">Login</button>
    </form>

    <div class="options">
      <a href="register.php">Don't have an account?</a>
      <a href="forgot_password.php">Forget Password?</a>
      <a href="#">Forget Username?</a>
    </div>
  </div>

</body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("connection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user credentials
    $query = "SELECT * FROM register WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Redirect to the desired page upon successful login
        $_SESSION['username'] = $username;

        
        header("Location: index.php");
        exit(); // Ensure that no further code is executed after the redirection
    } else {
        echo "Login failed";
    }
}
?>


   