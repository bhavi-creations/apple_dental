 <?php
session_start();
$_SESSION['form_time'] = time();
?>
 
 <?php
    include './db.connection/db_connection.php';


    $selected_date = date('Y-m-d');
    $slots = [
        "9:00 AM - 10:00 AM",
        "10:00 AM - 11:00 AM",
        "11:00 AM - 12:00 PM",
        "12:00 PM - 01:00 PM",
        "01:00 PM - 02:00 PM",
        "02:00 PM - 03:00 PM",
        "03:00 PM - 04:00 PM",
        "04:00 PM - 05:00 PM",
        "05:00 PM - 06:00 PM",
        "06:00 PM - 07:00 PM",
        "07:00 PM - 08:00 PM",
        "08:00 PM - 09:00 PM"
    ];
    ?>

 <?php include 'header.php'; ?>

 <!-- <section class="dsdl-hero text-center" style="position: relative; height: 40vh; background-image: url('images1/about-bg.jpg'); background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center;">
     <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4);"></div>
     <h1 style="position: relative; z-index: 2; color: white; font-size: 2.5rem; font-weight: bold; text-transform: uppercase;">Appointment</h1>
 </section> -->

     <img src="images1/services/services_img/Appointment-bg.png" alt="About Us" class="img-fluid">


 <!-- <section class=" my-5 card_wrapper">
     <div class="container">
         <h1 class="text-center">Appointment Form</h1>
         <div class="row">
             <div class="col-md-6">
                 <form id="appointmentForm"
                     method="POST"
                     action="save_appointment.php"
                     class="row appointment-form mx-auto">

                     <div class="col-md-6 mb-4">
                         <label>Full Name</label>
                         <input type="text" name="name" class="form-control" required placeholder="Enter your name">
                     </div>

                     <div class="col-md-6 mb-4">
                         <label>Email Address</label>
                         <input type="email" name="email" class="form-control" required placeholder="example@email.com">
                     </div>

                     <div class="col-md-6 mb-4">
                         <label>Contact Number</label>
                         <input type="text" name="phone" class="form-control" required placeholder="+91 XXXXX XXXXX">
                     </div>

                     <div class="col-md-6 mb-4">
                         <label>Select Date</label>
                         <input type="date"
                             id="appointment_date"
                             name="appointment_date"
                             min="<?= date('Y-m-d') ?>"
                             class="form-control"
                             required>
                     </div>


                     <div id="slotContainer" class="col-md-12 mb-4">
                         <label>Select Time Slot</label>
                         <select id="time_slot" name="time_slot" class="form-control" required>
                             <option value="">-- First Select Date --</option>
                         </select>
                     </div>

                     <div class="col-md-12 mb-4">
                         <label>Message (Optional)</label>
                         <textarea name="message" class="form-control" rows="4"
                             placeholder="Any additional information..."></textarea>
                     </div>

     



                     
                     <div class="col-md-12">
                         <button type="submit" class="btn btn-primary w-100">
                             Book Appointment
                         </button>
                     </div>

                 </form>
             </div>
             <div class="col-md-6">
                 <div class="google-map" data-aos="fade-right" data-aos-delay="100" style="flex: 1; min-width: 45%; background: #fff; padding: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d30334.605525010476!2d83.38071781801781!3d18.12583900511469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d18.136257!2d83.3896213!4m5!1s0x3a3be551bb580c3f%3A0xa15d74cd17e1d939!2sD.%20NO.%2022-1-10%2C%20Ist%20Floor%2C%20Apple%20Dental%20Specialities%2C%20A.G%20Complex%2C%20Ananda%20Gajapathi%20Rd%2C%20Ambati%20Satram%20Area%2C%20Vizianagaram%2C%20Andhra%20Pradesh%20535002!3m2!1d18.115064399999998!2d83.4140839!5e0!3m2!1sen!2sin!4v1735639081429!5m2!1sen!2sin"
                         width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                     </iframe>
                 </div>

             </div>
         </div>



     </div>
 </section> -->




 <section class="appointment_first_section">

    <!-- =========================================================
         BACKGROUND DECORATIONS
    ========================================================== -->
    <div class="appointment_first_section_bg appointment_first_section_bg_one"></div>
    <div class="appointment_first_section_bg appointment_first_section_bg_two"></div>
    <div class="appointment_first_section_bg appointment_first_section_bg_three"></div>

    <div class="appointment_first_section_dots"></div>


    <!-- =========================================================
         LEFT HAND WRITTEN TEXT
    ========================================================== -->
    <div class="appointment_first_section_left_note">
        <span>Care</span>
        <span>Today</span>
        <span>for a</span>
        <span>Brighter</span>
        <span>Tomorrow</span>
        <i></i>
    </div>


    <!-- =========================================================
         RIGHT TOP HAND WRITTEN TEXT
    ========================================================== -->
    <div class="appointment_first_section_right_note">
        <span>Your</span>
        <span>Healthy Smile</span>
        <span>Starts Here</span>
        <i></i>
    </div>


    <!-- =========================================================
         LEFT BOTTOM TOOTH
    ========================================================== -->
    <div class="appointment_first_section_tooth">

        <img src="assets/img/appointment/appointment-tooth.png"
             alt="Dental Care">

        <div class="appointment_first_section_tooth_ring"></div>

    </div>


    <!-- LEFT BOTTOM TEXT -->
    <div class="appointment_first_section_bottom_left_text">
        <span>HEALTHY</span>
        <span>SMILES</span>
        <span>HAPPIER</span>
        <span>LIVES</span>
        <i></i>
    </div>


    <!-- RIGHT BOTTOM NOTE -->
    <div class="appointment_first_section_bottom_right_note">
        <span>Let's Create</span>
        <span>Healthier Smiles</span>
        <i></i>
    </div>



    <div class="container-fluid appointment_first_section_container">

        <!-- =====================================================
             HEADER
        ====================================================== -->
        <div class="appointment_first_section_header">

            <div class="appointment_first_section_eyebrow">

                <span></span>

                <p>BOOK YOUR VISIT</p>

                <span></span>

            </div>


            <h1 class="appointment_first_section_title">

                Appointment

                <span>Form</span>

            </h1>


            <p class="appointment_first_section_subtitle">
                Fill in your details and we’ll get back to you to confirm your appointment.
            </p>

        </div>



        <!-- =====================================================
             MAIN ROW
        ====================================================== -->
        <div class="row g-4 appointment_first_section_main_row">


            <!-- =================================================
                 LEFT APPOINTMENT FORM
            ================================================== -->
            <div class="col-xl-5 col-lg-5">

                <div class="appointment_first_section_card
                            appointment_first_section_form_card">


                    <!-- FORM HEADER -->
                    <div class="appointment_first_section_form_header">

                        <div class="appointment_first_section_main_icon">

                            <i class="bi bi-calendar3"></i>

                        </div>


                        <div>

                            <h2>
                                Book an
                                <span>Appointment</span>
                            </h2>

                            <p>
                                Take the first step towards a healthier,
                                brighter smile.
                            </p>

                        </div>

                    </div>



                    <!-- FORM -->
                    <form class="appointment_first_section_form"
                          action="#"
                          method="post">


                        <div class="row g-3">


                            <!-- FULL NAME -->
                            <div class="col-md-6">

                                <label class="appointment_first_section_label">

                                    <i class="bi bi-person-fill"></i>

                                    <span>
                                        Full Name
                                        <b>*</b>
                                    </span>

                                </label>


                                <input type="text"
                                       name="name"
                                       class="appointment_first_section_input"
                                       placeholder="Enter your name"
                                       required>

                            </div>


                            <!-- EMAIL -->
                            <div class="col-md-6">

                                <label class="appointment_first_section_label">

                                    <i class="bi bi-envelope-fill"></i>

                                    <span>
                                        Email Address
                                        <b>*</b>
                                    </span>

                                </label>


                                <input type="email"
                                       name="email"
                                       class="appointment_first_section_input"
                                       placeholder="example@gmail.com"
                                       required>

                            </div>


                            <!-- CONTACT -->
                            <div class="col-md-6">

                                <label class="appointment_first_section_label">

                                    <i class="bi bi-telephone-fill"></i>

                                    <span>
                                        Contact Number
                                        <b>*</b>
                                    </span>

                                </label>


                                <input type="tel"
                                       name="phone"
                                       class="appointment_first_section_input"
                                       placeholder="+91 00000 00000"
                                       required>

                            </div>


                            <!-- DATE -->
                            <div class="col-md-6">

                                <label class="appointment_first_section_label">

                                    <i class="bi bi-calendar3"></i>

                                    <span>
                                        Select Date
                                        <b>*</b>
                                    </span>

                                </label>


                                <input type="date"
                                       name="date"
                                       class="appointment_first_section_input"
                                       required>

                            </div>


                            <!-- TIME -->
                            <div class="col-12">

                                <label class="appointment_first_section_label">

                                    <i class="bi bi-clock-fill"></i>

                                    <span>
                                        Select Time Slot
                                        <b>*</b>
                                    </span>

                                </label>


                                <select name="time"
                                        class="appointment_first_section_input
                                               appointment_first_section_select"
                                        required>

                                    <option value="">
                                        -- Select Time Slot --
                                    </option>

                                    <option value="09:00">
                                        09:00 AM
                                    </option>

                                    <option value="10:00">
                                        10:00 AM
                                    </option>

                                    <option value="11:00">
                                        11:00 AM
                                    </option>

                                    <option value="12:00">
                                        12:00 PM
                                    </option>

                                    <option value="16:00">
                                        04:00 PM
                                    </option>

                                    <option value="17:00">
                                        05:00 PM
                                    </option>

                                    <option value="18:00">
                                        06:00 PM
                                    </option>

                                    <option value="19:00">
                                        07:00 PM
                                    </option>

                                </select>

                            </div>


                            <!-- MESSAGE -->
                            <div class="col-12">

                                <label class="appointment_first_section_label">

                                    <i class="bi bi-chat-left-text-fill"></i>

                                    <span>
                                        Message (Optional)
                                    </span>

                                </label>


                                <textarea name="message"
                                          class="appointment_first_section_input
                                                 appointment_first_section_message"
                                          placeholder="Any additional information..."></textarea>

                            </div>


                        </div>


                        <!-- SUBMIT -->
                        <button type="submit"
                                class="appointment_first_section_submit">

                            <span class="appointment_first_section_submit_calendar">

                                <i class="bi bi-calendar2-check-fill"></i>

                            </span>


                            <strong>
                                Book Appointment
                            </strong>


                            <span class="appointment_first_section_submit_arrow">

                                <i class="bi bi-chevron-right"></i>

                            </span>

                        </button>


                        <!-- SECURE -->
                        <div class="appointment_first_section_secure">

                            <i class="bi bi-lock-fill"></i>

                            <span>
                                Your information is secure with us.
                            </span>

                        </div>


                    </form>


                </div>

            </div>



            <!-- =================================================
                 RIGHT LOCATION
            ================================================== -->
            <div class="col-xl-7 col-lg-7">

                <div class="appointment_first_section_card
                            appointment_first_section_location_card">


                    <!-- LOCATION HEADER -->
                    <div class="appointment_first_section_location_header">

                        <div class="appointment_first_section_location_title">

                            <div class="appointment_first_section_main_icon">

                                <i class="bi bi-geo-alt-fill"></i>

                            </div>


                            <div>

                                <h2>
                                    Our
                                    <span>Location</span>
                                </h2>

                                <p>
                                    Visit us for personalized dental care.
                                </p>

                            </div>

                        </div>


                        <a href="https://maps.google.com/?q=Apple+Dental+Specialities+Vizianagaram"
                           target="_blank"
                           class="appointment_first_section_direction_btn">

                            <i class="bi bi-arrow-up-right"></i>

                            <span>
                                Get Directions
                            </span>

                        </a>

                    </div>



                    <!-- =================================================
                         MAP
                    ================================================== -->
                    <div class="appointment_first_section_map">

                        <iframe
                            src="https://www.google.com/maps?q=Apple+Dental+Specialities+Vizianagaram&output=embed"
                            loading="lazy"
                            allowfullscreen=""
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>



                    <!-- =================================================
                         LOCATION INFORMATION
                    ================================================== -->
                    <div class="appointment_first_section_location_info">


                        <!-- ADDRESS -->
                        <div class="appointment_first_section_location_item">

                            <div class="appointment_first_section_location_icon">

                                <i class="bi bi-geo-alt-fill"></i>

                            </div>


                            <div>

                                <strong>
                                    Address
                                </strong>

                                <p>
                                    D.No.22-1-10, 1st Floor,<br>
                                    A.G. Complex, Phool Baugh Road,<br>
                                    Near Ambatisatram Jn.,<br>
                                    Vizianagaram - 535 002
                                </p>

                            </div>

                        </div>


                        <!-- DIVIDER -->
                        <div class="appointment_first_section_location_divider"></div>


                        <!-- CALL -->
                        <div class="appointment_first_section_location_item">

                            <div class="appointment_first_section_location_icon">

                                <i class="bi bi-telephone-fill"></i>

                            </div>


                            <div>

                                <strong>
                                    Call Us
                                </strong>

                                <p>

                                    <a href="tel:+919293056083">
                                        +91 9293056083
                                    </a>

                                </p>

                            </div>

                        </div>


                        <!-- DIVIDER -->
                        <div class="appointment_first_section_location_divider"></div>


                        <!-- EMAIL -->
                        <div class="appointment_first_section_location_item">

                            <div class="appointment_first_section_location_icon">

                                <i class="bi bi-envelope-fill"></i>

                            </div>


                            <div>

                                <strong>
                                    Email Us
                                </strong>

                                <p>

                                    <a href="mailto:info@appledentalvzm.in">
                                        info@appledentalvzm.in
                                    </a>

                                </p>

                            </div>

                        </div>


                        <!-- DIVIDER -->
                        <div class="appointment_first_section_location_divider"></div>


                        <!-- HOURS -->
                        <div class="appointment_first_section_location_item">

                            <div class="appointment_first_section_location_icon">

                                <i class="bi bi-clock-fill"></i>

                            </div>


                            <div>

                                <strong>
                                    Working Hours
                                </strong>

                                <p>
                                    Mon - Sun: 9 AM - 8 PM<br>
                                    Tuesday: 9 AM - 2 PM
                                </p>

                            </div>

                        </div>


                    </div>


                </div>

            </div>


        </div>



        <!-- =====================================================
             BOTTOM FEATURES
        ====================================================== -->
        <div class="appointment_first_section_features">


            <!-- FEATURE 01 -->
            <div class="appointment_first_section_feature">

                <div class="appointment_first_section_feature_icon">

                    <i class="bi bi-people-fill"></i>

                </div>

                <div>

                    <strong>
                        Experienced
                    </strong>

                    <span>
                        Dental Team
                    </span>

                </div>

            </div>


            <div class="appointment_first_section_feature_divider"></div>


            <!-- FEATURE 02 -->
            <div class="appointment_first_section_feature">

                <div class="appointment_first_section_feature_icon">

                    <i class="bi bi-shield-fill-check"></i>

                </div>

                <div>

                    <strong>
                        Safe &amp; Hygienic
                    </strong>

                    <span>
                        Environment
                    </span>

                </div>

            </div>


            <div class="appointment_first_section_feature_divider"></div>


            <!-- FEATURE 03 -->
            <div class="appointment_first_section_feature">

                <div class="appointment_first_section_feature_icon">

                    <i class="bi bi-calendar3"></i>

                </div>

                <div>

                    <strong>
                        Flexible
                    </strong>

                    <span>
                        Appointments
                    </span>

                </div>

            </div>


            <div class="appointment_first_section_feature_divider"></div>


            <!-- FEATURE 04 -->
            <div class="appointment_first_section_feature">

                <div class="appointment_first_section_feature_icon">

                    <i class="bi bi-heart-fill"></i>

                </div>

                <div>

                    <strong>
                        Better Smiles
                    </strong>

                    <span>
                        Brighter Tomorrow
                    </span>

                </div>

            </div>


        </div>


    </div>

</section>




 <script>
     document.getElementById('appointment_date').addEventListener('change', function() {
         const date = this.value;
         const slotSelect = document.getElementById('time_slot');
         slotSelect.innerHTML = '<option>Loading...</option>';

         fetch('get_slots.php?date=' + date)
             .then(r => r.json())
             .then(data => {

                 if (data.isHoliday && data.type == 'fullday') {
                     alert("Holiday: " + data.reason);
                     slotSelect.innerHTML = '<option>No Slots Available</option>';
                     return;
                 }

                 if (data.isHoliday) {
                     alert("Note: " + data.reason);
                 }

                 let html = '<option value="">--Select Slot--</option>';

                 data.slots.forEach(s => {
                     let dis = s.available <= 0 ? 'disabled' : '';
                     let text = s.available <= 0 ?
                         `${s.time} (FULL)` :
                         `${s.time} (${s.available} Slots Available)`;

                     html += `<option ${dis} value="${s.time}">${text}</option>`;
                 });

                 slotSelect.innerHTML = html;
             })
             .catch(() => {
                 slotSelect.innerHTML = '<option>Error loading slots</option>';
             });
     });
 </script>


 <?php include 'footer.php'; ?>