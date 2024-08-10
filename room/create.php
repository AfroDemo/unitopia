<?php
include('../connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $uni_id = intval($_POST['uni_id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $distance = mysqli_real_escape_string($con, $_POST['distance']);
    $status = isset($_POST['status']) ? 1 : 0; // Checkbox for status

    // Handling file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_destination = '../assets/images/uploads/room/' . $photo;

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

    $stmt = $con->prepare("INSERT INTO rooms (uni_id, title, price, quantity, location, distance, photo, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isdiissi", $uni_id, $title, $price, $quantity, $location, $distance, $photo, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Room created successfully');</script>";
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
    <title>Room - Create</title>
    <link rel="stylesheet" href="../assets/styles/form.css">
</head>

<body>
    <div class="container">
        <h2>Create New Room</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <label for="uni_id">University:</label>
            <select id="uni_id" name="uni_id" required>
                <?php
                $result = mysqli_query($con, "SELECT id, name FROM universities");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
                }
                ?>
            </select>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="distance">Distance (optional):</label>
            <input type="text" id="distance" name="distance">

            <label for="photo">Photo (optional):</label>
            <input type="file" id="photo" name="photo">

            <label for="status">Active:</label>
            <input type="checkbox" id="status" name="status">

            <input type="submit" name="submit" value="Create">
        </form>
        <div class="signup-link">
            <p>Go back? <a href="index.php">Click here</a></p>
        </div>
    </div>
</body>

</html>