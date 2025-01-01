<?php
include "../../inc/koneksi.php";

// Ambil ID lamaran dari URL
if (isset($_GET['idloker'])) {
    $idloker = $_GET['idloker'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = "SELECT * FROM lamaran WHERE idloker = ?";
    if ($stmt = mysqli_prepare($koneksi, $query)) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, "i", $idloker);
        
        // Eksekusi dan ambil hasil
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $lamaran = mysqli_fetch_assoc($result);
        
        // Tutup statement
        mysqli_stmt_close($stmt);
    }
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan sanitasi input
    $nama_pekerjaan = mysqli_real_escape_string($koneksi, $_POST['nama_pekerjaan']);
    $posisi = mysqli_real_escape_string($koneksi, $_POST['posisi']);
    $tglbuka = mysqli_real_escape_string($koneksi, $_POST['tglbuka']);
    $tglttp = mysqli_real_escape_string($koneksi, $_POST['tglttp']);
    $almtperusahaan = mysqli_real_escape_string($koneksi, $_POST['almtperusahaan']);
    $gaji = mysqli_real_escape_string($koneksi, $_POST['gaji']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $umur = mysqli_real_escape_string($koneksi, $_POST['umur']);
    $tingkat_pendidikan = mysqli_real_escape_string($koneksi, $_POST['tingkat_pendidikan']);
    $pengalaman_kerja = mysqli_real_escape_string($koneksi, $_POST['pengalaman_kerja']);
    $deskripsi_pekerjaan = mysqli_real_escape_string($koneksi, $_POST['deskripsi_pekerjaan']);

    // Query untuk update data menggunakan prepared statement
    $query_update = "UPDATE lamaran 
                     SET
                         nama_pekerjaan = ?, 
                         posisi = ?, 
                         tglbuka = ?, 
                         tglttp = ?, 
                         almtperusahaan = ?, 
                         gaji = ?, 
                         status = ?,
                         jenis_kelamin = ?,
                         umur = ?,
                         tingkat_pendidikan = ?,
                         pengalaman_kerja = ?,
                         deskripsi_pekerjaan = ?
                     WHERE idloker = ?";

    if ($stmt = mysqli_prepare($koneksi, $query_update)) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, "sssssdssssssi", $nama_pekerjaan, $posisi, $tglbuka, $tglttp, $almtperusahaan, $gaji, $status, $jenis_kelamin, $umur, $tingkat_pendidikan, $pengalaman_kerja, $deskripsi_pekerjaan, $idloker);

        // Eksekusi query
        if (mysqli_stmt_execute($stmt)) {
            header("Location: lowongan_tabel.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lowongan</title>
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
        <aside class="w-1/4 bg-blue-500 text-white p-5">
            <h2 class="text-2xl font-bold mb-6">WORKIFY</h2>
            <nav>
                <ul class="space-y-4">
                    <li><a href="dashboard.php" class="block hover:text-gray-200">Beranda</a></li>
                    <li><a href="lowongan_tabel.php" class="block hover:text-gray-200">Lowongan</a></li>
                    <li><a href="#" class="block hover:text-gray-200">Pengaturan Akun</a></li>
                    <li><a href="#" class="block hover:text-gray-200">Syarat & Kebijakan</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Konten Utama -->
        <main class="w-3/4 p-8">
            <header class="mb-8">
                <h3 class="text-2xl font-semibold">Edit Lowongan</h3>
                <p class="text-gray-600">Perbarui informasi lamaran di bawah ini.</p>
            </header>

            <form action="edit.php?idloker=<?php echo $idloker; ?>" method="POST" class="bg-white shadow rounded p-6 space-y-4">
                <div>
                    <label class="block font-medium text-gray-700">Nama Pekerjaan</label>
                    <input type="text" name="nama_pekerjaan" value="<?php echo htmlspecialchars($lamaran['nama_pekerjaan']); ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Posisi</label>
                    <input type="text" name="posisi" value="<?php echo htmlspecialchars($lamaran['posisi']); ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Tanggal Buka</label>
                    <input type="date" name="tglbuka" value="<?php echo htmlspecialchars($lamaran['tglbuka']); ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Tanggal Tutup</label>
                    <input type="date" name="tglttp" value="<?php echo htmlspecialchars($lamaran['tglttp']); ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Alamat Perusahaan</label>
                    <input type="text" name="almtperusahaan" value="<?php echo htmlspecialchars($lamaran['almtperusahaan']); ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Gaji</label>
                    <input type="number" name="gaji" value="<?php echo htmlspecialchars($lamaran['gaji']); ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="Pria & Wanita" <?php echo ($lamaran['jenis_kelamin'] == 'Pria & Wanita') ? 'selected' : ''; ?>>Pria & Wanita</option>
                        <option value="Pria" <?php echo ($lamaran['jenis_kelamin'] == 'Pria') ? 'selected' : ''; ?>>Pria</option>
                        <option value="Wanita" <?php echo ($lamaran['jenis_kelamin'] == 'Wanita') ? 'selected' : ''; ?>>Wanita</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Umur</label>
                    <input type="text" name="umur" value="<?php echo htmlspecialchars($lamaran['umur']); ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Tingkat Pendidikan</label>
                    <input type="text" name="tingkat_pendidikan" value="<?php echo htmlspecialchars($lamaran['tingkat_pendidikan']); ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Pengalaman Kerja</label>
                    <input type="text" name="pengalaman_kerja" value="<?php echo htmlspecialchars($lamaran['pengalaman_kerja']); ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Deskripsi Pekerjaan</label>
                    <textarea name="deskripsi_pekerjaan" class="w-full border border-gray-300 rounded px-3 py-2" rows="4"><?php echo htmlspecialchars($lamaran['deskripsi_pekerjaan']); ?></textarea>
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="dibuka" <?php echo ($lamaran['status'] == 'dibuka') ? 'selected' : ''; ?>>dibuka</option>
                        <option value="ditutup" <?php echo ($lamaran['status'] == 'ditutup') ? 'selected' : ''; ?>>ditutup</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan Perubahan</button>
            </form>
        </main>
    </div>
</body>
</html>
