<?php
session_start();

include("connection.php");
include("functions.php");


$username = $_POST['username'];
$password = $_POST['pwd'];
$email = $_POST['email'];

$sql = "UPDATE Users SET
pwd='$password',
email='$email'
WHERE username='$username';";

mysqli_query($conn, $sql);

header("Location:../index.php?update=success");
