<?php
include('../controller/connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['editid'])) {
    $editid = intval($_GET['editid']);
    $result = mysqli_query($con, "SELECT * FROM rooms WHERE id = $editid");
    $room = mysqli_fetch_assoc($result);

    if (!$room) {
        die("Room not found");
    }
}

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
        // If no new file is uploaded, keep the old photo
        $photo = $room['photo'];
    }

    // Prepare the SQL statement for updating the room
    $stmt = $con->prepare("UPDATE rooms SET uni_id = ?, title = ?, price = ?, quantity = ?, location = ?, distance = ?, photo = ?, status = ? WHERE id = ?");
    $stmt->bind_param("isdiissii", $uni_id, $title, $price, $quantity, $location, $distance, $photo, $status, $editid);

    if ($stmt->execute()) {
        echo "<script>alert('Room updated successfully');</script>";
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
    <title>Room - Edit</title>
    <link rel="stylesheet" href="../assets/styles/form.css">
</head>

<body>
    <div class="container">
        <h2>Edit Room</h2>
        <form action="edit.php?editid=<?php echo htmlspecialchars($room['id']); ?>" method="post" enctype="multipart/form-data">
            <label for="uni_id">University:</label>
            <select id="uni_id" name="uni_id" required>
                <?php
                $universities = mysqli_query($con, "SELECT id, name FROM universities");
                while ($uni = mysqli_fetch_assoc($universities)) {
                    $selected = $uni['id'] == $room['uni_id'] ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars($uni['id']) . '" ' . $selected . '>' . htmlspecialchars($uni['name']) . '</option>';
                }
                ?>
            </select>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($room['title']); ?>" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($room['price']); ?>" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($room['quantity']); ?>" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($room['location']); ?>" required>

            <label for="distance">Distance (optional):</label>
            <input type="text" id="distance" name="distance" value="<?php echo htmlspecialchars($room['distance']); ?>">

            <label for="photo">Photo (optional):</label>
            <input type="file" id="photo" name="photo">

            <label for="status">Active:</label>
            <input type="checkbox" id="status" name="status" <?php echo $room['status'] ? 'checked' : ''; ?>>

            <input type="submit" name="submit" value="Update">
        </form>
        <div class="signup-link">
            <p>Go back? <a href="index.php">Click here</a></p>
        </div>
    </div>
</body>

</html>