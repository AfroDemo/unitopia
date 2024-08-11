<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide - Booking</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>
    <main>
        <section class="map">
            <div class="mb-5">
                <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31517.547735496537!2d33.40614051894907!3d-8.9413053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1900a1c8186f2c27%3A0x6752f54f1563b5cc!2sMbeya%20University%20of%20Science%20and%20Technology!5e0!3m2!1sen!2stz!4v1691652250123!5m2!1sen!2stz" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </section>
        <section class="guide">
            <div class="container section-title" data-aos="fade-up">
                <h2>Book For Tour</h2>
                <div><span>Book a</span> <span class="description-title">Tour</span></div>
            </div>
            
            <div class="container">

                <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"></div>

                    <div class="col-lg-8 d-flex align-items-center reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
                        <form action="book.php" method="post" role="form" class="php-email-form">
                            <div class="row gy-4">
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <input type="date" name="date" class="form-control" id="date" placeholder="Date" required="">
                                </div>


                            </div>



                            <div class="text-center mt-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                                <button type="submit">Book For Tour</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
    </main>
</body>

</html>