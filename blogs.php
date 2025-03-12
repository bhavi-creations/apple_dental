<?php
include './db.connection/db_connection.php'; // Include your database connection file

// Retrieve service filter from GET request
$service = isset($_GET['service']) ? $_GET['service'] : '';

// Prepare SQL query with optional service filter
$sql = "SELECT id, title, main_content, main_image, created_at FROM blogs";
if (!empty($service)) {
  $sql .= " WHERE service = ?";
}
$sql .= " ORDER BY created_at DESC";

// Initialize statement
$stmt = $conn->prepare($sql);

// Bind parameters if service is set
if (!empty($service)) {
  $stmt->bind_param("s", $service);
}

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();
?>


<?php include 'header.php'; ?>



<section class="dsdl-hero text-center" style="position: relative; height: 40vh; background-image: url('images1/about-bg.jpg'); background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center;">
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4);"></div>
  <h1 style="position: relative; z-index: 2; color: white; font-size: 2.5rem; font-weight: bold; text-transform: uppercase;">Blogs</h1>
</section>




<main>
  <!-- Filter Buttons -->
  <div class="container">
    <div class="filter_buttons redirect_section mt-5">
      <a href="blogs.php?service="><button class="redirect_blog_srivice">All</button></a>
      <a href="blogs.php?service=Root Canal"><button class="redirect_blog_srivice">Root Canal</button></a>
      <a href="blogs.php?service=Dental Implant"><button class="redirect_blog_srivice">Dental Implant</button></a>
      <a href="blogs.php?service=Tooth Extraction"><button class="redirect_blog_srivice">Tooth Extraction</button></a>
      <a href="blogs.php?service=Periapical Surgery"><button class="redirect_blog_srivice">Periapical Surgery</button></a>
      <a href="blogs.php?service=Gum Surgery"><button class="redirect_blog_srivice">  Gum Surgery</button></a>
      <a href="blogs.php?service=Dental Crown & Bridge"><button class="redirect_blog_srivice">   Crown & Bridge</button></a>
      <a href="blogs.php?service=Dental Veneers"><button class="redirect_blog_srivice">  Veneers</button></a>
      <a href="blogs.php?service=Aligners"><button class="redirect_blog_srivice">Aligners</button></a>
      <a href="blogs.php?service=Laser Dentistry"><button class="redirect_blog_srivice">Laser Dentistry</button></a>
      <a href="blogs.php?service=Teeth Cleaning"><button class="redirect_blog_srivice">Teeth Cleaning</button></a>
      <a href="blogs.php?service=Smile Makeover"><button class="redirect_blog_srivice">Smile Makeover</button></a>
      <a href="blogs.php?service=Gum Care"><button class="redirect_blog_srivice"> Gum Care</button></a>
      <a href="blogs.php?service=Teeth Jewellery"><button class="redirect_blog_srivice">Teeth Jewellery </button></a>
      <a href="blogs.php?service=Child Dental Care"><button class="redirect_blog_srivice">Child Dental Care</button></a>
      <a href="blogs.php?service=Major Head & Neck Surgeries"><button class="redirect_blog_srivice"> Major Head & Neck Surgeries</button></a>

      <!--
      <a href="blogs.php?service=Bad Breath Treatment"><button class="redirect_blog_srivice">Bad Breath Treatment</button></a>
      <a href="blogs.php?service=Invisible Aligners"><button class="redirect_blog_srivice">Invisible Aligners </button></a>
      <a href="blogs.php?service=Teeth Whitening"><button class="redirect_blog_srivice">Teeth Whitening</button></a>
      <a href="blogs.php?service=Dentures"><button class="redirect_blog_srivice">Dentures </button></a>
      <a href="blogs.php?service=Fluoride Application & Dental Sealant"><button class="redirect_blog_srivice">Fluoride Application & Dental Sealant</button></a>
      <a href="blogs.php?service=Full Mouth Rehabilitation Treatment"><button class="redirect_blog_srivice"> Full Mouth Rehabilitation Treatment</button></a>
      <a href="blogs.php?service=Tooth Extraction"><button class="redirect_blog_srivice">Tooth Extraction</button></a>
      <a href="blogs.php?service=Gum Depigment"><button class="redirect_blog_srivice">Gum Depigment</button></a>
      <a href="blogs.php?service=Teeth Whitening"><button class="redirect_blog_srivice">Teeth Whitening</button></a>
      <a href="blogs.php?service=Mouth Ulcers"><button class="redirect_blog_srivice">Mouth Ulcers</button></a>
      <a href="blogs.php?service=Precancerous Lesion"><button class="redirect_blog_srivice">Precancerous Lesion</button></a>
      <a href="blogs.php?service=Laser Crown Lengthening"><button class="redirect_blog_srivice">Laser Crown Lengthening</button></a> -->
    </div>
  </div>

  <!-- Blogs Section -->
  <div class="container blog-sidebar-list" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="row">
      <div class="col-lg-12">
        <div class="grid row">
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $image_path = !empty($row['main_image']) ? "admin/uploads/photos/{$row['main_image']}" : "default_image.png";
              echo "
                                    <div class='grid-item col-sm-12 col-lg-4 mb-5'>
                                        <div class='post-box card_bg_div_box'>
                                            <figure>
                                                <a href='fullblog.php?id={$row['id']}'>
                                                    <img src='{$image_path}' alt='Blog Image' class='img-fluid blog_box_image'>
                                                </a>
                                            </figure>
                                            <div class='box-content'>
                                                <h5 class='box-title'><a  class='box-title' href='fullblog.php?id={$row['id']}'>" . htmlspecialchars($row['title']) . "</a></h5>
                                                <p class='post-desc  mt-5' style='text-align: justify;'>" . substr(strip_tags($row['main_content']), 0, 90) . "...</p>
                                                <a href='fullblog.php?id={$row['id']}'><button class='blog_main_btn'>Read More..</button></a>
                                            </div>
                                        </div>
                                    </div>";
            }
          } else {
            echo "<p>No blog posts found.</p>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</main>










<?php include 'footer.php'; ?>