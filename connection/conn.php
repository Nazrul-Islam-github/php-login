<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "users";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Die if connection was not successful
if (!$conn) {
    echo "Sorry we failed to connect: " . mysqli_connect_error();
}
