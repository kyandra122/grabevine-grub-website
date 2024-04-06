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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize
    $name = isset($_POST['yourname']) ? htmlspecialchars($_POST['yourname']) : "";
    $contact = isset($_POST['Contact']) ? htmlspecialchars($_POST['Contact']) : "";
    $restaurantName = isset($_POST['restaurantName']) ? htmlspecialchars($_POST['restaurantName']) : "";

    // Get orders and quantities
    $orders = isset($_POST['order']) ? $_POST['order'] : [];
    $quantities = isset($_POST['quantity']) ? $_POST['quantity'] : [];

    // Initialize total price variable
    $totalPrice = 0;

    // Check if all required fields are filled
    if (!empty($name) && !empty($contact) && !empty($orders) && !empty($quantities) && !empty($restaurantName)) {
        // Determine the table name based on the selected restaurant
        switch ($restaurantName) {
            case "The Caf":
                $tableName = "menu_items_caf";
                break;
            case "Cross Cafe":
                $tableName = "cross_cafe_menu";
                break;
            case "Massy Roadside Cafe":
                $tableName = "menu_items_massy";
                break;
            default:
                // Handle invalid restaurant name
                die("Invalid restaurant name!");
        }

        // Initialize an empty array to hold combined orders
        $combinedOrders = [];

        // Combine orders with the same item name
        foreach ($orders as $key => $order) {
            $item = $order;
            $quantity = $quantities[$key];
            if (array_key_exists($item, $combinedOrders)) {
                // If the item already exists in the combined orders, add the quantity
                $combinedOrders[$item] += $quantity;
            } else {
                // Otherwise, add the item and its quantity to the combined orders
                $combinedOrders[$item] = $quantity;
            }
        }

        // Prepare statement to insert data into the orders table
        $stmt = $conn->prepare("INSERT INTO orders (customer_name, contact_information, restaurant_name, order_item, quantity, total_price) VALUES (?, ?, ?, ?, ?, ?)");

        // Check if the statement is prepared successfully
        if ($stmt) {
            // Iterate through each combined order
            foreach ($combinedOrders as $order => $quantity) {
                // Prepare statement to fetch price of each order item
                $stmt_price = $conn->prepare("SELECT price FROM $tableName WHERE item_name = ?");
                $stmt_price->bind_param("s", $order);
                $stmt_price->execute();
                $result_price = $stmt_price->get_result();

                if ($result_price->num_rows > 0) {
                    $item = $result_price->fetch_assoc();
                    // Calculate total price for each item
                    $itemPrice = $item['price'] * $quantity;
                    // Add item to the order list
                    $orderItem = $order . " x " . $quantity;
                    // Add item price to the total price
                    $totalPrice += $itemPrice;

                    // Bind parameters and execute statement to insert order into orders table
                    $stmt->bind_param("ssssid", $name, $contact, $restaurantName, $orderItem, $quantity, $totalPrice);
                    ;

                    // Save the order item to the database
                    $stmt->execute();
                } else {
                    // If item not found, handle the case as necessary based on your requirements
                    // For now, assuming price is 0
                    $totalPrice += 0;
                }
            }
        } else {
            // Handle statement preparation error
            die("Error preparing statement: " . $conn->error);
        }
    }
}
?>



