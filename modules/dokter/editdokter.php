<?php
if (isset($_POST['simpan'])) {
  $id_dokter  = $_POST['id_dokter'];
  $nama   = $_POST['nama_lengkap'];
  $jk  = $_POST['jk'];
  $agama  = $_POST['agama'];
  $alamat  = $_POST['alamat'];
  $temp_lahir   = $_POST['tempat_lahir'];
  $tgl_lahir   = $_POST['tgl_lahir'];
  $no_hp  = $_POST['no_hp'];


  mysqli_query($db, "UPDATE dokter,users SET
    dokter.id_dokter = '$id_dokter',
    dokter.nama = '$nama',
    dokter.jk = '$jk',
    dokter.agama = '$agama',
    dokter.alamat = '$alamat',
    dokter.tempat_lahir = '$temp_lahir',
    dokter.tgl_lahir = '$tgl_lahir',
    dokter.no_hp = '$no_hp',
    users.nama ='$nama', WHERE id_dokter = '$id_dokter' AND users.id_user='$id_dokter'");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=dokter'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Edit Data Dokter </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <?php
        $id_dokter = $_GET['id_dokter'];
        $query  = mysqli_query($db,"SELECT * FROM dokter WHERE id_dokter='$id_dokter'");
        $hitung = mysqli_num_rows($query);
        if ($hitung>0) {
          while ($pecah = mysqli_fetch_assoc($query)) {

            ?>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Dokter <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="id_dokter" required="required" value="<?php echo $pecah ['id_dokter']; ?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="nama_lengkap" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $pecah ['nama']; ?>" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div>
                    <label>
                      <input type="radio" name="jk" value="Laki-Laki" <?php if($pecah ['jk'] == "Laki-Laki"){echo "checked='true'";} ?>> &nbsp; Laki-Laki &nbsp;
                    </label>
                    <label>
                      <input type="radio" name="jk" value="Perempuan" <?php if($pecah ['jk'] == "Perempuan"){echo "checked='true'";} ?>> Perempuan
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="agama" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $pecah['agama']; ?>" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control" rows="5" name="alamat"  required="required"><?php echo $pecah ['alamat']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="tempat_lahir" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $pecah['tempat_lahir']; ?>" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="tgl_lahir" class="form-control col-md-7 col-xs-12" type="date" value="<?php echo $pecah['tgl_lahir']; ?>" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Handphone</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="no_hp" class="form-control col-md-7 col-xs-12" type="number" value="<?php echo $pecah ['no_hp']; ?>" required="required">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="index.php?page=dokter" class="btn btn-danger"> Kembali</a>                  
                  <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                </div>
              </div>

            </form>
          <?php }} ?>
        </div>
      </div>
    </div>
  </div>
