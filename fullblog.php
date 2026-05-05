<?php
// 1. Database Connection
include './db.connection/db_connection.php';

// Identifier capture
$blog_input = isset($_GET['id']) ? $_GET['id'] : '';

if (empty($blog_input)) {
    echo "<h1 style='color:gold; text-align:center; margin-top:50px;'>Invalid Blog Request</h1>";
    exit;
}

// 2. Fetch Blog Data
$stmt = $conn->prepare("
    SELECT 
        id, title, slug, main_content, full_content, 
        title_image, main_image, video, 
        telugu_title, telugu_main_content, telugu_full_content,
        section1_image, service, hashtags, keypoints
    FROM blogs 
    WHERE id = ? OR slug = ?
");

$stmt->bind_param("ss", $blog_input, $blog_input);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();

if (!$blog) {
    echo "<h1 style='color:gold; text-align:center; margin-top:50px;'>Blog Not Found!</h1>";
    exit;
}

// Data mapping with Fallback Logic
$blog_id = $blog['id'];
$title = $blog['title'];
$main_content = $blog['main_content'];
$full_content = $blog['full_content'];
$main_image = $blog['main_image'];
$video = $blog['video'];
$telugu_title = !empty($blog['telugu_title']) ? $blog['telugu_title'] : $title;
$telugu_main_content = !empty($blog['telugu_main_content']) ? $blog['telugu_main_content'] : $main_content;
$telugu_full_content = !empty($blog['telugu_full_content']) ? $blog['telugu_full_content'] : $full_content;
$service = $blog['service'];

$stmt->close();

// 3. Fetch Likes/Dislikes
$likes_count = 0;
$dislikes_count = 0;
$count_stmt = $conn->prepare("SELECT reaction, COUNT(*) as total FROM blog_reactions WHERE blog_id = ? GROUP BY reaction");
$count_stmt->bind_param("i", $blog_id);
$count_stmt->execute();
$res = $count_stmt->get_result();
while ($row = $res->fetch_assoc()) {
    if ($row['reaction'] == 'like') $likes_count = $row['total'];
    if ($row['reaction'] == 'dislike') $dislikes_count = $row['total'];
}
$count_stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= strip_tags($title) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .fullblogs_section {
            background-color: black;
            padding-bottom: 50px;
        }

        /* LIVE SERVER FIX: Force Default Gold */
        .content-wrapper {
            color: #EDC967 !important;
        }

        /* Database nundi vacche default tags ki Gold apply avthundi */
        .content-wrapper p,
        .content-wrapper span,
        .content-wrapper div,
        .content-wrapper li,
        .content-wrapper h1,
        .content-wrapper h2,
        .content-wrapper h3,
        .content-wrapper h4,
        .content-wrapper h5,
        .content-wrapper h6 {
            color: inherit;
        }

        /* Admin panel text editor automatic ga black color (#000000) add chesthe, 
           manamu ikkada Gold tho override chestunnam. 
           But meeru vera colors (Red, Blue etc.) isthe avi work avthayi. */
        .content-wrapper [style*="color: #000000"],
        .content-wrapper [style*="color: rgb(0, 0, 0)"],
        .content-wrapper [style*="color: black"] {
            color: #EDC967 !important;
        }

        .blog-title {
            color: white;
            font-weight: 800;
        }

        .badge_service_name {
            background-color: gold;
            color: black;
            font-weight: bold;
            border-radius: 5px;
        }

        .lang-btn.active {
            background: gold !important;
            color: black !important;
            border: 2px solid gold !important;
        }

        /* Swiper & Cards */
        .custom-card {
            background: #111;
            border: 1px solid #333;
            transition: 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .custom-card:hover {
            border-color: gold;
        }

        .custom-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .blog-card-text {
            color: gold;
            text-decoration: none;
            font-size: 14px;
            margin-top: 10px;
        }

        .swiper-slide {
            height: auto !important;
            padding-bottom: 20px;
        }

        .blogs_color {
            color: gold !important;
        }

        .fullblogs_section_1 {
            background-color: black !important;
        }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <main class="fullblogs_section">
        <div class="container py-5">
            <div class="d-flex justify-content-center mb-4">
                <button id="english-btn" class="lang-btn active btn btn-outline-warning">English</button>
                <button id="telugu-btn" class="lang-btn ms-3 btn btn-outline-warning">తెలుగు</button>
            </div>

            <?php if (!empty($service)): ?>
                <div class="text-center mb-4">
                    <span class="badge_service_name px-4 py-2"><?= htmlspecialchars($service) ?></span>
                </div>
            <?php endif; ?>

            <div class="text-center mb-5">
                <?php if (!empty($video)): ?>
                    <video controls class="w-100 shadow" style="max-width:800px; border-radius:15px;">
                        <source src="./admin/uploads/videos/<?= $video ?>" type="video/mp4">
                    </video>
                <?php elseif (!empty($main_image)): ?>
                    <img src="./admin/uploads/photos/<?= $main_image ?>" class="shadow" style="max-height:500px; width:auto; border-radius: 15px;">
                <?php endif; ?>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1 class="blog-title text-center mb-4">
                        <span id="title-en"><?= $title ?></span>
                        <span id="title-te" style="display:none;"><?= $telugu_title ?></span>
                    </h1>

                    <div class="content-wrapper">
                        <div class="main-content fs-5 mb-4">
                            <div id="main-en"><?= $main_content ?></div>
                            <div id="main-te" style="display:none;"><?= $telugu_main_content ?></div>
                        </div>

                        <div class="full-content">
                            <div id="full-en"><?= $full_content ?></div>
                            <div id="full-te" style="display:none;"><?= $telugu_full_content ?></div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-5">
                        <button id="like-btn" class="btn btn-outline-success me-3">👍 Like (<span id="like-count"><?= $likes_count ?></span>)</button>
                        <button id="dislike-btn" class="btn btn-outline-danger">👎 Dislike (<span id="dislike-count"><?= $dislikes_count ?></span>)</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="fullblogs_section_1">
        <div class="container">
            <h1 class="d-flex justify-content-center py-5 blogs_color">LATEST BLOGS</h1>
            <div class="swiper blog-swiper">
                <div class="swiper-wrapper">
                    <?php
                    $latest_sql = "SELECT id, title, main_image, slug FROM blogs ORDER BY created_at DESC LIMIT 10";
                    $latest_res = $conn->query($latest_sql);
                    if ($latest_res->num_rows > 0) {
                        while ($row = $latest_res->fetch_assoc()) {
                            $sidebar_img = !empty($row['main_image']) ? "./admin/uploads/photos/{$row['main_image']}" : "default.png";
                            $sidebar_title = strlen($row['title']) > 50 ? substr(strip_tags($row['title']), 0, 50) . '...' : strip_tags($row['title']);
                            $blog_url = "fullblog.php?id=" . (!empty($row['slug']) ? $row['slug'] : $row['id']);
                            echo "
                            <div class='swiper-slide'>
                                <div class='custom-card p-3 text-center'>
                                    <img src='{$sidebar_img}' alt='Blog Image'>
                                    <a href='{$blog_url}' class='blog-card-text d-block'>{$sidebar_title}</a>
                                </div>
                            </div>";
                        }
                    }
                    ?>
                </div>
                <div class="swiper-pagination mt-4"></div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Language Toggle Logic
        const enBtn = document.getElementById("english-btn");
        const teBtn = document.getElementById("telugu-btn");

        function switchLang(lang) {
            const isEn = (lang === 'en');
            document.getElementById("title-en").style.display = isEn ? "inline" : "none";
            document.getElementById("main-en").style.display = isEn ? "block" : "none";
            document.getElementById("full-en").style.display = isEn ? "block" : "none";

            document.getElementById("title-te").style.display = isEn ? "none" : "inline";
            document.getElementById("main-te").style.display = isEn ? "none" : "block";
            document.getElementById("full-te").style.display = isEn ? "none" : "block";

            enBtn.classList.toggle('active', isEn);
            teBtn.classList.toggle('active', !isEn);
        }

        enBtn.onclick = () => switchLang('en');
        teBtn.onclick = () => switchLang('te');

        // Voting system Logic
        const blogId = <?= json_encode($blog_id) ?>;
        const likeBtn = document.getElementById("like-btn");
        const dislikeBtn = document.getElementById("dislike-btn");

        if (localStorage.getItem("voted_" + blogId)) {
            likeBtn.disabled = dislikeBtn.disabled = true;
        }

        async function castVote(type) {
            const res = await fetch("update_vote.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `blog_id=${blogId}&vote_type=${type}`
            });
            const data = await res.json();
            if (data.success) {
                document.getElementById("like-count").innerText = data.new_likes;
                document.getElementById("dislike-count").innerText = data.new_dislikes;
                localStorage.setItem("voted_" + blogId, true);
                likeBtn.disabled = dislikeBtn.disabled = true;
            }
        }

        likeBtn.onclick = () => castVote('like');
        dislikeBtn.onclick = () => castVote('dislike');

        // Swiper Init
        new Swiper(".blog-swiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
    </script>
</body>

</html>
<?php $conn->close(); ?>