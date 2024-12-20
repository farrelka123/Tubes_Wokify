<?php
include "dbconfig.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $posisi = $_POST['posisi'];
    $tanggal_buka = $_POST['tanggal_buka'];
    $tanggal_tutup = $_POST['tanggal_tutup'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $gaji = $_POST['gaji'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $tingkat_pendidikan = $_POST['tingkat_pendidikan'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];
    $deskripsi_pekerjaan = $_POST['deskripsi_pekerjaan'];

    $query = "INSERT INTO lowongan (posisi, tanggal_buka, tanggal_tutup, alamat_perusahaan, gaji, jenis_kelamin, umur, tingkat_pendidikan, pengalaman_kerja, deskripsi_pekerjaan) 
              VALUES ('$posisi', '$tanggal_buka', '$tanggal_tutup', '$alamat_perusahaan', $gaji, '$jenis_kelamin', '$umur', '$tingkat_pendidikan', '$pengalaman_kerja', '$deskripsi_pekerjaan')";

    if (mysqli_query($conn, $query)) {
        echo "Lowongan berhasil disimpan.";
        header("Location: lowongan_tabel.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>