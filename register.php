<?php
require_once "db.php";

$fullname   = $_POST['fullname'];
$student_id = $_POST['student_id'];
$email      = $_POST['email'];
$college    = $_POST['college'];
$location   = $_POST['location'];
$event      = $_POST['event'];
$password   = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO students
        (fullname, student_id, email, college, location, event, password)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $fullname, $student_id, $email, $college, $location, $event, $hashed_password);

if ($stmt->execute()) {
    echo '<!DOCTYPE html>
    <html><head><title>Registration Successful</title><link rel="stylesheet" href="style.css"></head>
    <body><div class="container">
    <h1>Registration Successful!</h1>
    <p>Your registration has been saved successfully.</p>
    <a class="button-link" href="login.php">Login Now</a>
    </div></body></html>';
} else {
    echo "Registration failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
