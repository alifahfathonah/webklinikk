<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'reset') {
    mysqli_query($db, "TRUNCATE TABLE antrian_kia");

    echo "<script>alert('No Antrian Berhasil Di Reset')</script>";
    echo "<script>window.location='index.php?page=dafkia'</script>";
  }
}

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $id_pemeriksaan = $_GET['id_pemeriksaan'];
    mysqli_query($db, "DELETE FROM pendaftaran WHERE id_pemeriksaan='$id_pemeriksaan'");
    
    mysqli_query($db, "DELETE FROM antrian_kia WHERE id_pemeriksaan='$id_pemeriksaan'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=dafkia'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Pendaftaran Poly KIA </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a href="index.php?page=daftarkia" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a>
        <!-- <a href="index.php?page=dafkia&aksi=reset" class="btn btn-danger" class="pull-left"><i class="fa fa-history"></i> Reset Antrian</a>  <br><br> -->
        <?php $date1=date("Y-m-d"); ?>
        <label>Tanggal</label> <input type="date" name="" value="<?php echo $date1 ?>" readonly>
        <br> <br>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Tanggal Pendaftaran</th>
              <th>No Antrian</th>
              <th>No RM</th>
              <th>Nama Pasien</th>
              <th>Bidan</th>
              <th>Layanan</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $date =date('Y-m-d');
            
            $query  = mysqli_query($db,"SELECT pendaftaran.*,pasien.nama_lengkap,bidan.nama,antrian_kia.no_antrian,det_poly.layanan,pendaftaran.tgl_pendaftaran FROM pendaftaran JOIN 
              antrian_kia ON antrian_kia.id_pemeriksaan=pendaftaran.id_pemeriksaan JOIN pasien ON pasien.no_rm = pendaftaran.no_rm 
              JOIN bidan ON pendaftaran.id_bidan=bidan.id_bidan JOIN det_poly ON pendaftaran.kd_detpol=det_poly.kd_detpol
              WHERE DATE(pendaftaran.tgl_pendaftaran)='$date' AND pendaftaran.kd_detpol!='5'");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td><?php echo date("d-m-Y",strtotime($pecah['tgl_pendaftaran'])); ?></td>
                  <td><?php echo $pecah['no_antrian']; ?></td>
                  <td><?php echo $pecah['no_rm']; ?></td>
                  <td><?php echo $pecah['nama_lengkap']; ?></td>
                  <td><?php echo $pecah['nama']; ?></td>
                  <td><?php echo $pecah['layanan']; ?></td>
                  <td><?php if ($pecah['keterangan'] == 'Menunggu Antrian') {
                    echo "<span class='label label-default'>".$pecah['keterangan']."</span>";
                  } if ($pecah['keterangan'] == 'Periksa') {
                    echo "<span class='label label-info'>".$pecah['keterangan']."</span>";
                  }
                  if ($pecah['keterangan'] == 'Selesai Diperiksa') {
                    echo "<span class='label label-info'>".$pecah['keterangan']."</span>";
                  }
                  if ($pecah['keterangan'] == 'Pengambilan Obat') {
                    echo "<span class='label label-info'>".$pecah['keterangan']."</span>";
                  }
                  if ($pecah['keterangan'] == 'Telah Melakukan Pembayaran') {
                    echo "<span class='label label-info'>".$pecah['keterangan']."</span>";
                  } ?></td>
                  <td>
                    <?php if ($pecah['keterangan']=='Menunggu Antrian') {
                      
                      ?>
                      <button type="button" id="ubah" class="btn btn-xs btn-info" data-toggle="modal" data-target="#ubahstatus" data-id="<?php echo $pecah['id_pemeriksaan']; ?>" data-antri="<?php echo $pecah['no_antrian']; ?>" data-status="<?php echo $pecah['keterangan']; ?>" title="Ubah Status"><i class="fa fa-edit"></i>
                      </button>
                      <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=dafkia&aksi=hapus&id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                        <i class="fa fa-trash"></i></a>
                      <?php }  ?>

                      <?php if ($pecah['keterangan']!=='Menunggu Antrian') {
                        
                       ?>
                       <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=dafkia&aksi=hapus&id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                        <i class="fa fa-trash"></i></a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php }} ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    <!-- modal -->

    <div class="modal fade bs-example-modal-lg" id="ubahstatus" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
            </button>
            <h4 class="modal-title" id="myModalLabel">Ubah Status</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                  
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Pemeriksaan</label> -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="id_pemeriksaan1" id="id_pemeriksaan1" class="form-control col-md-7 col-xs-12" type="text" readonly>
                        </div>
                      </div> 

                      <div class="form-group">                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label>No Antrian</label>
                          <input name="antrian1" id="antrian1" class="form-control col-md-6 col-xs-6" type="text" readonly>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <label>Keterangann</label>
                          <select class="form-control" name="status">
                            <option name="status">Menunggu Antrian</option>
                            <option name="status">Periksa</option>
                          </select>
                        </div>
                      </div> 
                      
                      
                      
                      
                      
                      
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
              <a href="index.php?page=dafkia" class="btn btn-danger">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php 

    if(isset($_POST['simpan'])) {
      $id_pemeriksaan1  = $_POST['id_pemeriksaan1'];
      $status  = $_POST['status'];

      mysqli_query($db, "UPDATE pendaftaran SET keterangan='$status' WHERE id_pemeriksaan='$id_pemeriksaan1'");

      echo "<script>alert('Data Berhasil Tersimpan')</script>";
      echo "<script>window.location='index.php?page=dafkia'</script>";


    }

    ?>
