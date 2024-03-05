<?php
include('connection.php');
session_start();

$id_photo = (int) $_POST['id_photo'];
$id_user = $_SESSION['id_user'];
$comment = $_POST['comment'];
$date_commented = date('Y-m-d');

$sql = mysqli_query($conn, "INSERT INTO comment_photo (id_photo, id_user, comment, date_commented) VALUES ('$id_photo', '$id_user', '$comment', '$date_commented')");

header("location:detail_photo.php?id_photo=$id_photo?id_user=$id_user");