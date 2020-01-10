<?php
   include "../config/koneksi.php";
   include "../config/cek_siswa.php";
 	include "../theme/header.php";
 	include "../theme/sidebar-siswa.php";
	
	$nis = $_SESSION["username"];
	$siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
	$data = mysqli_fetch_array($siswa);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header"><h1>Dashboard</h1></section>

   <!-- Main content -->
   <section class="content container-fluid">
      <div class="box">
         <!-- /.box-header -->
         <div class="box-header">
			<h3 class="box-title"><strong><?php echo $data['nama']; ?></strong></h3>
		 </div>
         <!-- /.box-body -->
         <div class="box-body">
          <table class="table">
               
                  <tr >
                     
                     <td bgcolor='#ADFF2F' width="200">NIP</td>
                     <td bgcolor='#00FFFF'><?php echo $data['nis']; ?></td>
					 
                     
                  </tr>
				  <tr>
					<td bgcolor='#ADFF2F'>Nama Lengkap</td>
                    <td bgcolor='#00FFFF'><?php echo $data['nama']; ?></td>
				  </tr>
				  <tr>
					<td bgcolor='#ADFF2F'>Tempat Lahir</td>
                    <td bgcolor='#00FFFF'><?php echo $data['tempat_lahir']; ?></td>
				  </tr>
				  
				  <tr>
					<td bgcolor='#ADFF2F'>Tanggal lahir</td>
                    <td  bgcolor='#00FFFF'><?php echo $data['tgl_lahir']; ?></td>
				  </tr>
				  
				  <tr>
					<td bgcolor='#ADFF2F'>Jenis Kelamin</td>
                    <td bgcolor='#00FFFF'><?php echo $data['jenis_kelamin']; ?></td>
				  </tr>
				  <tr>
					<td bgcolor='#ADFF2F'>Angkatan</td>
                    <td  bgcolor='#00FFFF'><?php echo $data['angkatan']; ?></td>
				  </tr>
				  
				  <tr>
					<td bgcolor='#ADFF2F'>Status</td>
                    <td bgcolor='#00FFFF'><?php echo $data['status_siswa']; ?></td>
				  </tr>
				  
				  
					
			</table>
			<br>
			<div class="text-right">
				<a href="siswa_edit.php" class="btn btn-default">Edit Biodata</a>
			</div>
         </div><!-- /.box-body -->
      </div><!-- /.box -->
   </section><!-- /.Main content -->
</div><!-- /.content-wrapper -->

<?php include "../theme/footer.php"; ?>