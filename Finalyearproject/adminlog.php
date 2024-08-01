<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Directly check for the hardcoded username and password
    if ($username === 'admin' && $password === '123') {
        $_SESSION['username'] = $username;
        header("Location: home2.html");
        exit(); // Ensure no further code is executed
    } else {
        echo "Invalid Admin_name or password.";
    }
}
?>

