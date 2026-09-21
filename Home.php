<?php include "header.php"; ?>



<!-- Hero Section -->
<section class="home-slider owl-carousel">
    <div class="slider-item">
        <img src="images1/home/home_slider1.png" class="img-fluid" alt="">
    </div>
    <div class="slider-item">
        <img src="images1/home/home_slider2.png" class="img-fluid" alt="">
    </div>
    <div class="slider-item">
        <img src="images1/home/home_slider3.png" class="img-fluid" alt="">
    </div>
    <div class="slider-item">
        <img src="images1/home/home_slider4.png" class="img-fluid" alt="">
    </div>
</section>



<script>
    document.querySelectorAll('.slider-item').forEach(function(sliderElement) {
        sliderElement.addEventListener('touchmove', function(event) {
            // Check if the user is scrolling vertically
            if (event.cancelable) {
                event.stopPropagation(); // Allow vertical scroll
            }
        });
    });

    let isScrolling;

    document.querySelector('.home-slider').addEventListener('touchstart', function(event) {
        const startX = event.touches[0].clientX;
        const startY = event.touches[0].clientY;

        this.addEventListener('touchmove', function(event) {
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
        dots: true, // Enable dots for indication
        mouseDrag: true,
        touchDrag: true,
        autoplay: true, // Enable auto-slide
        autoplayTimeout: 3000, // Set slide interval (3 seconds)
        autoplayHoverPause: true // Pause on hover
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
        height: 280px;
        /* Adjusted to give a good height */
    }

    /* Opening Hours Section */
    .opening-hours-section {
        background: linear-gradient(to bottom, #f8e8a2, #fff);
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 30px 20px;
        transition: transform 0.3s ease;
        height: 280px;
        /* Ensure this matches with others */
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
        height: 280px;
        /* Ensure this matches with others */
    }


    /* Responsive Design */
    @media (max-width: 768px) {

        .emergency-section,
        .opening-hours-section,
        .appointment-section {
            flex-wrap: wrap;
            /* Ensure elements wrap on small screens */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            padding: 20px;
            height: auto;
            /* Adjust height dynamically for content */
            margin-bottom: 20px;
            /* Add spacing between sections */
            text-align: center;
            /* Center-align content for better mobile view */
        }

        .dsdl12-intro .row {
            flex-wrap: wrap;
            /* Ensure row wraps content properly */
        }

        .dsdl12-intro .col-md-3,
        .dsdl12-intro .col-md-6 {
            flex: 0 0 100%;
            /* Make columns full width */
            max-width: 100%;
            margin-bottom: 20px;
            /* Add spacing between columns */
        }

        .appointment-section .row .col-sm-4 {
            flex: 0 0 100%;
            /* Full-width columns within appointment section */
            max-width: 100%;
            margin-bottom: 15px;
            /* Add spacing between items */
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
    document.getElementById('appointment-form').addEventListener('submit', function(event) {
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


<!-- Dental Section Start -->
<section class="hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <!-- 1. Title & Subtitle Section (Center Aligned) -->
                <div class="text-center mb-4">
                    <!-- Badge -->
                    <span class="badge bg-danger bg-opacity-10 text-danger mb-3 px-3 py-2 rounded-pill fs-6 fw-semibold">
                        Established in 2010
                    </span>
                    
                    <!-- Title -->
                    <h1 class="display-5 fw-bold text-dark mb-2">
                        Apple Dental <span class="text-accent">Specialities</span>
                    </h1>
                    
                    <!-- Subtitle / Location -->
                    <h2 class="h5 text-primary fw-medium">
                        <i class="bi bi-geo-alt-fill me-1"></i>Multispeciality Dental Clinic in Vizianagaram
                    </h2>
                </div>

                <!-- 2. Content Paragraph (Left Aligned) -->
                <div class="text-start mb-4">
                    <p class="lead text-muted">
                        Established in 2010, Apple Dental Specialities provides comprehensive dental care including dental implants, root canal treatment, clear aligners, crowns & bridges, cosmetic dentistry, gum care. 
                   preventive dental treatment in Vizianagaram.
                    </p>
                    
                </div>

                <!-- 3. Action Buttons Section (Center Aligned) -->
                <div class="d-flex flex-wrap align-items-center justify-content-center gap-3 gap-sm-4 pt-2">
                    
                    <!-- Button 1 -->
                    <a href="appointment.php" class="btn-link-custom btn-link-danger fs-5">
                        Book an Appointment <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                    <!-- Divider Line -->
                    <span class="text-muted d-none d-sm-inline">|</span>

                    <!-- Button 2 -->
                    <a href="doctor.php" class="btn-link-custom btn-link-primary fs-5">
                        Meet Our Doctors <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- Dental Section End -->

<!-- About Section -->
<section class="dsdl1-about-section">
    <div class="dsdl1-container">
        <!-- Section Heading -->
        <div class="dsdl1-section-heading">
            <h4 class=" section-subtitle">GET TO KNOW US</h4>
            <h1> <span>Best</span> <span style="color: #007bff;">Dental Clinic in vizinagaram</span> </h1>

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

                        <div class="row">

                            <div class="col-12 col-lg-6" style="text-align:center; ">
                                <h3 class="fw-bold text-dark mb-3">About Apple Dental Specialities</h3>
                                <!-- <p>
                                    At our apple dental Specialities, we are dedicated to enhancing your oral health with the latest innovations in dentistry. Whether you need routine check-ups or advanced procedures, we deliver exceptional care tailored to your needs.

                                </p>
                                <p>
                                    Our team of experts ensures a comfortable and stress-free experience, guiding you through every step of your dental journey. Your confidence starts with a healthy, beautiful smile.

                                </p> -->
                                <p class="text-start text-muted lead mb-3">
    Apple Dental Specialities is a multispeciality dental clinic in Vizianagaram, Andhra Pradesh, established in 2010. The clinic provides comprehensive dental care through qualified dental professionals across general, restorative, cosmetic, orthodontic, implant, prosthodontic and preventive dentistry.
</p>

<p class="text-start text-muted lead mb-4">
    Our approach focuses on accurate diagnosis, personalized treatment planning and appropriate treatment based on each patient's individual oral health needs. Patients can access a range of dental services, including dental implants, root canal treatment, clear aligners, crowns and bridges, veneers, teeth whitening, gum care and smile-focused treatments.
</p>
                                <ul class="text-start custom-bullet-list m-0 p-0 ps-3">
    <li class="mb-2"><strong>16+ Years</strong> - Dental Care Since 2010</li>
    <li class="mb-2"><strong>Qualified Team</strong> - Experienced Dental Professionals</li>
    <li class="mb-2"><strong>Multiple Specialties</strong> - Comprehensive Dental Care</li>
    <li class="mb-2"><strong>Vizianagaram</strong> - Serving Patients in Andhra Pradesh</li>
</ul>

                            </div>

                            <div class="col-12 col-lg-6">

                                <div class="dsdl1-about-image" style="background-image: url('images1/apple-doctor.png');">
                                    <!-- <img src="images1/apple.jpg" alt="About Us Image" class="responsive-image"> -->
                                </div>


                            </div>

                        </div>


                    </div>

                    <div class="tab-pane fade" id="dsdl1-content-mission" role="tabpanel" aria-labelledby="dsdl1-tab-mission">

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <h3>Crafting Healthy, Confident Smiles</h3>
                                <!-- <p>
                                    Our mission is to provide exceptional dental Specialities with a commitment to excellence, innovation, and patient comfort. We strive to enhance oral health through personalized treatments, advanced technology, and a compassionate approach.

                                </p>
                                <p>Our goal is to create a welcoming environment where every patient feels valued and confident in their care. We believe in educating and empowering our patients to make informed decisions for a lifetime of healthy smiles.</p> -->


                                <p>
                                    At our clinic, recognized as the best dental clinic in Vizianagaram, we provide exceptional dental care with a strong commitment to excellence, innovation, and patient comfort. Our experienced team uses advanced dental technology and personalized treatment plans to ensure every patient receives high-quality and reliable dental care.
                                </p>

                                <p>
                                    As trusted root canal specialists in Vizianagaram, we deliver safe, painless, and effective treatments that restore oral health and confident smiles. We focus on creating a welcoming environment where patients feel comfortable and informed, helping them make the right decisions for long-term oral health and a lifetime of healthy smiles
                                </p>

                                <ul>
                                    <li><i class="fas fa-check text-primary"></i> Advanced Dental Treatments & Specialized Care</li>
                                    <li><i class="fas fa-check text-primary"></i> Patient Comfort & Preventive Dentistry</li>
                                    <li><i class="fas fa-check text-primary"></i> Modern Dental Technology & Expert Dentists</li>

                                </ul>

                            </div>
                            <div class="col-12 col-lg-6">

                                <div class="dsdl1-about-image" style="background-image: url('images1/home/mission.png');">
                                    <!-- <img src="images1/apple.jpg" alt="About Us Image" class="responsive-image"> -->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="dsdl1-content-goal" role="tabpanel" aria-labelledby="dsdl1-tab-goal">

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <h3> Redefining Dental Specialities for a Healthier Tomorrow</h3>
                                <p>
                                    We envision a future where everyone has access to exceptional dental Specialities, leading to healthier lives and confident smiles. Our focus is on innovation, patient-centric care, and continuous growth to set new standards in dentistry.

                                </p>
                                <p>By embracing cutting-edge technology, compassionate service, and a commitment to excellence, we aim to transform the dental experience—making it more accessible, comfortable, and effective for all.
                                </p>

                                <ul>
                                    <li><i class="fas fa-check text-primary"></i> Advancing dental Specialities through innovation</li>
                                    <li><i class="fas fa-check text-primary"></i> Creating a positive and stress-free patient experience</li>
                                    <li><i class="fas fa-check text-primary"></i> Building lifelong relationships based on trust and quality care</li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="dsdl1-about-image" style="background-image: url('images1/home/vision.png');">
                                    <!-- <img src="images1/apple.jpg" alt="About Us Image" class="responsive-image"> -->
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Image Section -->
            <!-- <div class="dsdl1-about-image" style="background-image: url('https://appledentalvzm.in/images1/apple.jpg');">
                <img src="images1/apple.jpg" alt="About Us Image" class="responsive-image">
            </div> -->
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
                    <!-- <div class="dsdl-doctor-image">
                        <img src="https://appledentalvzm.in/images1/dr.kalyan.jpg" alt="Dr. Kalyan Chakravarthi">
                    </div> -->

                    <div class="hover-popup-image">
                        <img src="images1/kalyan.png" alt="Dr. Kalyan" class="img-fluid">
                    </div>


                    <h4>Dr. Kalyan Chakravarty</h4>
                    <p> BDS <br>Clinical Head </p>
                </div>

                <!-- Doctor Card 2 -->
                <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="hover-popup-image">
                        <img src="images1/madhuri.png" alt="Dr. T. Madhuri" class="img-fluid">
                    </div>
                    <h4>Dr. T. Madhuri</h4>
                    <p>BDS<br>Dentist</p>
                </div>

                <!-- Doctor Card 3 -->
                <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="400">
                    <div class="hover-popup-image">
                        <!-- <img src="https://appledentalvzm.in/images1/Dr.A.da.jpg" alt="Dr. A. Deol Aslesha"> -->
                        <img src="images1/sarath.png" alt="Dr. A. Deol Aslesha" class="img-fluid">
                    </div>
                    <h4>Dr.Sarath Chandra </h4>
                    <p>Prosthodontist<br>Dentist</p>
                </div>

                <!-- Doctor Card 4 -->
                <!-- <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="500">
                    <div class="dsdl-doctor-image">
                        <img src="https://appledentalvzm.in/images1/Dr.sharon.jpg" alt="Dr. Sharon">
                    </div>
                    <h4>Dr. deol aslesha</h4>
                    <p>BDS</p>
                </div> -->

            </div>

            <!-- Swiper Pagination -->
            <!-- <div class="swiper-pagination" data-aos="fade-up" data-aos-delay="800"></div> -->
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
        observer: true, 
        observeParents: true, 
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            },
        },
    });
</script>

<script>
    swiper.on('slideChangeTransitionEnd', function() {
        AOS.refresh();
    });
    AOS.init({
        disable: false
    });
</script>

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
                        <img src="./images1/icons/dental-implant.png" alt="Dental Implants">
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
                        <img src="./images1/icons/root-canal.png" alt="Root Canal">
                    </div>
                    <div class="detail-box">
                        <h4>Root Canal</h4>
                        <p>Save infected teeth and maintain oral health with expert Specialities.</p>
                        <a href="service.php" class="learn-more-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="box">
                    <div class="img-box">
                        <img src="./images1/icons/invisible.png" alt="Invisalign Braces">
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
                        <img src="./images1/icons/smile.png" alt="Smile Makeover">
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
        height: 300px;
        /* Adjust the height as needed */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .img-box img {
        width: 70px;
        /* Adjust as needed */
        height: 70px;
        /* Adjust as needed */
        object-fit: cover;
    }

    .box {
        padding: 20px;
        margin: 15px;
    }

    .box p {
        overflow: visible;
        /* Ensure content is fully visible */
        text-overflow: unset;
        /* Remove ellipsis */
        white-space: normal;
        /* Allow text to wrap to the next line if needed */
        display: block;
        /* Ensure the paragraph spans full width */
    }

    @media (max-width: 768px) {
        .box {
            height: auto;
        }
    }
</style>






<?php
// Facility Cards Data Array (Without Icons)
$facility_cards = [
    [
        "title" => "Digital Dental Diagnostics",
        "desc" => "Modern diagnostic tools help dental professionals assess oral conditions and plan appropriate treatment based on individual patient needs."
    ],
    [
        "title" => "Dental Implant Care",
        "desc" => "Implant treatment planning and restorative care are provided based on the patient's oral health, bone condition and individual treatment requirements."
    ],
    [
        "title" => "Laser-Assisted Dental Care",
        "desc" => "Laser technology may be used for selected dental procedures where clinically appropriate, supporting precise and minimally invasive treatment."
    ],
    [
        "title" => "Modern Dental Treatment Setup",
        "desc" => "A clinical environment designed to support different dental procedures while maintaining patient comfort and treatment efficiency."
    ],
    [
        "title" => "Sterilization & Infection Control",
        "desc" => "Instrument sterilization and infection-control protocols are an important part of maintaining a safe dental treatment environment."
    ],
    [
        "title" => "Digital Treatment Planning",
        "desc" => "Diagnostic information is evaluated to develop treatment plans according to each patient's specific dental condition."
    ]
];
?>

<!-- Technology & Facilities Section Start -->
<section class="tech-section">
    <div class="container-fluid px-lg-5 px-4">
        
        <!-- Section Heading & Subtitle -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10 text-center">
                <span class="badge bg-danger bg-opacity-10 text-danger mb-2 px-3 py-2 rounded-pill fs-6 fw-semibold">
                    Advanced Care
                </span>
                <h2 class="display-6 fw-bold text-dark mb-3">
                    Modern Dental Technology & Patient-Centered Facilities
                </h2>
                <p class="lead text-muted text-start text-md-center mx-auto" style="max-width: 950px;">
                    At Apple Dental Specialities, Vizianagaram, modern dental technology and clinical facilities support accurate diagnosis, treatment planning and comfortable dental care. Our facilities are designed to support a wide range of general, restorative, cosmetic, orthodontic, implant and prosthodontic treatments.
                </p>
            </div>
        </div>

        <!-- Cards Swiper Slider -->
        <div class="swiper tech-swiper-container">
            <div class="swiper-wrapper">
                
                <?php foreach ($facility_cards as $card): ?>
                    <div class="swiper-slide h-auto">
                        <div class="tech-card">
                            <h3 class="tech-card-title"><?php echo $card['title']; ?></h3>
                            <p class="tech-card-desc"><?php echo $card['desc']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- Swiper Pagination & Navigation -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next d-none d-md-flex"></div>
            <div class="swiper-button-prev d-none d-md-flex"></div>
        </div>

    </div>
</section>
<!-- Technology & Facilities Section End -->



<script>
    document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper(".tech-swiper-container", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // Mobile (<768px): 1 Card
                0: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },
                // Tablet (768px - 991px): 3 Cards
                768: {
                    slidesPerView: 3,
                    spaceBetween: 18
                },
                // Small Desktop / Laptops (992px - 1199px): 4 Cards
                992: {
                    slidesPerView: 4,
                    spaceBetween: 20
                },
                // Large Desktop (>= 1200px): All 6 Cards
                1200: {
                    slidesPerView: 6,
                    spaceBetween: 20
                }
            }
        });
    });
