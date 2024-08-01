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
        <img src="image/logo2.png" alt="Logo">
    </div>
    <div class="main">
        <ul>
            <li><a href="home2.html">HOME</a></li>
            <li class="active"><a href="usersh.php">My Users</a></li>
            <li><a href="contacts.php">Contacts</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">More</a>
                <div class="dropdown-content">
                    <a href="loggout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="user-table">
        <h2>Users List</h2>
        <table border= "1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Gmail</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                <!-- The PHP script will inject rows here -->
                <?php include 'users.php'; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
