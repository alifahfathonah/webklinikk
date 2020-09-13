<?php
if (isset($_POST['simpan'])) {
  $username   = $_POST['username'];
  $password   = $_POST['pasword'];
  $repassword = $_POST['repasword'];
  $level      = $_POST['level'];

  $result = mysqli_query($db, "SELECT username FROM users WHERE username='$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>alert('Username Sudah Terdaftar')</script>";
    echo "<script>window.location='index.php?page=tambahuser'</script>";

    return false;
  }

  if ($password != $repassword) {
    echo "<script>alert('Password Tidak Sama')</script>";
    echo "<script>window.location='index.php?page=tambahuser'</script>";

    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  mysqli_query($db, "INSERT INTO users(username,pasword,level) VALUES ('$username','$password','$level')");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=users'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah User </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="username" class="form-control col-md-7 col-xs-12" type="text" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="pasword" class="form-control col-md-7 col-xs-12" type="password" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Re-Password</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="repasword" class="form-control col-md-7 col-xs-12" type="password" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="level">
                <option>Admin</option>
                <option>Dokter</option>
                <option>Bidan</option>
                <option>Apoteker</option>
              </select>
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
