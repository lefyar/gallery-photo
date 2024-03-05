<?php
include('connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a statement to select the user
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Use password_verify to compare the submitted password with the hashed password
        if (password_verify($password, $row['password'])) {
            // Password is correct
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['success'] = "Login Success";
            header("location:home.php");
        } else {
            // Password is not correct
            $_SESSION['error'] = "Username or Password is invalid";
            header("location:login.php");
        }
    } else {
        // No user found
        $_SESSION['error'] = "Username or Password is invalid";
        header("location:login.php");
    }
    $stmt->close();
}
$conn->close();