<?php
$host = 'localhost';
$db = 'pgusers';
$user = 'root';
$pass = '';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// if (!isset($_SESSION['id'])) {
//     header("Location: login.php");
//     exit();
// }

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG-GO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="image/logo2.png" alt="Logo">
        </div>
        <div class="main">
            <ul>
                <li><a href="home.html">HOME</a></li>
                <li><a href="activityh.php">My Activities</a></li>
                <li class="active"><a href="profileh.php">Profile</a></li>
                <li><a href="contactus2.html">Contact us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">More</a>
                    <div class="dropdown-content">
                        <a href="loggout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="profile-container">
            <h1>User Profile</h1>
            <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
            <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Contact:</strong> <?php echo $user['contact']; ?></p>
        </div>
    </header>
</body>
</html>
