<?php
$conn = mysqli_connect("localhost", "root", "", "web_project");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['pswd'];

// Check if user exists
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    header("Location: resumeform.php");
exit();
} else {
    echo "<script>alert('❌ Invalid credentials'); window.location.href='signup.html';</script>";
}



mysqli_close($conn);
?>
