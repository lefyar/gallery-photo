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
    <title>Home | Gallery Photo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .scrollbar-hide {
            scrollbar-width: none;
            /* Untuk Firefox */
            -ms-overflow-style: none;
            /* Untuk Internet Explorer */
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
            /* Untuk browser berbasis WebKit (Chrome, Safari, dll.) */
        }
    </style>
</head>

<body>
    <div class="flex flex-col">
        <header>
            <div class="flex justify-between items-center bg-[#395B64] h-[10em] px-[4em]">
                <p class="text-white"><a href="logout.php" class="hover:underline">Testing Logout</a></p>
                <h1 class="text-white">Header</h1>
                <p class="justify-self-end text-white">Welcome, <?= $_SESSION['username'] ?></p>
            </div>
        </header>
        <main>
            <div class="flex justify-center items-center bg-[#2C3333] h-[40em]">
                <h1 class="text-[#E7F6F2]">Main</h1>
            </div>
        </main>
        <footer <div class="flex justify-center items-center bg-[#395B64] h-[10em]">
            <h1 class="text-white">Footer</h1>
    </div>
    </footer>
    </div>
</body>

</html>