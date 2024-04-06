<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['restaurantName']) && isset($_POST['foodQuality']) && isset($_POST['staffFriendliness']) && isset($_POST['valueForPrice']) && isset($_POST['recommendation']) && isset($_POST['overallRating']) && isset($_POST['review'])) {

        // Retrieve form data
        $restaurantName = $_POST['restaurantName'];
        $foodQuality = $_POST['foodQuality'];
        $staffFriendliness = $_POST['staffFriendliness'];
        $valueForPrice = $_POST['valueForPrice'];
        $recommendation = $_POST['recommendation'];
        $overallRating = $_POST['overallRating'];
        $review = $_POST['review'];

        // Prepare and bind the SQL statement
        $query = "INSERT INTO restaurant_reviews (restaurant_name, food_quality, staff_friendliness, value_for_price, recommendation, overall_rating, reviewText) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssssss", $restaurantName, $foodQuality, $staffFriendliness, $valueForPrice, $recommendation, $overallRating, $review);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Review submitted successfully!";
            // Redirect to display_reviews.php after successful submission
            header("Location: display_reviews.php");
            exit();
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Please fill out all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Reviews</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {

      background-color: #1d1716;
      /* Set your desired background color */
      color: white;
    }

    #reviews {
      margin-top: 20px;
      background-color: #000000;
    }

    label {
      display: block;
      margin-top: 10px;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 20px;

    }

    select {
      margin-bottom: 10px;
    }

    .review-container {

      padding: 10px;
      margin-bottom: 10px;
      

    }
  
    .review-container {
        max-height: 30px; /* Set a maximum height for the review container */
        overflow-y: auto; /* Add scrollbar if content exceeds the maximum height */
        padding: 10px;
        margin-bottom: 10px;
    }


    select,
    textarea {
      color: black;
      /* Change the color to black or any other color you prefer */
      
    }
    select:focus {
        color: black;
        
        /* Change the color to black when the dropdown is clicked */
    }

    h2 {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      text-align: center;
      color: white;
    }

    /* Style the text color for the options in the dropdown */
    select option {
      color: #000000;
    }

    p {
      color: white;
      font-size: 15px;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
  </style>
</head>

<body style="margin: 0; padding: 0; background-color:#eceff4;; min-height: 100vh;">


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


  <br>
  <div style="text-align: center;">
    <h3 style="color:#000000">If you want to check out previous reviews made, <a href="display_reviews.php">click here</a>.</h3>
</div>

  <form id="profileForm" action="#" method="post">
    <h2>Restaurant Reviews</h2>

    <label for="restaurantName" name="restaurantName">Restaurant Name:</label>
    <select id="restaurantName" name="restaurantName" required>
      <option></option>
      <option>The CAF</option>
      <option>Cross Caf</option>
      <option>Massy's Roadside Cafe</option>
    </select>

    <label for="foodQuality" name="foodQuality">Rate the taste of the food:</label>
    <select id="foodQuality" name="foodQuality" required>
      <option></option>
      <option value="5">Excellent</option>
      <option value="4">Very Good</option>
      <option value="3">Good</option>
      <option value="2">Fair</option>
      <option value="1">Poor</option>
    </select>


    <label for="staffFriendliness" name="staffFriendliness">Staff Friendliness:</label>
    <select id="staffFriendliness" name="staffFriendliness" required>
      <option></option>
      <option value="5">Very Friendly</option>
      <option value="4">Friendly</option>
      <option value="3">Neutral</option>
      <option value="2">Unfriendly</option>
      <option value="1">Very Unfriendly</option>
    </select>


    <label for="valueForPrice" name="valueForPrice">Rate the overall value for the price:</label>
    <select id="valueForPrice" name="valueForPrice" required>
      <option></option>
      <option value="Excellent">Excellent</option>
      <option value="Good">Good</option>
      <option value="Average">Average</option>
      <option value="Below Average">Below Average</option>
      <option value="Poor">Poor</option>
    </select>

    <label for="recommendation" name="recommendation">Would You Recommend This Restaurant?</label>
    <select id="recommendation" name="recommendation" required>
      <option></option>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>

    <label for="overallRating" name="overallRating">Overall Rating:</label>
    <select id="overallRating" name="overallRating" required>
      <option></option>
      <option value="5">Excellent</option>
      <option value="4">Very Good</option>
      <option value="3">Good</option>
      <option value="2">Fair</option>
      <option value="1">Poor</option>
    </select>
    <label for="review" name="review">Additional Comments:</label>
    <textarea id="review" name="review" rows="4" cols="50" style="color: rgb(0, 0, 0);"></textarea>

    <input type="submit" class="btn" value="Submit Review" style="background-color: black; color: white;">

  </form>


  <footer style=" border-top: 6px solid#240041; background: radial-gradient(circle at 10% 20%, rgb(0, 0, 0) 0%, rgb(64, 64, 64) 90.2%);; color: #fff; text-align: center; padding: 10px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <p>&copy; 2024 Grapevine Grub. All Rights Reserved.</p>
  </footer>

</body>

</html>