</script>


<!-- <section id="whychooseSection">
    <div class="container">
        Section Heading
        <div class="section-heading" data-aos="fade-up">
            <h4 class="text-primary section-subtitle" style="color: #ea232c !important;">WHAT SETS US APART</h4>
            <h2 class="font-weight-bold section-title">Why<strong style="color: #f8f6f6;"> Choose Us</strong> </h2>
            <p class="text-muted section-description" style="color: #ebdcdcde !important;">Choosing a dental clinic is about more than a single treatment. At *Apple Dental Specialities, Vizianagaram*, our approach focuses on understanding each patient's oral health needs and developing an appropriate treatment plan with qualified dental professionals.</p>

        </div>

        <div class="row align-items-center">
            Left Image Slider
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
                <div class="swiper my-custom-swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        Image 1
                        <div class="swiper-slide custom-slide">
                            <img src="images1/1.png" alt="Image 1">
                        </div>

                        Image 2
                        <div class="swiper-slide custom-slide">
                            <img src="images1/2.png" alt="Image 2">
                        </div>

                        Image 3
                        <div class="swiper-slide custom-slide">
                            <img src="images1/3.png" alt="Image 3">
                        </div>

                        Image 4
                        <div class="swiper-slide custom-slide">
                            <img src="images1/4.png" alt="Image 4">
                        </div>

                        Image 5
                        <div class="swiper-slide custom-slide">
                            <img src="images1/5.png" alt="Image 5">
                        </div>

                        Image 6
                        <div class="swiper-slide custom-slide">
                            <img src="images1/6.png" alt="Image 6">
                        </div>

                        Image 7
                        <div class="swiper-slide custom-slide">
                            <img src="images1/7.png" alt="Image 7">
                        </div>

                        Image 8
                        <div class="swiper-slide custom-slide">
                            <img src="images1/8.png" alt="Image 8">
                        </div>

                        Image 9
                        <div class="swiper-slide custom-slide">
                            <img src="images1/9.png" alt="Image 9">
                        </div>
                    </div>

                    Swiper Pagination
                    <div class="swiper-pagination my-custom-pagination" data-aos="fade-up" data-aos-delay="800"></div>

                    Swiper Navigation
                    <div class="swiper-button-next my-custom-next"></div>
                    <div class="swiper-button-prev my-custom-prev"></div>
                </div>

                Swiper JS Initialization
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var swiper = new Swiper('.my-custom-swiper', {
                            slidesPerView: 1, Show one image at a time
                            spaceBetween: 20,
                            loop: true,
                            autoplay: {
                                delay: 3000,
                                disableOnInteraction: false,
                            },
                            pagination: {
                                el: '.my-custom-pagination',
                                clickable: true,
                            },
                            navigation: {
                                nextEl: '.my-custom-next',
                                prevEl: '.my-custom-prev',
                            },
                            observer: true,
                            observeParents: true,
                        });
                    });
                </script>





            </div>

            Right Features
            <div class="col-lg-7 col-md-6" data-aos="fade-left" data-aos-delay="200">
                <div class="whyChoose-right">
                    Blurbs
                    <div class="blurb" data-aos="fade-up" data-aos-delay="300">
                        <div class="blurb-content">
                            <div class="blurb-image">
                                <i class="fa-solid fa-tooth"></i>
                            </div>
                            <div class="blurb-text">
                                <h4>Established Dental Care</h4>
                                <p>Established in *2010*, Apple Dental Specialities has been providing dental care in Vizianagaram for patients seeking both routine and specialized dental treatment.</p>
                            </div>
                        </div>
                    </div>
                    <div class="blurb" data-aos="fade-up" data-aos-delay="400">
                        <div class="blurb-content">
                            <div class="blurb-image">
                                <i class="fa-solid fa-tooth"></i>
                            </div>
                            <div class="blurb-text">
                                <h4> Qualified Dental Professionals</h4>
                                <p>Our dental team includes qualified professionals with expertise across different areas of dentistry, supporting comprehensive diagnosis and treatment planning.</p>
                            </div>
                        </div>
                    </div>
                    <div class="blurb" data-aos="fade-up" data-aos-delay="500">
                        <div class="blurb-content">
                            <div class="blurb-image">
                                <i class="fa-solid fa-tooth"></i>
                            </div>
                            <div class="blurb-text">
                                <h4>Multiple Dental Specialties</h4>
                                <p>From preventive and restorative dentistry to dental implants, prosthodontics, orthodontic care and cosmetic dentistry, patients can access multiple areas of dental care at one clinic.</p>
                            </div>
                        </div>
                    </div>
                    <div class="blurb" data-aos="fade-up" data-aos-delay="600">
                        <div class="blurb-content">
                            <div class="blurb-image">
                                <i class="fa-solid fa-tooth"></i>
                            </div>
                            <div class="blurb-text">
                                <h4>Personalized Treatment Planning</h4>
                                <p>Every patient's dental condition is different. Our treatment recommendations are based on clinical examination, diagnostic findings, oral health requirements and the patient's individual needs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="blurb" data-aos="fade-up" data-aos-delay="700">
                        <div class="blurb-content">
                            <div class="blurb-image">
                                <i class="fa-solid fa-tooth"></i>
                            </div>
                            <div class="blurb-text">
                                <h4> Modern Clinical Facilities</h4>
                                <p>Our clinic uses appropriate dental technology and clinical facilities to support diagnosis, treatment planning and dental procedures across different specialties.</p>
                            </div>
                        </div>
                    </div>
                    <div class="blurb" data-aos="fade-up" data-aos-delay="800">
                        <div class="blurb-content">
                            <div class="blurb-image">
                                <i class="fa-solid fa-tooth"></i>
                            </div>
                            <div class="blurb-text">
                                <h4>Focus on Long-Term Oral Health</h4>
                                <p>Along with treating existing dental problems, we emphasize preventive care, oral hygiene and regular dental evaluation to help patients maintain their oral health over time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="blurb" data-aos="fade-up" data-aos-delay="800">
                        <div class="blurb-content">
                            <div class="blurb-image">
                                <i class="fa-solid fa-tooth"></i>
                            </div>
                            <div class="blurb-text">
                                <h4>Clear Communication</h4>
                                <p>We explain the patient's dental condition, available treatment options and recommended next steps so patients can participate in informed decisions about their dental care.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section id="whychooseSection" class="py-5">
    <div class="container">
        <!-- Section Heading -->
        <div class="section-heading text-center mb-4" data-aos="fade-up">
            <!-- <h4 class="section-subtitle fw-bold" style="color: #ea232c !important;">WHAT SETS US APART</h4> -->
            <h2 class="font-weight-bold section-title text-white">Why <strong style="color: #ea232c;">Choose Us</strong></h2>
            <p class="section-description mx-auto mt-2" style="color: #ebdcdcde !important; max-width: 800px;">
                Choosing a dental clinic is about more than a single treatment. At <em>Apple Dental Specialities, Vizianagaram</em>, our approach focuses on understanding each patient's oral health needs and developing an appropriate treatment plan with qualified dental professionals.
            </p>
        </div>

        <div class="row align-items-start g-4">
            <!-- Left Image Slider -->
            <div class="col-lg-5 col-md-6" data-aos="fade-right" data-aos-delay="100">
                <div class="swiper my-custom-swiper rounded-3 shadow-sm overflow-hidden">
                    <div class="swiper-wrapper">
                        <!-- Image 1 -->
                        <div class="swiper-slide custom-slide">
                            <img src="images1/1.png" alt="Image 1" class="whychoose-img">
                        </div>
                        <!-- Image 2 -->
                        <div class="swiper-slide custom-slide">
                            <img src="images1/2.png" alt="Image 2" class="whychoose-img">
                        </div>
                        <!-- Image 3 -->
                        <div class="swiper-slide custom-slide">
                            <img src="images1/3.png" alt="Image 3" class="whychoose-img">
                        </div>
                        <!-- Image 4 -->
                        <div class="swiper-slide custom-slide">
                            <img src="images1/4.png" alt="Image 4" class="whychoose-img">
                        </div>
                        <!-- Image 5 -->
                        <div class="swiper-slide custom-slide">
                            <img src="images1/5.png" alt="Image 5" class="whychoose-img">
                        </div>
                        <!-- Image 7 -->
                        <div class="swiper-slide custom-slide">
                            <img src="images1/7.png" alt="Image 7" class="whychoose-img">
                        </div>
                        <!-- Image 8 -->
                        <div class="swiper-slide custom-slide">
                            <img src="images1/8.png" alt="Image 8" class="whychoose-img">
                        </div>
                        <!-- Image 9 -->
                        <div class="swiper-slide custom-slide">
                            <img src="images1/9.png" alt="Image 9" class="whychoose-img">
                        </div>
                    </div>

                    <!-- Swiper Controls -->
                    <div class="swiper-pagination my-custom-pagination"></div>
                    <div class="swiper-button-next my-custom-next"></div>
                    <div class="swiper-button-prev my-custom-prev"></div>
                </div>
            </div>

            <!-- Right Features Content -->
            <div class="col-lg-7 col-md-6" data-aos="fade-left" data-aos-delay="200">
                <div class="whyChoose-right d-flex flex-column gap-3">
                    
                    <!-- 1. Default Visible Box -->
                    <div class="blurb p-3 rounded-3 shadow-sm" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1);">
                        <div class="blurb-text">
                            <h4 class="text-white fw-bold mb-1 fs-5">Established Dental Care</h4>
                            <p class="mb-0 text-light opacity-75 small">Established in 2010, Apple Dental Specialities has been providing dental care in Vizianagaram for patients seeking both routine and specialized dental treatment.</p>
                        </div>
                    </div>

                    <!-- 2. Default Visible Box -->
                    <div class="blurb p-3 rounded-3 shadow-sm" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1);">
                        <div class="blurb-text">
                            <h4 class="text-white fw-bold mb-1 fs-5">Qualified Dental Professionals</h4>
                            <p class="mb-0 text-light opacity-75 small">Our dental team includes qualified professionals with expertise across different areas of dentistry, supporting comprehensive diagnosis and treatment planning.</p>
                        </div>
                    </div>

                    <!-- 3. Default Visible Box -->
                    <div class="blurb p-3 rounded-3 shadow-sm" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1);">
                        <div class="blurb-text">
                            <h4 class="text-white fw-bold mb-1 fs-5">Multiple Dental Specialties</h4>
                            <p class="mb-0 text-light opacity-75 small">From preventive and restorative dentistry to dental implants, prosthodontics, orthodontic care and cosmetic dentistry, patients can access multiple areas of dental care at one clinic.</p>
                        </div>
                    </div>

                    <!-- Extra Hidden Content (Opens on Read More Click) -->
                    <div id="moreWhyChooseContent" class="d-none d-flex flex-column gap-3">
                        
                        <!-- 4. Hidden Box -->
                        <div class="blurb p-3 rounded-3 shadow-sm" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1);">
                            <div class="blurb-text">
                                <h4 class="text-white fw-bold mb-1 fs-5">Personalized Treatment Planning</h4>
                                <p class="mb-0 text-light opacity-75 small">Every patient's dental condition is different. Our treatment recommendations are based on clinical examination, diagnostic findings, oral health requirements and the patient's individual needs.</p>
                            </div>
                        </div>

                        <!-- 5. Hidden Box -->
                        <div class="blurb p-3 rounded-3 shadow-sm" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1);">
                            <div class="blurb-text">
                                <h4 class="text-white fw-bold mb-1 fs-5">Modern Clinical Facilities</h4>
                                <p class="mb-0 text-light opacity-75 small">Our clinic uses appropriate dental technology and clinical facilities to support diagnosis, treatment planning and dental procedures across different specialties.</p>
                            </div>
                        </div>

                        <!-- 6. Hidden Box -->
                        <div class="blurb p-3 rounded-3 shadow-sm" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1);">
                            <div class="blurb-text">
                                <h4 class="text-white fw-bold mb-1 fs-5">Focus on Long-Term Oral Health</h4>
                                <p class="mb-0 text-light opacity-75 small">Along with treating existing dental problems, we emphasize preventive care, oral hygiene and regular dental evaluation to help patients maintain their oral health over time.</p>
                            </div>
                        </div>

                        <!-- 7. Hidden Box -->
                        <div class="blurb p-3 rounded-3 shadow-sm" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.1);">
                            <div class="blurb-text">
                                <h4 class="text-white fw-bold mb-1 fs-5">Clear Communication</h4>
                                <p class="mb-0 text-light opacity-75 small">We explain the patient's dental condition, available treatment options and recommended next steps so patients can participate in informed decisions about their dental care.</p>
                            </div>
                        </div>

                    </div>

                    <!-- Read More / Read Less Button -->
                    <div class="mt-2">
                        <button id="readMoreWhyChooseBtn" class="btn btn-outline-light px-4 py-2 rounded-pill btn-sm fw-bold">
                            Read More <i class="bi bi-chevron-down ms-1"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>



