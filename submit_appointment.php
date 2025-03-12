<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);
    $phone = trim($_POST['phone']);
    $department = trim($_POST['department']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($date) || empty($time) || empty($phone) || empty($department)) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
        exit;
    }

    // Prepare email details
    $to = "digitalsolutionsfordigitallife@gmail.com"; // Replace with your email
    $subject = "New Appointment Request";
    $message = "
        <h2>New Appointment Request</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Date:</strong> $date</p>
        <p><strong>Time:</strong> $time</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Concern:</strong> $department</p>
    ";
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(['success' => true, 'message' => 'Your appointment request has been sent successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'There was an error sending your appointment request.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
