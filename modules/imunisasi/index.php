<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $id_pemeriksaan= $_GET['id_pemeriksaan'];
    mysqli_query($db, "DELETE FROM imunisasi WHERE id_pemeriksaan = '$id_pemeriksaan'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=imunisasi'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Layanan Imunisasi </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">                      
        <?php $date1=date("Y-m-d"); ?>
        <label>Tanggal</label> <input type="date" name="" value="<?php echo $date1 ?>" readonly>
        <br> <br>

        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Tanggal Pendaftaran</th>
              <th>No Antrian</th>
              <th>ID Pemeriksaan</th>
              <th>Nama Pasien</th>
              <th>Layanan</th>                            
              <th>Bidan</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $date= date("Y-m-d");
            $id_user = $_SESSION['id_user'];

            $query  = mysqli_query($db,"SELECT pendaftaran.*, pasien.nama_lengkap,bidan.nama, antrian_kia.no_antrian,det_poly.layanan FROM pendaftaran JOIN antrian_kia ON antrian_kia.id_pemeriksaan=pendaftaran.id_pemeriksaan JOIN pasien ON pasien.no_rm = pendaftaran.no_rm JOIN bidan ON pendaftaran.id_bidan=bidan.id_bidan JOIN det_poly ON det_poly.kd_detpol=pendaftaran.kd_detpol AND DATE(pendaftaran.tgl_pendaftaran) ='$date'  AND pendaftaran.kd_detpol='4' AND pendaftaran.id_bidan='$id_user' WHERE pendaftaran.keterangan='Periksa' OR pendaftaran.keterangan='Selesai Diperiksa' OR keterangan='Telah Melakukan Pembayaran'");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td><?php echo date("d-m-Y",strtotime($pecah['tgl_pendaftaran'])); ?></td>
                  <td><?php echo $pecah['no_antrian']; ?></td>
                  <td><?php echo $pecah['no_rm']; ?></td>
                  <td><?php echo $pecah['nama_lengkap']; ?></td>
                  <td><?php echo $pecah['layanan']; ?></td>                            
                  <td><?php echo $pecah['nama']; ?></td>
                  <td><?php echo "<span class='label label-info'>".$pecah['keterangan']."</span>" ?></td>
                  <td>
                    <?php
                    $query1  = mysqli_query($db,"SELECT * FROM imunisasi WHERE id_pemeriksaan='".$pecah['id_pemeriksaan']."'");
                    $hitung1 = mysqli_num_rows($query1);
                    if ($hitung1>0) {
                      ?>
                      
                      <a class="btn btn-xs btn-info" href="./modules/imunisasi/cetak.php?id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Cetak"><i class="glyphicon glyphicon-print"></i></a>
                      <a class="btn btn-xs btn-success" href="index.php?page=rm_imun&no_rm=<?php echo $pecah['no_rm']; ?>&id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Rekam Medis"><i class="glyphicon glyphicon-book"></i></a>

                   <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=imunisasi&aksi=hapus&id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                    <i class="fa fa-trash"></i></a>
                      <?php 
                    }else{                                
                     ?>
                     <a class="btn btn-xs btn-info" href="index.php?page=lay_imun&id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Periksa"><i class="fa fa-stethoscope"></i></a>                               
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
