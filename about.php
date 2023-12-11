

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background: url('your-about-background-image.jpg') center/cover no-repeat;
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
    <a href="home.php">Home</a>
    <a href="about.php">About</a>
    <a href="search.php">Search</a>
    <?php if (isset($_SESSION['username'])) : ?>
        <a href="#"><?php echo $_SESSION['username']; ?></a>
        <a href="logout.php">Logout</a>
    <?php else : ?>
        <a href="login.php">Login</a>
    <?php endif; ?>
  </nav>

  <section>
    <h1>About Us</h1>
    <p>This is the about page content. You can provide information about your website, team, or any other relevant details here.</p>
  </section>

</body>
</html>
