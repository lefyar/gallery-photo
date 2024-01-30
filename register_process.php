<?php
include('connection.php');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$date_created = date("Y-m-d H:i:s");

$sql = mysqli_query($conn, "insert into user (username,email,password,fullname,address,date_created) values('$username','$email','$password','$fullname','$address','$date_created')");

header("location:./home.php");
?>