<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

// The rest of your login script...
include('../controller/connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['phone']) && isset($_POST['password'])) {
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $stmt = $con->prepare("SELECT id, password FROM users WHERE phone = ?");
        $stmt->bind_param("s", $phone);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if ($stmt->num_rows == 1 && password_verify($password, $hashed_password)) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $id;
            $_SESSION['phone'] = $phone;

            echo "<script>alert('Login successful');</script>";
            echo "<script type='text/javascript'> document.location ='index.php'; </script>";
        } else {
            echo "<script>alert('Invalid phone number or password');</script>";
            echo "<script type='text/javascript'> document.location ='login.php'; </script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please fill in all fields');</script>";
        echo "<script type='text/javascript'> document.location ='login.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn Page</title>
    <link rel="stylesheet" href="../assets/styles/form.css">
</head>

<body>
    <div class="container">
        <h2>LogIn</h2>
        <form action="login.php" method="post">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="LogIn">
        </form>
        <div class="signup-link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>

</html>