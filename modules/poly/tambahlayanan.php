<?php
if (isset($_POST['simpan'])) {
  $kd_poly  = $_POST['kd_poly'];
  $layanan   = $_POST['layanan'];
  $biaya   = $_POST['biaya'];

  mysqli_query($db, "INSERT INTO det_poly(kd_poly,layanan,biaya) VALUES ('$kd_poly','$layanan','$biaya')");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=layanan'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah Poly </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <?php
        $kd_poly = $_GET['kd_poly'];
        $query  = mysqli_query($db,"SELECT * FROM poly WHERE kd_poly='$kd_poly'");
        $hitung = mysqli_num_rows($query);
        if ($hitung>0) {
          while ($pecah = mysqli_fetch_assoc($query)) {

            ?>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Poly <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="kd_poly" required="required" value="<?php echo $pecah['kd_poly']; ?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">nama Poly <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_poly" required="required" value="<?php echo $pecah['nama_poly']; ?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Layanan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="layanan" class="form-control col-md-7 col-xs-12" type="text" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="biaya" class="form-control col-md-7 col-xs-12" type="number" required="required">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="index.php?page=layanan" class="btn btn-danger"> Kembali</a>                  
                  <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                </div>
              </div>

            </form>
          <?php }} ?>
        </div>
      </div>
    </div>
  </div>
