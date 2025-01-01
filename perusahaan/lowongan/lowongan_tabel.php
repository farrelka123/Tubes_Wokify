<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workify - Daftar Lowongan</title>
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
    <aside class="w-1/4 bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg text-white p-5">
        <nav>
            <ul class="space-y-4">
                <li><a href="dashboard.php" class="block hover:text-gray-200">Beranda</a></li>
                <li><a href="lowongan_tabel.php" class="block hover:text-gray-200">Lowongan</a></li>
                <li><a href="#" class="block hover:text-gray-200">Syarat & Kebijakan</a></li>
            </ul>
        </nav>
    </aside>

    <main class="w-3/4 p-8 overflow-x-auto">
        <header class="mb-8">
            <h3 class="text-2xl font-semibold">Daftar Lowongan</h3>
            <p class="text-gray-600">Berikut adalah daftar lowongan pekerjaan yang telah dibuat.</p>
        </header>
        <section class="bg-blue-500 text-white p-6 rounded">
            <h4 class="text-xl font-semibold mb-2">Saatnya Posting Lowongan anda</h4>
            <p class="mb-4">WORKIFY akan membantu Anda mendapatkan kandidat terbaik sesuai kriteria.</p>
            <a href="buatlowongan.php">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded shadow">
                    + Buat Lowongan Baru
                </button>
            </a>
        </section>
        <section class="bg-white shadow rounded p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse table-auto text-sm text-gray-700">
                    <thead class="bg-gray-200 text-gray-700 uppercase text-xs font-semibold">
                        <tr>
                            <th class="border px-4 py-2 text-center">Nama pekerjaan</th>
                            <th class="border px-4 py-2 text-center">Posisi</th>
                            <th class="border px-4 py-2 text-center">Tanggal Buka</th>
                            <th class="border px-4 py-2 text-center">Tanggal Tutup</th>
                            <th class="border px-4 py-2 text-center">Alamat Perusahaan</th>
                            <th class="border px-4 py-2 text-center">Gaji</th>
                            <th class="border px-4 py-2 text-center">Jenis Kelamin</th>
                            <th class="border px-4 py-2 text-center">Umur</th>
                            <th class="border px-4 py-2 text-center">Tingkat Pendidikan</th>
                            <th class="border px-4 py-2 text-center">Pengalaman Kerja</th>
                            <th class="border px-4 py-2 text-center">Deskripsi Pekerjaan</th>
                            <th class="border px-4 py-2 text-center">Status</th>
                            <th class="border px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include "../../inc/koneksi.php";
                        $data = mysqli_query($koneksi, "SELECT * FROM lamaran");
                        while ($d = mysqli_fetch_array($data)) {
                            $statusClass = ($d['status'] === 'dibuka') ? 'bg-green-500' : 'bg-red-500';
                    ?>
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2 text-center"><?php echo $d['nama_pekerjaan']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $d['posisi']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $d['tglbuka']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $d['tglttp']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $d['almtperusahaan']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo "Rp " . number_format($d['gaji'], 0, ',', '.'); ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $d['jenis_kelamin']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $d['umur']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $d['tingkat_pendidikan']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $d['pengalaman_kerja']; ?></td>
                        <td class="border px-4 py-2 text-center"><?php echo $d['deskripsi_pekerjaan']; ?></td>
                        <td class="border px-4 py-2 text-center">
                            <span class="px-2 py-1 rounded-full text-white <?php echo $statusClass; ?>">
                                <?php echo $d['status']; ?>
                            </span>
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="edit.php?idloker=<?php echo $d[0]; ?>" 
                                class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                                Edit
                                </a>
                                <a href="delete.php?idloker=<?php echo $d[0]; ?>" 
                                class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?');">
                                Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

</body>
</html>
