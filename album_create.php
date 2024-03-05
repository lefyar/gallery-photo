<?php
include('connection.php');
session_start();

$albumname = $_POST['album_name'];
$description = $_POST['description_album'];
$date_created = date("Y-m-d H:i:s");
$id_user = $_SESSION['id_user'];

$sql = mysqli_query($conn,"INSERT INTO album (id_user, album_name, description_album, date_created) VALUES ('$id_user', '$albumname', '$description', '$date_created')");

header("location:./collections.php");

