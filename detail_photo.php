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
        //Ambil data photo untuk menampilkan judul photo di title
        if (isset($_GET['id_photo'])) {
            $id_photo = $_GET['id_photo'];
            $sql = mysqli_query($conn, "SELECT * FROM photo WHERE id_photo = '$id_photo'");

            while ($row = mysqli_fetch_array($sql)) {
                ?>
                <?php echo $row['title_photo']; ?> | Gallery Photo
            </title>
            <script src="https://cdn.tailwindcss.com"></script>
            <style>
                <?php include 'style.css'; ?>
            </style>
        </head>

        <body>
            <div ckass="flex flex-col">
                <button class="absolute p-[1em]"><a href="./home.php" class="hover:text-[#a6b1ae] text-[#E7F6F2]">
                        < Back</a></button>
                <div class="min-h-screen flex justify-center items-center bg-[#2C3333]">
                    <div class="flex flex-row h-[40em] w-[75%] border-2 border-[#395B64] rounded-md">
                        <div class="w-1/2 h-full flex justify-center items-center border-r-2 border-[#395B64] ">
                            <img src="<?php echo $row['file_path']; ?>" alt="photo" class="h-[40em] object-contain">
                        </div>
                        <div class="w-1/2 flex flex-col">
                            <h1 class="text-[1.5em] text-[#E7F6F2] font-bold p-5 border-b-2 border-[#395B64]">
                                <?php
                                //Ambil username pembuat dari photo yang dipilih
                                $id_photo = mysqli_real_escape_string($conn, $_GET['id_photo']);
                                $sql = mysqli_query($conn, "SELECT photo.*, user.username FROM photo JOIN user ON photo.id_user = user.id_user WHERE id_photo = '$id_photo'");
                                //Looping untuk menampilkan username
                                while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <a href="detail_user.php?id_user=<?php echo $row['id_user']; ?>">
                                        <?php echo htmlspecialchars($row['username']); ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </h1>
                            <div class="p-5 border-b-2 border-[#395B64]">
                                <?php
                                //Ambil data photo yang dipilih
                                $id_photo = mysqli_real_escape_string($conn, $_GET['id_photo']);
                                $sql = mysqli_query($conn, "SELECT * FROM photo WHERE id_photo = '$id_photo'");
                                //Looping untuk menampilkan data photo
                                while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <h1 class="text-[1.5em] text-[#E7F6F2] font-bold">
                                        <?php echo $row['title_photo']; ?>
                                    </h1>
                                    <br>
                                    <p class="text-[#E7F6F2]">
                                        <?php echo $row['description_photo']; ?>
                                    </p>
                                </div>
                                <?php
                                //Ambil data comment dari photo yang dipilih
                                $comment = mysqli_query($conn, "SELECT comment_photo.*, user.username FROM comment_photo JOIN user ON comment_photo.id_user = user.id_user WHERE id_photo = '$id_photo'");

                                ?>
                                <h1 class="text-[1.5em] text-[#E7F6F2] font-bold mx-5 mt-5">
                                    <?php echo mysqli_num_rows($comment); ?> Comments
                                </h1>
                                <br>
                                <div class="comment-scrollbar h-2/3 mx-5 overflow-auto">
                                    <?php
                                    //Looping untuk menampilkan data comment
                                    while ($data = mysqli_fetch_array($comment)) {
                                        ?>
                                        <h1 class="text-[#E7F6F2] font-semibold">
                                            <a href="detail_user.php?id_user=<?php echo $data['id_user']; ?>">
                                                <?php echo htmlspecialchars($data['username']); ?>
                                            </a>
                                        </h1>
                                        <p class="text-[#E7F6F2]">
                                            <?php echo $data['comment']; ?>
                                        </p>
                                        <br>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="w-full h-[10em] border-t-2 border-[#395B64] flex flex-col">
                                    <div class="h-[40%] px-3 flex items-center gap-2">
                                        <?php
                                        //Ambil data user
                                        $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;
                                        //$id_user di-set dengan ID user yang login
                                        $likeCheck = mysqli_query($conn, "SELECT * FROM like_photo WHERE id_photo = '$id_photo' AND id_user = '$id_user'");
                                        $isLiked = mysqli_num_rows($likeCheck) > 0;

                                        //Menghitung total likes pada foto
                                        $totalLikes = mysqli_query($conn, "SELECT COUNT(*) as total FROM like_photo WHERE id_photo = '$id_photo'");
                                        $likesRow = mysqli_fetch_assoc($totalLikes);
                                        $likesCount = $likesRow['total'];
                                        ?>
                                        <?php
                                        //Jika user belum like maka tampilkan icon heart-outline
                                        if (!$isLiked): ?>
                                            <a
                                                href="like_photo.php?id_photo=<?php echo $row['id_photo'] ?>&id_user=<?php echo $id_user; ?>">
                                                <img src="./heart.png" alt="heart-outline" class="mx-[0.1em] w-[1.7em] h-[1.7em]">
                                            </a>
                                        <?php else: 
                                        //Jika user sudah like maka tampilkan icon heart-filled?>
                                            <a
                                                href="unlike_photo.php?id_photo=<?php echo $row['id_photo'] ?>&id_user=<?php echo $id_user; ?>">
                                                <img src="./heart-filled.png" alt="heart-filled" class="mx-1 w-[1.42em] h-[1.5em]">
                                            </a>
                                        <?php endif; ?>
                                        <?php
                                }
                                //Menampilkan jumlah like pada photo yang dipilih
                                ?>
                                    <h1 class="text-[#E7F6F2] text-[0.875em] items-center">
                                        <?php echo $likesCount; ?> Likes
                                    </h1>
                                </div>

                                <form action="comment_photo.php" method="POST" class="h-[60%] flex px-[1em]">
                                    <input type="text" name="id_photo" value="<?php echo $id_photo; ?>" hidden>
                                    <input type="text" name="comment" id=""
                                        class="h-full flex-grow pr-[1em] bg-[#2C3333] focus:outline-none text-[#E7F6F2]"
                                        placeholder="Write your comment" required>
                                    <input type="submit" value="Send"
                                        class="text-[#E7F6F2] pl=[1em] font-semibold cursor-pointer">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <?php
            }
        }
        ?>

</html>