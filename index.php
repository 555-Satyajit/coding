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
  <link href='https://fonts.googleapis.com/css?family=Gruppo' rel='stylesheet'> 
  <style>
     
    * {
      margin: 0;
      padding: 0;
      list-style-type: none;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'gruppo';
      font-weight: bold;
      background: url('wallhaven-r2ep9j_3840x2160.png') center/cover no-repeat;
    }

    nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background-color: rgb(0, 0, 0,0.5);
      padding: 10px;
      text-align: center;
    }

    nav a {
      text-decoration: none;
      color: white;
      padding: 10px 20px;
      margin: 0 10px;
      display: inline-block;
      transition: background-color 0.3s ease;
      
    }

    nav a:hover {
      color: black; /* Change text color to black on hover */
    }
    
    nav a:hover {
      
      background-color: rgba(76, 153, 0, 1);
    }


    }

    section {
      margin-top: 50px;
      color: white;
      padding: 20px;
    }
    
  </style>
</head>
<body>

<nav>
  <a href="index.php" class="show">Home</a></li>
  <a href="about.html" class="show">About</a></li>
  <a href="#" class="show">Search</a></li>
  <a href="profile.php" class="show"><?php echo $username ?? 'Login'; ?></a></li>
  <a href="logout.php" class="show">Logout</a></li>
</nav>

<section>
  
</section>


<script>
  function toggleMenu() {
    var navLinks = document.querySelectorAll('.show');
    navLinks.forEach(function(link) {
      link.style.display = link.style.display === 'none' ? 'inline-block' : 'none';
    });
  }
</script>
</body>
</html>
