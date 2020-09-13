<?php

	
  if (isset($_POST['ganti'])) {
  	$id_user = $_SESSION['id_user'];
    $passlama  = $_POST['passlama'];
    $passbaru   = $_POST['passbaru'];
    $repass   = $_POST['repass'];


    $query = mysqli_query($db, "SELECT * FROM users WHERE id_user='$id_user'");
    $row = mysqli_fetch_object($query);

    if (password_verify($passlama, $row->pasword)) {
    	if ($passbaru==$repass) {
    		$query1= mysqli_query($db, "UPDATE users SET pasword='".password_hash($passbaru, PASSWORD_DEFAULT).
    			"' WHERE id_user='$id_user'");
    		echo "<script>alert('Password Berhasil Diganti')</script>";
    		echo "<script>window.location='index.php?page=dashboard'</script>";
    	}else{
    		echo "<script>alert('Password Tidak Sama')</script>";
    	}
    }else{
    	echo "<script>alert('Password Salah')</script>";
    }


  }
 ?>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Ganti Password </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password Lama <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="passlama" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password Baru</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="passbaru" class="form-control col-md-7 col-xs-12" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Re-Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="repass" class="form-control col-md-7 col-xs-12" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="index.php" class="btn btn-danger"> Kembali</a>
                          <button type="submit" class="btn btn-success" name="ganti">Ganti Password</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
