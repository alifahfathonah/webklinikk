<?php
if (isset($_POST['simpan'])) {
 foreach ($_POST['vaksin'] as $value) {
  $id_pemeriksaan  = $_POST['id_pemeriksaan'];
  $no_rm   = $_POST['no_rm'];
  $tgl_pemeriksaan   = date("Y-m-d H:i:s");
  $id_bidan  = $_POST['id_bidan'];
  $nm_ibu  = $_POST['nm_ibu'];
  $nm_ayah  = $_POST['nm_ayah'];
  $no_tlp   = $_POST['no_tlp'];
  $bbl  = $_POST['bbl'];
  $pbl = $_POST['pbl'];    
  $bb  = $_POST['bb'];
  $pb  = $_POST['pb'];
  $umur  = $_POST['umur'];
  $kd_detpol  = $_POST['kd_detpol'];


  mysqli_query($db, "INSERT INTO imunisasi(id_pemeriksaan,tgl_pemeriksaan,no_rm,id_bidan,kd_detpol,nm_ibu,nm_ayah,no_telp,bb_lhr,pb_lhr,bb,pb,umur,keterangan) VALUES ('$id_pemeriksaan','$tgl_pemeriksaan','$no_rm','$id_bidan','$kd_detpol','$nm_ibu','$nm_ayah','$no_tlp','$bbl','$pbl','$bb','$pb','$umur','Selesai Diperiksa')");

  mysqli_query($db, "INSERT INTO det_imun(id_pemeriksaan,kd_vaksin) VALUES ('$id_pemeriksaan','".$value."')");

  mysqli_query($db,"UPDATE imun_vaksin SET stok=stok-1 WHERE kd_vaksin='".$value."'");

  mysqli_query($db,"UPDATE pendaftaran SET keterangan='Selesai Diperiksa' WHERE id_pemeriksaan='$id_pemeriksaan'");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=imunisasi'</script>";

}
}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Layanan Imunisasi </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <?php 

        $id_pemeriksaan = $_GET['id_pemeriksaan'];

        $query  = mysqli_query($db,"SELECT pendaftaran.id_pemeriksaan,pendaftaran.no_rm,pendaftaran.umur,pendaftaran.id_bidan,pendaftaran.kd_detpol,pasien.nama_lengkap,pasien.tgl_lahir,pasien.pendidikan_akhir,pasien.tempat_lahir,pasien.alamat FROM pendaftaran JOIN pasien ON pasien.no_rm=pendaftaran.no_rm WHERE pendaftaran.id_pemeriksaan='$id_pemeriksaan'");
        $hitung = mysqli_num_rows($query);

        if ($hitung>0) {
          while ($pecah = mysqli_fetch_assoc($query)) {

           ?>
           <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">   

            <input type="hidden" name="id_pemeriksaan" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['id_pemeriksaan']; ?>" readonly>
            <input type="hidden" name="no_rm" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['no_rm']; ?>" readonly>
            <input type="hidden" name="id_bidan" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['id_bidan']; ?>" readonly>                   
            <input type="hidden" name="kd_detpol" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['kd_detpol']; ?>" readonly>                   

            <h4 style="text-decoration: underline;">Data Peserta Imunisasi </h4>

            <div class="form-group">                            
              <div class="col-md-6 col-sm-6 col-xs-6">
                <label>Nama Peserta Imunisasi </label>
                <input type="text" name="nm_psn" class="form-control col-md-6 col-xs-6" value="<?php echo $pecah['nama_lengkap']; ?>" readonly>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <label>TTL </label>
                <input type="text" name="ttl" class="form-control col-md-5 col-xs-5" value="<?php echo $pecah['tempat_lahir'] .", ". date('d-m-Y',strtotime($pecah['tgl_lahir'])); ?>" readonly>          
              </div>
            </div> 

            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-6">                              
                <label> Umur </label>
                <input type="text" name="umur" value="<?php echo $pecah['umur']; ?>" class="form-control col-md-6 col-xs-6"  readonly>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">                              
                <label> Nama Ibu </label>
                <input type="text" name="nm_ibu" class="form-control col-md-6 col-xs-6">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-6">                              
                <label> Nama Ayah </label>
                <input type="text" name="nm_ayah"  class="form-control col-md-6 col-xs-6">
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">                              
                <label> No Telp Ibu </label>
                <input type="text" name="no_tlp" class="form-control col-md-6 col-xs-6">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <label>Alamat </label>
                <textarea class="form-control col-md-6 col-xs-6" name="alamat" readonly><?php echo $pecah['alamat']; ?></textarea>
              </div>                              
            </div><br>

            <h4 style="text-decoration: underline;">Data Lahir </h4>
            <div class="form-group has-feedback">
              <div class="col-md-6 col-sm-6 col-xs-6">                              
                <label> BB Lahir </label>
                <input type="text" name="bbl"  class="form-control col-md-6 col-xs-6">
                <span class="form-control-feedback right" aria-hidden="true">KG</span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">                              
                <label> PB Lahir </label>
                <input type="text" name="pbl" class="form-control col-md-6 col-xs-6">
                <span class="form-control-feedback right" aria-hidden="true">CM</span>
              </div>
            </div>

            <h4 style="text-decoration: underline;">Imunisasi </h4>
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label>Pemeberian Vaksin:&ensp;</label>
                <?php 
                $sql=mysqli_query($db,"SELECT * FROM imun_vaksin WHERE stok!=0");
                while ($data=mysqli_fetch_assoc($sql)) {
                 ?>
                 <div class="checkbox-inline">
                  <label class="form-check-label">
                    <input type="checkbox" name="vaksin[]" value="<?php echo $data['kd_vaksin'] ?>" class="form-check-input"><?php echo $data['nm_vaksin']; ?>
                  </label>
                </div>
              <?php } ?>
            </div> 
          </div>

          <div class="form-group has-feedback">
            <div class="col-md-6 col-sm-6 col-xs-6">                              
              <label> BB  </label>
              <input type="text" name="bb"  class="form-control col-md-6 col-xs-6">
              <span class="form-control-feedback right" aria-hidden="true">KG</span>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">                              
              <label> PB  </label>
              <input type="text" name="pb" class="form-control col-md-6 col-xs-6">
              <span class="form-control-feedback right" aria-hidden="true">CM</span>
            </div>
          </div>


          <div class="ln_solid"></div>
          <div class="form-group">
           <!-- class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" -->
           <div>
            <a href="index.php?page=imunisasi" class="btn btn-danger"> Kembali</a>            
            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
          </div>
        </div>

      </form>
    <?php }} ?>
  </div>
</div>
</div>
</div>
