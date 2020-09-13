<?php
if (isset($_POST['simpan'])) {

  $id = $_POST['id_pemeriksaan'];
  mysqli_query($db, "UPDATE pemeriksaan SET keterangan='Telah Mengambil Obat' WHERE id_pemeriksaan='$id'");
  mysqli_query($db, "UPDATE pendaftaran SET keterangan='Telah Mengambil Obat' WHERE id_pemeriksaan='$id'");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=dafambilobat'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Resep Obat</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
          <?php 

          $id_pemeriksaan = $_GET['id_pemeriksaan'];             
          $query  = mysqli_query($db,"SELECT pemeriksaan.id_pemeriksaan,pemeriksaan.id_dokter,pasien.nama_lengkap,pasien.alergi_obat,dokter.nama,pasien.no_rm FROM pemeriksaan JOIN dokter ON pemeriksaan.id_dokter=dokter.id_dokter JOIN pasien ON pemeriksaan.no_rm=pasien.no_rm WHERE pemeriksaan.id_pemeriksaan='$id_pemeriksaan'");
          $hitung = mysqli_num_rows($query);
          if ($hitung>0) {
            while ($pecah = mysqli_fetch_assoc($query)) {

             ?>
             <div class="form-group">
              <input type="hidden" name="id_pemeriksaan" value="<?php echo $pecah['id_pemeriksaan'];  ?>">
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
                <label>Alergi Obat</label>
                <textarea class="form-control"><?php echo $pecah['alergi_obat']; ?></textarea>
              </div>
            </div>
          <?php }} ?>

          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Jumlah</th>
                <th>Aturan Minum</th>              
              </tr>
            </thead>

            <?php 
            $no = 1;                                 
            $query1  = mysqli_query($db,"SELECT pemeriksaan.id_pemeriksaan,resep_obat.id_resep,det_resep.id_resep,det_resep.kd_obat,det_resep.jumlah,det_resep.aturan_minum,obat.nama_obat FROM pemeriksaan JOIN resep_obat ON pemeriksaan.id_pemeriksaan=resep_obat.id_pemeriksaan JOIN det_resep ON det_resep.id_resep=resep_obat.id_resep JOIN obat ON det_resep.kd_obat=obat.kd_obat WHERE pemeriksaan.id_pemeriksaan='$id_pemeriksaan'");
            $hitung1 = mysqli_num_rows($query1);
            if ($hitung1>0) {
              while ($pecah1= mysqli_fetch_assoc($query1)) {

                ?>
                <tbody>            
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $pecah1 ['nama_obat']; ?></td>
                    <td><?php echo $pecah1 ['jumlah'];?></td>
                    <td><?php echo $pecah1['aturan_minum'];?></td>                  
                  </tr>
                  <?php $no++; }} ?>
                </tbody>
              </table>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                  <a href="index.php?page=ambilobt" class="btn btn-danger"> Kembali</a>              
                  <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
