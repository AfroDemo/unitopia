<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Room Booking</title>
  <link rel="stylesheet" href="assets/styles/styles.css" />
</head>

<body>
<?php include('header.php'); ?>

  <main class="container">
    <section class="card-cont">
      <h2>What we Offer</h2>
      <div class="card-container">
        <!-- Room Booking Card -->
        <div class="card">
          <img
            src="assets/images/room5.jpg"
            alt="Room Image"
            class="card-img" />
          <h3>Book a Room</h3>
          <p>Find and book a comfortable room for your stay.</p>
          <a href="book-room.php" class="btn green">Get Started</a>
        </div>
        <!-- Tour Guide Booking Card -->
        <div class="card">
          <img
            src="assets/images/people.jpg"
            alt="Tour Guide Image"
            class="card-img" />
          <h3>Book a Tour Guide</h3>
          <p>
            Discover the best local attractions with a professional tour
            guide.
          </p>
          <a href="book-tour-guide.php" class="btn green">Get Started</a>
        </div>
      </div>
    </section>
    <section id="rooms">
      <h1>Available Rooms</h1>
      <div class="room-list">
        <!-- Room 1 -->
        <div class="room">
          <h2>Deluxe Suite</h2>
          <img src="assets/images/ROOM1.jfif" alt="Deluxe Suite" />
          <p>Price: Tsh 35,000/month</p>
          <div class="button-group">
            <a href="" class="btn green">Book Now</a>
            <a href="" class="btn warning">Details</a>
          </div>
        </div>

        <!-- Room 2 -->
        <div class="room">
          <h2>Standard Room</h2>
          <img src="assets/images/ROOM2.jfif" alt="Standard Room" />
          <p>Price: Tsh 45,000/month</p>
          <div class="button-group">
            <a href="" class="btn green">Book Now</a>
            <a href="" class="btn warning">Details</a>
          </div>
        </div>

        <!-- Room 3 -->
        <div class="room">
          <h2>Executive Suite</h2>
          <img src="assets/images/ROOM3.jpg" alt="Executive Suite" />
          <p>Price: Tsh 50,000/month</p>
          <div class="button-group">
            <a href="" class="btn green">Book Now</a>
            <a href="" class="btn warning">Details</a>
          </div>
        </div>

        <!-- Room 4 -->
        <div class="room">
          <h2>Executive</h2>
          <img src="assets/images/room4.jpg" alt="Executive" />
          <p>Price: Tsh 60,000/month</p>
          <div class="button-group">
            <a href="" class="btn green">Book Now</a>
            <a href="" class="btn warning">Details</a>
          </div>
        </div>

        <!-- Room 5 -->
        <div class="room">
          <h2>Apartment</h2>
          <img src="assets/images/room5.jpg" alt="Apartment" />
          <p>Price: Tsh 75,000/month</p>
          <div class="button-group">
            <a href="" class="btn green">Book Now</a>
            <a href="" class="btn warning">Details</a>
          </div>
        </div>

        <!-- Room 6 -->
        <div class="room">
          <h2>Apartment</h2>
          <img src="assets/images/room6.jpg" alt="Apartment" />
          <p>Price: Tsh 85,000/month</p>
          <div class="button-group">
            <a href="" class="btn green">Book Now</a>
            <a href="" class="btn warning">Details</a>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <p>&copy; 2024 Room Booking System</p>
    <a href="index3.html">Signup</a>
    <a href="index5.html">Book Now</a>
    <a href="index4.html">Contact Us</a>
    <a href="index8.html">Room Details</a>
  </footer>
</body>

</html>