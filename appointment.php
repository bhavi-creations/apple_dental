<?php include 'header.php'; ?>

<section class="dsdl-hero text-center" style="position: relative; height: 40vh; background-image: url('images1/about-bg.jpg'); background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4);"></div>
    <h1 style="position: relative; z-index: 2; color: white; font-size: 2.5rem; font-weight: bold; text-transform: uppercase;">Appointment</h1>
</section>


<section class=" my-5 card_wrapper">
    <div class="container">
        <h1 class="text-center">Appointment Form</h1>
        <form action="appointmentform.php" method="post" role="form" class="php-email-form appointment_section"
            data-aos-delay="100">
            <div class="row g-3">
                <div class="col-md-6 col-12">
                    <input type="text" name="name" id="appointment_name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col-md-6 col-12">
                    <select name="department" id="department" class="form-select" required>
                        <option value="" disabled selected>Select Your Concern</option>
                        <!-- <option value="Tooth Pain">Root Canal Treatment</option>
                    <option value="Root Canal">Dental Implants</option>
                    <option value="Clear Aligners">Teeth Whitening</option> -->
                        <option value="Bleeding Gums">Dental Implants</option>
                        <option value="EHS"> Advanced Root Canal Treatment</option>
                        <option value="Others">Minor Oral Surgeries</option>
                        <option value="Others">Major Head & Neck Surgeries</option>
                        <option value="Others"> Laser Dentistry</option>
                        <option value="Others"> Smile Designing & Makeovers</option>
                        <option value="Others">Child Dental Care</option>
                        <option value="Others">Replacement Solutions</option>
                        <option value="Others">EHS</option>
                    </select>
                </div>

                <div class="col-md-6 col-12">
                    <input type="email" name="email" id="appointment_email" class="form-control" placeholder="Email" required>
                </div>


                <div class="col-md-6 col-12">
                    <input type="date" name="date" id="appointment_date" class="form-control" required>
                </div>
                <div class="col-md-6 col-12">
                    <input type="time" name="time" id="appointment_time" class="form-control" required>
                </div>
                <div class="col-md-6 col-12">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required>
                </div>
            </div>
            <div id="form-message" style="display:none; margin-top: 10px;"></div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Make an Appointment</button>
            </div>
        </form>
    </div>
</section>

<div class="google-map" data-aos="fade-right" data-aos-delay="100" style="flex: 1; min-width: 45%; background: #fff; padding: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d30334.605525010476!2d83.38071781801781!3d18.12583900511469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d18.136257!2d83.3896213!4m5!1s0x3a3be551bb580c3f%3A0xa15d74cd17e1d939!2sD.%20NO.%2022-1-10%2C%20Ist%20Floor%2C%20Apple%20Dental%20Specialities%2C%20A.G%20Complex%2C%20Ananda%20Gajapathi%20Rd%2C%20Ambati%20Satram%20Area%2C%20Vizianagaram%2C%20Andhra%20Pradesh%20535002!3m2!1d18.115064399999998!2d83.4140839!5e0!3m2!1sen!2sin!4v1735639081429!5m2!1sen!2sin"
        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>


<?php include 'footer.php'; ?>