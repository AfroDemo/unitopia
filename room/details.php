<?php
include '../controller/auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Room Details</title>
  <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>
  <div class="container room-details-container">
    <h1>Room Details</h1>

    <!-- Room Image -->
    <img
      src="../assets/images/ROOM1.jfif"
      alt="Room Image"
      class="room-image" />

    <!-- Location Section -->
    <section class="section">
      <h2>Location</h2>
      <p><strong>Location of Room:</strong> Building B, Room 204</p>
      <p>
        <strong>Distance from University:</strong> Located 500 meters from the
        main university building.
      </p>
      <p><strong>Type of room:</strong> Single room</p>
    </section>

    <!-- Owner Information -->
    <section class="section">
      <h2>Owner Information</h2>
      <p><strong>Owner's Name:</strong> John Doe</p>
      <p><strong>Contact Number:</strong> +123 456 7890</p>
      <p>
        <strong>Email:</strong>
        <a href="mailto:johndoe@example.com">johndoe@example.com</a>
      </p>
    </section>

    <!-- Cost Information -->
    <section class="section cost-info">
      <h2>Cost</h2>
      <p><strong>Cost per month:</strong> 35,000 Tsh</p>
    </section>

    <!-- Contact Section -->
    <section class="section contact-info">
      <h2>Contact Us</h2>
      <p><strong>For Booking Inquiries:</strong></p>
      <p><strong>Phone:</strong> +123 456 7890</p>
      <p>
        <strong>Email:</strong>
        <a href="mailto:bookings@example.com">lolocompany@gmail.com</a>
      </p>
    </section>
    <div class="button-group">
      <a href="" class="btn green">Book Now</a>
      <a href="/unitopia" class="btn warning">Back Home</a>
    </div>
  </div>
</body>

</html>