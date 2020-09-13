<?php
if (isset($_POST['simpan'])) {
  $id_jadwal  = $_POST['id_jadwal'];
  $tgl_jdwl =$_POST['tgl_jdwl'];
  $id_bidan   = $_POST['id_bidan'];    
  $jm_mulai  = $_POST['jm_mulai'];
  $jam_selesai  = $_POST['jam_selesai'];   

  mysqli_query($db, "UPDATE jad_bid SET
    hari='$tgl_jdwl',
    waktu_mulai='$jm_mulai',
    waktu_selesai='$jam_selesai',
    id_bidan='$id_bidan' WHERE id_jadwal='$id_jadwal'");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php?page=jadbid'</script>";

}
?>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Edit Jadwal Bidan </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <?php 

        $id_jadwal = $_GET['id_jadwal'];
        $query  = mysqli_query($db,"SELECT * FROM jad_bid WHERE id_jadwal='$id_jadwal'");
        $hitung = mysqli_num_rows($query);
        if ($hitung>0) {
          while ($pecah = mysqli_fetch_assoc($query)) {

           ?>
           <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

            <div class="form-group">
              <input type="hidden" name="id_jadwal" value="<?php echo $pecah['id_jadwal']; ?>">
              <label class="control-label col-md-3 col-sm-3 col-xs-3">Bidan</label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <select class="form-control" name="id_bidan">
                  <?php
                  $query = mysqli_query($db, "SELECT * FROM bidan");
                  while ($row = mysqli_fetch_assoc($query)) {
                    if ($pecah[id_bidan] == $row[id_bidan]) {
                     echo "<option value=$row[id_bidan] selected>$row[nama]</option>";
                   }
                   else {
                     echo "<option value=$row[id_bidan]>$row[nama]</option>";
                   }
                 }
                 ?>
               </select>
             </div>
           </div><br><br>
           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                        
              <input name="tgl_jdwl" class="form-control col-md-3 col-xs-3" type="date" value="<?php echo $pecah['hari']; ?>">
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Mulai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">

              <input name="jm_mulai" class="form-control col-md-4 col-xs-4" type="time" value="<?php echo $pecah['waktu_mulai']; ?>">                          
            </div>
            <label class="control-label col-md col-sm-1 col-xs-1">Selesai</label>
            <div class="col-md-2 col-sm-2 col-xs-2">                          
              <input name="jam_selesai" class="form-control col-md-4 col-xs-4" type="time" value="<?php echo $pecah['waktu_selesai']; ?>">
            </div>
          </div>  


          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="index.php?page=jadbid" class="btn btn-danger"> Kembali</a>              
              <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
            </div>
          </div>
        <?php }} ?>
      </form>
    </div>
  </div>
</div>
</div>





