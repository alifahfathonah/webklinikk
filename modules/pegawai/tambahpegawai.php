<?php
if (isset($_POST['simpan'])) {
  $id_pegawai  = $_POST['id_pegawai'];
  $nama   = $_POST['nama_lengkap'];
  $email   = $_POST['email'];
  $pass   = $_POST['email'];
  $jabatan = $_POST['jabatan'];
  $alamat  = $_POST['alamat'];
  $agama  = $_POST['agama'];
  $jk  = $_POST['jk'];
  $tempat_lahir  = $_POST['tempat_lahir'];
  $tgl_lahir  = $_POST['tgl_lahir'];
  $no_hp  = $_POST['no_hp'];

  $result = mysqli_query($db, "SELECT email FROM users WHERE email='$email'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>alert('Username Sudah Terdaftar')</script>";
    echo "<script>window.location='index.php?page=tambahpegawai'</script>";

    return false;
  }


  mysqli_query($db, "INSERT INTO pegawai(id_pegawai,nama,jabatan,alamat,agama,jk,tempat_lahir,tanggal_lahir,no_hp) VALUES ('$id_pegawai','$nama','$jabatan','$alamat','$agama','$jk','$tempat_lahir','$tgl_lahir','$no_hp')");

  $pass = password_hash($pass, PASSWORD_DEFAULT);

  mysqli_query($db, "INSERT INTO users(id_user,nama,email,pasword,level) VALUES ('$id_pegawai','$nama','$email','$pass','$jabatan')");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=pegawai'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah Pegawai </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Pegawai <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <?php

              $sql1  = "SELECT max(id_pegawai) AS terakhirpas FROM pegawai";
              $hasil1  = mysqli_query($db, $sql1);
              $data1   = mysqli_fetch_assoc($hasil1);
              $lastid1 = $data1['terakhirpas'];
              $lastnourut1 = (int)substr($lastid1,4,4);
              $nexturut1   = $lastnourut1+1;
              $nextid1     = "PGW-".sprintf("%04s",$nexturut1);

              ?>
              <input type="text" name="id_pegawai" required="required" value="<?php echo $nextid1; ?>" class="form-control col-md-7 col-xs-12" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="nama_lengkap" class="form-control col-md-7 col-xs-12" type="text" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="email" class="form-control col-md-7 col-xs-12" type="email" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="jabatan">
                <option name="jabatan">Administrasi</option>
                <option name="jabatan">Apoteker</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea class="form-control" rows="5" name="alamat" required="required"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="agama">
                <option>Islam</option>
                <option>Kristen</option>
                <option>Katolik</option>
                <option>Hindu</option>
                <option>Buddha</option>
                <option>Konghucu</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div>
                <label>
                  <input type="radio" name="jk" value="Laki-Laki"> &nbsp; Laki-Laki &nbsp;
                </label>
                <label>
                  <input type="radio" name="jk" value="Perempuan"> Perempuan
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="tempat_lahir" class="form-control col-md-7 col-xs-12" type="text" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="tgl_lahir" class="form-control col-md-7 col-xs-12" type="date" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Handphone</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="no_hp" class="form-control col-md-7 col-xs-12" type="number" required="required">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="index.php?page=pegawai" class="btn btn-danger"> Kembali</a>              
              <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
