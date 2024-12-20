<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workify Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url("asset/img/background.png"); /* Ganti dengan path gambar Anda */
            background-size: cover; /* Sesuaikan ukuran gambar agar menutupi seluruh latar */
            background-position: center; /* Posisikan gambar di tengah */
            background-repeat: no-repeat; /* Hindari pengulangan gambar */
        }
    </style>
</head>
<body>

<!-- Header -->

<header class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <img src="asset/img/logo.png" alt="Workify Logo" class="h-10">
                <div>
                    <h1 class="text-2xl font-extrabold text-white tracking-tight">WORKIFY</h1>
                    <p class="text-sm text-blue-200">Find Your Dream Job</p>
                </div>
            </div>
    
            <!-- Navigation Menu -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="daftar.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Daftar</a>
                
            </nav>
</header>
    


<!-- Container utama untuk memusatkan konten -->
<div class="h-screen flex items-center justify-center">
    <main class="bg-blue-100 shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-blue-900 text-center mb-6">MASUK</h2>

        <form action="inc/proslog.php" method="POST" class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Masukkan password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <button type="button" class="absolute inset-y-0 right-3 flex items-center focus:outline-none" onclick="togglePassword()">
                        <svg id="eye-icon-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eye-icon-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18M10.477 10.477a3 3 0 014.243 4.243m2.83-2.83a7.5 7.5 0 01-10.606 0m14.264.707a9.961 9.961 0 01-4.172 3.555m-2.683 1.341A9.962 9.962 0 013.786 8.209m4.172-3.555A9.962 9.962 0 0112 4.5c1.116 0 2.194.186 3.214.528" />
                        </svg>
                    </button>
                </div>
                <a href="lupa_sandi.html" class="text-blue-900 text-sm hover:underline mt-2 block text-right">Lupa kata sandi?</a>
            </div>
            <button name="login" type="submit"  class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700">MASUK</button>
        </form>
        
        <div class="flex items-center my-6">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="px-4 text-gray-500 text-sm">atau masuk dengan</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>
        
        <div class="flex justify-center space-x ```php
        <div class="flex justify-center space-x-4 mt-4">
            <button class="bg-white shadow-md rounded-full p-2 hover:shadow-lg">
                <img src="asset/img/google.png" alt="Google" class="h-6">
            </button>
            <button class="bg-white shadow-md rounded-full p-2 hover:shadow-lg">
                <img src="asset/img/facebook.png" alt="Facebook" class="h-6">
            </button>
            <button class="bg-white shadow-md rounded-full p-2 hover:shadow-lg">
                <img src="asset/img/twitter.png" alt="Twitter" class="h-6">
            </button>
        </div> <br>

        <p class="text-center text-sm text-gray-600">Belum punya akun? <a href="daftar.php" class="text-blue-600 hover:underline"> Daftar di sini</a></p>
    </main>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIconOpen = document.getElementById('eye-icon-open');
        const eyeIconClosed = document.getElementById('eye-icon-closed');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIconOpen.classList.add('hidden');
            eyeIconClosed.classList.remove('hidden');
        } else {
            passwordInput.type = 'password';
            eyeIconOpen.classList.remove('hidden');
            eyeIconClosed.classList.add('hidden');
        }
    }
</script>

</body>
</html>