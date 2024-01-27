<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Gallery Photo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="h-screen flex justify-center items-center bg-neutral-600">
        <div class="h-[24em] w-[30em] p-4 rounded-lg bg-white">
            <p class="pb-2 font-medium text-[1.5rem]">Login</p>
            <form action="login_process" method="post">
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
        </div>
    </div>
</body>

</html>