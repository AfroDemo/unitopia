<?php
include('../connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $location = mysqli_real_escape_string($con, $_POST['location']);

    // Handling file upload
    $photo = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_name = $_FILES['photo']['name'];
        $photo_size = $_FILES['photo']['size'];
        $photo_type = $_FILES['photo']['type'];
        $photo_destination = '../assets/images/uploads/' . $photo_name;

        // Allowed image file types
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        
        // Validate the file type
        if (in_array($photo_type, $allowed_types)) {
            // Check if the file size is reasonable (e.g., less than 5MB)
            if ($photo_size <= 5000000) {
                if (move_uploaded_file($photo_tmp, $photo_destination)) {
                    $photo = $photo_name; // File uploaded successfully
                } else {
                    // Error moving the file
                    echo "<script>alert('Error uploading the file');</script>";
                    return; // Abort the script
                }
            } else {
                echo "<script>alert('File size exceeds the limit of 5MB');</script>";
                return; // Abort the script
            }
        } else {
            echo "<script>alert('Invalid file type. Only JPG, PNG, and GIF files are allowed.');</script>";
            return; // Abort the script
        }
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
            <input type="file" id="photo" name="photo" accept="image/jpeg, image/png, image/gif">

            <input type="submit" name="submit" value="Create">
        </form>
        <div class="signup-link">
            <p>Go back? <a href="index.php">Click here</a></p>
        </div>
    </div>
</body>

</html>
