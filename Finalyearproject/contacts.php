<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgcontact";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT id, name, email, subject, message, created_at FROM contacts";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG-GO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bgb">
        <div class="logo">
            <img src="image/logo2.png">
        </div>
        <div class="main">
            <ul>
                <li><a href="home2.html">HOME</a></li>
                <li><a href="usersh.php">My Users</a></li>
                <li class="active"><a href="contacts.html">Contacts</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">More</a>
                    <div class="dropdown-content">
                        <a href="login.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
        <h1 class="act">Contact Details</h1>
        <div class="activity-container">
            
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"]. "</td>";
                        echo "<td>" . $row["name"]. "</td>";
                        echo "<td>" . $row["email"]. "</td>";
                        echo "<td>" . $row["subject"]. "</td>";
                        echo "<td>" . $row["message"]. "</td>";
                        echo "<td>" . $row["created_at"]. "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No contacts found</td></tr>";
                }
                $conn->close();
                ?>
            </table>
        </div>
</body>
</html>