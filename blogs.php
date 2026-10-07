<?php
include './db.connection/db_connection.php';

// Service filter
$service = isset($_GET['service']) ? trim($_GET['service']) : '';

// Query - Removed 'slug' column since it doesn't exist in the database
$sql = "SELECT id, title, main_content, main_image, created_at FROM blogs";
if (!empty($service)) {
    $sql .= " WHERE service = ?";
}
$sql .= " ORDER BY created_at DESC";

$stmt = $conn->prepare($sql);

// Check if prepare was successful
if ($stmt === false) {
    die("Query Preparation Failed: " . htmlspecialchars($conn->error));
}

if (!empty($service)) {
    $stmt->bind_param("s", $service);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<?php include 'header.php'; ?>

<style>
  .post-box {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .box-content {
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  .post-desc {
    flex-grow: 1;
  }

  .blog-date {
    margin-top: 10px;
    font-size: 13px;
    background: #0653d9;
    color: #fff;
    display: inline-block;
    padding: 6px 12px;
    border-radius: 4px;
    font-weight: 600;
  }
</style>

<main class="blog_section_stylings" style="background: radial-gradient(circle at 50% 25%, rgba(255, 255, 255, .70), transparent 43%), linear-gradient(135deg, #dff4ff 0%, #bde8ff 46%, #9edcff 100%);">
  <div class="container blog-sidebar-list" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="row">
      <div class="col-lg-12">
        <div class="grid row">

          <?php
          if ($result && $result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                  // Image path
                  $image_path = !empty($row['main_image'])
                    ? "admin/uploads/photos/" . htmlspecialchars($row['main_image'])
                    : "default_image.png";

                  // URL using ID since slug column is not present
                  $final_url = "fullblog.php?id=" . $row['id'];

                  // Date format
                  $formatted_date = date("d M Y, h:i A", strtotime($row['created_at']));

                  // Safe preview
                  $preview = substr(strip_tags(html_entity_decode($row['main_content'])), 0, 100);

                  echo "
                  <div class='grid-item col-sm-12 col-lg-4 mb-5'>
                      <div class='post-box card_bg_div_box'>
                          <figure>
                              <a href='{$final_url}'>
                                  <img src='{$image_path}' alt='Blog Image' class='img-fluid blog_box_image'>
                              </a>
                          </figure>

                          <div class='box-content'>
                              <h5 class='box-title'>
                                  <a class='box-title' href='{$final_url}'>" . htmlspecialchars($row['title']) . "</a>
                              </h5>

                              <p class='post-desc mt-3' style='text-align: justify;'>
                                  {$preview}...
                              </p>

                              <a href='{$final_url}'>
                                  <button class='blog_main_btn'>Read More..</button>
                              </a>

                              <p class='blog-date'>🕒 {$formatted_date}</p>
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

<?php 
include('./footer.php'); 

if ($stmt) {
    $stmt->close();
}
if ($conn) {
    $conn->close();
}
?>