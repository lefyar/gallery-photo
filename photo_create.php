<?php
include('connection.php');
session_start();

$id_album = $_POST['id_album'];
$id_user = $_SESSION['id_user'];
$title_photo = $_POST['title_photo'];
$description_photo = $_POST['description_photo'];
$date_uploaded = date("Y-m-d H:i:s");

$rand = rand();
$extension = array('png', 'jpg', 'jpeg', 'gif');
if (isset($_FILES['file_path'])) {
    $filename = $_FILES['file_path']['name'];
    $file_size = $_FILES['file_path']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (in_array($ext, $extension)) {
        if ($file_size < 100000000) {
            $location = 'photo/';
            $image_db = $location . $rand . $filename;
            move_uploaded_file($_FILES['file_path']['tmp_name'], $location . $rand . $filename);
            mysqli_query($conn, "insert into photo (id_user,id_album,title_photo,description_photo,date_uploaded,file_path,file_type) values('$id_user','$id_album','$title_photo','$description_photo','$date_uploaded','$image_db','image/jpeg')");
            header("location:./detail_album.php?id_album=$id_album");
        } else {
            echo "File size is too large";
        }
    }
} else {
    echo "File not found";
}