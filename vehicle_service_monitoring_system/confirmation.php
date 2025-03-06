<!DOCTYPE html>
<html lang="en">
<?php
include("connect.php");
ob_start();
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if user is logged in
if (!isset($_SESSION['userId'])) {
    // If not, redirect to login page
    header("Location: /DE/loginpage/login-form-14/login.php");
    exit();
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Booking Confirmation</title>
    <link rel="stylesheet" href="confirmation.css">
    <link href="/DE/Homepage/assets/img/logo-no-background.png" rel="icon">
</head>
<body>
    <div class="logo">
			<a href="/DE/Homepage/index.html"><img src="/DE/Homepage/assets/img/logo-no-background.png" width="200px" height="100px"/></a>
	</div>
    <div class="logout-container">
        <a href="logout.php"><button class="logout-button">Logout</button></a>
    </div>
    <div class="confirmation-container">
        <h2>Service Booking Confirmed</h2>
        <p>Your service booking has been successfully confirmed.</p>
        <p>We will contact you shortly to confirm the details and schedule the service appointment.</p>
        <p>Thank you for choosing our services!</p>
    </div>
</body>
</html>
