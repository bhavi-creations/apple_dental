
<?php
// Database connection details
$servername = "localhost";
// Determine if the server is localhost
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $username = "root";
    $password = "";
    $dbname = "appledental";
} 
else {
    $username = "appledentalspecialities ";
    $password = "aR6HPpKhxuyNlGcaZucfhPqCV";
    $dbname = "appledentalspecialities";
    
}
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


