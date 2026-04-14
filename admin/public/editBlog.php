<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB Connection
include '../../db.connection/db_connection.php';

// Blog ID
$blog_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($blog_id <= 0) {
    die("Invalid blog ID");
}

// ---------------------------------------------
// FETCH BLOG DATA
// ---------------------------------------------
$stmt = $conn->prepare("
    SELECT 
        title, main_content, full_content, service,
        telugu_title, telugu_main_content, telugu_full_content,
        video, main_image, section1_image, hashtags, keypoints
    FROM blogs
    WHERE id = ?
");

// ✅ CHECK PREPARE
if (!$stmt) {
    die("Prepare Failed: " . $conn->error);
}

$stmt->bind_param("i", $blog_id);

// ✅ CHECK EXECUTE
if (!$stmt->execute()) {
    die("Execute Failed: " . $stmt->error);
}

$stmt->bind_result(
    $title,
    $main_content,
    $full_content,
    $service,
    $telugu_title,
    $telugu_main_content,
    $telugu_full_content,
    $video,
    $main_image,
    $section1_image,
    $hashtags,
    $keypoints
);

// ✅ CHECK FETCH
if (!$stmt->fetch()) {
    die("No blog found with this ID");
}

$stmt->close();

// ---------------------------------------------
// FETCH SERVICES
// ---------------------------------------------
$services = [];
$service_result = $conn->query("SELECT service_name FROM services ORDER BY service_name ASC");

if (!$service_result) {
    die("Service Query Failed: " . $conn->error);
}

while ($row = $service_result->fetch_assoc()) {
    $services[] = $row['service_name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Blog</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">

        <?php include 'sidebar.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php include 'navbar.php'; ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Edit Blog</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">

                            <form id="editblogform" action="addBlog.php" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id" value="<?= $blog_id ?>">

                                <!-- TITLE -->
                                <div class="mb-3">
                                    <label>Title (English)</label>
                                    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($title ?? '') ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label>Title (Telugu)</label>
                                    <input type="text" name="telugu_title" class="form-control" value="<?= htmlspecialchars($telugu_title ?? '') ?>">
                                </div>

                                <!-- SERVICE -->
                                <div class="mb-3">
                                    <label>Service</label>
                                    <select name="service" class="form-control" required>
                                        <option value="">-- Select Service --</option>
                                        <?php foreach ($services as $s) { ?>
                                            <option value="<?= htmlspecialchars($s) ?>" <?= ($service == $s) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($s) ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!-- EDITORS -->
                                <div class="mb-3">
                                    <label>Main Content (EN)</label>
                                    <div id="mainEditor" style="height:200px"></div>
                                    <input type="hidden" name="main_content" id="mainContentData">
                                </div>

                                <div class="mb-3">
                                    <label>Main Content (TE)</label>
                                    <div id="teluguMainEditor" style="height:200px"></div>
                                    <input type="hidden" name="telugu_main_content" id="teluguMainContentData">
                                </div>

                                <div class="mb-3">
                                    <label>Full Content (EN)</label>
                                    <div id="fullEditor" style="height:300px"></div>
                                    <input type="hidden" name="full_content" id="fullContentData">
                                </div>

                                <div class="mb-3">
                                    <label>Full Content (TE)</label>
                                    <div id="teluguFullEditor" style="height:300px"></div>
                                    <input type="hidden" name="telugu_full_content" id="teluguFullContentData">
                                </div>

                                <!-- EXTRA -->
                                <div class="mb-3">
                                    <label>Hashtags</label>
                                    <input type="text" name="hashtags" class="form-control" value="<?= htmlspecialchars($hashtags ?? '') ?>">
                                </div>

                                <div class="mb-3">
                                    <label>Key Points</label>
                                    <input type="text" name="keypoints" class="form-control" value="<?= htmlspecialchars($keypoints ?? '') ?>">
                                </div>

                                <!-- IMAGES -->
                                <div class="mb-3">
                                    <label>Main Image</label>
                                    <input type="file" name="main_image" class="form-control">
                                    <input type="hidden" name="old_main_image" value="<?= $main_image ?>">
                                </div>

                                <div class="mb-3">
                                    <label>Section Image</label>
                                    <input type="file" name="section1_image" class="form-control">
                                    <input type="hidden" name="old_section1_image" value="<?= $section1_image ?>">
                                </div>

                                <div class="mb-3">
                                    <label>Video</label>
                                    <input type="file" name="video" class="form-control">
                                    <input type="hidden" name="old_video" value="<?= $video ?>">
                                </div>

                                <button type="submit" class="btn btn-success">Update Blog</button>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <script>
        const quillMain = new Quill('#mainEditor', {
            theme: 'snow'
        });
        const quillTeluguMain = new Quill('#teluguMainEditor', {
            theme: 'snow'
        });
        const quillFull = new Quill('#fullEditor', {
            theme: 'snow'
        });
        const quillTeluguFull = new Quill('#teluguFullEditor', {
            theme: 'snow'
        });

        // SAFE LOAD
        quillMain.root.innerHTML = <?= json_encode($main_content ?? '') ?>;
        quillTeluguMain.root.innerHTML = <?= json_encode($telugu_main_content ?? '') ?>;
        quillFull.root.innerHTML = <?= json_encode($full_content ?? '') ?>;
        quillTeluguFull.root.innerHTML = <?= json_encode($telugu_full_content ?? '') ?>;

        document.getElementById('editblogform').onsubmit = function() {
            document.getElementById('mainContentData').value = quillMain.root.innerHTML;
            document.getElementById('teluguMainContentData').value = quillTeluguMain.root.innerHTML;
            document.getElementById('fullContentData').value = quillFull.root.innerHTML;
            document.getElementById('teluguFullContentData').value = quillTeluguFull.root.innerHTML;
        };
    </script>

</body>

</html>



<!-- <div class="filter-section mb-3">
    <label for="service" class="form-label text-primary">Select Service:</label>
    <select id="service" name="service" class="form-control" required>
        <option value="">Select a Service</option>
        <option value="Root Canal" <?php echo ($service == 'Root Canal') ? 'selected' : ''; ?>>Root Canal</option>
        <option value="Dental Implant" <?php echo ($service == 'Dental Implant') ? 'selected' : ''; ?>>Dental Implant</option>
        <option value="Tooth Extraction" <?php echo ($service == 'Tooth Extraction') ? 'selected' : ''; ?>>Tooth Extraction</option>
        <option value="Periapical Surgery" <?php echo ($service == 'Periapical Surgery') ? 'selected' : ''; ?>>Periapical Surgery</option>
        <option value="Gum Surgery" <?php echo ($service == 'Gum Surgery') ? 'selected' : ''; ?>>Laser Gum Surgery</option>
        <option value="Dental Crown & Bridge" <?php echo ($service == 'Dental Crown & Bridge') ? 'selected' : ''; ?>>Dental Crown & Bridge</option>
        <option value="Dental Veneers" <?php echo ($service == 'Dental Veneers') ? 'selected' : ''; ?>>Dental Veneers</option>
        <option value="Aligners" <?php echo ($service == 'Aligners') ? 'selected' : ''; ?>>Aligners</option>
        <option value="Laser Dentistry" <?php echo ($service == 'Laser Dentistry') ? 'selected' : ''; ?>>Laser Dentistry</option>
        <option value="Teeth Cleaning" <?php echo ($service == 'Teeth Cleaning') ? 'selected' : ''; ?>>Teeth Cleaning</option>
        <option value="Smile Makeover" <?php echo ($service == 'Smile Makeover') ? 'selected' : ''; ?>>Smile Makeover</option>
        <option value="Gum Care" <?php echo ($service == 'Gum Care') ? 'selected' : ''; ?>> Gum Care</option>
        <option value="Teeth Jewellery" <?php echo ($service == 'Teeth Jewellery') ? 'selected' : ''; ?>>Teeth Jewellery</option>
        <option value="Child Dental Care" <?php echo ($service == 'Child Dental Care') ? 'selected' : ''; ?>> Child Dental Care</option>
        <option value="Major Head & Neck Surgeries" <?php echo ($service == 'Major Head & Neck Surgeries') ? 'selected' : ''; ?>>Major Head & Neck Surgeries</option>

        <!-- <option value="Dentures" <?php echo ($service == 'Dentures') ? 'selected' : ''; ?>>Dentures  </option>
                                                <option value="Smile Designing" <?php echo ($service == 'Smile Designing') ? 'selected' : ''; ?>>Smile Designing</option>
                                                <option value="Full Mouth Rehabilitation Treatment" <?php echo ($service == 'Full Mouth Rehabilitation Treatment') ? 'selected' : ''; ?>>Full Mouth Rehabilitation Treatment</option>
                                                 <option value="Laser Gum" <?php echo ($service == 'Laser Gum') ? 'selected' : ''; ?>>Laser & Gum</option>
                                                <option value="Teeth Cleaning" <?php echo ($service == 'Teeth Cleaning') ? 'selected' : ''; ?>>Teeth Cleaning</option>
                                                <option value="Teeth Whitening" <?php echo ($service == 'Teeth Whitening') ? 'selected' : ''; ?>>Teeth Whitening</option>
                                                <option value="Mouth Ulcers" <?php echo ($service == 'Mouth Ulcers') ? 'selected' : ''; ?>>Mouth Ulcers</option>
                                                <option value="Precancerous Lesion" <?php echo ($service == 'Precancerous Lesion') ? 'selected' : ''; ?>>Precancerous Lesion</option>
                                                <option value="Laser Crown Lengthening" <?php echo ($service == 'Laser Crown Lengthening') ? 'selected' : ''; ?>>Laser Crown Lengthening</option>  -->