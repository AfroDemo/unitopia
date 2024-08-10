<?php
include('../connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle delete request
if (isset($_GET['delid'])) {
    $delid = intval($_GET['delid']);
    $stmt = $con->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $delid);

    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully');</script>";
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
    <title>User - All</title>
    <link rel="stylesheet" href="../assets/styles/table.css">
</head>

<body>
    <a href="register.php">Create New User</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Created Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($con, "SELECT id, phone, email, created_at FROM users");
            $cnt = 1;
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                        <td>
                            <a href="edit.php?editid=<?php echo htmlspecialchars($row['id']); ?>" class="edit" title="Edit" data-toggle="tooltip">edit</a>
                            <a href="index.php?delid=<?php echo htmlspecialchars($row['id']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to delete?');">delete</a>
                        </td>
                    </tr>
                <?php
                    $cnt++;
                }
            } else { ?>
                <tr>
                    <th style="text-align:center; color:red;" colspan="5">No Record Found</th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>