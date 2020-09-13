<?php
if (isset($_POST['simpan'])) {
  $kd_obat  = $_POST['kd_obat'];
  $nama   = $_POST['nama'];
  $satuan   = $_POST['satuan'];
  $harga   = $_POST['harga'];
  $stok   = $_POST['stok'];

  mysqli_query($db, "UPDATE obat SET
    nama_obat = '$nama',
    satuan = '$satuan',
    harga = '$harga',
    stok = '$stok' WHERE kd_obat = '$kd_obat'");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=obat'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Edit Obat </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <?php
        $kd_obat = $_GET['kd_obat'];
        $query  = mysqli_query($db,"SELECT * FROM obat WHERE kd_obat='$kd_obat'");
        $hitung = mysqli_num_rows($query);
        if ($hitung>0) {
          while ($pecah = mysqli_fetch_assoc($query)) {

            ?>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Obat <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="kd_obat" required="required" value="<?php echo $pecah['kd_obat']; ?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Obat</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="nama" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $pecah['nama_obat']; ?>" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="satuan" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $pecah['satuan']; ?>" required="required">
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
                  <a href="index.php?page=obat" class="btn btn-danger"> Kembali</a>                  
                  <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                </div>
              </div>

            </form>
          <?php }} ?>
        </div>
      </div>
    </div>
  </div>
