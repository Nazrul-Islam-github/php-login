<?php
session_start();
if (!isset($_SESSION['loggin']) || $_SESSION['loggin'] != true) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome  <?php

echo $_SESSION['email']
?></h1>

<a href="/login_system/logout.php">logout</a>

</body>
</html>
