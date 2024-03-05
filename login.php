<?php
session_start();

if (isset($_SESSION['id_user'])) {
    header("location:home.php");
    exit();
}

$message = "";
$messageType = "";

if (isset($_SESSION['error'])) {
    $message = $_SESSION['error'];
    $messageType = "error";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    $messageType = "success";
    unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Gallery Photo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>

<body>
    <div class="min-h-screen flex justify-center items-center bg-[#2C3333]">
        <div class="h-[26em] w-[30em] p-4">
            <h1 class="pb-2 font-semibold text-[1.5rem] text-[#E7F6F2] text-center">Login</h1>
            <p class="pb-[2em] text-[1em] text-[#E7F6F2] text-center">Please login to your account</p>
            <form aria-required="true" action="login_process.php" method="post" autocomplete="off">
                <div class="flex flex-col">
                    <input type="text" name="username" id="username" placeholder="Username" required
                        class="px-2 py-3 mb-4 border-2 border-[#395B64] rounded-md w-full bg-transparent text-[0.875em] text-[#E7F6F2] outline-none focus:border-[#A5C9CA] transition duration-200 ease-in-out">
                    <input type="password" name="password" id="password" placeholder="Password" required
                        class="p-2 mb-6 border-2 border-[#395B64] rounded-md w-full bg-transparent text-[0.875em] text-[#E7F6F2] outline- py-3 focus:border-[#A5C9CA] transition duration-200 ease-in-out">
                    <?php if ($message !== ""): ?>
                        <div
                            class="mb-4 p-4 <?= $messageType === "error" ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' ?> border <?= $messageType === "error" ? 'border-red-400' : 'border-green-400' ?> rounded">
                            <?= htmlspecialchars($message) ?>
                        </div>
                    <?php endif; ?>
                    <input type="submit" value="Login"
                        class="cursor-pointer p-2 border-2 border-[#A5C9CA] rounded-md text-[#A5C9CA] bg-[#2C3333] hover:bg-[#A5C9CA] hover:text-[#2C3333] transition duration-200 ease-in-out">
                </div>
            </form>
            <p class="pt-4 text-[0.875rem] text-center text-[#E7F6F2]">Don't have an account? <a href="register.php"
                    class="text-blue-500 hover:underline">Register</a></p>
        </div>
    </div>
</body>

</html>