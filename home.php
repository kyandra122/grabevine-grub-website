<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>
  <link rel="stylesheet" href="styles.css">

</head>
<Style>
  .slideshowContainer {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 500px;
    border-bottom: 6px solid#240041;
  }

  #name {
    display: flex;
    align-items: center;
    background-image: url('');
    background-size: cover;
    background-position: center;
    height: 15vh;
    /* Adjust the height as needed */
    margin: 0;
    padding: 20px;
    background: #240041;
    color: rgb(255, 255, 255);
    /* Change text color as needed */
  }

  .menu_bar ul {
    list-style: none;
    display: flex;
  }

  .menu_bar ul li {
    padding: 10px 30px;
  }

  .menu_bar ul li a {
    color: #ffffff;
    text-decoration: none;
    font-size: 18px;
    /* Slightly reduced font size for a cleaner look */
    transition: all 0.3s;
  }

  /* Section 2 Styles */
  #section2 {
    font-family: 'Helvetica', sans-serif;
    /* Updated font family */
    background-color: #0bdaa2;
  }


  /* Dropdown Menu Styles */
  ul {
    list-style: none;
    background: black;
    text-align: center;
  }

  ul li {
    display: inline-block;
    position: relative;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }

  ul li a {
    display: block;
    padding: 20px 25px;
    color: #FFF;
    text-decoration: none;
    text-align: center;
    font-size: 16px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }

  ul li ul.dropdown li {
    display: block;
    background: #060505;
    ;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    margin: 2px 0px;
  }

  ul li ul.dropdown {
    width: 100%;
    background: #060505;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    position: absolute;
    z-index: 999;
    display: none;
  }

  ul li a:hover {
    background: #eceff4;
    ;
    color: #000000;

  }

  ul li:hover ul.dropdown {
    display: block;
  }

  h2 {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    text-align: center;
    color: rgb(255, 255, 255);
  }

  h3 {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    text-align: center;
    color: rgb(0, 0, 0);
  }

  p {
    color: white;
    font-size: 15px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }

  .description {
    font-size: 20px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #000000;
  }
  


</Style>
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



<body style="margin: 0; padding: 0; background-color:#eceff4;; min-height: 100vh;">

  <div class="slideshowContainer">


    <img class="imageSlides" src="images/GRAPEVINE NEW BANNERR.png" alt="typeshit">

    <img class="imageSlides" src="images/GRAPEVINE NEW BANNERR.png" alt="typeshit">
    <img class="imageSlides" src="images/GRAPEVINE NEW BANNERR.png" alt="typeshit">


    <span id="leftArrow" class="slideshowArrow">&#8249;</span>
    <span id="rightArrow" class="slideshowArrow">&#8250;</span>

    <div class="slideshowCircles">

      <span class="circle dot"></span>
      <span class="circle"></span>
      <span class="circle"></span>
    </div>

  </div>
  <br>
  <h2 style="color: rgb(0, 0, 0);">Featured Meals</h2>

  <br>
  <br>
  <div class="menu-container">
    <div class="menu-item">
      <a href="order.php" class="menu-link">
        <img src="images/wings and fries blue truck.jpeg" alt="Food Item 1">
        <div class="description">Wings and Fries with Ketchup and Tarter Sauce
          <br>
          <br>
          <p>
          </p>
        </div>
      </a>
    </div>

    <div class="menu-item">
      <a href="order.php" class="menu-link">
        <img src="images/whitehotdog.jpeg" alt="Food Item 2">
        <div class="description"> Hotdog with Ketchup and Mustard</div>
        <br>
        <p></p>
    </div>

    <div class="menu-item">
      <a href="order.php" class="menu-link">
        <img src="images/blueketchupandfries.jpeg" alt="Food Item 2">
        <div class="description">Fries with Ketchup </div>
        <br>
        <p></p>
    </div>

  </div>

  <footer
    style="    border-top: 6px solid#240041; background: radial-gradient(circle at 10% 20%, rgb(0, 0, 0) 0%, rgb(64, 64, 64) 90.2%);; color: #fff; text-align: center; padding: 10px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <p>&copy; 2024 Grapevine Grub. All Rights Reserved.</p>
  </footer>
</body>




<script>
  // IMAGE SLIDES & CIRCLES ARRAYS, & COUNTER
  var imageSlides = document.getElementsByClassName('imageSlides');
  var circles = document.getElementsByClassName('circle');
  var leftArrow = document.getElementById('leftArrow');
  var rightArrow = document.getElementById('rightArrow');
  var counter = 0;

  // HIDE ALL IMAGES FUNCTION
  function hideImages() {
    for (var i = 0; i < imageSlides.length; i++) {
      imageSlides[i].classList.remove('visible');
    }
  }

  // REMOVE ALL DOTS FUNCTION
  function removeDots() {
    for (var i = 0; i < imageSlides.length; i++) {
      circles[i].classList.remove('dot');
    }
  }

  // SINGLE IMAGE LOOP/CIRCLES FUNCTION
  function imageLoop() {
    var currentImage = imageSlides[counter];
    var currentDot = circles[counter];
    currentImage.classList.add('visible');
    removeDots();
    currentDot.classList.add('dot');
    counter++;
  }

  // LEFT & RIGHT ARROW FUNCTION & CLICK EVENT LISTENERS
  function arrowClick(e) {
    var target = e.target;
    if (target == leftArrow) {
      clearInterval(imageSlideshowInterval);
      hideImages();
      removeDots();
      if (counter == 1) {
        counter = (imageSlides.length - 1);
        imageLoop();
        imageSlideshowInterval = setInterval(slideshow, 10000);
      } else {
        counter--;
        counter--;
        imageLoop();
        imageSlideshowInterval = setInterval(slideshow, 10000);
      }
    }
    else if (target == rightArrow) {
      clearInterval(imageSlideshowInterval);
      hideImages();
      removeDots();
      if (counter == imageSlides.length) {
        counter = 0;
        imageLoop();
        imageSlideshowInterval = setInterval(slideshow, 10000);
      } else {
        imageLoop();
        imageSlideshowInterval = setInterval(slideshow, 10000);
      }
    }
  }

  leftArrow.addEventListener('click', arrowClick);
  rightArrow.addEventListener('click', arrowClick);


  // IMAGE SLIDE FUNCTION
  function slideshow() {
    if (counter < imageSlides.length) {
      imageLoop();
    } else {
      counter = 0;
      hideImages();
      imageLoop();
    }
  }

  // SHOW FIRST IMAGE, & THEN SET & CALL SLIDE INTERVAL
  setTimeout(slideshow, 1000);
  var imageSlideshowInterval = setInterval(slideshow, 10000);
  slideshow();

  


</script>
<script>

</script>

</body>

</html>