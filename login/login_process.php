<?php
$conn = mysqli_connect("localhost", "root", "", "gallery-photo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "select * from user where username = '$username' or email = '$email' and password = '$password'");

if (mysqli_num_rows($sql) > 0) {
    while ($data = mysqli_fetch_array($sql)) {
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
    }
    header("location:index.php");
} else {
    header("location:login.php");
}

?>