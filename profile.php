<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Assuming you have a database connection named $conn
include("connection.php");

// Retrieve user data from the database
$username = $_SESSION['username'];
$query = "SELECT * FROM register WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <style>
   body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background: url('jr-korpa-9XngoIpxcEo-unsplash.jpg') center/cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .profile-container {
  background-color: rgba(0, 0, 0, 0.282); /* Adjust the alpha value for transparency */
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
  max-width: 400px;
  width: 100%;
  margin: 50px auto;
  text-align: center;
  color: rgba(255, 255, 255, 0.8); /* Adjust the alpha value for text transparency */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  animation: neonGlow 2s infinite alternate;
}

.profile-container img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-bottom: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    .glow {
  font-size: 30px;
  font-weight: bold;
  color: #fff;
  animation: neon 1.5s ease-in-out infinite alternate;
}

@keyframes neon {
  0%, 100% {
    text-shadow: 0 0 10px rgba(255, 255, 255, 1),
                0 0 20px rgba(255, 255, 255, 1),
                0 0 30px rgba(255, 255, 255, 1);
  }
  50% {
    text-shadow: 0 0 20px rgba(255, 255, 255, 1),
                0 0 30px rgba(255, 255, 255, 1),
                0 0 40px rgba(255, 255, 255, 1);
  }
}
@keyframes neonGlow {
  0% {
    box-shadow: 0 0 10px rgba(173, 216, 230, 0.8),
                0 0 20px rgba(173, 216, 230, 0.8),
                0 0 30px rgba(173, 216, 230, 0.8);
  }
  50% {
    box-shadow: 0 0 20px rgba(173, 216, 230, 0.8),
                0 0 30px rgba(173, 216, 230, 0.8),
                0 0 40px rgba(173, 216, 230, 0.8);
  }
  100% {
    box-shadow: 0 0 10px rgba(173, 216, 230, 0.8),
                0 0 20px rgba(173, 216, 230, 0.8),
                0 0 30px rgba(173, 216, 230, 0.8);
  }
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
      background-color: rgba(153, 255, 255, 1);
    }

    section {
      margin-top: 50px;
      color: white;
      padding: 20px;
    }
    .upload-form {
        display: none;
        margin-top: 20px;
    }
  </style>
  <script>
    function toggleUploadForm() {
        var uploadForm = document.getElementById("upload-form");
        uploadForm.style.display = uploadForm.style.display === "none" ? "block" : "none";
    }
  </script>
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="about.html">About</a>
    <a href="#">Search</a>
    <a href="profile.php"><?php echo $username ?? 'Login'; ?></a>
    <a href="logout.php">Logout</a>
</nav>

<div class="profile-container">
    <?php
    echo '<img src="' . ($row['profile_picture'] ?? 'user-avatar.jpg') . '" alt="User Avatar" onclick="toggleUploadForm()">';
    ?>
    <h2 class="glow"><?php echo $row['username']; ?></h2>
    <p>Email: <?php echo $row['email']; ?></p>
    <!-- Add more user details as needed -->
</div>


<div class="upload-form" id="upload-form">
    <h2>File Upload</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Choose a file:</label>
        <input type="file" name="file" id="file">
        <br>
        <input type="submit" name="submit" value="Upload">
    </form>
</div>




</body>
</html>
