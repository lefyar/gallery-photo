<?php 
include('connection.php');
session_start();

if (!isset($_SESSION['id_user'])) {
    header('location:login.php');

} else {
    $id_photo = $_GET['id_photo'];
    $id_user = $_GET['id_user'];

    $sql = mysqli_query($conn, "SELECT * FROM like_photo WHERE id_photo = '$id_photo' AND id_user = '$id_user'");

    while ($row = mysqli_fetch_array($sql)) {
        $date_liked = $row['date_liked'];

        $unlike = mysqli_query($conn, "DELETE FROM like_photo WHERE id_photo = '$id_photo' AND id_user = '$id_user'");
        header('location:detail_photo.php?id_photo=' . $id_photo . '?id_user=' . $id_user . '');
    }
}
