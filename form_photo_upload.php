<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header("location:login.php");
}

include('connection.php');
$id_user = $_SESSION['id_user'];

$sql = mysqli_query($conn, "SELECT * FROM album WHERE id_user = '$id_user'");
if (mysqli_num_rows($sql) == 0) {
    header("location:form_album_create.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo | Gallery Photo </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function preview() {
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
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
                <h1 class="pb-2 font-semibold text-[3rem] text-start text-[#E7F6F2]">Upload Photo</h1>
                <form aria-required="true" action="./photo_create.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="flex flex-row gap-[1em]">
                        <img id="thumb" src="https://placehold.co/800?text=Hello+World&font=roboto"
                            class=" w-1/3 h-[275px] border-2 rounded-md border-[#395B64] overflow-hidden object-cover" />
                        <div class="flex flex-col w-2/3">
                            <input type="file" onchange="preview()" name="file_path"
                                class="mb-[1em] file:bg-[#395B64] file:text-[#E7F6F2] file:border-none file:rounded-md  text-[#E7F6F2] file:cursor-pointer cursor-pointer">
                            <input type="text" name="title_photo" id="title_photo" placeholder="Title Photo" required
                                class="p-2 mb-[1em] border-2 border-[#395B64] rounded-md w-[100%] h-[3.5em] bg-transparent text-[#E7F6F2] text-[0.875rem] outline-none focus:border-[#A5C9CA] transition duration-[0.1s]">
                            <input type="text" name="description_photo" id="description_photo" placeholder="Description"
                                required
                                class="p-2 mb-[1em] border-2 border-[#395B64] rounded-md w-[100%] h-[3.5em] bg-transparent text-[#E7F6F2] text-[0.875rem] outline-none focus:border-[#A5C9CA] transition duration-[0.1s]">
                            <select name="id_album" id="album_name"
                                class="p-2 mb-[1em] border-2 border-[#395B64] rounded-md w-[100%] h-[3.5em] bg-transparent text-[#E7F6F2] text-[0.875rem] outline-none focus:border-[#A5C9CA] transition duration-[0.1s]">
                                <?php
                                    include('connection.php');
                                    $id_user = $_SESSION['id_user'];
                                    $sql = mysqli_query($conn, 'SELECT * FROM album WHERE id_user = ' . $id_user);
                                    while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <option value="<?php echo $data['id_album']; ?>"><?php echo $data['album_name']; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <input type="submit" value="Upload"
                                class="p-2 border-2 border-[#A5C9CA] rounded-md text-[#A5C9CA] text-semibold hover:bg-[#A5C9CA] hover:text-[#2C3333] transition duration-[0.2s] cursor-pointer">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>