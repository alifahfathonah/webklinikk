<?php
if (isset($_POST['simpan'])) {
  $kd_poly  = $_POST['kd_poly'];
  $nama   = $_POST['nama'];

  mysqli_query($db, "INSERT INTO poly(kd_poly,nama_poly) VALUES ('$kd_poly','$nama')");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=poly'</script>";


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
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Poly <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php

              $sql1  = "SELECT max(kd_poly) AS terakhirpas FROM poly";
              $hasil1  = mysqli_query($db, $sql1);
              $data1   = mysqli_fetch_assoc($hasil1);
              $lastid1 = $data1['terakhirpas'];
              $lastnourut1 = (int)substr($lastid1,5,2);
              $nexturut1   = $lastnourut1+1;
              $nextid1     = "POLY-".sprintf("%02s",$nexturut1);

              ?>
              <input type="text" name="kd_poly" required="required" value="<?php echo $nextid1; ?>" class="form-control col-md-7 col-xs-12" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Poly</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="nama" class="form-control col-md-7 col-xs-12" type="text" required="required">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="index.php?page=poly" class="btn btn-danger"> Kembali</a>              
              <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
