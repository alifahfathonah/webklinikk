<?php
if (isset($_POST['simpan'])) {
  $kd_alatkb = $_GET['kd_alatkb'];
  $nm_alatkb   = $_POST['nm_alatkb'];  
  $biaya   = $_POST['biaya'];  

  mysqli_query($db, "UPDATE alat_kb SET
    nama_alat = '$nm_alatkb',    
    biaya = '$biaya' WHERE kd_alatkb = '$kd_alatkb'");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=kontrasepsi'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Edit Alat Kontrasepsi </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <?php
        $kd_alatkb = $_GET['kd_alatkb'];
        $query  = mysqli_query($db,"SELECT * FROM alat_kb WHERE kd_alatkb='$kd_alatkb'");
        $hitung = mysqli_num_rows($query);
        if ($hitung>0) {
          while ($pecah = mysqli_fetch_assoc($query)) {

            ?>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
              <input type="hidden" name="">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Alat Kontrasepsi</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="nm_alatkb" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $pecah['nama_alat']; ?>" required="required" >
                </div>
              </div>                      
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="biaya" class="form-control col-md-7 col-xs-12" type="number" value="<?php echo $pecah['biaya']; ?>" required="required">
                </div>
              </div>              
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="index.php?page=kontrasepsi" class="btn btn-danger"> Kembali</a>                  
                  <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                </div>
              </div>

            </form>
          <?php }} ?>
        </div>
      </div>
    </div>
  </div>
