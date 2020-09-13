<?php
if (isset($_POST['simpan'])) {
  $kd_obat  = $_POST['kd_obat'];
  $nama   = $_POST['nama'];
  $satuan   = $_POST['satuan'];
  $harga   = $_POST['harga'];
  $stok   = $_POST['stok'];

  mysqli_query($db, "INSERT INTO obat(kd_obat,nama_obat,satuan,harga,stok) VALUES ('$kd_obat','$nama','$satuan','$harga','$stok')");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=obat'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah Obat </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Obat <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php

              $sql1  = "SELECT max(kd_obat) AS terakhirpas FROM obat";
              $hasil1  = mysqli_query($db, $sql1);
              $data1   = mysqli_fetch_assoc($hasil1);
              $lastid1 = $data1['terakhirpas'];
              $lastnourut1 = (int)substr($lastid1,4,4);
              $nexturut1   = $lastnourut1+1;
              $nextid1     = "OBT-".sprintf("%04s",$nexturut1);

              ?>
              <input type="text" name="kd_obat" required="required" value="<?php echo $nextid1; ?>" class="form-control col-md-7 col-xs-12" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Obat</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="nama" class="form-control col-md-7 col-xs-12" type="text" required="required" autofocus>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="satuan" class="form-control col-md-7 col-xs-12" type="text" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="harga" class="form-control col-md-7 col-xs-12" type="number" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Stok</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="stok" class="form-control col-md-7 col-xs-12" type="number" required="required">
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
      </div>
    </div>
  </div>
</div>
