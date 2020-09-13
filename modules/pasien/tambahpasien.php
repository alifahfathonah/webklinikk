<?php
if (isset($_POST['simpan'])) {
  $no_rm  = $_POST['no_rm'];
  $nama   = $_POST['nama_lengkap'];
  $jk  = $_POST['jk'];
  $agama  = $_POST['agama'];
  $alamat  = $_POST['alamat'];
  $tempat_lahir   = $_POST['tempat_lahir'];
  $tgl_lahir  = $_POST['tgl_lahir'];
  $pekerjaan = $_POST['pekerjaan'];
  $no_hp  = $_POST['no_hp'];
  $alergi  = $_POST['alergi'];
  $pendidikan  = $_POST['pendidikan'];


  mysqli_query($db, "INSERT INTO pasien(no_rm,nama_lengkap,jk,agama,alamat,tempat_lahir,tgl_lahir,pekerjaan,no_hp,alergi_obat,pendidikan_akhir) VALUES ('$no_rm','$nama','$jk','$agama','$alamat','$tempat_lahir','$tgl_lahir','$pekerjaan','$no_hp','$alergi','$pendidikan')");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=pasien'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah Pasien </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">No Rekam Medis <span class="required"></span>
            </label>
            <?php
            $date= date("Y-m-d");

            $sql  = "SELECT max(no_rm) AS terakhir FROM pasien";
            $hasil  = mysqli_query($db, $sql);
            $data = mysqli_fetch_array($hasil);
            $noOrder = $data['terakhir'];
            $noUrut = (int) substr($noOrder, 9, 3);
            $noUrut++;
            $char = "RM-";
            $tahun=substr($date, 0, 4);
            $next_id = $char .$tahun . sprintf("%03s", $noUrut);

            ?>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="no_rm" required="required" value="<?php echo $next_id; ?>" class="form-control col-md-7 col-xs-12" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="nama_lengkap" class="form-control col-md-7 col-xs-12" type="text" required="required">
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea class="form-control" rows="5" name="alamat" required="required"></textarea>
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
              <input name="tgl_lahir" class="form-control col-md-7 col-xs-12" type="date" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="pekerjaan" class="form-control col-md-7 col-xs-12" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Handphone</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="no_hp" class="form-control col-md-7 col-xs-12" type="number">
            </div>
          </div>
          <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan Terkahir </label>
           <div class="col-md-6 col-sm-6 col-xs-12">                             
            <select class="form-control"  name="pendidikan">
              <option>SD</option>
              <option>SMP</option>
              <option>SMA</option>
              <option>D3</option>
              <option>D4</option>
              <option>S1</option>
              <option>S2</option>
              <option>S3</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Alergi Obat</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="form-control" rows="3" name="alergi"></textarea>
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <a href="index.php?page=pasien" class="btn btn-danger"> Kembali</a>            
            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</div>
