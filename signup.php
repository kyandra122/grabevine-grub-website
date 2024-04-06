<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted
  $user_name = $_POST['user'];
  $email = $_POST['email'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];


  if ($password1 != $password2) {
    //the passwords do not match
    echo "Passwords Do Not Match!!";
  } else if (!empty($user_name) && !empty($password1) && !empty($email) && !is_numeric($user_name)) {

    //save to database
    $user_id = random_num(9);
    $query = "insert into users (userID,username,email,password) values ('$user_id','$user_name','$email','$password1');";

    mysqli_query($con, $query);

    header("Location: login.php");
    die;
  } else {
    echo "Please enter some valid information!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>
  <link rel="stylesheet" href="styles.css">

</head>
<style>
  .slideshowContainer {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 200px;
  }
</style>
<div id="name" style="display: flex; align-items: center; justify-content: space-between;">
  <h2 class="logo" style="margin-right: 10px;">
    <img src="images/salford & co..png" style="width: 120px; height: 100px; border-radius: 50%;">

  </h2>

  <h2>Grapevine Grub
    <br>

    <p>Nuturing Local Eats, One Bite at a Time.</p>

  </h2>

  <a href="login.php">Logout</a>
</div>

<div class="menu">
  <ul>
    <li><a href="">HOME</a></li>
    <li>
      <a href="#">SPOTS</a>
      <ul class="dropdown">
        <li><a href="">The Caf</a></li>
        <li><a href="">Cross Cafe</a></li>
        <li><a href="">Massy's Roadside Cafe</a></li>

      </ul>
    </li>
    <li>
      <a href="">ABOUT SPOTS</a>
      <ul class="dropdown">
        <li><a href="">LEAVE A REVIEW</a></li>
        <li><a href="">Drop A Submission</a></li>
      </ul>
    </li>
    <li>
      <a href="">Order NOW</a>
    </li>
</div>



<body>

  <div id="section1">
    <div class="wrapper">
      <form action="#" method="post">
        <h1>Sign Up!</h1>
        <div class="input-box">
          <input type="text" name="user" placeholder="Username" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="yourname@gmail.com" required>
          <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="input-box">
          <input type="password" name="password1" placeholder="Password" required>
          <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="input-box">
          <input type="password" name="password2" placeholder="Confirm Password" required>
          <i class='bx bxs-lock-alt'></i>
        </div>

        <input type="submit" class="btn" value="Sign Up">

        <div class="register-link">
        </div>
      </form>
    </div>
  </div>
  </div>
  </div>

  <footer style=" border-top: 6px solid#240041; background: radial-gradient(circle at 10% 20%, rgb(0, 0, 0) 0%, rgb(64, 64, 64) 90.2%);; color: #fff; text-align: center; padding: 10px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <p>&copy; 2024 Grapevine Grub. All Rights Reserved.</p>
  </footer>

</body>

</html>