<?php include 'header.php'; ?>


    <!-- Hero Section -->
    <section class="dsdl-hero text-center" style="position: relative; height: 40vh; background-image: url('images1/services/services_img/contact.png'); background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4);"></div>
        <h1 style="position: relative; z-index: 2; color: white; font-size: 2.5rem; font-weight: bold; text-transform: uppercase;">Contact Us</h1>
    </section>
    <!-- Contact Info Section -->
    <section class="contact-info-section py-5" data-aos="fade-up" style="background-color: #f9f9f9; padding: 50px 0;">

        <div class="container">
            <div class="col-md-12" style="text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <h4 class="text-primary section-subtitle">CONTACT US TODAY</h4>
                <h2 class="font-weight-bold section-title">Reach Out to <strong>Our Dental Team</strong></h2>
                <p class="text-muted section-description">Our team is ready to assist you with any questions or concerns you may have regarding our services.</p>
            </div>
            <div class="row">
                <!-- Contact Form -->
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-form" style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h3 style="font-size: 1.5rem; margin-bottom: 20px; color: #333;">Get in Touch</h3>
                        <!-- Updated form action -->
                        <form action="contactform.php" method="post" role="form" class="php-email-form"
                        data-aos-delay="100">
                            <div class="form-group">
                                <label for="name" style="font-weight: 600;">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required style="padding: 10px; border-radius: 5px;">
                            </div>
                            <div class="form-group">
                                <label for="email" style="font-weight: 600;">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required style="padding: 10px; border-radius: 5px;">
                            </div>
                            <div class="form-group">
                                <label for="message" style="font-weight: 600;">Your query/problem</label>
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your query" required style="padding: 10px; border-radius: 5px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; padding: 10px 20px; border-radius: 5px;">Send</button>
                        </form>
                    </div>
                </div>
                <script>
                    document.querySelector('form').addEventListener('submit', function (event) {
                    event.preventDefault();
                
                    // Gather form data
                    const formData = new FormData(this);
                
                    // Send form data via AJAX
                    fetch('contact_submit.php', {
                        method: 'POST',
                        body: formData,
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            alert(data.message);
                            if (data.success) {
                                this.reset(); // Clear the form on success
                            }
                        })
                        .catch((error) => {
                            alert('There was an error sending your message. Please try again.');
                            console.error(error);
                        });
                });
                </script>

                <!-- Contact Info -->
                <div class="col-md-6 mb-4" data-aos="fade-left" data-aos-delay="200">
                    <div class="contact-info" style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h3 style="font-size: 1.5rem; margin-bottom: 20px; color: #333;">Contact Info</h3>
                        <p><i class="fas fa-map-marker-alt icon" style="color: #007bff; margin-right: 10px;"></i> D.No.22-1-10, 1st Floor, A.G. Complex, Phool Baugh Road, Near Ambatisatram Jn., Vizianagaram - 535 002</p>
                        <p><i class="fas fa-phone icon" style="color: #007bff; margin-right: 10px;"></i> +91 9293056083</p>
                        <p><i class="fas fa-envelope icon" style="color: #007bff; margin-right: 10px;"></i> info@appledentalvzm.in</p>
                        <p><i class="fas fa-clock icon" style="color: #007bff; margin-right: 10px;"></i> Mon-Sun: 9 AM - 8 PM
                            <br> Tuesday: 9 AM - 2 PM</p>
                    </div>
                </div>
            </div>

            <!-- 360 Degree View Button -->
            <div class="row mt-4 text-center">
                <div class="col-12" data-aos="zoom-in" data-aos-delay="300">
                    <a href="https://maps.app.goo.gl/qMVVdefxxP6HKXB16" target="_blank" rel="noopener noreferrer">
                        <button class="btn btn-success" style="padding: 10px 20px; border-radius: 5px; font-size: 1rem;">
                            360 Degrees View
                        </button>
                    </a>
                </div>
            </div>
            </div>

    </section>

    <!-- Embedded Google Map and 360-Degree View -->
    <section style="padding: 50px 0; background-color: #f1f1f1;" data-aos="fade-up">
        <div class="container">
            <!-- Section Heading -->
            <div class="text-center mb-5" data-aos="zoom-in">
                <h2 style="font-weight: bold; font-size: 2rem; color: #333;">Find Us Here</h2>
                <p style="font-size: 1rem; color: #666;">Explore our location and take a 360-degree view of our facility.</p>
            </div>

            <div class="contact-container" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
                <!-- Embedded Google Map -->
                <div class="google-map" data-aos="fade-right" data-aos-delay="100" style="flex: 1; min-width: 45%; background: #fff; padding: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d30334.605525010476!2d83.38071781801781!3d18.12583900511469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d18.136257!2d83.3896213!4m5!1s0x3a3be551bb580c3f%3A0xa15d74cd17e1d939!2sD.%20NO.%2022-1-10%2C%20Ist%20Floor%2C%20Apple%20Dental%20Specialities%2C%20A.G%20Complex%2C%20Ananda%20Gajapathi%20Rd%2C%20Ambati%20Satram%20Area%2C%20Vizianagaram%2C%20Andhra%20Pradesh%20535002!3m2!1d18.115064399999998!2d83.4140839!5e0!3m2!1sen!2sin!4v1735639081429!5m2!1sen!2sin"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Embedded 360-Degree View -->
                <div class="logo-section" data-aos="fade-left" data-aos-delay="200" style="flex: 1; min-width: 45%; background: #fff; padding: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <iframe src="https://www.google.com/maps/embed?pb=!4v1737188141527!6m8!1m7!1sCAoSLEFGMVFpcFBfeE9wY251a3hwUFFhYnNSVlh5a2lHZ05Sb0k3MExqT29RUWJp!2m2!1d18.11568935919561!2d83.41469168614333!3f97.03479452054793!4f0.1282191780821904!5f0.7820865974627469" width="100%"
                    height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>


    <script>
        function openStreetView() {
            window.open("https://www.google.com/maps/@18.1150644,83.4140839,3a,75y,90t/data=!3m6!1e1!3m4!1sAF1QipOC4I14FPFR8XfZoOUxJc8lkU5m37EZkCLdX9_d!2e10!7i13312!8i6656", "_blank");
          }
    </script>

    <!-- Media Queries -->
    <style>
        @media (max-width: 768px) {
            .contact-container {
              flex-direction: column;
            }
            .google-map, .logo-section {
              min-width: 100%;
            }
          }
    </style>



<?php include 'footer.php'; ?>