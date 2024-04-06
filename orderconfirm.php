<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Accepted</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #1d1716;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
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



    <div class="content">
        <h1 style="color:black">Your order has been recorded!</h1>
        <h1 style="color:black">THANK YOU!!</h1>
      

    </div>

    <footer style="    border-top: 6px solid#240041; background: radial-gradient(circle at 10% 20%, rgb(0, 0, 0) 0%, rgb(64, 64, 64) 90.2%);; color: #fff; text-align: center; padding: 10px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
        <p>&copy; 2024 Grapevine Grub. All Rights Reserved.</p>
    </footer>
</body>

</html>