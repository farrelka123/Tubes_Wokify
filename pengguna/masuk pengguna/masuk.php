<?php

$host = "localhost"; 
$user = "root";      
$pass = "";          
$db = "workify";     

$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses login
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi input
    if (!empty($email) && !empty($password)) {
      
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Login berhasil, buat sesi
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $email;

                // Redirect ke halaman beranda
                header("Location: beranda.php");
                exit();
            } else {
                $error = "Kata sandi salah.";
            }
        } else {
            $error = "Akun tidak ditemukan.";
        }
        $stmt->close();
    } else {
        $error = "Harap isi email dan kata sandi.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workify Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url("../asset/img/background.png");
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
            <img src="../asset/img/logo.png" alt="Workify Logo" class="h-10">
            <div>
                <h1 class="text-2xl font-extrabold text-white tracking-tight">WORKIFY</h1>
                <p class="text-sm text-blue-200">Find Your Dream Job</p>
            </div>
        </div>
        <nav class="hidden md:flex items-center space-x-6">
            <a href="daftar.html" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Daftar</a>
            <a href="../perusahaan/daftar.html" class="font-bold text-white hover:text-yellow-300">Untuk Perusahaan</a>
        </nav>
    </div>
</header>

<div class="h-screen flex items-center justify-center">
    <main class="bg-blue-100 shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-blue-900 text-center mb-6">MASUK</h2>
        <?php if (!empty($error)): ?>
            <p class="text-red-500 text-center mb-4"><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Masukkan e-mail"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Masukkan kata sandi"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700">MASUK</button>
        </form>
        <div class="flex items-center my-6">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="px-4 text-gray-500 text-sm">atau masuk dengan</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>
        <div class="flex justify-center space-x-4 mt-4">
            <button class="bg-white shadow-md rounded-full p-2 hover:shadow-lg">
                <img src="../asset/img/google.png" alt="Google" class="h-6">
            </button>
            <button class="bg-white shadow-md rounded-full p-2 hover:shadow-lg">
                <img src="/asset/img/facebook.png" alt="Facebook" class="h-6">
            </button>
            <button class="bg-white shadow-md rounded-full p-2 hover:shadow-lg">
                <img src="/asset/img/twitter.png" alt="Twitter" class="h-6">
            </button>
        </div>
        <p class="text-center text-sm text-gray-600 mt-6">Belum punya akun? <a href="daftar.html" class="text-blue-600 hover:underline">Daftar di sini</a></p>
    </main>
</div>

<footer class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 text-white py-6 mt-auto">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 WORKIFY. All Rights Reserved.</p>
    </div>
</footer>
</body>
</html>
