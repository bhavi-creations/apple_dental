<?php include "header.php"; ?>



    <!-- Hero Section -->
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url('https://appledentalvzm.in/images1/new-banner.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    <div class="col-md-6 col-sm-12 dsdl12-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Modern Dentistry in a Calm and Relaxed Setting</h1>
                        <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your smile deserves expert care in a stress-free environment.</p>
                        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#appointment-form" class="btn btn-primary px-4 py-3">Make an Appointment</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item" style="background-image: url('https://appledentalvzm.in/images1/bg11.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    <div class="col-md-6 col-sm-12 dsdl12-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Gentle Care for Little Smiles</h1>
                        <p class="mb-4">Ensuring happy, healthy smiles for your little ones.</p>
                        <p><a href="#appointment-form" class="btn btn-primary px-4 py-3">Make an Appointment</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item" style="background-image: url('https://appledentalvzm.in/images1/banner-oldman.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    <div class="col-md-6 col-sm-12 dsdl12-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Gentle Hands, Caring for Every Smile</h1>
                        <p class="mb-4">Dedicated to the comfort and well-being of our elders, one visit at a time.</p>

                        <p><a href="#appointment-form" class="btn btn-primary px-4 py-3">Make an Appointment</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item" style="background-image: url('https://appledentalvzm.in/images1/EHS-banner.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    <div class="col-md-6 col-sm-12 dsdl12-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Committed to Public Health and Safety</h1>
                        <p class="mb-4">Public health is a commitment, not just a responsibility. Safety and care for all.</p>
                        <p><a href="#appointment-form" class="btn btn-primary px-4 py-3">Make an Appointment</a></p>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script>
        document.querySelectorAll('.slider-item').forEach(function (sliderElement) {
            sliderElement.addEventListener('touchmove', function (event) {
                // Check if the user is scrolling vertically
                if (event.cancelable) {
                    event.stopPropagation(); // Allow vertical scroll
                }
            });
        });
        
        let isScrolling;
        
        document.querySelector('.home-slider').addEventListener('touchstart', function (event) {
            const startX = event.touches[0].clientX;
            const startY = event.touches[0].clientY;
        
            this.addEventListener('touchmove', function (event) {
                const diffX = event.touches[0].clientX - startX;
                const diffY = event.touches[0].clientY - startY;
        
                // Determine if scrolling vertically
                isScrolling = Math.abs(diffY) > Math.abs(diffX);
        
                if (isScrolling) {
                    event.stopPropagation(); // Let the vertical scroll happen
                }
            });
        });
        
        $('.home-slider').owlCarousel({
            items: 1,
            loop: true,
            nav: false, // Disable navigation
            dots: false, // Disable dots
            mouseDrag: true,
            touchDrag: true
        });
    </script>


    <style>
        /* Emergency Section */
        .emergency-section {
          background: linear-gradient(to top, rgba(217, 83, 79, 0.8), rgba(255, 255, 255, 0.3)), url('images1/calling2.jpg') no-repeat center center;
          background-size: cover;
          color: #fff;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
          position: relative;
          height: 280px; /* Adjusted to give a good height */
        }
        
        /* Opening Hours Section */
        .opening-hours-section {
          background: linear-gradient(to bottom, #f8e8a2, #fff);
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
          padding: 30px 20px;
          transition: transform 0.3s ease;
          height: 280px; /* Ensure this matches with others */
        }
        
        .opening-hours-section:hover {
          transform: scale(1.02);
        }
        
        /* Appointment Section */
        .appointment-section {
          background: linear-gradient(to right, rgba(0, 123, 255, 0.7), rgba(255, 255, 255, 0.6)), url('images1/teeth-appointment.png') no-repeat center center;
          background-size: cover;
          color: #fff;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
          height: 280px; /* Ensure this matches with others */
        }
        
        
        /* Responsive Design */
        @media (max-width: 768px) {
          .emergency-section, 
          .opening-hours-section, 
          .appointment-section {
            flex-wrap: wrap; /* Ensure elements wrap on small screens */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            padding: 20px;
            height: auto; /* Adjust height dynamically for content */
            margin-bottom: 20px; /* Add spacing between sections */
            text-align: center; /* Center-align content for better mobile view */
          }
        
          .dsdl12-intro .row {
            flex-wrap: wrap; /* Ensure row wraps content properly */
          }
        
          .dsdl12-intro .col-md-3, 
          .dsdl12-intro .col-md-6 {
            flex: 0 0 100%; /* Make columns full width */
            max-width: 100%;
            margin-bottom: 20px; /* Add spacing between columns */
          }
        
          .appointment-section .row .col-sm-4 {
            flex: 0 0 100%; /* Full-width columns within appointment section */
            max-width: 100%;
            margin-bottom: 15px; /* Add spacing between items */
          }
        }
        
        @media (max-width: 576px) {
          .appointment-section .row.g-3 .col-sm-4 {
            width: 100%;
            margin-bottom: 10px;
          }
        
          label.form-label {
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
          }
        }
    </style>


    <script>
        document.getElementById('appointment-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent normal form submission
        
            // Gather form data
            const name = document.querySelector('input[name="name"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const date = document.querySelector('input[name="date"]').value;
            const time = document.querySelector('input[name="time"]').value;
            const phone = document.querySelector('input[name="phone"]').value;
            const department = document.querySelector('select[name="department"]').value;
        
            // Validate form fields
            if (name && email && date && time && phone && department) {
                if (!confirm('Do you want to confirm your appointment?')) {
                    return; // Exit if user cancels
                }
        
                // Create a FormData object for AJAX submission
                const formData = new FormData();
                formData.append('name', name);
                formData.append('email', email);
                formData.append('date', date);
                formData.append('time', time);
                formData.append('phone', phone);
                formData.append('department', department);
        
                // Send form data via AJAX
                fetch('submit_appointment.php', {
                    method: 'POST',
                    body: formData,
                })
                    .then((response) => response.json()) // Parse response as JSON
                    .then((data) => {
                        const formMessage = document.getElementById('form-message');
                        formMessage.style.display = 'block';
                        formMessage.textContent = data.message;
                        formMessage.style.color = data.success ? '#28a745' : '#dc3545';
        
                        if (data.success) {
                            document.getElementById('appointment-form').reset();
                        }
                    })
                    .catch((error) => {
                        alert('There was an error processing your request. Please try again.');
                        console.error(error);
                    });
            } else {
                alert('Please fill in all the fields correctly!');
            }
        });
    </script>

    <!-- About Section -->
    <section class="dsdl1-about-section">
        <div class="dsdl1-container">
            <!-- Section Heading -->
            <div class="dsdl1-section-heading">
                <h4 class="text-primary section-subtitle">GET TO KNOW US</h4>
                <h2 class="font-weight-bold section-title">About <strong>Our Journey</strong></h2>
                <p class="text-muted section-description">Discover who we are and what drives us to make a difference.</p>
            </div>

            <!-- Content and Image Row -->
            <div class="dsdl1-row">
                <!-- Tabs Content -->
                <div class="dsdl1-content" data-aos="fade-left" data-aos-duration="1000">
                    <div class="dsdl1-tabs">
                        <ul class="nav nav-pills" id="dsdl1-about-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="dsdl1-tab-whatwedo" data-bs-toggle="pill" href="#dsdl1-content-whatwedo" role="tab" aria-controls="dsdl1-content-whatwedo" aria-selected="true">
                                    <i class="fas fa-tools"></i> What We Do
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="dsdl1-tab-mission" data-bs-toggle="pill" href="#dsdl1-content-mission" role="tab" aria-controls="dsdl1-content-mission" aria-selected="false">
                                    <i class="fas fa-bullseye"></i> Our Mission
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="dsdl1-tab-goal" data-bs-toggle="pill" href="#dsdl1-content-goal" role="tab" aria-controls="dsdl1-content-goal" aria-selected="false">
                                    <i class="fas fa-star"></i> Our Vision
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="dsdl1-about-tabContent">
                        <div class="tab-pane fade show active" id="dsdl1-content-whatwedo" role="tabpanel" aria-labelledby="dsdl1-tab-whatwedo">
                            <h3>Transforming Smiles with Expert Care</h3>
                            <p>
                            At our dental clinic, we are dedicated to enhancing your oral health with the latest innovations in dentistry. Whether you need routine check-ups or advanced procedures, we deliver exceptional care tailored to your needs.

                            </p>
                            <p>
                            Our team of experts ensures a comfortable and stress-free experience, guiding you through every step of your dental journey. Your confidence starts with a healthy, beautiful smile.

</p>
                            <ul>
                                <li><i class="fas fa-check text-primary"></i>  State-of-the-art dental technology</li>
                                <li><i class="fas fa-check text-primary"></i> Customized treatments for every patient</li>
                                <li><i class="fas fa-check text-primary"></i>  Compassionate and highly trained professionals</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="dsdl1-content-mission" role="tabpanel" aria-labelledby="dsdl1-tab-mission">
                            <h3>Crafting Healthy, Confident Smiles</h3>
                            <p>
                            Our mission is to provide exceptional dental care with a commitment to excellence, innovation, and patient comfort. We strive to enhance oral health through personalized treatments, advanced technology, and a compassionate approach.

                            </p>
                            <p>Our goal is to create a welcoming environment where every patient feels valued and confident in their care. We believe in educating and empowering our patients to make informed decisions for a lifetime of healthy smiles.</p>
                                <!-- <p>
                                By fostering trust and building long-term relationships, we aim to transform dental care into a positive experience for everyone, regardless of age or background.
                            </p> -->
                            <ul>
                                <li><i class="fas fa-check text-primary"></i> Committed to quality dental care</li>
                                <li><i class="fas fa-check text-primary"></i>  Focused on patient well-being and comfort</li>
                                <li><i class="fas fa-check text-primary"></i>Driven by innovation and expertise</li>

                            </ul>
                        </div>
                        <div class="tab-pane fade" id="dsdl1-content-goal" role="tabpanel" aria-labelledby="dsdl1-tab-goal">
                            <h3> Redefining Dental Care for a Healthier Tomorrow</h3>
                            <p>
                            We envision a future where everyone has access to exceptional dental care, leading to healthier lives and confident smiles. Our focus is on innovation, patient-centric care, and continuous growth to set new standards in dentistry.

</p>
                            <p>By embracing cutting-edge technology, compassionate service, and a commitment to excellence, we aim to transform the dental experience—making it more accessible, comfortable, and effective for all.
    </p>
<!-- <p>
                                By embracing innovation,quality and patient satisfaction,we strive to exceed expectations and redefine your dental care experience.
                            </p> -->
                            <ul>
                                <li><i class="fas fa-check text-primary"></i>  Advancing dental care through innovation</li>
                                <li><i class="fas fa-check text-primary"></i>  Creating a positive and stress-free patient experience</li>
                                <li><i class="fas fa-check text-primary"></i>  Building lifelong relationships based on trust and quality care</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="dsdl1-about-image" style="background-image: url('https://appledentalvzm.in/images1/apple.jpg');">
                    <img src="images1/apple.jpg" alt="About Us Image" class="responsive-image">
                </div>
            </div>
        </div>
    </section>




    <style>
    </style>



    <!-- Services Section -->
    <section class="service_section layout_padding">
        <div class="container">
            <!-- Section Header -->
            <div class="row justify-content-center mb-4 text-center" data-aos="fade-up">
                <div class="col-md-8">
                    <h4 class="text-primary section-subtitle">COMPREHENSIVE DENTAL SERVICES</h4>
                    <h2 class="font-weight-bold section-title">Dental Treatments<strong> We Offer</strong></h2>
                    <p class="text-muted section-description">Explore a wide range of treatments, all tailored to give you a radiant and healthy smile.</p>
                </div>

            </div>

            <!-- Services Boxes -->
            <div class="row">
                <!-- Service 1 -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <div class="img-box">
                            <img src="https://appledentalvzm.in/images1/icons/dental-implant.png" alt="Dental Implants">
                        </div>
                        <div class="detail-box">
                            <h4>Dental Implants</h4>
                            <p>Restore your smile with durable and natural-looking implants.</p>
                            <a href="service.php" class="learn-more-link">Learn More <i class="fa-solid fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="box">
                        <div class="img-box">
                            <img src="https://appledentalvzm.in/images1/icons/root-canal.png" alt="Root Canal">
                        </div>
                        <div class="detail-box">
                            <h4>Root Canal</h4>
                            <p>Save infected teeth and maintain oral health with expert care.</p>
                            <a href="service.php" class="learn-more-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="box">
                        <div class="img-box">
                            <img src="https://appledentalvzm.in/images1/icons/invisible.png" alt="Invisalign Braces">
                        </div>
                        <div class="detail-box">
                            <h4>Clear aligners</h4>
                            <p>Achieve the perfect smile with comfortable and discreet clear aligners.</p>
                            <a href="service.php" class="learn-more-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <div class="img-box">
                            <img src="https://appledentalvzm.in/images1/icons/smile.png" alt="Smile Makeover">
                        </div>
                        <div class="detail-box">
                            <h4>Smile Makeover</h4>
                            <p>Transform your smile with personalized digital design solutions.</p>
                            <a href="service.php" class="learn-more-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View All Services Button -->
            <div class="row justify-content-center mt-5" data-aos="fade-up" data-aos-delay="500">
                <div class="col-md-4 text-center">
                    <a href="service.php" class="btn-custom">View All Services</a>
                </div>
            </div>
        </div>
    </section>
    <style>
        .box {
          height: 300px; /* Adjust the height as needed */
          display: flex;
          flex-direction: column;
          justify-content: space-between;
        }
        
        .img-box img {
          width: 70px; /* Adjust as needed */
          height: 70px; /* Adjust as needed */
          object-fit: cover;
        }
        .box {
          padding: 20px;
          margin: 15px;
        }
        
        .box p {
          overflow: visible;       /* Ensure content is fully visible */
          text-overflow: unset;    /* Remove ellipsis */
          white-space: normal;     /* Allow text to wrap to the next line if needed */
          display: block;          /* Ensure the paragraph spans full width */
        }
        
        @media (max-width: 768px) {
          .box {
            height: auto;
          }
        }
    </style>



    <section id="whychooseSection">
        <div class="container">
            <!-- Section Heading -->
            <div class="section-heading" data-aos="fade-up">
                <h4 class="text-primary section-subtitle" style="color: #ea232c !important;">WHAT SETS US APART</h4>
                <h2 class="font-weight-bold section-title">Why<strong style="color: #f8f6f6;"> Choose Us</strong> </h2>
                <p class="text-muted section-description" style="color: #ebdcdcde !important;">Here’s why we are trusted by thousands for their dental needs.</p>

            </div>

            <div class="row align-items-center">
                <!-- Left Image Slider -->
                <div class="col-lg-5 col-md-6 mb-4 mb-md-0" data-aos="fade-right" data-aos-delay="100">
                    <div class="whyChoose-left">
                        <div class="whychoose-slider">
                            <div class="whychoose-singleslide">
                                <img src="https://appledentalvzm.in/images1/1.jpg" alt="State-of-the-art Facilities">
                            </div>
                            <div class="whychoose-singleslide">
                                <img src="https://appledentalvzm.in/images1/2.jpg" alt="Expert Care Team">
                            </div>
                            <div class="whychoose-singleslide">
                                <img src="https://appledentalvzm.in/images1/3.jpg" alt="Patient-Focused Services">
                            </div>
                            <div class="whychoose-singleslide">
                                <img src="https://appledentalvzm.in/images1/4.jpg" alt="State-of-the-art Facilities">
                            </div>
                            <div class="whychoose-singleslide">
                                <img src="https://appledentalvzm.in/images1/5.jpg" alt="Expert Care Team">
                            </div>
                            <div class="whychoose-singleslide">
                                <img src="https://appledentalvzm.in/images1/6.jpg" alt="Patient-Focused Services">
                            </div>
                            <div class="whychoose-singleslide">
                                <img src="https://appledentalvzm.in/images1/7.jpg" alt="State-of-the-art Facilities">
                            </div>
                            <div class="whychoose-singleslide">
                                <img src="https://appledentalvzm.in/images1/8.jpg" alt="Expert Care Team">
                            </div>
                            <div class="whychoose-singleslide">
                                <img src="https://appledentalvzm.in/images1/9.jpg" alt="Patient-Focused Services">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Features -->
                <div class="col-lg-7 col-md-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="whyChoose-right">
                        <!-- Blurbs -->
                        <div class="blurb" data-aos="fade-up" data-aos-delay="300">
                            <div class="blurb-content">
                                <div class="blurb-image">
                                    <i class="fa-solid fa-tooth"></i>
                                </div>
                                <div class="blurb-text">
                                    <h4>100% hygienic and safe for You and Your Family</h4>
                                </div>
                            </div>
                        </div>
                        <div class="blurb" data-aos="fade-up" data-aos-delay="400">
                            <div class="blurb-content">
                                <div class="blurb-image">
                                    <i class="fa-solid fa-tooth"></i>
                                </div>
                                <div class="blurb-text">
                                    <h4>Highly Trained and Skilled Team of Dentists</h4>
                                </div>
                            </div>
                        </div>
                        <div class="blurb" data-aos="fade-up" data-aos-delay="500">
                            <div class="blurb-content">
                                <div class="blurb-image">
                                    <i class="fa-solid fa-tooth"></i>
                                </div>
                                <div class="blurb-text">
                                    <h4>State-of-the-Art Equipment and now with AI for Accurate Diagnosis</h4>
                                </div>
                            </div>
                        </div>
                        <div class="blurb" data-aos="fade-up" data-aos-delay="600">
                            <div class="blurb-content">
                                <div class="blurb-image">
                                    <i class="fa-solid fa-tooth"></i>
                                </div>
                                <div class="blurb-text">
                                    <h4>Personalized Treatment Plans Tailored to Your Needs</h4>
                                </div>
                            </div>
                        </div>
                        <div class="blurb" data-aos="fade-up" data-aos-delay="700">
                            <div class="blurb-content">
                                <div class="blurb-image">
                                    <i class="fa-solid fa-tooth"></i>
                                </div>
                                <div class="blurb-text">
                                    <h4>Comprehensive Services Under One Roof</h4>
                                </div>
                            </div>
                        </div>
                        <div class="blurb" data-aos="fade-up" data-aos-delay="800">
                            <div class="blurb-content">
                                <div class="blurb-image">
                                    <i class="fa-solid fa-tooth"></i>
                                </div>
                                <div class="blurb-text">
                                    <h4>Affordable and pocket friendly</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <div class="dsdl-container">
        <section class="dsdl-our-doctors">
            <!-- Section Header -->
            <div class="dsdl-section-header" data-aos="fade-up">
                <h4 class="text-primary section-subtitle">THE EXPERTS YOU TRUST</h4>
                <h2 class="font-weight-bold section-title">Meet Our<strong> Dental Specialists</strong></h2>
                <p class="text-muted section-description">Get to know our highly skilled and dedicated professionals.</p>
            </div>

            <!-- Swiper Container for Doctors -->
            <div class="swiper dsdl-swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    <!-- Doctor Card 1 -->
                    <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="dsdl-doctor-image">
                            <img src="https://appledentalvzm.in/images1/dr.kalyan.jpg" alt="Dr. Kalyan Chakravarthi">
                        </div>
                        <h4>Dr. Kalyan Chakravarthi</h4>
                        <p>CEO | BDS</p>
                    </div>

                    <!-- Doctor Card 2 -->
                    <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="300">
                        <div class="dsdl-doctor-image">
                            <img src="https://appledentalvzm.in/images1/Dr.T.mathuri.jpg" alt="Dr. T. Madhuri">
                        </div>
                        <h4>Dr. T. Madhuri</h4>
                        <p>BDS</p>
                    </div>

                    <!-- Doctor Card 3 -->
                    <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="400">
                        <div class="dsdl-doctor-image">
                            <img src="https://appledentalvzm.in/images1/Dr.A.da.jpg" alt="Dr. A. Deol Aslesha">
                        </div>
                        <h4>Dr. B. Sharon</h4
                        <p>Dental Surgeon | E.H.S Co-ordinator</p>
                    </div>

                    <!-- Doctor Card 4 -->
                    <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="500">
                        <div class="dsdl-doctor-image">
                            <img src="https://appledentalvzm.in/images1/Dr.sharon.jpg" alt="Dr. Sharon">
                        </div>
                        <h4>Dr. deol aslesha</h4>
                        <p>BDS</p>
                    </div>

                </div>

                <!-- Swiper Pagination -->
                <div class="swiper-pagination" data-aos="fade-up" data-aos-delay="800"></div>
            </div>
        </section>
    </div>

    <!-- Swiper Initialization Script -->
    <script>
        var swiper = new Swiper('.dsdl-swiper-container', {
          slidesPerView: 1,
          spaceBetween: 20,
          loop: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          observer: true,  // ✅ Fixes resizing issues
          observeParents: true,  // ✅ Ensures stability
          breakpoints: {
            768: { slidesPerView: 2, spaceBetween: 20 },
            1024: { slidesPerView: 3, spaceBetween: 30 },
          },
        });
    </script>

    <script>
        swiper.on('slideChangeTransitionEnd', function () {
          AOS.refresh();
        });
        AOS.init({ disable: false });
    </script>


    <!-------------achieve section------------------------>
    <section class="dsdl12-section dsdl12-counter img dsdl5-section" id="section-counter" style="background-image: url('https://appledentalvzm.in/images1/about-bg1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container dsdl5-container">
            <div class="row d-flex align-items-center dsdl5-row">
                <div class="col-md-4 text-center text-md-left py-4 dsdl5-heading" data-aos="fade-right">
                    <div class="heading-section heading-section-white dsdl5-heading-section">
                        <h4 class="text-primary section-subtitle dsdl5-subtitle">OUR MILESTONES</h4>
                        <h2 class="font-weight-bold section-title dsdl5-title">Our <strong style="color: #f8f6f6;">Achievements</strong></h2>
                        <p class="text-muted section-description dsdl5-description" style="color: #ddd !important;">
                            Celebrating the milestones that define our journey and inspire the future.
                        </p>
                    </div>
                </div>
                <div class="col-md-8 py-4 dsdl5-counter-container">
                    <div class="row dsdl5-counter-row">
                        <!-- Counter Item 1 -->
                        <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center counter-wrap dsdl5-counter-wrap" data-aos="fade-up">
                            <div class="block-18 dsdl5-block">
                                <div class="icon mb-3 dsdl5-icon">
                                    <i class="fas fa-smile dsdl5-smile"></i>
                                </div>
                                <div class="text dsdl5-text">
                                    <strong class="number dsdl5-number" data-number="15">0</strong>
                                    <span class="dsdl5-label">Years of Spreading Smiles</span>
                                </div>
                            </div>
                        </div>
                        <!-- Counter Item 2 -->
                        <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center counter-wrap dsdl5-counter-wrap" data-aos="fade-up" data-aos-delay="100">
                            <div class="block-18 dsdl5-block">
                                <div class="icon mb-3 dsdl5-icon">
                                    <i class="fas fa-users dsdl5-users"></i>
                                </div>
                                <div class="text dsdl5-text">
                                    <strong class="number dsdl5-number" data-number="25000">0</strong>
                                    <span class="dsdl5-label">Happy Patients</span>
                                </div>
                            </div>
                        </div>
                        <!-- Counter Item 3 -->
                        <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center counter-wrap dsdl5-counter-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="block-18 dsdl5-block">
                                <div class="icon mb-3 dsdl5-icon">
                                    <i class="fas fa-hand-holding-heart dsdl5-heart"></i>
                                </div>
                                <div class="text dsdl5-text">
                                    <strong class="number dsdl5-number" data-number="100"></strong>
                                    <span class="dsdl5-label">Dental Awareness Camps</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
  document.addEventListener("DOMContentLoaded", function () {
    let counters = document.querySelectorAll(".dsdl5-number");
    let speed = 200; // Adjust speed for animation

    const animateCounter = (counter) => {
      let target = +counter.getAttribute("data-number");
      let count = 0;
      let increment = target / speed;

      let updateCount = () => {
        count += increment;
        if (count < target) {
          counter.innerText = Math.floor(count);
          requestAnimationFrame(updateCount);
        } else {
          counter.innerText = target; // Ensure it stops exactly at target
        }
      };

      updateCount();
    };

    const startCounting = () => {
      let section = document.getElementById("section-counter");
      let sectionPosition = section.offsetTop;
      let screenPosition = window.innerHeight;

      if (window.scrollY + screenPosition > sectionPosition) {
        counters.forEach((counter) => {
          if (!counter.dataset.animated) {
            counter.dataset.animated = "true"; // Prevents repeated animation
            animateCounter(counter);
          }
        });
      }
    };

    window.addEventListener("scroll", startCounting);
  });
</script>



<section class="blog_section my-5">

    <div class="container">

        <div class="row  text-center justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6 wow fadeIn" data-wow-delay="400ms">
             
            <h2 class="font-weight-bold section-title">  Our <strong>Blogs</strong></h2>

            </div>
        </div>



        <div class="row">

            <?php
            include './db.connection/db_connection.php';

            // Fetch latest 3 blogs with video
            $sql = "SELECT id, title, main_content, main_image, video FROM blogs ORDER BY created_at DESC LIMIT 3";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='row'>"; // Start row for card layout

                while ($row = $result->fetch_assoc()) {
                    $blog_id = $row['id'];
                    $title = $row['title'];
                    $main_content = $row['main_content'];
                    $main_image = $row['main_image'];
                    $video = $row['video'];

                    echo "<div class='col-md-4 mb-4'>"; // Create 3 equal-width columns for medium devices
                    echo "<div class='card h-100'>"; // Start card

                    // Display the blog title
                    echo "<div class='card-body'>";


                    // Display video if available
                    if (!empty($video)) {
                        $video_path = "./admin/uploads/videos/{$video}";
                        echo "<video class='main-video img-fluid' controls>
                    <source src='{$video_path}' type='video/mp4'>
                    Your browser does not support the video tag.
                  </video>";
                    }
                    // If no video, display main image
                    elseif (!empty($main_image)) {
                        $main_image_path = "./admin/uploads/photos/{$main_image}";
                        echo "<img class='card-img-top img-fluid' src='{$main_image_path}' alt='Blog Image'>";
                    }
                    echo "<h5 class='card-title my-3'>" . htmlspecialchars($title) . "</h5>";
                    // Display a short portion of the blog content
                    echo "<p class='card-text'>" . substr($main_content, 0, 90) . "...</p>";

                    // Link to full blog post
                    echo "<a href='fullblog.php?id={$blog_id}' class='btn-style7 v6 wow fadeInUp animated'>Read more</a>";


                    echo "</div>"; // End card body
                    echo "</div>"; // End card
                    echo "</div>"; // End column
                }

                echo "</div>"; // End row
            } else {
                echo "No blog posts found.";
            }

            $conn->close();
            ?>



            <div class="mt-5 d-none d-md-block">
                <a href="blogs.php" style="text-decoration: none;">
                    <p class="view_more_btn mb-5 d-flex flex-row justify-content-start">View More<i class=" arrowmark_right  fas fa-arrow-right"></i>
                    </p>
                </a>
            </div>

            <div class="d-flex flex-row justify-content-center mt-4">
                <a href="blogs.php" style="text-decoration: none;">
                    <p class="view_more_btn d-md-none">View More<i class="fas fa-arrow-right ml-3"></i></p>
                </a>
            </div>

        </div>
    </div>

</section>






    <!------------------------------------------------ testimoniels section -------------------------------------------->



    <div class="patient-experience-section" data-aos="fade-up">
        <div class="dsdl-section-header" data-aos="fade-up">
            <h4 class="text-primary section-subtitle">PATIENT STORIES</h4>
            <h2 class="font-weight-bold section-title">Hear What Our <strong>Patients Say</strong></h2>
            <p class="text-muted section-description">See what our patients have to say about their experiences and the exceptional care they received at our clinic.</p>
        </div>


        <div class="patient-experience-container" data-aos="fade-up" data-aos-delay="300">
            <!-- Left: Text Testimonials Carousel -->
            <div class="testimonials-carousel" data-aos="zoom-in" data-aos-delay="400">
                <h3 class="carousel-heading" data-aos="fade-right" data-aos-delay="500">Client Experiences</h3>
                <div class="owl-carousel left-carousel">
                    <div class="item">
                        <p class="testimonial-text">
                            "Treatment is very good.....iam satisfied treatment in hospital... doctor s and staff very supportive and frndly.... once upon time suffering my teeth prblm.... after treatment iam so happy ....thank u apple dental specialists ☺️."
                        </p>
                        <h4>- Mungi venkatalakshmi</h4>
                    </div>
                    <div class="item">
                        <p class="testimonial-text">
                            "My experience at Apple dental specialities is very good. I am very much satisfied with the treatment, now my teeth are neat and clean, i got my missing teeth replaced and i got my root canal treatment done without any pain during treatment. Doctors and
                            staff are very friendly. I am very much happy now and would recommend others to visit the clinic for your dental checkup and treatments."
                        </p>
                        <h4>- Satyanarayana</h4>
                    </div>
                    <div class="item">
                        <p class="testimonial-text">
                            "I recently visited this dental clinic, and I must say the staff was incredibly friendly and welcoming. The environment was top-notch, very clean and hygienic. The treatment I received was the best I've had, and the overall experience was excellent. I
                            highly recommend this clinic for their exceptional service and care."
                        </p>
                        <h4>- TANUJA APPIKONDA</h4>
                    </div>
                    <div class="item">
                        <p class="testimonial-text">
                            "Tqu very much..for nice and safe treatment to me I feel very happy and staff was very friendly nature tqu soo much"
                        </p>
                        <h4>- Madhu Latha</h4>
                    </div>
                    <div class="item">
                        <p class="testimonial-text">
                            "Excellent and comfortable treatment . Hygienic and pleasant atmosphere.Without any doubt and fear anyone can approach here.The place which will eliminate your fear towards dental treatment.Ultimate solution for all dental issues..Thanks a lot sir."
                        </p>
                        <h4>- Sunitha Kolapalli</h4>
                    </div>
                </div>
                <a href="https://www.google.com/search?q=apple+dental+hospital+vizianagaram&rlz=1C1CHBF_enIN1071IN1071&oq=apple+dental+hospital+vizianagaram&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRhAMggIAhAAGBYYHjINCAMQABiGAxiABBiKBTIKCAQQABiABBiiBDIKCAUQABiABBiiBDIKCAYQABiABBiiBDIGCAcQRRg80gEJMjc3NTBqMGo0qAIAsAIB&sourceid=chrome&ie=UTF-8#lrd=0x3a3be551bb580c3f:0xa15d74cd17e1d939,1,,,," class="see-more-btn1">See More</a>
            </div>

            <!-- Right: Video Testimonials Carousel -->
            <div class="video-testimonials-carousel" data-aos="zoom-in" data-aos-delay="400">
                <h3 class="carousel-heading" data-aos="fade-left" data-aos-delay="500">Video Testimonials</h3>
                <div class="owl-carousel right-carousel">
                    <div class="item" data-aos="flip-up" data-aos-delay="600">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <div class="item" data-aos="flip-up" data-aos-delay="700">
                        <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <div class="item" data-aos="flip-up" data-aos-delay="800">
                        <iframe src="https://www.youtube.com/embed/kJQP7kiw5Fk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>

                <a href="#" class="see-more-btn1">See More</a>


            </div>
        </div>
    </div>


    <style>
        iframe {
            width: 100%;
            height: 220px;
            border-radius: 8px;
            border: 0;
            transition: transform 0.3s;
          }
          
          iframe:hover {
            transform: scale(1.05);
          }
          
        /* Section Styles */
        
        .see-more-btn1 {
        
          background: linear-gradient(90deg, #007bff, #0056b3);
          color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .see-more-btn1:hover {
          background: linear-gradient(90deg, #0056b3, #007bff);
          color: #fff;
          text-decoration: none;
        }
    </style>

    <script>
        $(document).ready(function () {
          // Left Carousel
          $(".left-carousel").owlCarousel({
            items: 1, // Display 1 item at a time
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            margin: 10,
            dots: true,
          });
        
          // Right Carousel
          $(".right-carousel").owlCarousel({
            items: 1, // Display 1 item at a time
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            margin: 10,
            dots: true,
          });
        });
    </script>

    <div class="ehs-box">
        <h3>Why EHS Matters?</h3>
        <p>Our Environmental, Health, and Safety (EHS) policies ensure a safe and sustainable future.</p>
    </div>

    <style>
        .ehs-box {
            background: linear-gradient(135deg, #ff6600, #ff9933);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            font-size: 1.3em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .ehs-box h3 {
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .ehs-box p {
            line-height: 1.5;
            margin: 0;
        }
        
        .ehs-box:hover {
            background: linear-gradient(135deg, #ff9933, #ff6600);
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .ehs-highlight {
            animation: pulse 1.5s infinite;
        }
    </style>


    <!-------------------------------------------- footer ----------------------------------->

    <?php include 'footer.php'; ?>