<?php
include('../controller/connect.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle delete request
if (isset($_GET['delid'])) {
    $delid = intval($_GET['delid']);
    $stmt = $con->prepare("DELETE FROM rooms WHERE id = ?");
    $stmt->bind_param("i", $delid);

    if ($stmt->execute()) {
        echo "<script>alert('Room deleted successfully');</script>";
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
    <title>Room - All</title>
    <link rel="stylesheet" href="../assets/styles/table.css">
</head>

<body>
    <a href="create.php">Create New</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Location</th>
                <th>Distance</th>
                <th>Created Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ret = mysqli_query($con, "SELECT * FROM rooms");
            $cnt = 1;
            $row = mysqli_num_rows($ret);
            if ($row > 0) {
                while ($row = mysqli_fetch_array($ret)) {
            ?>
                    <tr>
                        <td><?php echo $cnt; ?></td>
                        <td>
                            <?php if ($row['photo']): ?>
                                <img src="../assets/images/uploads/room/<?php echo htmlspecialchars($row['photo']); ?>" alt="Room Photo" width="100">
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars(number_format($row['price'])); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($row['location']); ?></td>
                        <td><?php echo htmlspecialchars($row['distance']); ?></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                        <td><?php echo $row['status'] ? 'Active' : 'Inactive'; ?></td>
                        <td>
                            <a href="read.php?viewid=<?php echo htmlspecialchars($row['id']); ?>" class="view" title="View" data-toggle="tooltip">visibility</a>
                            <a href="edit.php?editid=<?php echo htmlspecialchars($row['id']); ?>" class="edit" title="Edit" data-toggle="tooltip">edit</a>
                            <a href="index.php?delid=<?php echo htmlspecialchars($row['id']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');">delete</a>
                        </td>
                    </tr>
                <?php
                    $cnt = $cnt + 1;
                }
            } else { ?>
                <tr>
                    <th style="text-align:center; color:red;" colspan="10">No Record Found</th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
