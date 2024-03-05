<?php
include('connection.php');
session_start();

if (!isset($_SESSION['id_user'])) {
    header('location:login.php');

} else {
    $id_photo = $_GET['id_photo'];
    $id_user = $_GET['id_user'];

    $sql = mysqli_query($conn, "SELECT * FROM like_photo WHERE id_photo = '$id_photo' AND id_user = '$id_user'");

    $row = mysqli_fetch_array($sql);
    $date_liked = date('Y-m-d');

    $like = mysqli_query($conn, "INSERT INTO like_photo (id_photo, id_user, date_liked) VALUES ('$id_photo','$id_user','$date_liked')");
    header('location:detail_photo.php?id_photo=' . $id_photo . '&id_user=' . $id_user . '');

}

