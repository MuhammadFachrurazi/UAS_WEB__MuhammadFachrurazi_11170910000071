<?php
	$url = $_SERVER['DOCUMENT_ROOT'];
 	include "../config/koneksi.php";
	include "../config/cek_guru.php";
 	include "../theme/header.php";
 	include "../theme/sidebar-guru.php";
	
	$nip = $_SESSION["username"];
	$guru = mysqli_query($koneksi, "SELECT * FROM guru WHERE nip='$nip'");
	$data = mysqli_fetch_array($guru);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header"><h1>Dashboard</h1></section>

   <!-- Main content -->
   <section class="content container-fluid">
      <div class="box">
         <!-- /.box-header -->
         <div class="box-header"><h3 class="box-title"><strong><?php echo $data['nama']; ?></strong></h3></div>
         <!-- /.box-body -->
         <div class="box-body">
          <table class="table">
               
                  <tr >
                     
                     <td bgcolor='#ADFF2F' width="200">NIP</td>
                     <td bgcolor='#00FFFF'><?php echo $data['nip']; ?></td>
					 
                     
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
				  
				  
					
			</table>
         </div><!-- /.box-body -->
      </div><!-- /.box -->
   </section><!-- /.Main content -->
</div><!-- /.content-wrapper -->
  

<!-- page script -->
<script type="text/javascript" charset="utf-8">
  $('#example').DataTable( {
    //paging: false
  } );
</script>

<?php include "../theme/footer.php"; ?>