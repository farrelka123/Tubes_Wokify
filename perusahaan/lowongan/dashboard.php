<?php
include "../../inc/koneksi.php";

// Mendapatkan tanggal saat ini
$currentDate = date("Y-m-d"); // Format YYYY-MM-DD

// Query untuk menghitung jumlah lowongan
$query = "SELECT COUNT(*) AS jumlah_lowongan FROM lamaran";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
$row = mysqli_fetch_assoc($result);
$jumlah_lowongan = $row['jumlah_lowongan'];

// Query untuk menghitung lowongan yang masih dibuka
$query_buka = "SELECT COUNT(*) AS jumlah_buka FROM lamaran WHERE status = 'dibuka'";
$result_buka = mysqli_query($koneksi, $query_buka);
if (!$result_buka) {
    die("Query gagal: " . mysqli_error($koneksi));
}
$row_buka = mysqli_fetch_assoc($result_buka);
$jumlah_buka = $row_buka['jumlah_buka'];

// Query untuk menghitung lowongan yang sudah ditutup
$query_tutup = "SELECT COUNT(*) AS jumlah_tutup FROM lamaran WHERE status = 'ditutup'";
$result_tutup = mysqli_query($koneksi, $query_tutup);
if (!$result_tutup) {
    die("Query gagal: " . mysqli_error($koneksi));
}
$row_tutup = mysqli_fetch_assoc($result_tutup);
$jumlah_tutup = $row_tutup['jumlah_tutup'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workify - Dasbor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    
<header class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
        <!-- Logo -->
        <div class="flex items-left space-x-4">
            <img src="../../asset/img/logo.png" alt="Workify Logo" class="h-10">
            <div>
                <h1 class="text-2xl font-extrabold text-white tracking-tight">WORKIFY</h1>
                <p class="text-sm text-blue-200">Find Your Dream Job</p>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="hidden md:flex items-center space-x-6">
            

            <!-- Action Buttons -->
            <div class="flex items-center space-x-4">
                <!-- Notification Icon -->
                <a href="notif.html" class="hover:scale-110 transition">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.193-.538 1.193H5.538c-.538 0-.538-.6-.538-1.193 0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365Z" />
                    </svg>
                </a>
                <!-- Chat Icon -->
                <a href="chat.html" class="hover:scale-110 transition">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                    </svg>
                </a>

                <div class="relative">
                    <!-- Profile Button with Elongated Border -->
                    <button id="profile-toggle" class="flex items-center space-x-3 focus:outline-none px-4 py-2 rounded-full border-2 border-blue-600">
                        <!-- Avatar -->
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center shadow-md">
                            <img src="../../asset/img/lisa.jpg" alt="Profile" class="w-10 h-10 rounded-full border-2 border-white">
                        </div>
                        <?php
                            session_start();
                            $id_akun = $_SESSION['id_akun']; 
                            include '../../inc/koneksi.php';
                            $sql = mysqli_query($koneksi, "SELECT nama FROM akun WHERE id_akun = '$id_akun'");
                            $data = mysqli_fetch_array($sql);
                            ?>
                            <span class="text-lg font-semibold text-white flex items-center space-x-1">
                                <span><?php echo htmlspecialchars($data['nama']); ?></span>
                            </span>

                            <svg id="dropdown-icon" class="w-4 h-4 text-white transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l7-7 7 7" />
                            </svg>
                        </span>
                    </button>
                
  
                    <div id="profile-dropdown" class="hidden absolute right-0 mt-3 w-56 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 transition-all duration-200">
                        <div class="flex flex-col">
                            <a href="profilsaya.html" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gradient-to-r from-blue-500 to-blue-400 hover:text-white transition">
                                <i class="fas fa-user mr-3 text-blue-500 group-hover:text-white"></i> Profil Saya
                            </a>
                            <a href="../../inc/logout.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-500 hover:text-white transition">
                                <i class="fas fa-power-off mr-3 text-red-500 group-hover:text-white"></i> Keluar
                            </a>
                        </div>
                    </div>
                </div>  
        </nav>
</header>
<script>
document.getElementById('profile-toggle').addEventListener('click', function (event) {
    const dropdown = document.getElementById('profile-dropdown');
    dropdown.classList.toggle('hidden');
    event.stopPropagation();
});
const icon = document.getElementById('dropdown-icon');
icon.addEventListener('click', function () {
    icon.classList.toggle('rotate-180');
});
</script>


<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-1/4 bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg text-white p-5">
        <nav>
            <ul class="space-y-4">
                <li><a href="dashboard.php" class="block hover:text-gray-200">Beranda</a></li>
                <li><a href="lowongan_tabel.php" class="block hover:text-gray-200">Lowongan</a></li>
                <li><a href="#" class="block hover:text-gray-200">Syarat & Kebijakan</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="w-3/4 p-8">
        <header class="mb-8">
            <h3 class="text-2xl font-semibold">Beranda Lowongan</h3>
        </header>

        <!-- Statistik Lowongan -->
        <section class="grid grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 shadow rounded flex flex-col items-center">
                <h5 class="text-lg font-semibold text-gray-800">Total Lowongan</h5>
                <p class="text-2xl font-bold text-blue-500"><?= $jumlah_lowongan; ?></p>
            </div>
            <div class="bg-white p-6 shadow rounded flex flex-col items-center">
                <h5 class="text-lg font-semibold text-gray-800">Lowongan Dibuka</h5>
                <p class="text-2xl font-bold text-green-500"><?= $jumlah_buka; ?></p>
            </div>
            <div class="bg-white p-6 shadow rounded flex flex-col items-center">
                <h5 class="text-lg font-semibold text-gray-800">Lowongan Ditutup</h5>
                <p class="text-2xl font-bold text-red-500"><?= $jumlah_tutup; ?></p>
            </div>
        </section>

        <!-- Buat Lowongan Baru -->
    </main>
</div>
</body>
</html>
