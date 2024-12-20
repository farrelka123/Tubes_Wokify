<?php
include "dbconfig.php";

// Ambil ID lowongan dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = "SELECT * FROM lowongan WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $lowongan = mysqli_fetch_assoc($result);
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $posisi = $_POST['posisi'];
    $tanggal_buka = $_POST['tanggal_buka'];
    $tanggal_tutup = $_POST['tanggal_tutup'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $gaji = $_POST['gaji'];
    $status = $_POST['status'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $tingkat_pendidikan = $_POST['tingkat_pendidikan'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];
    $deskripsi_pekerjaan = $_POST['deskripsi_pekerjaan'];

    // Query untuk update data
    $query_update = "UPDATE lowongan 
                     SET posisi = '$posisi', 
                         tanggal_buka = '$tanggal_buka', 
                         tanggal_tutup = '$tanggal_tutup', 
                         alamat_perusahaan = '$alamat_perusahaan', 
                         gaji = $gaji, 
                         status = '$status',
                         jenis_kelamin = '$jenis_kelamin',
                         umur = '$umur',
                         tingkat_pendidikan = '$tingkat_pendidikan',
                         pengalaman_kerja = '$pengalaman_kerja',
                         deskripsi_pekerjaan = '$deskripsi_pekerjaan'
                     WHERE id = $id";

    if (mysqli_query($conn, $query_update)) {
        header("Location: lowongan_tabel.php");
        exit();
    } else {
        echo "Error: " . $query_update . "<br>" . mysqli_error($conn);
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
                <p class="text-gray-600">Perbarui informasi lowongan di bawah ini.</p>
            </header>

            <form action="edit.php?id=<?php echo $id; ?>" method="POST" class="bg-white shadow rounded p-6 space-y-4">
                <div>
                    <label class="block font-medium text-gray-700">Posisi</label>
                    <input type="text" name="posisi" value="<?php echo $lowongan['posisi']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Tanggal Buka</label>
                    <input type="date" name="tanggal_buka" value="<?php echo $lowongan['tanggal_buka']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Tanggal Tutup</label>
                    <input type="date" name="tanggal_tutup" value="<?php echo $lowongan['tanggal_tutup']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Alamat Perusahaan</label>
                    <input type="text" name="alamat_perusahaan" value="<?php echo $lowongan['alamat_perusahaan']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Gaji</label>
                    <input type="number" name="gaji" value="<?php echo $lowongan['gaji']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="Pria & Wanita" <?php echo ($lowongan['jenis_kelamin'] == 'Pria & Wanita') ? 'selected' : ''; ?>>Pria & Wanita</option>
                        <option value="Pria" <?php echo ($lowongan['jenis_kelamin'] == 'Pria') ? 'selected' : ''; ?>>Pria</option>
                        <option value="Wanita" <?php echo ($lowongan['jenis_kelamin'] == 'Wanita') ? 'selected' : ''; ?>>Wanita</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Umur</label>
                    <input type="text" name="umur" value="<?php echo $lowongan['umur']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Tingkat Pendidikan</label>
                    <input type="text" name="tingkat_pendidikan" value="<?php echo $lowongan['tingkat_pendidikan']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Pengalaman Kerja</label>
                    <input type="text" name="pengalaman_kerja" value="<?php echo $lowongan['pengalaman_kerja']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Deskripsi Pekerjaan</label>
                    <textarea name="deskripsi_pekerjaan" class="w-full border border-gray-300 rounded px-3 py-2" rows="4"><?php echo $lowongan['deskripsi_pekerjaan']; ?></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan Perubahan</button>
            </form>
        </main>
    </div>
</body>
</html>