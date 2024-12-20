<?php 
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script>
        // Menampilkan alert saat logout
        alert("Anda telah logout.");
        // Redirect ke halaman login setelah alert
        window.location.href = "../login.php"; // Ganti dengan URL halaman login Anda
    </script>
</head>
<body>
</body>
</html>