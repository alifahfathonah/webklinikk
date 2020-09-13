<?php
if (isset($_POST['simpan'])) {

  $nama   = $_POST['nm_alatkb'];
  $biaya   = $_POST['biaya'];  

  mysqli_query($db, "INSERT INTO alat_kb(nama_alat,biaya) VALUES ('$nama','$biaya')");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=kontrasepsi'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah Alat Kontrasespi </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Alat Kontrasespi</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="nm_alatkb" class="form-control col-md-7 col-xs-12" type="text" required="required" autofocus>
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
              <a href="index.php?page=kontrasepsi" class="btn btn-danger"> Kembali</a>              
              <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
