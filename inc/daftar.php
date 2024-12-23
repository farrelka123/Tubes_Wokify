<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workify Daftar</title>
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
    <?php 
    // Koneksi ke database
    $host = "localhost"; // Ganti dengan host database Anda
    $user = "root";      // Ganti dengan username database Anda
    $pass = "";          // Ganti dengan password database Anda
    $db = "workify";     // Ganti dengan nama database Anda

    $conn = new mysqli($host, $user, $pass, $db);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Proses data saat formulir dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validasi input
        if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Simpan data ke database
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($stmt->execute()) {
                // Redirect ke halaman login
                header("Location: masuk.php");
                exit();
            } else {
                $error = "Gagal mendaftar. Coba lagi.";
            }
            $stmt->close();
        } else {
            $error = "Input tidak valid. Harap isi semua data dengan benar.";
        }
    }
    $conn->close();
    ?>
    <header class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg">
        <!-- Header code tetap sama -->
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <div class="flex items-center space-x-4">
                <img src="../asset/img/logo.png" alt="Workify Logo" class="h-10">
                <div>
                    <h1 class="text-2xl font-extrabold text-white tracking-tight">WORKIFY</h1>
                    <p class="text-sm text-blue-200">Find Your Dream Job</p>
                </div>
            </div>
        </div>
    </header>
    <div class="h-screen flex items-center justify-center">
        <main class="bg-blue-100 shadow-lg rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-blue-900 text-center mb-6">DAFTAR</h2>
            <?php if (isset($error)) : ?>
                <p class="text-red-500 text-center mb-4"><?= htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form action="" method="POST" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
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
                <button type="submit"
                        class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700">DAFTAR
                </button>
            </form>
            <p class="text-center text-sm text-gray-600 mt-6">Sudah punya akun?
                <a href="masuk.php" class="text-blue-600 hover:underline">Masuk di sini</a>
            </p>
        </main>
    </div>
</body>
</html>
