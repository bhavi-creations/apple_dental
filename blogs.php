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







<main>
  <!-- Filter Buttons -->

  <div class="filter_sidebar_container d-lg-none">
    <div class="filter_sidebar_header" onclick="toggleSidebar()">
        <span>Filters</span>
        <span id="toggle_icon">+</span>
    </div>
    <div class="filter_sidebar_buttons" id="filterButtons">
        <a href="blogs.php?service="><button class="filter_sidebar_button">All</button></a>
        <a href="blogs.php?service=Root Canal"><button class="filter_sidebar_button">Root Canal</button></a>
        <a href="blogs.php?service=Dental Implant"><button class="filter_sidebar_button">Dental Implant</button></a>
        <a href="blogs.php?service=Tooth Extraction"><button class="filter_sidebar_button">Tooth Extraction</button></a>
        <a href="blogs.php?service=Periapical Surgery"><button class="filter_sidebar_button">Periapical Surgery</button></a>
        <a href="blogs.php?service=Gum Surgery"><button class="filter_sidebar_button">Gum Surgery</button></a>
        <a href="blogs.php?service=Dental Crown & Bridge"><button class="filter_sidebar_button">Crown & Bridge</button></a>
        <a href="blogs.php?service=Dental Veneers"><button class="filter_sidebar_button">Veneers</button></a>
        <a href="blogs.php?service=Aligners"><button class="filter_sidebar_button">Aligners</button></a>
        <a href="blogs.php?service=Laser Dentistry"><button class="filter_sidebar_button">Laser Dentistry</button></a>
        <a href="blogs.php?service=Teeth Cleaning"><button class="filter_sidebar_button">Teeth Cleaning</button></a>
        <a href="blogs.php?service=Smile Makeover"><button class="filter_sidebar_button">Smile Makeover</button></a>
        <a href="blogs.php?service=Gum Care"><button class="filter_sidebar_button">Gum Care</button></a>
        <a href="blogs.php?service=Teeth Jewellery"><button class="filter_sidebar_button">Teeth Jewellery</button></a>
        <a href="blogs.php?service=Child Dental Care"><button class="filter_sidebar_button">Child Dental Care</button></a>
        <a href="blogs.php?service=Major Head & Neck Surgeries"><button class="filter_sidebar_button">Major Head & Neck Surgeries</button></a>
    </div>
</div>




  <script>
    function toggleSidebar() {
    var filterButtons = document.getElementById("filterButtons");
    var toggleIcon = document.getElementById("toggle_icon");

    if (filterButtons.style.display === "none" || filterButtons.style.display === "") {
        filterButtons.style.display = "flex";
        toggleIcon.textContent = "-"; // Change to minus when open
    } else {
        filterButtons.style.display = "none";
        toggleIcon.textContent = "+"; // Change to plus when closed
    }
}

  </script>



  <div class="container d-none d-lg-block">
    <div class="filter_buttons redirect_section mt-5">
      <a href="blogs.php?service="><button class="redirect_blog_srivice">All</button></a>
    </div>
  </div>

  <!-- Blogs Section -->
  <div class="container blog-sidebar-list   " id="blogs_container_space">

    <div class="row">

      <div class="col-2 coloumn_2  text-center d-none  d-lg-block">
        <div class="side_filters">
          <a href="blogs.php?service=Root Canal"><button class="redirect_blog_srivice">Root Canal</button></a>
          <a href="blogs.php?service=Dental Implant"><button class="redirect_blog_srivice">Dental Implant</button></a>
          <a href="blogs.php?service=Tooth Extraction"><button class="redirect_blog_srivice">Tooth Extraction</button></a>
          <a href="blogs.php?service=Periapical Surgery"><button class="redirect_blog_srivice">Periapical Surgery</button></a>
          <a href="blogs.php?service=Gum Surgery"><button class="redirect_blog_srivice">Gum Surgery</button></a>
          <a href="blogs.php?service=Dental Crown & Bridge"><button class="redirect_blog_srivice">Crown & Bridge</button></a>
          <a href="blogs.php?service=Dental Veneers"><button class="redirect_blog_srivice">Veneers</button></a>
          <a href="blogs.php?service=Aligners"><button class="redirect_blog_srivice">Aligners</button></a>

        </div>
      </div>

      <div class="  col-lg-8">
        <div class="grid row">
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $image_path = !empty($row['main_image']) ? "admin/uploads/photos/{$row['main_image']}" : "default_image.png";
              echo "
                                    <div class='grid-item col-sm-12 col-lg-4 mb-5'>
                                        <div class='post-box card_bg_div_box'>
                                            <figure>
                                                <a href='service_detsils.php?id={$row['id']}'>
                                                    <img src='{$image_path}' alt='Blog Image' class='img-fluid blog_box_image'>
                                                </a>
                                            </figure>
                                            <div class='box-content'>
                                                <h5 class='box-title'><a  class='box-title' href='service_detsils.php?id={$row['id']}'>" . htmlspecialchars($row['title']) . "</a></h5>
                                                <p class='post-desc  mt-5' style='text-align: justify;'>" . substr(strip_tags($row['main_content']), 0, 90) . "...</p>
                                                <a href='service_detsils.php?id={$row['id']}'><button class='blog_main_btn'>Read More..</button></a>
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

      <div class="col-2 coloumn_2  text-center  d-none  d-lg-block">

        <div class="side_filters">

          <a href="blogs.php?service=Laser Dentistry"><button class="redirect_blog_srivice">Laser Dentistry</button></a>
          <a href="blogs.php?service=Teeth Cleaning"><button class="redirect_blog_srivice">Teeth Cleaning</button></a>
          <a href="blogs.php?service=Smile Makeover"><button class="redirect_blog_srivice">Smile Makeover</button></a>
          <a href="blogs.php?service=Gum Care"><button class="redirect_blog_srivice"> Gum Care</button></a>
          <a href="blogs.php?service=Teeth Jewellery"><button class="redirect_blog_srivice">Teeth Jewellery </button></a>
          <a href="blogs.php?service=Child Dental Care"><button class="redirect_blog_srivice">Child Dental Care</button></a>
          <a href="blogs.php?service=Major Head & Neck Surgeries"><button class="redirect_blog_srivice"> Major Head & Neck Surgeries</button></a>
        </div>

      </div>

    </div>


  </div>


  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const leftFilter = document.querySelector(".coloumn_2:first-child .side_filters"); // Left filter
      const rightFilter = document.querySelector(".coloumn_2:last-child .side_filters"); // Right filter
      const navbar = document.querySelector(".navbar"); // Adjust selector to your actual navbar

      function updateStickyPosition(filter) {
        let navbarBottom = navbar.offsetTop + navbar.offsetHeight; // Navbar bottom position
        let filterTop = filter.getBoundingClientRect().top + window.scrollY; // Current filter position

        if (window.scrollY >= navbarBottom) {
          filter.classList.add("sticky"); // Stick to center
        } else {
          filter.classList.remove("sticky"); // Normal position
        }
      }

      window.addEventListener("scroll", function() {
        updateStickyPosition(leftFilter);
        updateStickyPosition(rightFilter);
      });
    });
  </script>

</main>










<?php include 'footer.php'; ?>