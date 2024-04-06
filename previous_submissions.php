<?php
session_start();

include("connection.php");
include("functions.php");

// Fetch previous submissions from the database
$query = "SELECT * FROM submissions";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Submissions</title>
    <link rel="stylesheet" href="styles.css">
    <style>
   

header {
    background-color: #000000;
    padding: 20px;
    text-align: center;
}

h3 {
    margin: 0;
    text-align: center;
}
h4{
    color: #000000;
}
.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: 20px;
    color: #000000; /* changed text color to black */
}

.submission-box {
    width: calc(33.33% - 20px);
    border: 2px solid #000000; /* changed border color to black */
    padding: 20px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
    box-sizing: border-box;
    color: #000000; /* changed text color to black */
    border-radius: 10px;
}

.submission-box:hover {
    background-color: #9b91cd ; /* changed hover background color */
    color: #ffffff;
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

footer {
    background-color: #000000;
    color: #ffffff;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

.logout-link {
    color: #ffffff;
}

    </style>
</head>

<body style="margin: 0; padding: 0; background-color:#eceff4;; min-height: 100vh;">
    <div id="name" style="display: flex; align-items: center; justify-content: space-between;">
        <h2 class="logo" style="margin-right: 10px;">
            <img src="images/salford & co..png" style="width: 120px; height: 100px; border-radius: 50%;">
        </h2>

        <h2>Grapevine Grub<br>
            <p>Nurturing Local Eats, One Bite at a Time.</p>
        </h2>

        <a href="login.php" class="logout-link">Logout</a>
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
        </ul>
    </div>
<br>
    <h3>Previous Submissions</h3>

    <div class="container">
        <?php
        // Check if there are any submissions
        if (mysqli_num_rows($result) == 0) {
            
            echo '<div style="background-color: #f0f0f0; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f0f0f0; padding: 20px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);" padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px 0;">';
            echo 'Sorry,No submissions have been made yet. :(';
            echo '</div>';
        } else {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="submission-box">
                <h4><strong>Spot Name:</strong> <?php echo $row['Spot Name']; ?></h4>
                <h4><strong>Contact:</strong> <?php echo $row['Contact']; ?></h4>
                <h4><strong>Description:</strong> <?php echo $row['Description']; ?></h4>
                <h4><strong>Location:</strong> <?php echo $row['Location'] ?? ''; ?></h4>
                <h4><strong>Recommendation:</strong> <?php echo $row['Recommendation']; ?></h4>
            </div>
        <?php
        }
    }

        ?>
    </div>

</body>

</html>