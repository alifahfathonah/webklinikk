<?php
if (isset($_POST['simpan'])) {
  $kd_vaksin = $_GET['kd_vaksin'];
  $nama   = $_POST['nm_vksn'];
  $harga   = $_POST['harga'];
  $stok   = $_POST['stok'];

  mysqli_query($db, "UPDATE imun_vaksin SET
    nm_vaksin = '$nama',
    stok = '$stok',
    harga = '$harga' WHERE kd_vaksin = '$kd_vaksin'");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=imun_vaksin'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Edit Vaksin </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <?php
        $kd_vaksin = $_GET['kd_vaksin'];
        $query  = mysqli_query($db,"SELECT * FROM imun_vaksin WHERE kd_vaksin='$kd_vaksin'");
        $hitung = mysqli_num_rows($query);
        if ($hitung>0) {
          while ($pecah = mysqli_fetch_assoc($query)) {

            ?>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
              <input type="hidden" name="">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Vaksin</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="nm_vksn" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $pecah['nm_vaksin']; ?>" required="required" >
                </div>
              </div>                      
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="harga" class="form-control col-md-7 col-xs-12" type="number" value="<?php echo $pecah['harga']; ?>" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Stok</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="stok" class="form-control col-md-7 col-xs-12" type="number" value="<?php echo $pecah['stok']; ?>" required="required">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="index.php?page=imun_vaksin" class="btn btn-danger"> Kembali</a>                  
                  <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                </div>
              </div>

            </form>
          <?php }} ?>
        </div>
      </div>
    </div>
  </div>
