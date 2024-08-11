<?php
include('../controller/connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = isset($_POST['email']) ? mysqli_real_escape_string($con, $_POST['email']) : null;
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $university = intval($_POST['university']);
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the phone number already exists
    $stmt = $con->prepare("SELECT id FROM users WHERE phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Phone number already registered');</script>";
    } else {
        $stmt->close();

        // Insert the new user into the database
        $stmt = $con->prepare("INSERT INTO users (phone, email, password, university_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $phone, $email, $hashed_password, $university);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful');</script>";
            echo "<script type='text/javascript'> document.location ='login.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../assets/styles/form.css">
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="post">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required placeholder="255123456789">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="university">University:</label>
            <select id="university" name="university" required>
                <option value="">Select your university</option>
                <?php
                $result = mysqli_query($con, "SELECT id, name FROM universities");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                }
                ?>
            </select>

            <input type="submit" value="Register">
        </form>
        <div class="signup-link">
            <p>Do you have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>

</html>