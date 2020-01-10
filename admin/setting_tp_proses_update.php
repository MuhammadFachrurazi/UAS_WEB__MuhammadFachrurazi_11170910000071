<?php
// Panggil koneksi database
require_once "../config/koneksi.php";

if (isset($_POST['update'])) {
	if (isset($_POST['id'])) {
		$id          = mysqli_real_escape_string($koneksi, trim($_POST['id']));
		$nama        = $_POST['nama'];
		$status		 = $_POST['status'];

		// perintah query untuk mengubah data pada tabel nis
		$query = mysqli_query($koneksi, " 
			UPDATE tahun_pelajaran 
			SET nama='$nama', status='$status' 
			WHERE id='$id'
		");

	// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: setting_tp.php?alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: setting_tp.php?alert=1');
		}	
	}
}					
?>