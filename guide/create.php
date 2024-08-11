<?php
include('../controller/connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide - Booking</title>
    <link rel="stylesheet" href="../assets/styles/form.css">
</head>

<body>
    <div class="container">
        <h2>Create New University</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="photo">Photo (optional):</label>
            <input type="file" id="photo" name="photo" accept="image/jpeg, image/png, image/gif">

            <input type="submit" name="submit" value="Create">
        </form>
        <div class="signup-link">
            <p>Go back? <a href="index.php">Click here</a></p>
        </div>
    </div>
</body>

</html>