<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workify Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url("asset/img/background.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>

<header class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
        <div class="flex items-center space-x-4">
            <img src="asset/img/logo.png" alt="Workify Logo" class="h-10">
            <div>
                <h1 class="text-2xl font-extrabold text-white tracking-tight">WORKIFY</h1>
                <p class="text-sm text-blue-200">Find Your Dream Job</p>
            </div>
        </div>
        <nav class="hidden md:flex items-center space-x-6">
            <a href="daftar.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Daftar</a>
            <a href="perusahaan/daftar.php" class="font-bold text-white hover:text-yellow-300">Untuk Perusahaan</a>
        </nav>
    </div>
</header>

<div class="h-screen flex items-center justify-center">
    <main class="bg-blue-100 shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-blue-900 text-center mb-6">MASUK</h2>
        <form action="inc/proslog.php" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Masukkan e-mail"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Masukkan kata sandi"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <a href="lupa_sandi.php" class="text-blue-900 text-sm hover:underline mt-2 block text-right">Lupa kata sandi?</a>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700">MASUK</button>
        </form>
    </main>
</div>
</body>
</html>
