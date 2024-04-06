<?php
session_start();

include("connection.php");
include("functions.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update and Delete</title>
</head>

<body>

    <h1>Change Account</h1>

    <form action="includes/userupdate.inc.php" method="post">
        <input type="text" name="username" placeholder="username"><br><br>
        <input type="password" name="pwd" placeholder="password"><br><br>
        <input type="text" name="email" placeholder="email"><br><br>
        <button type="submit" name=" update">Update</button>
    </form>

    <br>

    <h1>Delete Account</h1>
    <form action="includes/userdelete.inc.php" method="post">
        <input type="text" name="username" placeholder="username"><br><br>
        <input type="password" name="pwd" placeholder="password"><br><br>
        <button type="submit" name="delete">Delete</button>
    </form>
</body>

</html>