<!-- Swiper JS & Read More Toggle Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Swiper Init
        var swiper = new Swiper('.my-custom-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.my-custom-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.my-custom-next',
                prevEl: '.my-custom-prev',
            },
            observer: true,
            observeParents: true,
        });

        // Read More Toggle Logic
        const readMoreBtn = document.getElementById("readMoreWhyChooseBtn");
        const extraContent = document.getElementById("moreWhyChooseContent");

        if (readMoreBtn && extraContent) {
            readMoreBtn.addEventListener("click", function() {
                if (extraContent.classList.contains("d-none")) {
                    extraContent.classList.remove("d-none");
                    readMoreBtn.innerHTML = 'Read Less <i class="bi bi-chevron-up ms-1"></i>';
                } else {
                    extraContent.classList.add("d-none");
                    readMoreBtn.innerHTML = 'Read More <i class="bi bi-chevron-down ms-1"></i>';
                }
            });
        }
    });
</script>







<!-- <div class="dsdl-container">
    <section class="dsdl-our-doctors">
        Section Header
        <div class="dsdl-section-header" data-aos="fade-up">
            <h4 class="text-primary section-subtitle">THE EXPERTS YOU TRUST</h4>
            <h2 class="font-weight-bold section-title">Meet Our<strong> Dental Specialists</strong></h2>
            <p class="text-muted section-description">Get to know our highly skilled and dedicated professionals.</p>
        </div>

        Swiper Container for Doctors
        <div class="swiper dsdl-swiper-container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                Doctor Card 1
                <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="dsdl-doctor-image">
                        <img src="https://appledentalvzm.in/images1/dr.kalyan.jpg" alt="Dr. Kalyan Chakravarthi">
                    </div>

                    <div class="hover-popup-image">
                        <img src="images1/kalyan.png" alt="Dr. Kalyan" class="img-fluid">
                    </div>


                    <h4>Dr. Kalyan Chakravarty</h4>
                    <p>Clinical Head | BDS</p>
                </div>

                Doctor Card 2
                <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="hover-popup-image">
                        <img src="images1/madhuri.png" alt="Dr. T. Madhuri" class="img-fluid">
                    </div>
                    <h4>Dr. T. Madhuri</h4>
                    <p>BDS</p>
                </div>

                Doctor Card 3
                <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="400">
                    <div class="hover-popup-image">
                        <img src="https://appledentalvzm.in/images1/Dr.A.da.jpg" alt="Dr. A. Deol Aslesha">
                        <img src="images1/sarath.png" alt="Dr. A. Deol Aslesha" class="img-fluid">
                    </div>
                    <h4>Dr.Sarath Chandra </h4>
                    <p>Prosthodontist</p>
                </div>

                Doctor Card 4
                <div class="swiper-slide dsdl-doctor-card" data-aos="zoom-in" data-aos-delay="500">
                    <div class="dsdl-doctor-image">
                        <img src="https://appledentalvzm.in/images1/Dr.sharon.jpg" alt="Dr. Sharon">
                    </div>
                    <h4>Dr. deol aslesha</h4>
                    <p>BDS</p>
                </div>

            </div>

            Swiper Pagination
            <div class="swiper-pagination" data-aos="fade-up" data-aos-delay="800"></div>
        </div>
    </section>
