<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>
  <link rel="stylesheet" href="styles.css">

  <style>
    /* Add any inline styles here */
    body {
      margin: 0;
      padding: 0;
      background-color: #eceff4;
      min-height: 100vh;
      background-image: url('images/type\ shitt.png');
    }

    table {
      width: 100%;
      /* Make the table width 100% of its container */
      border-collapse: collapse;
      /* Collapse table borders */
      border-radius: 10px;
      /* Rounded edges for the table */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Add drop shadow */
    }

    th,
    td {
      padding: 12px;
      /* Add padding to table cells */
      text-align: left;
      /* Align text to the left */
      border-bottom: 1px solid #ddd;
      /* Add bottom border to table rows */
    }

    th {
      background-color: #f2f2f2;
      /* Light gray background for table header */
      color: #333;
      /* Dark text color for table header */
      text-transform: uppercase;
      /* Uppercase text for table headers */
    }

    tr {
  background-color: white; /* Set default background color for table rows */
}

    tr:hover {
      background-color: #d3d3d3;
      /* Darken hover background color for rows */
    }
  </style>

</head>

<body>
  <div id="name" style="display: flex; align-items: center; justify-content: space-between;">
    <h2 class="logo" style="margin-right: 10px;">
      <img src="images/salford & co..png" style="width: 120px; height: 100px; border-radius: 50%;">
    </h2>
    <h2>Grapevine Grub<br>
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

  <?php
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'grapevinedb';

  // Establishing connection to the database
  $conn = new mysqli($host, $username, $password, $database);

  // Check for connection errors
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Specify the restaurant name you want to display orders for
  $restaurantName = "Massy Roadside Cafe";

  // Retrieve orders for the specified restaurant from the database
  $sql = "SELECT * FROM orders WHERE restaurant_name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $restaurantName);
  $stmt->execute();
  $result = $stmt->get_result();

  ?>

  <br><br>
  <h2 style="text-align:center">Orders for <?php echo $restaurantName; ?></h2>
  <br>
  <table>
    <tr>
      <th>Customer Name</th>
      <th>Contact Information</th>
      <th>Restaurant Name</th>
      <th>Order Item</th>
      <th>Quantity</th>
      <th>Total Price</th>
      <th>Order Complete</th>
    </tr>
    <?php
    // Check if there are any orders
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<tr id=\"order-" . $row['id'] . "\">";
        echo "<td>" . $row["customer_name"] . "</td>";
        echo "<td>" . $row["contact_information"] . "</td>";
        echo "<td>" . $row["restaurant_name"] . "</td>";
        echo "<td>" . $row["order_item"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["total_price"] . "</td>";
        echo "<td><button onclick=\"deleteOrder(" . $row['id'] . ")\">Delete</button></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='7'>No orders found</td></tr>";
    }
    ?>
  </table>

  <?php
  // Close the database connection
  $stmt->close();
  $conn->close();
  ?>

  <script>
    function deleteOrder(orderId) {
      if (confirm('Are you sure you want to delete this order?')) {
        // Remove the row from the table
        var row = document.getElementById("order-" + orderId);
        row.parentNode.removeChild(row);
      }
    }
  </script>

</body>

</html>
