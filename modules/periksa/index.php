<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $kd_poly= $_GET['kd_poly'];
    mysqli_query($db, "DELETE FROM poly WHERE kd_poly = '$kd_poly'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=poly'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Layanan Rawat Jalan </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">                      
        <?php $date1=date("Y-m-d"); ?>
        <label>Tanggal</label> <input type="date" name="" value="<?php echo $date1 ?>" readonly>
        <br> <br>

        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No Antrian</th>
              <th>ID Pemeriksaan</th>
              <th>Nama Pasien</th>
              <th>Layanan</th>
              <th>Tipe Pelayanan</th>
              <th>Dokter</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $date= date("Y-m-d");
            $id_user = $_SESSION['id_user'];

            $query  = mysqli_query($db,"SELECT pendaftaran.*, pasien.nama_lengkap,dokter.nama, antrian.no_antrian,det_poly.layanan 
              FROM pendaftaran JOIN antrian ON antrian.id_pemeriksaan=pendaftaran.id_pemeriksaan  
              JOIN pasien ON pasien.no_rm = pendaftaran.no_rm JOIN dokter ON pendaftaran.id_dokter=dokter.id_dokter JOIN det_poly ON det_poly.kd_detpol=pendaftaran.kd_detpol AND DATE(pendaftaran.tgl_pendaftaran)='$date' AND pendaftaran.id_dokter='$id_user' AND det_poly.kd_detpol='5' WHERE Pendaftaran.keterangan='Periksa' OR pendaftaran.keterangan='Selesai Diperiksa' OR pendaftaran.keterangan='Telah Mengambil Obat' OR pendaftaran.keterangan='Telah Melakukan Pembayaran'");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td><?php echo $pecah['no_antrian']; ?></td>
                  <td><?php echo $pecah['id_pemeriksaan']; ?></td>
                  <td><?php echo $pecah['nama_lengkap']; ?></td>
                  <td><?php echo $pecah['layanan']; ?></td>
                  <td><?php echo $pecah['pelayanan']; ?></td>
                  <td><?php echo $pecah['nama']; ?></td>
                  <td><?php echo "<span class='label label-info'>".$pecah['keterangan']."</span>" ?></td>
                  <td>
                    <?php
                    $query1  = mysqli_query($db,"SELECT * FROM pemeriksaan WHERE id_pemeriksaan='".$pecah['id_pemeriksaan']."'");
                    $hitung1 = mysqli_num_rows($query1);
                    if ($hitung1>0) {
                      ?>                              
                      <a class="btn btn-xs btn-info" href="./modules/periksa/resep.php?id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Cetak Resep"><i class="glyphicon glyphicon-print"></i></a>
                      <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=dfpoumum&aksi=hapus&id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                        <i class="fa fa-trash"></i></a>
                        <?php 
                      }else{                                
                       ?>
                       <a class="btn btn-xs btn-info" href="index.php?page=pemeriksaan&id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Periksa"><i class="fa fa-stethoscope"></i></a>                               
                     <?php } ?>
                     <a class="btn btn-xs btn-success" href="index.php?page=rm&no_rm=<?php echo $pecah['no_rm']; ?>" data-toggle="tooltip" data-placement="bottom" title="Rekam Medis"><i class="glyphicon glyphicon-book"></i></a>

                   </td>
                 </tr>
               <?php }} ?>
             </tbody>
           </table>
         </div>
       </div>
     </div>

   </div>
