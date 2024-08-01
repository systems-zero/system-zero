<?php
// Create a connection to the MySQL database
$conn = new mysqli("localhost", "root", "", "pgusers");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['newUsername'];
    $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // Prepare the SQL statement
    $sql = "INSERT INTO users (username, password, gender, email, contact) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $password, $gender, $email, $contact);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        header("Location: home.html");
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
