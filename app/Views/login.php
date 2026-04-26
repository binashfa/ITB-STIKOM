<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login UI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex items-center justify-center bg-gradient-to-b from-blue-300 to-white relative overflow-hidden">

    <!-- BACKGROUND CLOUD EFFECT -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute w-96 h-96 bg-white rounded-full blur-3xl top-20 left-20"></div>
        <div class="absolute w-96 h-96 bg-white rounded-full blur-3xl bottom-10 right-20"></div>
    </div>

    <!-- LOGIN CARD -->
    <div class="relative backdrop-blur-xl bg-white/30 border border-white/40 
              shadow-2xl rounded-2xl p-8 w-[350px] text-center">

        <!-- ICON -->
        <div class="w-12 h-12 mx-auto mb-4 flex items-center justify-center 
                bg-white/50 rounded-xl shadow">
            🔑
        </div>

        <!-- TITLE -->
        <h2 class="text-xl font-semibold text-gray-800">
            Sign in with email
        </h2>

        <p class="text-sm text-gray-600 mt-1 mb-6">
            Make a new doc to bring your words, data, and teams together.
        </p>

        <!-- FORM -->
        <form action="/4dm1n" method="post" class="space-y-3">

            <!-- EMAIL -->
            <div class="relative">
                <input type="email" name="email" placeholder="Email"
                    class="w-full p-3 rounded-lg bg-white/60 border border-gray-200 
             focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
            </div>

            <!-- PASSWORD -->
            <div class="relative">
                <input type="password" name="password" placeholder="Password"
                    class="w-full p-3 rounded-lg bg-white/60 border border-gray-200 
             focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
            </div>

            <!-- FORGOT -->
            <div class="text-right text-xs text-gray-500">
                <a href="#">Forgot password?</a>
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-gray-900 to-gray-700 
           text-white py-2 rounded-lg mt-2 hover:opacity-90 transition">
                Get Started
            </button>

        </form>

    </div>

</body>

</html>