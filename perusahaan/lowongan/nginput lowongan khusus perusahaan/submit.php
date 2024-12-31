<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'workify');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_title = $_POST['job_title'];
    $company_name = $_POST['company_name'];
    $status = $_POST['status'];
    $submission_date = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("INSERT INTO applications (job_title, company_name, submission_date, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $job_title, $company_name, $submission_date, $status);
    $stmt->execute();
    $stmt->close();

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lamaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-xl font-bold text-center">Tambah Lamaran Baru</h1>
    </header>

    <main class="max-w-md mx-auto mt-6 bg-white p-6 rounded-lg shadow-md">
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="job_title" class="block text-gray-700 font-medium">Judul Pekerjaan</label>
                <input type="text" id="job_title" name="job_title" required class="w-full border border-gray-300 p-2 rounded mt-1">
            </div>
            <div>
                <label for="company_name" class="block text-gray-700 font-medium">Nama Perusahaan</label>
                <input type="text" id="company_name" name="company_name" required class="w-full border border-gray-300 p-2 rounded mt-1">
            </div>
            <div>
                <label for="status" class="block text-gray-700 font-medium">Status</label>
                <select id="status" name="status" required class="w-full border border-gray-300 p-2 rounded mt-1">
                    <option value="Dilamar">Dilamar</option>
                    <option value="Dalam Review">Dalam Review</option>
                    <option value="Wawancara">Wawancara</option>
                    <option value="Direkrut">Direkrut</option>
                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-500">
                Kirim Lamaran
            </button>
        </form>
    </main>
</body>
</html>
