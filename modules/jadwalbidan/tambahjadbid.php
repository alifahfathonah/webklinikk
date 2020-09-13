<?php
if (isset($_POST['simpan'])) {    
  $id_bidan   = $_POST['id_bidan'];
  $senin  = $_POST['senin'];
  $selasa  = $_POST['selasa'];
  $rabu  = $_POST['rabu'];
  $kamis  = $_POST['kamis'];
  $jumat  = $_POST['jumat'];
  $sabtu  = $_POST['sabtu'];
  $jm1  = $_POST['jm1'];
  $jm2  = $_POST['jm2'];
  $jm3  = $_POST['jm3'];
  $jm4  = $_POST['jm4'];
  $jm5  = $_POST['jm5'];
  $jm6  = $_POST['jm6'];
  $js1  = $_POST['js1'];
  $js2  = $_POST['js2'];
  $js3  = $_POST['js3'];
  $js4  = $_POST['js4'];
  $js5  = $_POST['js5'];
  $js6  = $_POST['js6'];    

  mysqli_query($db, "INSERT INTO jad_bid(hari,waktu_mulai,waktu_selesai,id_bidan) VALUES ('$senin','$jm1','$js1','$id_bidan'),('$selasa','$jm2','$js2','$id_bidan'),('$rabu','$jm3','$js3','$id_bidan'),('$kamis','$jm4','$js4','$id_bidan'),('$jumat','$jm5','$js5','$id_bidan'),('$sabtu','$jm6','$js6','$id_bidan')");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=jadbid'</script>";


}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Tambah Jadwal Bidan </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Bidan</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <select class="form-control" name="id_bidan">
                <?php
                $query = mysqli_query($db, "SELECT * FROM bidan");
                while ($row = mysqli_fetch_assoc($query)) {
                  echo "<option value='$row[id_bidan]'>$row[nama]</option>";
                }
                ?>
              </select>
            </div>
          </div><br><br>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                        
              <input name="senin" class="form-control col-md-3 col-xs-3" type="date">
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Mulai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">

              <input name="jm1" class="form-control col-md-4 col-xs-4" type="time">                          
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Selesai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                          
              <input name="js1" class="form-control col-md-4 col-xs-4" type="time">
            </div>
          </div>  

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                        
              <input name="selasa" class="form-control col-md-3 col-xs-3" type="date">
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Mulai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">

              <input name="jm2" class="form-control col-md-4 col-xs-4" type="time">                          
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Selesai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                          
              <input name="js2" class="form-control col-md-4 col-xs-4" type="time">
            </div>
          </div> 

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                        
              <input name="rabu" class="form-control col-md-3 col-xs-3" type="date">
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Mulai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">

              <input name="jm3" class="form-control col-md-4 col-xs-4" type="time">                          
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Selesai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                          
              <input name="js3" class="form-control col-md-4 col-xs-4" type="time">
            </div>
          </div> 

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                        
              <input name="kamis" class="form-control col-md-3 col-xs-3" type="date">
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Mulai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">

              <input name="jm4" class="form-control col-md-4 col-xs-4" type="time">                          
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Selesai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                          
              <input name="js4" class="form-control col-md-4 col-xs-4" type="time">
            </div>
          </div> 

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                        
              <input name="jumat" class="form-control col-md-3 col-xs-3" type="date">
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Mulai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">

              <input name="jm5" class="form-control col-md-4 col-xs-4" type="time">                          
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Selesai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                          
              <input name="js5" class="form-control col-md-4 col-xs-4" type="time">
            </div>
          </div>                                                                  

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                        
              <input name="sabtu" class="form-control col-md-3 col-xs-3" type="date">
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Mulai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">

              <input name="jm6" class="form-control col-md-4 col-xs-4" type="time">                          
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Selesai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                          
              <input name="js6" class="form-control col-md-4 col-xs-4" type="time">
            </div>
          </div>                                                                                                                                   
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="index.php?page=jadbid" class="btn btn-danger"> Kembali</a>						  
              <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
