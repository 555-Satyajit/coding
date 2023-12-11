<?php
include("connection.php");

// Start or resume a session
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = null;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background: url('geranimo-UcBkRilVFVs-unsplash.jpg') center/cover no-repeat; /* Replace 'your-background-image.jpg' with the path to your background image */
    }

    nav {
      background-color: #33333300;
      padding: 15px 0;
      text-align: center;
    }

    nav a {
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      margin: 0 10px;
      display: inline-block;
    }

    section {
      color: #e6dfdf;
      padding: 20px;
    }
  </style>
</head>
<body>

  

<nav>
    <a href="#">Home</a>
    <a href="about.html">About</a>
    <a href="#">Search</a>
    <a href="profile.php"><?php echo $username ?? 'Login'; ?></a>
    <a href="logout.php">Logout</a>
  </nav>

  <section>
    <h1>Welcome to Our Home Page</h1>
    <p>This is a simple home page with a navigation bar and background image.</p>
  </section>

</body>
</html>