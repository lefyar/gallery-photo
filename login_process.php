<?php
include('connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "select * from user where username = '$username' or email = '$email' and password = '$password'");

if (mysqli_num_rows($sql) == 1) {
    while ($data = mysqli_fetch_array($sql)) {
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
    }
    header("location:home.php");
} else {
    $_SESSION['error'] = "Username or Password Invalid";
    header("location:login.php");
}
?>