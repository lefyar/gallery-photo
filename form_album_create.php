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
    <title>Create Album | Gallery Photo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>

<body>
    <div class="flex flex-col">
        <button class="absolute p-[1em]"><a href="./home.php" class="hover:text-[#a6b1ae] text-[#E7F6F2]">
                < Back</a></button>
        <div class="min-h-screen flex justify-center items-center bg-[#2C3333]">
            <div class="w-[50em] p-4 rounded-lg">
                <h1 class="pb-2 font-semibold text-[3rem] text-start text-[#E7F6F2]">Create Album</h1>
                <form aria-required="true" action="./album_create.php" method="post" autocomplete="off">
                    <div class="flex flex-col">
                        <input type="text" name="album_name" id="album_name" placeholder="Album Name" required
                            class="p-2 mb-[1em] border-2 border-[#395B64] rounded-md w-[100%] h-[3.5em] bg-transparent text-[#E7F6F2] text-[0.875rem] outline-none focus:border-[#A5C9CA] transition duration-[0.1s]">
                        <input type="text" name="description_album" id="description_album" placeholder="Description" required
                            class="p-2 mb-[1em] border-2 border-[#395B64] rounded-md w-[100%] h-[3.5em] bg-transparent text-[#E7F6F2] text-[0.875rem] outline-none focus:border-[#A5C9CA] transition duration-[0.1s]">
                        <input type="submit" value="Create" class="p-2 border-2 border-[#A5C9CA] rounded-md text-[#A5C9CA] text-semibold hover:bg-[#A5C9CA]
                    hover:text-[#2C3333] transition duration-[0.2s] cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>