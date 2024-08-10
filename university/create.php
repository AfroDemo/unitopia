<?php
include('../connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $location = mysqli_real_escape_string($con, $_POST['location']);

    // Handling file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_destination = '../assets/images/uploads/' . $photo;

        // Move the uploaded file to the destination
        if (move_uploaded_file($photo_tmp, $photo_destination)) {
            // File uploaded successfully
        } else {
            // Error moving the file
            echo "<script>alert('Error uploading the file');</script>";
            return; // Abort the script
        }
    } else {
        if ($_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE) {
            // File upload error occurred (not a "no file" error)
            echo "<script>alert('Error uploading the file');</script>";
            return; // Abort the script
        }
        // No file uploaded
        $photo = ''; // Set a default value or handle as per your requirement
    }

    $stmt = $con->prepare("INSERT INTO universities (name, location, photo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $location, $photo);

    if ($stmt->execute()) {
        echo "<script>alert('University created successfully');</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University - Create</title>
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
            <input type="file" id="photo" name="photo">

            <input type="submit" name="submit" value="Create">
        </form>
        <div class="signup-link">
            <p>Go back? <a href="index.php">Click here</a></p>
        </div>
    </div>
</body>

</html>