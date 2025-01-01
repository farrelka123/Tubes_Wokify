<?php
include '../../inc/koneksi.php';

$idloker = $_GET['idloker'];

$sql = mysqli_query($koneksi, "DELETE FROM lamaran WHERE idloker = '$idloker'");

if ($sql) {
	?>
	<script type="text/javascript">
		alert("DATA BERHASIL DIHAPUS");
		window.location = "lowongan_tabel.php";
	</script>
	<?php 
}

 ?>