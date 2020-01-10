<?php
   include "../config/koneksi.php";
   include "../config/cek_admin.php";
   include "../theme/header.php";
   include "../theme/sidebar-admin.php";
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header"><h1>Dashboard</h1></section>

   <!-- Main content -->
   <section class="content container-fluid">
      <div class="box">
         <!-- /.box-header -->
         <div class="box-header with-border">
            <h3 class="box-title">Daftar mapel</h3>
            
         </div>


        <!-- /.box-body -->
         <div class="box-body">
            <table id="data_mapel" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th width="6px">NO</th>
                     <th>Kode mapel</th>
                     <th>nama mapel</th>
                     <th>NIP</th>
                    
                  </tr>
               </thead>
               <tbody>
               <?php
                  $mapel = mysqli_query($koneksi, "SELECT * FROM mapel");
                  $no=0;
                  foreach ($mapel as $row){
                  $no++;
               ?>
                  <tr>
                      <td class="text-center"><?php echo $no ?></td>
                      <td><?php echo $row['kode_mapel'] ?></td>
                      <td><?php echo $row['nama_mapel'] ?></td>
                      <td><?php echo $row['nip'] ?></td>
                      
                   
                  </tr>
               <?php } ?>
               </tbody>
            </table>
         </div><!-- /.box-body -->
      </div><!-- /.box -->
   </section><!-- /.Main content -->
</div><!-- /.content-wrapper -->
  

<!-- page script -->
<script type="text/javascript" charset="utf-8">
  $('#data_mapel').DataTable( {
    //paging: false
  } );
</script>

<?php include "../theme/footer.php"; ?>