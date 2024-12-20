<?php
include "dbconfig.php"; // Pastikan file konfigurasi database disertakan

// Periksa apakah ID telah dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus lowongan berdasarkan ID
    $query = "DELETE FROM lowongan WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "Lowongan berhasil dihapus!";
        // Redirect ke halaman tabel lowongan
        header("Location: lowongan_tabel.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID lowongan tidak ditemukan!";
}
?>