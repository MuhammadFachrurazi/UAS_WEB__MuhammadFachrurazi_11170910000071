<?php
   include "../config/koneksi.php";
   include "../config/cek_siswa.php";
 	include "../theme/header.php";
 	include "../theme/sidebar-siswa.php";
	
	$nis = $_SESSION["username"];
	$siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
	$data = mysqli_fetch_array($siswa);
	$tanggal       = $data['tgl_lahir'];
	  $tgl           = explode('-',$tanggal);
	  $tgl_lahir     = $tgl[2]."-".$tgl[1]."-".$tgl[0];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header"><h1>Dashboard Admin</h1></section>

   <!-- Main content -->
   <section class="content container-fluid">
      <div class="box">
         <!-- /.box-header -->
         <div class="box-header with-border"><h3 class="box-title">Edit Guru</h3></div>
		 
<!-- Pesan opersasi CRUD -->
<?php  
  if (empty($_GET['alert'])) {
    echo "";
  } elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
  } elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil dihapus.
          </div>";
  }
?>

         <!-- /.box-body -->
         <div class="box-body">
            <div class="col-sm-12">
<!-- Form Edit -->              
               <form action="siswa_proses_update.php" method="POST" class="form-horizontal">
                  <div class="form-group">
                     <label for="nis" class="col-sm-2 control-label">NIS</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="nis" value="<?php echo $data['nis']; ?>" readonly>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="nama" class="col-sm-2 control-label">Nama</label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" readonly>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>">
                     </div>
                  </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_lahir" autocomplete="off" value="<?php echo $tgl_lahir; ?>" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-4">
              <?php
              if ($data['jenis_kelamin'] =='Laki-laki') { ?>
                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                </label>

                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                </label>
              <?php
              } else { ?>
                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                </label>

                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Perempuan" checked> Perempuan
                </label>
              <?php
              }
              ?>
              </div>
            </div>
                  <div class="form-group">
                     <label for="nama" class="col-sm-2 control-label">Angkatan</label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="angkatan" value="<?php echo $data['angkatan']; ?>" readonly>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="nama" class="col-sm-2 control-label">Status</label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="status" value="<?php echo $data['status_siswa']; ?>" readonly>
                     </div>
                  </div>
               
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="update" class="btn btn-sm btn-info">UPDATE</button>
                        <a href="dashboard.php" class="btn btn-sm btn-warning btn-reset">BATAL</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div><!-- /.box -->
   </section><!-- /.Main content -->
</div><!-- /.content-wrapper -->

<?php include "../theme/footer.php"; ?>