<style>
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

    select option {
        color: #000000;
    }

    select:focus {
        color: black;

        /* Change the color to black when the dropdown is clicked */
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

    select option {
        color: #000000;
        /* Set color of options to black */
    }

    select option {
        color: black;
    }
  

</style>

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
    .container form {
    /* Add your form styling here */
    width: 600px; /* Set a fixed width for the form */
    margin: 0 auto; /* Center the form horizontally */
    padding: 20px; /* Add padding to the form */
    margin-bottom: 56px;
    margin-top: 56px;
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

    .popup-message {
        display: none;
        position: absolute;
        /* Change to absolute */
        top: 20px;
        /* Adjust top position as needed */
        left: 50%;
        /* Adjust left position as needed */
        transform: translateX(-50%);
        /* Center horizontally */
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 20px;
        border-radius: 10px;
        z-index: 9999;
        font-size: 20px;
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

    .popup-message {
        display: none;
        position: fixed;
        top: 37%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 20px;
        border-radius: 10px;
        z-index: 9999;
        font-size: 20px;
    }

    .black-text {
        color: black;
    }

    .white-text {
        color: white;
        background-color: #000000;
        /* Change to the desired button color */
        /* Add any other styling as needed */
    }

    .container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Content styles */
    .content {
        flex-grow: 1;
    }
</Style>
<div class="container">
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
                <a href="order.html">Order NOW</a>
            </li>
    </div>

    <body style="margin: 0; padding: 0; background-color:#eceff4;; min-height: 100vh;">
    <br><br>
    <h2 style="color:#000000">Order Now!</h2>
        <!-- Your HTML form goes here -->
        <form id="profileForm" method="post">
            <label for="yourname">Your Name:</label>
            <input type="text" id="yourname" name="yourname" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>

            <label for="Contact">Contact Information:</label>
            <input type="text" id="Contact" name="Contact" value="<?php echo isset($contact) ? htmlspecialchars($contact) : ''; ?>" required>

            <label for="order">Your Order:</label>
            <div id="orderItems">
                <?php
                // Display submitted order items
                // Display submitted order items
             
                $orders = isset($_POST['order']) ? $_POST['order'] : [];
                 {
                    foreach ($orders as $key => $order) {
                        echo '<div class="orderItem">';
                        echo '<input type="text" name="order[]" placeholder="Item name" value="' . htmlspecialchars($order) . '" required>';
                        echo '<input type="number" name="quantity[]" placeholder="Quantity" value="' . htmlspecialchars($quantities[$key]) . '" required>';
                        echo '<button type="button" onclick="removeItem(this)">Remove</button>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <button type="button" onclick="addNewItem()">Add Item</button>

            <?php
            // Assume $restaurantName is retrieved from a form submission or a database query
            $restaurantName = isset($_POST['restaurantName']) ? $_POST['restaurantName'] : '';
            ?>
            <label for="restaurantName">Restaurant Name:</label>
            <select id="restaurantName" name="restaurantName" required class="black-text">
                <option value="">Select Restaurant</option>
                <option value="The Caf" <?php echo ($restaurantName == 'The Caf') ? 'selected' : ''; ?>>The Caf</option>
                <option value="Cross Cafe" <?php echo ($restaurantName == 'Cross Cafe') ? 'selected' : ''; ?>>Cross Cafe</option>
                <option value="Massy Roadside Cafe" <?php echo ($restaurantName == 'Massy Roadside Cafe') ? 'selected' : ''; ?>>Massy Roadside Cafe</option>
            </select>


            <label for="price">Total Price:</label>
            <input type="text" id="price" name="price" value="<?php echo isset($totalPrice) ? htmlspecialchars($totalPrice) : ''; ?>" readonly>

            <input type="submit" class="btn white-text" value="Click to determine price">
            <input type="hidden" name="check_price" value="1">


            <button type="button" class="btn" onclick="confirmOrder()" >Confirm Order</button>

        </form>
</div>

<script>
    function addNewItem() {
        var orderItems = document.getElementById('orderItems');
        var newItem = document.createElement('div');
        newItem.classList.add('orderItem');
        newItem.innerHTML = '<input type="text" name="order[]" placeholder="Item name" required>' +
            '<input type="number" name="quantity[]" placeholder="Quantity" required>' +
            '<button type="button" onclick="removeItem(this)">Remove</button>';
        orderItems.appendChild(newItem);
    }

    function removeItem(button) {
        button.parentNode.remove();
    }
</script>
<script>
    function addNewItem() {
        var orderItems = document.getElementById('orderItems');
        var newItem = document.createElement('div');
        newItem.classList.add('orderItem');
        newItem.innerHTML = '<input type="text" name="order[]" placeholder="Item name" required>' +
            '<input type="number" name="quantity[]" placeholder="Quantity" required>' +
            '<button type="button" onclick="removeItem(this)">Remove</button>';
        orderItems.appendChild(newItem);
    }

    function removeItem(button) {
        button.parentNode.remove();
    }

    function confirmOrder() {
        var confirmation = confirm("Are you sure you want to confirm the order?");
        if (confirmation) {
            document.getElementById("profileForm").submit();
            window.location.href = "orderconfirm.php";
        }
    }
</script>

<footer style=" border-top: 6px solid#240041; background: radial-gradient(circle at 10% 20%, rgb(0, 0, 0) 0%, rgb(64, 64, 64) 90.2%);; color: #fff; text-align: center; padding: 10px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    <p>&copy; 2024 Grapevine Grub. All Rights Reserved.</p>
</footer>

</body>

</html>