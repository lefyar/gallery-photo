<?php
include('connection.php');
session_start();

$albumname = $_POST['albumname'];
$description = $_POST['description'];
$date_created = $_POST("Y-m-d H:i:s");
$id_user = $_SESSION['id_user'];

$sql = mysqli_query($conn, "insert into album (albumname,description,date_created,id_user) values('$albumname','$description','$date_created','$id_user')");

header("location:./album.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make album | Gallery Photo</title>
</head>
<body>
    <div>
        
    </div>
</body>
</html>