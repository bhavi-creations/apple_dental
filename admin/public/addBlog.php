<?php
// Database connection
include '../../db.connection/db_connection.php';

// Unique filename generation
function generateUniqueFileName($fileName) {
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    return uniqid() . '_' . time() . '.' . $ext;
}

$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];

// Image Upload Function with "Old Image" support
function handleImageUpload($fileKey, $oldFileValue, $directoryName, $allowed_extensions) {
    // 1. Check if a new file is actually uploaded
    if (!empty($_FILES[$fileKey]['name'])) {
        $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_extensions)) {
            die("Invalid file type for $fileKey");
        }

        $directory = __DIR__ . "/../uploads/$directoryName/";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $fileName = generateUniqueFileName($_FILES[$fileKey]['name']);
        if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $directory . $fileName)) {
            return $fileName; // Return new filename
        }
    }
    // 2. If no new file is uploaded, return the old filename from hidden field
    return $oldFileValue;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    // Form Data Collection
    $title = $_POST['title'] ?? '';
    $main_content = $_POST['main_content'] ?? '';
    $full_content = $_POST['full_content'] ?? '';
    $service = $_POST['service'] ?? '';
    $telugu_title = $_POST['telugu_title'] ?? '';
    $telugu_main_content = $_POST['telugu_main_content'] ?? '';
    $telugu_full_content = $_POST['telugu_full_content'] ?? '';
    $hashtags = $_POST['hashtags'] ?? '';
    $keypoints = $_POST['keypoints'] ?? '';

    // Handling Images & Video (New or Old)
    // Ikkada 'old_main_image' etc hidden fields nundi data vasthundi
    $main_image = handleImageUpload('main_image', $_POST['old_main_image'] ?? '', 'photos', $allowed_extensions);
    $section1_image = handleImageUpload('section1_image', $_POST['old_section1_image'] ?? '', 'photos', $allowed_extensions);
    
    // Video handling
    $video = $_POST['old_video'] ?? ''; 
    if (!empty($_FILES['video']['name'])) {
        $videoDir = __DIR__ . "/../uploads/videos/";
        if (!is_dir($videoDir)) mkdir($videoDir, 0777, true);
        $video = generateUniqueFileName($_FILES['video']['name']);
        move_uploaded_file($_FILES['video']['tmp_name'], $videoDir . $video);
    }

    // --- UPDATE LOGIC ---
    if ($blog_id > 0) {
        $stmt = $conn->prepare("
            UPDATE blogs SET
                title=?, main_content=?, full_content=?,
                telugu_title=?, telugu_main_content=?, telugu_full_content=?,
                main_image=?, section1_image=?, video=?,
                service=?, hashtags=?, keypoints=?
            WHERE id=?
        ");

        $stmt->bind_param(
            "ssssssssssssi",
            $title, $main_content, $full_content,
            $telugu_title, $telugu_main_content, $telugu_full_content,
            $main_image, $section1_image, $video,
            $service, $hashtags, $keypoints,
            $blog_id
        );
    } 
    // --- INSERT LOGIC ---
    else {
        $stmt = $conn->prepare("
            INSERT INTO blogs
            (title, main_content, full_content, telugu_title, telugu_main_content, telugu_full_content,
             main_image, section1_image, video, service, hashtags, keypoints, created_at)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW())
        ");

        $stmt->bind_param(
            "ssssssssssss",
            $title, $main_content, $full_content, $telugu_title, $telugu_main_content, $telugu_full_content,
            $main_image, $section1_image, $video, $service, $hashtags, $keypoints
        );
    }

    if ($stmt->execute()) {
        header("Location: allBlog.php");
        exit;
    } else {
        die("SQL Error: " . $stmt->error);
    }
}
$conn->close();
?>