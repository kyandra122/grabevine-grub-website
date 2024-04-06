<?php
session_start();

include("connection.php");
include("functions.php");

// Hardcoded username
$special_username = "specialuser";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['username'];
    $password = $_POST['pass'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // Read from database
        $query = "SELECT * FROM users WHERE username = '$user_name' LIMIT 1";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] === $password) {

                // Set session variables
                $_SESSION['user_id'] = $user_data['user_id'];
                $_SESSION['username'] = $user_name; // Store username in session
                
                // Redirect to specific page if special username entered
            }
if ($user_name === "The Caf") {
    header("Location: lol.php");
    die;
} elseif ($user_name === "Cross Cafe") {
    header("Location: crosscafedisplay.php");
    die;
} elseif ($user_name === "Massy") {
    header("Location: massydisplay.php");
    die;
                } else {
                    header("Location: home.php");
                    die;
                }
            }
    }
       
   
    }


?>

<!-- Rest of your HTML code remains the same -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div id="name" style="display: flex; align-items: center; justify-content: space-between;">
        <h2 class="logo" style="margin-right: 10px;">
            <img src="images/salford & co..png" style="width: 120px; height: 100px; border-radius: 50%;">
        </h2>

        <h2>Grapevine Grub
            <br>
            <p>Nurturing Local Eats, One Bite at a Time.</p>
        </h2>

        <a href="logout.php">Logout</a> <!-- Link to logout script -->
    </div>

    <div class="menu">
        <ul>
        <li><a href="home.html"<?php if (!isset($_SESSION['user_id'])) echo ' disabled'; ?>>HOME</a></li>
<li>
    <a href="#"<?php if (!isset($_SESSION['user_id'])) echo ' disabled'; ?>>SPOTS</a>
    <ul class="dropdown"<?php if (!isset($_SESSION['user_id'])) echo ' style="pointer-events: none;"'; ?>>
        <li><a href="thecaf.html"<?php if (!isset($_SESSION['user_id'])) echo ' disabled'; ?>>The Caf</a></li>
        <li><a href="CrossCafe.html"<?php if (!isset($_SESSION['user_id'])) echo ' disabled'; ?>>Cross Cafe</a></li>
        <li><a href="MassyRoadSIdeCafe.html"<?php if (!isset($_SESSION['user_id'])) echo ' disabled'; ?>>Massy's Roadside Cafe</a></li>
    </ul>
</li>
<li>
    <a href=""<?php if (!isset($_SESSION['user_id'])) echo ' class="disabled"'; ?>>ABOUT SPOTS</a>
    <ul class="dropdown"<?php if (!isset($_SESSION['user_id'])) echo ' style="pointer-events: none;"'; ?>>
        <li><a href="review.html"<?php if (!isset($_SESSION['user_id'])) echo ' class="disabled"'; ?>>LEAVE A REVIEW</a></li>
        <li><a href="submissions.html"<?php if (!isset($_SESSION['user_id'])) echo ' class="disabled"'; ?>>Drop A Submission</a></li>
    </ul>
</li>

        </ul>
    </div>

    <div id="section1">
        <div class="wrapper">
            <form method="POST">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Enter username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="pass" placeholder="Enter Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn">Login</button> <!-- Changed type to submit -->

                <div class="register-link">
                    <p>Don't have an account? <a href="signup.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>

    <footer style=" border-top: 6px solid#240041; background: radial-gradient(circle at 10% 20%, rgb(0, 0, 0) 0%, rgb(64, 64, 64) 90.2%);; color: #fff; text-align: center; padding: 10px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
        <p>&copy; 2024 Grapevine Grub. All Rights Reserved.</p>
    </footer>

</body>

</html>