<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgbook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$name = $_POST['name'];
$price = $_POST['price'];
$facilities = $_POST['facilities'];
$location = $_POST['location'];
$rating = $_POST['rating'];
$sharingType = $_POST['sharingType'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO bookings (name, price, facilities, location, rating, sharingType) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $price, $facilities, $location, $rating, $sharingType);

// Execute the statement
if ($stmt->execute()) {
    echo "Booking confirmed for $name with $sharingType sharing at $price.";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
