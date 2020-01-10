<?php

  include "../config/koneksi.php";
  include "../config/cek_admin.php";
  include "../theme/header.php";
  include "../theme/sidebar-admin.php";

  if (isset($_GET['id'])) {
    $id   = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tahun_pelajaran WHERE id='$id'") or die('Query Error : '.mysqli_error($koneksi));
        while ($data  = mysqli_fetch_assoc($query)) {
          $id            = $data['id'];
          $nama          = $data['nama'];
          $status        = $data['status'];
        }
  }
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header"><h1>Dashboard Admin</h1></section>

   <!-- Main content -->
   <section class="content container-fluid">
      <div class="box">
         <!-- /.box-header -->
         <div class="box-header with-border"><h3 class="box-title">Tahun Pelajaran</h3></div>
         <!-- /.box-body -->
         <div class="box-body">
            <div class="col-sm-8">
<!-- Form Edit -->              
               <form action="setting_tp_proses_update.php" method="POST" class="form-horizontal">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" required>
                  <div class="form-group">
                     <label for="nama" class="col-sm-2 control-label">Nama TP</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" placeholder="2017/2018" value="<?= $nama ?>"> 
                     </div>
                  </div>
				  
				<div class="form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-4">
				  <?php
				  if ($status =='Aktif') { ?>
					<label class="radio-inline">
					  <input type="radio" name="status" value="Aktif" checked> Aktif
					</label>

					<label class="radio-inline">
					  <input type="radio" name="status" value="Pasif"> Pasif
					</label>
				  <?php
				  } else { ?>
					<label class="radio-inline">
					  <input type="radio" name="status" value="Aktif"> Aktif
					</label>

					<label class="radio-inline">
					  <input type="radio" name="status" value="Pasif" checked> Pasif
					</label>
				  <?php
				  }
				  ?>
				  </div>
				</div>
               
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="update" class="btn btn-sm btn-info">UPDATE</button>
                        <a href="daftar_guru.php" class="btn btn-sm btn-warning btn-reset">BATAL</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div><!-- /.box -->
   </section><!-- /.Main content -->
</div><!-- /.content-wrapper -->
  
<?php include "../theme/footer.php"; ?>