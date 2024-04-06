<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    /* Existing styles */

    .slideshowContainer {
      position: relative;
      overflow: hidden;
      width: 100%;
      height: 500px;
      border-bottom: 6px solid#240041;
    }

    /* Style for review containers */
    .reviews-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }


    .review-container {
  flex: 1 1 calc(33.33% - 40px); /* Adjust the width as needed */
  margin: 20px; /* Top and bottom margin */
  margin-left: 10px; /* Left margin */
  margin-right: 10px; /* Right margin */
  padding: 20px;
  border: 2px solid #000;
  border-radius: 7px;
  background-color: #fefefe;
  box-sizing: border-box;
  transition: all 0.3s ease; /* Animation */
}


.review-container:hover {
  transform: scale(1.05); /* Increase size on hover */
  background-color: #9b91cd ; /* changed hover background color */
}

    /* Clearfix to start new row after every third review */
    .clearfix::after {
      content: "";
      display: table;
      clear: both;
    }

    h2 {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      text-align: center;
      color: white;
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
      <p>Nurturing Local Eats, One Bite at a Time.</p>
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

  <h2 style="text-align: center; color: black; margin-top: 20px;">Reviews Made</h2> <!-- Add a header for the review boxes -->

  <div class="reviews-container clearfix">

    <?php
    include("connection.php");
    include("functions.php");

    // Retrieve reviews from the database
    $query = "SELECT * FROM restaurant_reviews";
    $result = mysqli_query($con, $query);

    // Check if there are any reviews
    if (mysqli_num_rows($result) > 0) {
      // Output reviews data
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='review-container'>";
        echo "<h4>Restaurant: " . $row['restaurant_name'] . "</h4>";
        echo "<h4>Food Quality: " . $row['food_quality'] . "</h4>";
        echo "<h4>Staff Friendliness: " . $row['staff_friendliness'] . "</h4>";
        echo "<h4>Value for Price: " . $row['value_for_price'] . "</h4>";
        echo "<h4>Would you recommend this place?: " . $row['recommendation'] . "</h4>";
        echo "<h4>Overall Rating: " . $row['overall_rating'] . "</h4>";
        echo "<h4>Additional Comments: " . $row['reviewText'] . "</h4>";
        echo "</div>";
      }
    } else {
      echo '<div id="notification" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f0f0f0; padding: 20px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">';
      echo 'Sorry,No reviews yet. :(';
      echo '</div>';
    }
    ?>
  </div>
  <script>
// JavaScript code to handle the notification popup
document.addEventListener("DOMContentLoaded", function() {
    var notification = document.getElementById('notification');

    // Show the notification
    notification.style.display = 'block';

   
});
</script>
</body>

</html>
