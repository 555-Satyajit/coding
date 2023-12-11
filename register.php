<?php include("connection.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: url('joshua-earle-73TihzG37rk-unsplash.jpg') center/cover no-repeat; /* Replace 'your-background-image.jpg' with the path to your background image */
    }

    .registration-box {
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
      background-color: #af704c;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%; /* Make the button full width */
    }
  </style>
</head>
<body>

  <div class="registration-box">
    <h2 style="color: #ffffff;">WELCOME TO FAMILY</h2> <!-- Change color of the heading -->
    <form action="register.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" id="confirmPassword" name="confirm_password" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <button type="submit" name="but">Register</button>
    </form>
  </div>

</body>
</html>

<?php
include("connection.php");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['but'])) {
    // Retrieve user input
    $fv = $_POST['username'];
    $sv = $_POST['password'];
    $tv = $_POST['confirm_password'];
    $fiv = $_POST['email'];


     // Check if password and confirm password match
     if ($sv !== $tv) {
      echo "Password and Confirm Password do not match.";
      // You may want to redirect back to the registration page or handle the error accordingly
      exit();
  }

    // Prepare SQL query
    $query = "INSERT INTO register (username, password, confirm_password, email) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ssss", $fv, $sv, $tv, $fiv);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Registration Successful";
        // Redirect to login page after successful registration
        header("Location: login.php");
        exit();
    } else {
        echo "Registration Failed. Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}
?>
