<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgusers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, gender, email, contact FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"]. "</td>";
        echo "<td>" . $row["username"]. "</td>";
        echo "<td>" . $row["gender"]. "</td>";
        echo "<td>" . $row["email"]. "</td>";
        echo "<td>" . $row["contact"]. "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No users found</td></tr>";
}

$conn->close();
?>
