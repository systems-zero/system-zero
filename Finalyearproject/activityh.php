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
            <img src="image/logo2.png">
        </div>
        <div class="main">
            
            <ul>
                <li><a href="home.html">HOME</a></li>
                <li class="active"><a href="activityh.php">My Activities</a></li>
                <li><a href="profileh.php">Profile</a></li>
                <li><a href="contactus2.html">Contact us</a></li>
                <!-- <li><a href="#">More</a></li> -->
                <li class="dropdown">
                    <a href="#" class="dropbtn">More</a>
                    <div class="dropdown-content">
                        <a href="loggout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
        <h1 class="act">Booked PG Information</h1>
    <div class="activity-container">
        <table>
            <thead>
                <tr>
                    <th>PG Name</th>
                    <th>Price</th>
                    <th>Facilities</th>
                    <th>Location</th>
                    <th>Rating</th>
                    <th>Sharing Type</th>
                    <th>Booking Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
               session_start();
               
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
               
               // Get the logged-in user's username
               $user = $_SESSION['username'];
               
               // Fetch bookings for the logged-in user
               $sql = "SELECT name, price, facilities, location, rating, sharingType, booking_date FROM bookings WHERE username = ?";
               $stmt = $conn->prepare($sql);
               $stmt->bind_param("s", $user);
               $stmt->execute();
               $result = $stmt->get_result();
               
               if ($result->num_rows > 0) {
                   // Output data of each row
                   while($row = $result->fetch_assoc()) {
                       echo "<tr>
                               <td>{$row['name']}</td>
                               <td>{$row['price']}</td>
                               <td>{$row['facilities']}</td>
                               <td>{$row['location']}</td>
                               <td>{$row['rating']}</td>
                               <td>{$row['sharingType']}</td>
                               <td>{$row['booking_date']}</td>
                             </tr>";
                   }
               } else {
                   echo "<tr><td colspan='7'>No bookings found</td></tr>";
               }
               
               $stmt->close();
               $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    </header>
</body>
</html>