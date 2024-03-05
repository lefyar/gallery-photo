<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header("location:login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        include('connection.php');
        if (isset($_GET['id_album'])) {
            $id_album = $_GET['id_album'];
            $sql = mysqli_query($conn, "SELECT * FROM album WHERE id_album = '$id_album'");

            while ($row = mysqli_fetch_array($sql)) {
                ?>
                <?php echo $row['album_name']; ?>
                Detail | Gallery Photo
                <?php
            }
        }
        ?>
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>

<body>
    <div class="flex flex-col bg-[#2C3333]">
        <button class="absolute p-[1em]"><a href="./home.php"
                class="hover:text-[#a6b1ae] text-[#E7F6F2]">
                < Back</a></button>
        <div class="min-h-screen flex justify-center items-center bg-[#2C3333]">
            <div class="w-[70em] p-4 rounded-lg">
                <?php
                include('connection.php');
                if (isset($_GET['id_album'])) {
                    $id_album = $_GET['id_album'];
                    $sql = mysqli_query($conn, "SELECT * FROM album WHERE id_album = '$id_album'");

                    while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col">
                                <h1 class="pb-2 font-semibold text-[3rem] text-start text-[#E7F6F2]">
                                    <?php echo $row['album_name']; ?>
                                </h1>
                                <h2 class="text-[#a6b1ae] mb-[1.5em]">Created by
                                    <?php
                                    $id_album = mysqli_real_escape_string($conn, $_GET['id_album']);
                                    $sql = mysqli_query($conn, "SELECT * FROM album WHERE id_album = '$id_album'");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $sql = mysqli_query($conn, "SELECT album.*, user.username FROM album JOIN user ON album.id_user = user.id_user WHERE id_album = '$id_album'");

                                        while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                            <a href="detail_user.php?id_user=<?php echo $data['id_user']; ?>">
                                                <?php echo htmlspecialchars($data['username']); ?>
                                            </a>
                                            <?php
                                        }
                                        ?> in
                                        <?php

                                        ?>
                                        <?= $row['date_created'] ?>
                                    </h2>
                                    <p class="text-[#E7F6F2] w-[50%]">
                                        <?php echo $row['description_album']; ?>
                                    </p>
                                    <?php
                                    }
                                    ?>
                            </div>
                            <?php
                            if (isset($_GET['id_album'])) {
                                $id_album = mysqli_real_escape_string($conn, $_GET['id_album']);
                                $sql = mysqli_query($conn, "SELECT photo.file_path, photo.id_photo, photo.id_user FROM album INNER JOIN photo ON album.id_album = photo.id_album WHERE album.id_album = '{$id_album}'");
                            }
                            ?>
                            <div
                                class="w-[100%] p-[1em] border-2 border-[#395B64] rounded-md flex flex-wrap gap-[1em] justify-center items-center">
                                <?php
                                if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <a href="./detail_photo.php?id_photo=<?= $row['id_photo'] ?>&id_user=<?= $row['id_user'] ?>">
                                            <img src="<?= $row['file_path'] ?>" alt="photo-img"
                                                class="w-[15em] h-[15em] object-cover rounded-md border-2 border-[#395B64] hover:border-[#E7F6F2] transition duration-[0.2s]">
                                        </a>

                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                } else {
                                    ?>
                                <div
                                    class="w-[100%] h-[30em] border-2 border-[#395B64] rounded-md flex flex-col justify-center items-center">
                                    <h1 class="text-[2em] text-[#a6b1ae] font-semibold">There is no photo yet.
                                    </h1>
                                    <label class="text-[#a6b1ae]">Click <a href="form_photo_upload.php"
                                            class="font-semibold cursor-pointer">here</a> to start upload!</label>
                                </div>
                                <?php
                                }
                                ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>