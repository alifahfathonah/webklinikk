<?php
  if (isset($_POST['simpan'])) {
    $id_bidan  = $_POST['id_bidan'];
    $nama   = $_POST['nama_lengkap'];
    $jk  = $_POST['jk'];
    $alamat  = $_POST['alamat'];
    $agama  = $_POST['agama'];
    $tempat_lahir  = $_POST['tempat_lahir'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    $no_hp  = $_POST['no_hp'];


    mysqli_query($db, "UPDATE bidan,users SET
    bidan.nama = '$nama',
    bidan.jk = '$jk',
    bidan.alamat = '$alamat',
    bidan.agama = '$agama',
    bidan.tempat_lahir = '$tempat_lahir',
    bidan.tgl_lahir = '$tgl_lahir',
    bidan.no_hp = '$no_hp',
    users.nama= '$nama' WHERE id_bidan='$id_bidan' AND users.id_user='$id_bidan'");

    echo "<script>alert('Data Berhasil Tersimpan')</script>";
    echo "<script>window.location='index.php?page=bidan'</script>";


  }
 ?>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah Bidan </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php
                      $id_bidan = $_GET['id_bidan'];
                      $query  = mysqli_query($db,"SELECT * FROM bidan WHERE id_bidan='$id_bidan'");
                      $hitung = mysqli_num_rows($query);
                      if ($hitung>0) {
                        while ($pecah = mysqli_fetch_assoc($query)) {

                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Bidan <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="id_bidan" required="required" value="<?php echo $pecah['id_bidan']; ?>" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="nama_lengkap" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $pecah['nama']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div>
                            <label>
                              <input type="radio" name="jk" value="Laki-Laki"  <?php if($pecah ['jk'] == "Laki-Laki"){echo "checked='true'";} ?>> &nbsp; Laki-Laki &nbsp;
                            </label>
                            <label>
                              <input type="radio" name="jk" value="Perempuan"  <?php if($pecah ['jk'] == "Perempuan"){echo "checked='true'";} ?>> Perempuan
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="5" name="alamat" required="required"><?php echo $pecah['alamat']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="agama">
                            <option <?php if($pecah ['agama'] == "Islam"){echo "selected='true'";} ?>>Islam</option>
                            <option <?php if($pecah ['agama'] == "Kristen"){echo "selected='true'";} ?>>Kristen</option>
                            <option <?php if($pecah ['agama'] == "Katolik"){echo "selected='true'";} ?>>Katolik</option>
                            <option <?php if($pecah ['agama'] == "Hindu"){echo "selected='true'";} ?>>Hindu</option>
                            <option <?php if($pecah ['agama'] == "Buddha"){echo "selected='true'";} ?>>Buddha</option>
                            <option <?php if($pecah ['agama'] == "Konghuchu"){echo "selected='true'";} ?>>Konghucu</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="tempat_lahir" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $pecah['tempat_lahir']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="tgl_lahir" class="form-control col-md-7 col-xs-12" type="date" required="required" value="<?php echo $pecah['tgl_lahir']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Handphone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="no_hp" class="form-control col-md-7 col-xs-12" type="number" required="required" value="<?php echo $pecah['no_hp']; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="index.php?page=bidan" class="btn btn-danger"> Kembali</a>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                        </div>
                      </div>

                    </form>
                  <?php }} ?>
                  </div>
                </div>
              </div>
            </div>
