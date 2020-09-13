<?php
if(isset($_POST['cetak'])) {

    $mintgl  = $_POST['mintgl']." 00:00:00";
    $maxtgl  = $_POST['maxtgl']." 23:59:59";

    $query  = mysqli_query($db, "SELECT * FROM pembayaran WHERE tgl_bayar BETWEEN '$mintgl' AND '$maxtgl' AND keterangan='Telah Melakukan Pembayaran' ORDER BY tgl_bayar ASC");

    $hitung = mysqli_num_rows($query);
        if ($hitung>0) {
          $_SESSION ['mintgl'] = $_POST['mintgl']." 00:00:00";
          $_SESSION ['maxtgl'] = $_POST['maxtgl']." 23:59:59";
          echo "<script>window.open('modules/lappendapatan/lapmasuk.php')</script>";
        }else{
        echo "<script>alert('Laporan Tidak Ditemukan')</script>";
        echo "<script>window.location='index.php?page=cekpendapatan'</script>";
      }
}
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Cetak Laporan Pendapatan </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />        
            <form id="demo-form2" class="form-horizontal form-label-left" method="post">

              <div class="form-group">
                
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Dari Tanggal</label>
                  <input type="date" name="mintgl" class="form-control col-md-7 col-xs-12" >
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label>Sampai Tanggal</label>
                  <input type="date" name="maxtgl" class="form-control col-md-7 col-xs-12">
                </div>
              </div>     
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                  <a href="index.php?page=dashboard" class="btn btn-danger"> Kembali</a>                  
                  <button type="submit" class="btn btn-success" name="cetak">Cetak</button>
                </div>
              </div>         

            </form>          
        </div>
      </div>
    </div>
  </div>
