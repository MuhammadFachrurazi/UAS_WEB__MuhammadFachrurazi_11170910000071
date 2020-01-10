<?php
// Panggil koneksi database
require_once "../config/koneksi.php";

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	
	// perintah query untuk menghapus data pada tabel tahun_pelajaran
	$query = mysqli_query($koneksi, "DELETE FROM tahun_pelajaran WHERE id='$id'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: setting_tp.php?alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: setting_tp.php?alert=1');
	}	
}							
?>