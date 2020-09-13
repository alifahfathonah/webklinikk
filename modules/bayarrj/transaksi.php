<?php
if (isset($_POST['simpan'])) {
  
  $id = $_POST['id_pemeriksaan'];
  $tipe = $_POST['tipe'];
  $no_bpjs = $_POST['no_bpjs'];
  $tgl_bayar = date("Y-m-d H:i:s"); 
  $biaya = $_POST['total'];
  $id_bidan = $_SESSION['id_user'];
  $kd_detpol = $_POST['kd_detpol'];

  mysqli_query($db, "INSERT INTO pembayaran(id_pemeriksaan,tgl_bayar,tipe_bayar,no_bpjs,biaya,kd_detpol,id_bidan,keterangan) VALUES ('$id','$tgl_bayar','$tipe','$no_bpjs','$biaya','$kd_detpol','$id_bidan','Telah Melakukan Pembayaran')");
  mysqli_query($db, "UPDATE pendaftaran SET keterangan='Telah Melakukan Pembayaran' WHERE id_pemeriksaan='$id'");
  mysqli_query($db, "UPDATE pemeriksaan SET keterangan='Telah Melakukan Pembayaran' WHERE id_pemeriksaan='$id'");



  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=bayrj'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Pembayaran Rawat Jalan</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" class="form-horizontal form-label-left" method="post">
            <?php 
                         
            $id_pemeriksaan = $_GET['id_pemeriksaan'];
             
            $query  = mysqli_query($db,"SELECT pemeriksaan.id_pemeriksaan,pemeriksaan.id_dokter,pasien.nama_lengkap,pasien.alergi_obat,dokter.nama,pasien.no_rm,pemeriksaan.pelayanan,pemeriksaan.kd_detpol FROM pemeriksaan JOIN dokter ON pemeriksaan.id_dokter=dokter.id_dokter JOIN pasien ON pemeriksaan.no_rm=pasien.no_rm WHERE pemeriksaan.id_pemeriksaan='$id_pemeriksaan'");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

             ?>
          <div class="form-group">
            <input type="hidden" name="id_pemeriksaan" value="<?php echo $pecah['id_pemeriksaan'];?>" readonly>
            <input type="hidden" name="kd_detpol" value="<?php echo $pecah['kd_detpol'];?>" readonly>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label>No RM</label>
              <input type="text" name="no_rm" required="required" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['no_rm']; ?>" readonly>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label>Nama Pasien</label>
              <input type="text" name="nama" required="required" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['nama_lengkap']; ?>" readonly>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label>Nama Dokter</label>
              <input type="text" name="no_rm" required="required" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['nama'] ?>" readonly>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label>Tipe Bayar</label>
              <input type="text" name="tipe" required="required" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['pelayanan'] ?>" readonly>
            </div>
          </div>

          <?php if ($pecah['pelayanan']=='bpjs') { ?>

          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <label>Nomor BPJS</label>
              <input type="number" name="no_bpjs" class="form-control col-md-6 col-xs-6">
            </div>            
          </div>
        <?php } ?>

        <?php }} ?>

          <table class="table table-striped table-bordered">
          <thead>
            <tr>
              
              <th>Keteranagan</th>
              <th>Biaya</th>              
            </tr>
          </thead>
          <tbody>            
            <?php 

            $query1  = mysqli_query($db,"SELECT pemeriksaan.id_pemeriksaan,pemeriksaan.kd_detpol,pemeriksaan.pelayanan,det_poly.biaya,det_poly.layanan FROM pemeriksaan JOIN det_poly ON pemeriksaan.kd_detpol=det_poly.kd_detpol WHERE pemeriksaan.id_pemeriksaan='$id_pemeriksaan'");
            $hitung1 = mysqli_num_rows($query1);
            if ($hitung1>0) {
              while ($pecah1= mysqli_fetch_assoc($query1)) {

          ?>                  
                <tr>
                
                  <td><?php echo $pecah1['layanan']; ?></td>
                  <td><?php echo rupiah($pecah1['biaya']);?></td>                  
              </tr>
            <?php }} ?>
              <tr>
                <td colspan="2"><strong>OBAT:</strong></td>                  
              </tr>
              <?php
              $query2  = mysqli_query($db,"SELECT pemeriksaan.id_pemeriksaan,resep_obat.id_resep,det_resep.id_resep,det_resep.kd_obat,det_resep.jumlah*obat.harga AS hargas,obat.nama_obat FROM pemeriksaan JOIN resep_obat ON pemeriksaan.id_pemeriksaan=resep_obat.id_pemeriksaan JOIN det_resep ON det_resep.id_resep=resep_obat.id_resep JOIN obat ON det_resep.kd_obat=obat.kd_obat WHERE pemeriksaan.id_pemeriksaan='$id_pemeriksaan'");
            $hitung2 = mysqli_num_rows($query2);
            if ($hitung2>0) {
              while ($pecah2= mysqli_fetch_assoc($query2)) {

                ?>
              <tr>
                <td><?php echo $pecah2['nama_obat']; ?></td>                  
                <td><?php echo rupiah($pecah2['hargas']); ?></td>                  
              </tr>
            <?php }} ?>

            <tr>
                <td colspan="1"><strong>TOTAL</strong></td>                  
                <td>
                  <?php
                   $query3    = mysqli_query($db, "SELECT SUM(det_resep.jumlah*obat.harga)+det_poly.biaya AS Total FROM pemeriksaan JOIN det_poly ON pemeriksaan.kd_detpol=det_poly.kd_detpol JOIN resep_obat ON pemeriksaan.id_pemeriksaan=resep_obat.id_pemeriksaan JOIN det_resep ON det_resep.id_resep=resep_obat.id_resep JOIN obat ON det_resep.kd_obat=obat.kd_obat WHERE pemeriksaan.id_pemeriksaan='$id_pemeriksaan' GROUP BY det_poly.biaya");
                   $pecah3 = mysqli_fetch_assoc($query3);
                  ?>
                  <strong><?php echo rupiah($pecah3['Total']); ?></strong>
                  <input type="hidden" class="form-control" name="total"  value="<?php echo ($pecah3['Total']) ?>" required>
                </td>                  
              </tr>
              
            </tbody>
          </table>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
              <a href="index.php?page=bayrj" class="btn btn-danger"> Kembali</a>              
              <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
