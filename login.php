<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Gallery Photo</title>
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
    <div class="h-screen flex justify-center items-center bg-neutral-600">
        <div class="h-[24em] w-[30em] p-4 rounded-lg bg-white">
            <p class="pb-2 font-medium text-[1.5rem]">Login</p>
            <form action="login_process.php" method="post">
                <div class="flex flex-col gap-[1em]">
                    <div class="flex flex-col">
                        <label for="">Username or Email</label>
                        <input type="text" name="username" id="username"
                            class="p-2 border-2 border-gray-300 rounded-md w-[100%]">
                    </div>
                    <div class="flex flex-col">
                        <label for="password" class="pb-1">Password</label>
                        <input type="password" name="password" id="password"
                            class="p-2 border-2 border-gray-300 rounded-md w-[100%]">
                    </div>
                    <button type="submit" class="p-2 bg-blue-500 rounded-md text-white">Login</button>
                </div>
            </form>
            <p class="pt-4 text-center">Don't have an account? <a href="register.php" class="text-blue-500">Register</a></p>
        </div>
    </div>
</body>

</html>