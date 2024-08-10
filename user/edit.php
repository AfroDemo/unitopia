<?php
include('../connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = intval($_GET['editid']);

if (isset($_POST['submit'])) {
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // If password is provided, hash it; otherwise, keep the old password
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $con->prepare("UPDATE users SET phone = ?, email = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssi", $phone, $email, $hashed_password, $id);
    } else {
        $stmt = $con->prepare("UPDATE users SET phone = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $phone, $email, $id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('User updated successfully');</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
    $stmt->close();
}

// Fetch existing user details
$stmt = $con->prepare("SELECT phone, email FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($phone, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/styles/form.css">
</head>

<body>
    <div class="container">
        <h2>Edit User</h2>
        <form action="edit.php?editid=<?php echo $id; ?>" method="post">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required value="<?php echo htmlspecialchars($phone); ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

            <label for="password">Password (leave blank if not changing):</label>
            <input type="password" id="password" name="password">

            <input type="submit" name="submit" value="Update">
        </form>
        <div class="signup-link">
            <p>Go back? <a href="index.php">Click here</a></p>
        </div>
    </div>
</body>

</html>