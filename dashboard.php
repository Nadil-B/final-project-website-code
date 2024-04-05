<?php
session_start();

// Simulated login process (for demonstration only)
$username = $_POST['username'];
$password = $_POST['password'];

// Simulated database check (replace this with actual database check)
if ($username === "admin" && $password === "password") {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: login.html?error=invalid_credentials");
    exit();
}
?>

<?php
session_start();

// Check if the user is logged in, otherwise redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// Simulated sensitive information (patient and staff data)
$patients = [
    ['id' => 1, 'name' => 'John Doe', 'dob' => '1980-01-01', 'gender' => 'Male', 'diagnosis' => 'Heart Disease'],
    ['id' => 2, 'name' => 'Jane Smith', 'dob' => '1975-05-15', 'gender' => 'Female', 'diagnosis' => 'Diabetes']
];

$staff = [
    ['id' => 1, 'name' => 'Dr. Michael Johnson', 'department' => 'Cardiology', 'specialization' => 'Cardiologist'],
    ['id' => 2, 'name' => 'Nurse Emily Brown', 'department' => 'Pediatrics', 'specialization' => 'Pediatric Nurse']
];

// Logout functionality
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.html");
    exit();
}
?>