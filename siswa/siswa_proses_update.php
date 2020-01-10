<?php
session_start();
// Panggil koneksi database
require_once "../config/koneksi.php";

if (isset($_SESSION['username'])) {
	$nis           = $_SESSION['username'];
	$tempat_lahir  = mysqli_real_escape_string($koneksi, trim($_POST['tempat_lahir']));

	$tanggal       = $_POST['tgl_lahir'];
	$tgl           = explode('-',$tanggal);
	$tgl_lahir 		= $tgl[2]."-".$tgl[1]."-".$tgl[0];

	$jenis_kelamin = $_POST['jenis_kelamin'];

	// perintah query untuk mengubah data pada tabel nis
	$query = mysqli_query($koneksi, " 
		UPDATE siswa 
		SET tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin' 
		WHERE nis='$nis'
	");

// cek query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil update data
		header('location: siswa.php?alert=3');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: siswa.php?alert=1');
	}	
}		
?>