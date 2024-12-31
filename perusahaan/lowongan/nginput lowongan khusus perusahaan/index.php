<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'workify');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $conn->query("DELETE FROM applications WHERE id = $delete_id");
    header('Location: index.php');
    exit;
}

// Fetch all applications
$result = $conn->query("SELECT * FROM applications ORDER BY submission_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Lamaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-xl font-bold text-center">Dashboard Lamaran</h1>
    </header>

    <main class="max-w-5xl mx-auto mt-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold">Daftar Lamaran</h2>
            <a href="submit.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-500">Tambah Lamaran Baru</a>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <?php if ($result->num_rows > 0): ?>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2">No</th>
                            <th class="p-2">Judul Pekerjaan</th>
                            <th class="p-2">Nama Perusahaan</th>
                            <th class="p-2">Tanggal Kirim</th>
                            <th class="p-2">Status</th>
                            <th class="p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while ($row = $result->fetch_assoc()) { ?>
                            <tr class="border-b">
                                <td class="p-2"><?php echo $i++; ?></td>
                                <td class="p-2"><?php echo $row['job_title']; ?></td>
                                <td class="p-2"><?php echo $row['company_name']; ?></td>
                                <td class="p-2"><?php echo date('Y-m-d H:i', strtotime($row['submission_date'])); ?></td>
                                <td class="p-2"><?php echo $row['status']; ?></td>
                                <td class="p-2">
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-blue-600 hover:underline">Edit</a> |
                                    <a href="?delete_id=<?php echo $row['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-gray-600">Tidak ada lamaran ditemukan.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
