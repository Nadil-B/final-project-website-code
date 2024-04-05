<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "hospital"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get login credentials from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Prevent SQL injection using prepared statements
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);

// Execute prepared statement
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows == 1) {
    // User found, redirect to dashboard or homepage
    header("Location: dashboard.php");
} else {
    // Invalid credentials or potential SQL injection attempt
    // Log the attempt or take appropriate action (e.g., block the IP)
    header("Location: login.php?error=access_denied");
}

$stmt->close();
$conn->close();
?>
