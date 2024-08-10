<?php
include('../connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = intval($_GET['editid']);

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $location = mysqli_real_escape_string($con, $_POST['location']);

    // Handle file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_destination = '../assets/images/uploads/uni' . $photo;

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
        $photo = $_POST['existing_photo']; // Keep the existing photo
    }

    $stmt = $con->prepare("UPDATE universities SET name = ?, location = ?, photo = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $location, $photo, $id);

    if ($stmt->execute()) {
        echo "<script>alert('University updated successfully');</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
    $stmt->close();
}

// Fetch existing university details
$stmt = $con->prepare("SELECT name, location, photo FROM universities WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($name, $location, $photo);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University - Edit</title>
    <link rel="stylesheet" href="../assets/styles/form.css">
</head>

<body>
    <div class="container">
        <h2>Edit University</h2>
        <form action="edit.php?editid=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($location); ?>" required>

            <label for="photo">Photo (optional):</label>
            <input type="file" id="photo" name="photo">
            <input type="hidden" name="existing_photo" value="<?php echo htmlspecialchars($photo); ?>">

            <?php if ($photo): ?>
                <div>
                    <img src="../assets/images/uploads/<?php echo htmlspecialchars($photo); ?>" alt="Current Photo" width="100">
                </div>
            <?php endif; ?>

            <input type="submit" name="submit" value="Update">
        </form>
        <div class="signup-link">
            <p>Go back? <a href="index.php">Click here</a></p>
        </div>
    </div>
</body>

</html>