<?php
session_start(); // Ensure session_start is at the top to use $_SESSION

// Handling error messages
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error']; // Store the message in a variable
    unset($_SESSION['error']); // Remove the message from the session
} else {
    $errorMessage = ""; // No error message
}

// Handling success messages
if (isset($_SESSION['success'])) {
    $successMessage = $_SESSION['success'];
    unset($_SESSION['success']);
} else {
    $successMessage = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Gallery Photo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>

<body>
    <div class="h-screen flex justify-center items-center bg-[#2C3333]">
        <div class="h-[26em] w-[40em] p-4 rounded-lg">
            <h1 class="pb-2 font-medium text-center text-[#E7F6F2] text-[1.5rem]">Register</h1>
            <p class="pb-[2em] text-[#E7F6F2] text-center">Create your account</p>
            <form aria-required="true" action="register_process.php" method="post" class="text-[#E7F6F2]" autocomplete="off">
                <div class="grid grid-cols-2 gap-[1em] mb-[1em] text-[#E7F6F2] justify-center">
                    <input type="text" name="username" id="username" placeholder="Username" required
                        class="p-2 border-2 border-[#395B64] rounded-md w-[100%] h-[3.5em] bg-transparent text-[#E7F6F2] text-[0.875rem] outline-none focus:border-[#A5C9CA] transition duration-[0.1s]">
                    <input type="text" name="fullname" id="fullname" placeholder="Fullname" required
                        class="p-2 border-2 border-[#395B64] rounded-md w-[100%] h-[3.5em] bg-transparent text-[#E7F6F2] text-[0.875rem] outline-none focus:border-[#A5C9CA] transition duration-[0.1s]">
                    <input type="email" name="email" id="email" placeholder="Email" required
                        class="p-2 border-2 border-[#395B64] rounded-md w-[100%] h-[3.5em] bg-transparent text-[#E7F6F2] text-[0.875rem] outline-none focus:border-[#A5C9CA] transition duration-[0.1s]">
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="p-2 border-2 border-[#395B64] rounded-md w-[100%] h-[3.5em] bg-transparent text-[#E7F6F2] text-[0.875rem] outline-none focus:border-[#A5C9CA] transition duration-[0.1s]">
                </div>
                <input for="address" name="address" id="address" placeholder="Address" required
                    class="p-2 mb-[1em] border-2 border-[#395B64] rounded-md w-[100%] h-[3.5em] bg-transparent text-[#E7F6F2] text-[0.875rem] outline-none focus:border-[#A5C9CA] transition duration-[0.1s]">
                <?php if ($errorMessage != ""): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">
                            <?php echo $errorMessage; ?>
                        </span>
                    </div>
                <?php endif; ?>
                <?php if ($successMessage != ""): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">
                            <?php echo $successMessage; ?>
                        </span>
                    </div>
                <?php endif; ?>
                <button type="submit" class="p-2 border-2 w-[100%] border-[#A5C9CA] rounded-md text-[#A5C9CA] text-semibold hover:bg-[#A5C9CA]
                    hover:text-[#2C3333] transition duration-[0.2s]">Register</button>
            </form>
            <p class="pt-4 text-[0.875rem] text-center text-[#E7F6F2]">Already have an account? <a href="login.php"
                    class="text-blue-500 hover:underline">Login</a></p>
        </div>
    </div>
</body>

</html>