<?php  
// Koneksi ke Database  
$host = 'localhost';  
$db = 'workify2';  
$user = 'root'; // ganti dengan username database Anda  
$pass = ''; // ganti dengan password database Anda  

try {  
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);  
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
} catch (PDOException $e) {  
    die("Connection failed: " . $e->getMessage());  
}  

// Ambil Data Pengguna  
$userId = isset($_GET['id']) ? intval($_GET['id']) : 1;  
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");  
$stmt->execute([$userId]);  
$user = $stmt->fetch();  

// Ambil Data Pendidikan  
$educationStmt = $pdo->prepare("SELECT * FROM education WHERE user_id = ?");  
$educationStmt->execute([$userId]);  
$educationList = $educationStmt->fetchAll();  

// Ambil Data Pengalaman Kerja  
$experienceStmt = $pdo->prepare("SELECT * FROM work_experience WHERE user_id = ?");  
$experienceStmt->execute([$userId]);  
$experienceList = $experienceStmt->fetchAll();  

// Ambil Data Files  
$fileStmt = $pdo->prepare("SELECT * FROM files WHERE user_id = ?");  
$fileStmt->execute([$userId]);  
$fileList = $fileStmt->fetchAll();

if (!$user) {  
    die("Pengguna tidak ditemukan.");  
}  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">  
    <title>Profil Pengguna</title>  
</head>  
<body class="bg-gray-100">  
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">  
        <h1 class="text-2xl font-bold text-center"><?= htmlspecialchars($user['nama_depan']) ?></h1>  
        <h2 class="text-lg text-center">Ubah data diri</h2>  

        <div class="mt-4">  
            <p><strong>WHATSAPP NUMBER:</strong> <?= htmlspecialchars($user['whatsapp']) ?></p>  
            <p><strong>EMAIL:</strong> <?= htmlspecialchars($user['email']) ?> (BELUM DIVERIFIKASI)</p>  
            <p><strong>LOKASI:</strong> <?= htmlspecialchars($user['lokasi']) ?></p>  
            <p><strong>USIA, JENIS KELAMIN:</strong> <!-- Tambahkan logika untuk usia dan jenis kelamin --> </p>  
            <p><strong>PENDIDIKAN TERAKHIR:</strong> <?= htmlspecialchars($user['pendidikan'] ?? 'Tidak Diketahui') ?></p>  
            <p><strong>PENGALAMAN KERJA:</strong> <?= count($experienceList) > 0 ? htmlspecialchars(count($experienceList)) : '-' ?></p>  
        </div>  

        <div class="mt-6">  
            <h3 class="text-lg font-bold">TENTANG SAYA</h3>  
            <p>Beritahu perusahaan apa yang membuatmu unggul untuk diperebutkan.</p>  
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">TAMBAHKAN DESKRIPSI TENTANG SAYA</button>  
        </div>  

        <div class="mt-6">  
            <h3 class="text-lg font-bold">PENGALAMAN KERJA</h3>  
            <p>Pastikan bagian ini terisi untuk meningkatkan peluang mendapatkan wawancara!</p>  
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">TAMBAHKAN PENGALAMAN KERJA</button>  
        </div>  

        <div class="mt-6">  
            <h3 class="text-lg font-bold">PENDIDIKAN</h3>  
            <?php foreach ($educationList as $education): ?>  
                <div class="flex justify-between items-center">  
                    <p><?= htmlspecialchars($education['institution']) ?> - <?= htmlspecialchars($education['degree']) ?></p>  
                    <div>  
                        <a href="#" class="text-blue-500 hover:underline">EDIT</a>  
                        <a href="#" class="text-red-500 hover:underline ml-2">HAPUS</a>  
                    </div>  
                </div>  
            <?php endforeach; ?>  
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">TAMBAHKAN PENDIDIKAN</button>  
        </div>  

        <div class="mt-6">  
            <h3 class="text-lg font-bold">RESUME</h3>  
            <p>Masukkan Resume/CV yang relevan dengan lowongan pekerjaan yang kamu lamar.</p>  
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">TAMBAHKAN RESUME</button>  
        </div>  

        <div class="mt-6">  
            <h3 class="text-lg font-bold">SERTIFIKAT</h3>  
            <p>Beritahu prestasimu dengan menambahkan sertifikat di sini.</p>  
            <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">TAMBAHKAN SERTIFIKAT</button>  
        </div>  
    </div>  
</body>  
</html>