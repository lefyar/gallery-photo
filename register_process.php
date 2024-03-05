<?php
include('connection.php');
session_start(); // Start the session to use $_SESSION

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$date_created = date("Y-m-d H:i:s");

// Check if the password is at least 8 characters long
if (strlen($password) < 8) {
    $_SESSION['error'] = "Your password does not meet the minimum requirements. Please ensure it is at least 8 characters in length for added security.";
    header("location:./Register.php");
    exit();
}

// Check if email already exists
$stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $_SESSION['error'] = "The email address you entered is already registered. Please use a different email.";
    header("location:./Register.php");
    exit();
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare insert statement
$stmt = $conn->prepare("INSERT INTO user (username, email, password, fullname, address, date_created) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $username, $email, $hashedPassword, $fullname, $address, $date_created);

if ($stmt->execute()) {
    $_SESSION['success'] = "Register Success";
    header("location:./login.php");
} else {
    $_SESSION['error'] = "An error occurred during registration. Please try again.";
    header("location:./Register.php");
}

$stmt->close();
$conn->close();
