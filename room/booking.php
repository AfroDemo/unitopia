<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room - Booking</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>
    <main>
        <section class="map">
            <div class="mb-5">
                <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31517.547735496537!2d33.40614051894907!3d-8.9413053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1900a1c8186f2c27%3A0x6752f54f1563b5cc!2sMbeya%20University%20of%20Science%20and%20Technology!5e0!3m2!1sen!2stz!4v1691652250123!5m2!1sen!2stz" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </section>
        <section class="room">
            <div class="container" data-aos="fade">
                <div class="row gy-5 gx-lg-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <h3>Get in touch</h3>
                            <p>
                                we will always be available at MUST Administration Block. We
                                will always be from the begining of orientation program
                            </p>

                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Location:</h4>
                                    <p>MUST Administration Block, Mbeya, Tanzania</p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>must2024@gmail.edu.tz</p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Call:</h4>
                                    <p>+255 98 7654 321</p>
                                </div>
                            </div>
                            <!-- End Info Item -->
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <form
                            action="contacts.php"
                            method="post"
                            role="form"
                            class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        id="name"
                                        placeholder="Your Name"
                                        required="" />
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        id="email"
                                        placeholder="Your Email"
                                        required="" />
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="subject"
                                    id="subject"
                                    placeholder="Subject"
                                    required="" />
                            </div>
                            <div class="form-group mt-3">
                                <textarea
                                    class="form-control"
                                    name="message"
                                    placeholder="Message"
                                    required=""></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Your message has been sent. Thank you!
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </main>
</body>

</html>