</div> -->

<!-- Swiper Initialization Script
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
        observer: true, 
        observeParents: true, 
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            },
        },
    });
</script>

<script>
    swiper.on('slideChangeTransitionEnd', function() {
        AOS.refresh();
    });
    AOS.init({
        disable: false
    });
</script> -->


<!-------------achieve section------------------------>
<section class="dsdl12-section dsdl12-counter img dsdl5-section" id="section-counter" style="background-image: url('images1/home/bg_smile.png');" data-stellar-background-ratio="0.5">
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
    document.addEventListener("DOMContentLoaded", function() {
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

                <h2 class="font-weight-bold section-title"> Our <strong>Blogs</strong></h2>

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
                    echo "<a href='fullblog_newpage.php?id={$blog_id}' class='btn-style7 v6 wow fadeInUp animated'>Read more</a>";


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
        <p class="text-muted section-description">See what our patients have to say about their experiences and the exceptional care they received at our Specialities.</p>
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
                        "I recently visited this dental Specialities, and I must say the staff was incredibly friendly and welcoming. The environment was top-notch, very clean and hygienic. The treatment I received was the best I've had, and the overall experience was excellent. I
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
        <!-- <div class="video-testimonials-carousel" data-aos="zoom-in" data-aos-delay="400">
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


        </div> -->
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
    $(document).ready(function() {
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

<!-- <div class="ehs-box">
    <h3>Why EHS Matters?</h3>
    <p>Our Employees Health Scheme (EHS) policies ensure a safe and sustainable future.</p>
</div> -->

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
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .ehs-highlight {
        animation: pulse 1.5s infinite;
    }
</style>







<section class="py-5">
    <div class="container">

        <h2 class="text-center">Frequently Ask Question (FAQ)</h2>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="accordion">
                    <!-- Accordion 1 -->

                    <div class="faq_section">

                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <h2 class="faq_heading_section">What are dental implants and how do they help?



                            </h2>
                            <h2 class="accordion-icon">+</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Dental implants are titanium-based artificial tooth roots used to permanently replace missing teeth. At Apple Dental Specialties, they restore chewing function, appearance, and prevent bone loss
                        </div>
                    </div>



                    <div class="faq_section">

                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <h2 class="faq_heading_section"> Are clear aligners effective for teeth straightening?

                            </h2>
                            <h2 class="accordion-icon">+</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Yes, clear aligners are a transparent, removable, and comfortable alternative to metal braces. Apple Dental Specialties offers advanced aligner treatments for effective smile correction
                        </div>
                    </div>




                    <!-- Accordion 3 -->
                    <div class="faq_section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <h2 class="faq_heading_section">What is a smile makeover and who needs it?


                            </h2>
                            <h2 class="accordion-icon">+</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                A smile makeover combines cosmetic procedures like veneers, whitening, and alignment to enhance your smile. It's ideal for those wanting a confident, aesthetically pleasing smile
                        </div>
                    </div>

                    <!-- Accordion 4 -->
                    <div class="faq_section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <h2 class="faq_heading_section"> How does laser dentistry benefit patients?


                            </h2>
                            <h2 class="accordion-icon">+</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Laser dentistry provides painless, precise treatments for gum issues, cavities, and surgeries. Apple Dental Specialties uses laser technology for faster healing and less discomfort </p>
                        </div>
                    </div>
                    <!-- Accordion 5 -->
                    <!-- <div class="faq_section">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <h2 class="faq_heading_section">Can cancer be prevented?
                </h2>
                <h2 class="accordion-icon">+</h2>
              </div>
              <div class="accordion-content">
                <p>
                  Not all cancers are preventable, but up to 30-50% of cases can be avoided through healthy lifestyle choices, regular screenings, vaccinations (like HPV), and avoiding carcinogens such as tobacco and processed foods
                </p>
              </div> 
            </div>-->

                </div>

            </div>
            <div class="col-12 col-md-6">


                <div class="accordion">
                    <!-- Accordion 1 -->

                    <!-- Accordion 2 -->



                    <div class="faq_section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <h2 class="faq_heading_section"> Is Apple Dental Specialties the best dental clinic in Vizianagaram?


                            </h2>
                            <h2 class="accordion-icon">+</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Yes, Apple Dental Specialties is known for its expert dentists, modern technology, and personalized dental care, making it a top-rated clinic in Vizianagaram
                        </div>
                    </div>
                    <!-- Accordion 2 -->



                    <div class="faq_section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <h2 class="faq_heading_section">Who is the best dentist in Vizianagaram for smile design?



                            </h2>
                            <h2 class="accordion-icon">+</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                The cosmetic dental team at Apple Dental Specialties is highly experienced in smile design and has transformed numerous smiles with customized treatment plans
                        </div>
                    </div>



                    <!-- Accordion 3 -->
                    <div class="faq_section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <h2 class="faq_heading_section">Do you provide painless dental treatments?


                            </h2>
                            <h2 class="accordion-icon">+</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                Absolutely. We specialize in pain-free dental care using techniques like laser dentistry, digital scanning, and gentle sedation methods to ensure patient comfort
                        </div>
                    </div>
                    <!-- Accordion 4 -->
                    <div class="faq_section">
                        <div class="accordion-header" onclick="toggleAccordion(this)">
                            <h2 class="faq_heading_section">How can I book an appointment at Apple Dental Specialties?

                            </h2>
                            <h2 class="accordion-icon">+</h2>
                        </div>
                        <div class="accordion-content">
                            <p>
                                You can book an appointment by calling our clinic or visiting our official website. Walk-ins are accepted based on availability
                        </div>
                    </div>
                    <!-- Accordion 5 -->
                    <!-- <div class="faq_section">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <h2 class="faq_heading_section"> Can cancer be cured if detected early?
                </h2>
                <h2 class="accordion-icon">+</h2>
              </div>
              <div class="accordion-content">
                <p>
                  Yes, many types of cancer can be effectively treated or even cured if detected at an early stage. Regular screenings, awareness of symptoms, and early intervention improve survival rates significantly
                </p>
              </div>
            </div> -->

                </div>
            </div>
        </div>
    </div>
</section>






<script>
    function toggleAccordion(header) {
        const content = header.nextElementSibling;
        const icon = header.querySelector(".accordion-icon");

        content.classList.toggle("open");
        icon.classList.toggle("rotate");

        icon.textContent = content.classList.contains("open") ? "−" : "+";
    }
</script>





















<!-------------------------------------------- footer ----------------------------------->

<?php include 'footer.php'; ?>