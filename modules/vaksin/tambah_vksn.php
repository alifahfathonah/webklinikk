<?php
if (isset($_POST['simpan'])) {

  $nama   = $_POST['nm_vksn'];
  $harga   = $_POST['harga'];
  $stok   = $_POST['stok'];

  mysqli_query($db, "INSERT INTO imun_vaksin(nm_vaksin,stok,harga) VALUES ('$nama','$stok','$harga')");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=imun_vaksin'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah Vaksin </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Vaksin</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="nm_vksn" class="form-control col-md-7 col-xs-12" type="text" required="required" autofocus>
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
              <a href="index.php?page=imun_vaksin" class="btn btn-danger"> Kembali</a>              
              <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
