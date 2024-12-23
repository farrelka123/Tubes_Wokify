<?php  
// Koneksi ke database  
$host = 'localhost'; // Ganti dengan host database Anda jika berbeda  
$dbname = 'workify'; // Ganti dengan nama database yang telah Anda buat  
$username = 'root'; // Ganti dengan username database Anda  
$password = ''; // Ganti dengan password database Anda (kosongkan jika menggunakan XAMPP default)  

try {  
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);  
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
} catch (PDOException $e) {  
    die("Koneksi gagal: " . $e->getMessage());  
}  

// Ambil data pengguna pertama  
$stmt = $pdo->query("SELECT * FROM users LIMIT 1");  
$user = $stmt->fetch(PDO::FETCH_ASSOC);  

// Simpan data jika ada form yang di-submit  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $whatsapp = $_POST['whatsapp'];  
    $email = $_POST['email'];  
    $lokasi = $_POST['lokasi'];  
    $tentang_saya = $_POST['tentang_saya'];  
    $pengalaman_kerja = $_POST['pengalaman_kerja'];  
    $pendidikan = $_POST['pendidikan'];  

    // Default paths for resume and certificate  
    $resumePath = $user['resume'];   
    $sertifikatPath = $user['sertifikat'];   

    // Upload resume  
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {  
        $resumeFile = $_FILES['resume'];  
        $resumePath = 'uploads/resume_' . time() . '_' . basename($resumeFile['name']);   
        move_uploaded_file($resumeFile['tmp_name'], $resumePath);   
    }  

    // Upload sertifikat  
    if (isset($_FILES['sertifikat']) && $_FILES['sertifikat']['error'] == 0) {  
        $sertifikatFile = $_FILES['sertifikat'];  
        $sertifikatPath = 'uploads/sertifikat_' . time() . '_' . basename($sertifikatFile['name']);   
        move_uploaded_file($sertifikatFile['tmp_name'], $sertifikatPath);   
    }  

    // Query untuk memperbarui data  
    $stmt = $pdo->prepare("UPDATE users SET whatsapp = ?, email = ?, lokasi = ?, tentang_saya = ?, pengalaman_kerja = ?, pendidikan = ?, resume = ?, sertifikat = ? WHERE id = ?");  
    $stmt->execute([$whatsapp, $email, $lokasi, $tentang_saya, $pengalaman_kerja, $pendidikan, $resumePath, $sertifikatPath, $user['id']]);  

    header("Location: index.php"); // Redirect kembali ke index setelah menyimpan  
    exit();  
}  
?>  

<!DOCTYPE html>  
<html lang="id">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">  
    <title>Ubah Data Diri</title>  
</head>  
<body class="bg-gray-100">  
    <div class="container mx-auto mt-10 bg-white rounded-lg shadow-lg p-5">  
        <h1 class="text-2xl font-semibold mb-4">Profil Pengguna</h1>  
        <p class="text-gray-600 mb-2">Ubah data diri</p>  
        <div class="flex items-center mb-4">  
            <img src="path/to/photo.jpg" alt="Foto Profil" class="w-24 h-24 rounded-full mr-4">  
            <div>  
                <?php if ($user): ?>  
                    <p><strong>WA:</strong> <?= htmlspecialchars($user['whatsapp']) ?></p>  
                    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>  
                    <p><strong>Lokasi:</strong> <?= htmlspecialchars($user['lokasi']) ?></p>  
                    <p><strong>Pendidikan Terakhir:</strong> <?= htmlspecialchars($user['pendidikan']) ?></p>  
                    <p><strong>Tentang Saya:</strong> <?= htmlspecialchars($user['tentang_saya']) ?></p>  
                    <p><strong>Pengalaman Kerja:</strong> <?= htmlspecialchars($user['pengalaman_kerja']) ?></p>  
                    <p><strong>Resume:</strong> <a href="<?= htmlspecialchars($user['resume']) ?>" class="text-blue-500" target="_blank">Lihat Resume</a></p>  
                    <p><strong>Sertifikat:</strong> <a href="<?= htmlspecialchars($user['sertifikat']) ?>" class="text-blue-500" target="_blank">Lihat Sertifikat</a></p>  
                <?php else: ?>  
                    <p>Data pengguna tidak ditemukan.</p>  
                <?php endif; ?>  
            </div>  
        </div>  

        <!-- Form untuk mengubah data diri dan mengunggah file -->  
        <form action="" method="POST" enctype="multipart/form-data">  
            <input type="text" name="whatsapp" value="<?= htmlspecialchars($user['whatsapp'] ?? '') ?>" placeholder="Nomor WhatsApp" class="border rounded p-2 mt-2 w-full" required>  
            <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" placeholder="Email" class="border rounded p-2 mt-2 w-full" required>  
            <input type="text" name="lokasi" value="<?= htmlspecialchars($user['lokasi'] ?? '') ?>" placeholder="Lokasi" class="border rounded p-2 mt-2 w-full" required>  

            <textarea name="tentang_saya" placeholder="Tentang Saya" class="border rounded p-2 mt-2 w-full" rows="3"><?= htmlspecialchars($user['tentang_saya'] ?? '') ?></textarea>  
            <textarea name="pengalaman_kerja" placeholder="Pengalaman Kerja" class="border rounded p-2 mt-2 w-full" rows="3"><?= htmlspecialchars($user['pengalaman_kerja'] ?? '') ?></textarea>  
            <textarea name="pendidikan" placeholder="Pendidikan" class="border rounded p-2 mt-2 w-full" rows="3"><?= htmlspecialchars($user['pendidikan'] ?? '') ?></textarea>  

            <div class="mt-3">  
                <label class="block mb-1">Upload Resume:</label>  
                <input type="file" name="resume" accept=".pdf,.doc,.docx" class="border rounded p-2">  
            </div>  
            <div class="mt-3">  
                <label class="block mb-1">Upload Sertifikat:</label>  
                <input type="file" name="sertifikat" accept=".pdf,.doc,.docx" class="border rounded p-2">  
            </div>  

            <button type="submit" class="mt-3 bg-green-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>  
        </form>  
    </div>  
</body>  
</html>