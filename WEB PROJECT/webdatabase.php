<?php
// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_project";

// Connect to MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}

// 2. Create database
if (!mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $dbname")) {
    die("❌ Failed to create database: " . mysqli_error($conn));
}

// 3. Select database
if (!mysqli_select_db($conn, $dbname)) {
    die("❌ Failed to select database: " . mysqli_error($conn));
}

// 4. Create users table
$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100)
)";
if (!mysqli_query($conn, $createTable)) {
    die("❌ Failed to create table: " . mysqli_error($conn));
}

// 5. Get POST data
$username = $_POST['txt'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['pswd'] ?? '';

// 6. Check if fields are filled
if ($username == '' || $email == '' || $password == '') {
    die("❌ One or more fields are empty.");
}

// 7. Insert into users table
$sql = "INSERT INTO users (username, email, password) 
        VALUES ('$username', '$email', '$password')";
if (!mysqli_query($conn, $sql)) {
    die("❌ Error inserting data: " . mysqli_error($conn));
}
// ✅ Start session and store user info
session_start();
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;

// ✅ Redirect to resumeform.php
header("Location: resumeform.php");
exit();

// 8. Success - redirect
echo "<script>alert('✅ Signup successful!'); window.location.href='resumeform.php';</script>";

mysqli_close($conn);
?>
