<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // Form is submitted
  $spot_name = $_POST['spotname'];
  $contact = $_POST['contact'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $rec = $_POST['reccomend'];

  if (!empty($spot_name) && !empty($contact) && !empty($description) && !empty($location) && !empty($rec)) {
    // Save to database
    $spot_id = random_num(9); // Assuming this generates a random spot ID
    $query = "INSERT INTO submissions (spot_id, `Spot Name`, Contact, Description, Location, Recommendation) VALUES ('$spot_id', '$spot_name', '$contact', '$description', '$location', '$rec')";
    mysqli_query($con, $query);

    header("Location: submission_accepted.php");
    die;
  } else {
    echo "<script>alert('Please enter some valid information!');</script>";
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
    <li><a href="home.php">HOME</a></li>
    <li>
      <a href="#">SPOTS</a>
      <ul class="dropdown">
        <li><a href="thecaf.html">The Caf</a></li>
        <li><a href="CrossCafe.html">Cross Cafe</a></li>
        <li><a href="MassyRoadSIdeCafe.html">Massy's Roadside Cafe</a></li>

      </ul>
    </li>
    <li>
      <a href="about.html">ABOUT SPOTS</a>
      <ul class="dropdown">
        <li><a href="review.php">LEAVE A REVIEW</a></li>
        <li><a href="submissions.php">Drop A Submission</a></li>
      </ul>
    </li>
    <li>
      <a href="order.php">Order NOW</a>
    </li>
</div>





<style>
  h1 {
    text-align: center;
    color: black;
  }

  p {
    text-align: center;

  }

  h4 {
    text-align: center;
    color: #ffffff;

  }

  label {
    color: white;
    /* Change color of labels */
  }

  input[type="text"],
  input[type="number"],
  textarea {
    color: rgb(0, 0, 0);
    /* Set default text color */
  }
  
</style>

<header>
  <br>
  <h1>Spot Submissions</h1>

  <br>

  <h2>
    <h4 style="color: #000000;">Do you know any unknow food places that deserve publicity? Submit Below!</h4>
  </h2>
  <p style="color: #000000;">If you want to check out previous submissions, <a href="previous_submissions.php">click here</a>.</p>
  </p>
</header>




<script>
  // Function to validate spot name input
  function validateSpotName() {
    var spotNameInput = document.getElementById("spotname");
    var spotName = spotNameInput.value.trim();

    // Regular expression to allow only letters
    var lettersOnly = /^[A-Za-z\s]+$/;

    // Check if the input matches the pattern
    if (!spotName.match(lettersOnly)) {
      alert("Please enter only letters for the spot name.");
      spotNameInput.focus(); // Set focus back to the spot name input
      return false;
    }
    return true;
  }
</script>
</head>

<body style="margin: 0; padding: 0; background-color:#eceff4;; min-height: 100vh;">

  <section >

    <form id="profileForm" action="#" method="post" onsubmit="return validateSpotName();">
      <label for="spotname">Spot Name:</label>
      <input type="text" id="spotname" name="spotname" required>

      <label for="contact">Contact:</label>
      <input type="number" id="contact" name="contact" required>

      <label for="description">Brief Description:</label>
      <textarea id="description" name="description" rows="6" required></textarea>

      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>

      <label for="reccomend">Why do you recommend this place?</label>
      <textarea id="reccomend" name="reccomend" rows="6" required></textarea>

      <input type="submit" class="btn" value="Submit Spot" style="background-color: black; color: white;">

    </form>

  </section>
  
  <footer style=" border-top: 6px solid#240041; background: radial-gradient(circle at 10% 20%, rgb(0, 0, 0) 0%, rgb(64, 64, 64) 90.2%);; color: #fff; text-align: center; padding: 10px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <p>&copy; 2024 Grapevine Grub. All Rights Reserved.</p>
  </footer>

</body>

</html>

</section>

</body>




</html>