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
  $pendidikan = $_POST['pendidikan'];


  mysqli_query($db, "UPDATE pasien SET
    nama_lengkap = '$nama',
    jk = '$jk',
    agama = '$agama',
    alamat = '$alamat',
    tempat_lahir = '$tempat_lahir',
    tgl_lahir = '$tgl_lahir',
    pekerjaan = '$pekerjaan',
    no_hp = '$no_hp',
    alergi_obat = '$alergi',
    pendidikan_akhir = '$pendidikan' WHERE no_rm = '$no_rm'");

  echo "<script>alert('Data Berhasil Diubah')</script>";
  echo "<script>window.location='index.php?page=pasien'</script>";


}
?>

<div class="clearfix"></div>
<div class="row">
 <div class="col-md-12 col-sm-12 col-xs-12">
   <div class="x_panel">
     <div class="x_title">
       <h2>Form Edit Data Pasien </h2>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">
       <br />
       <?php
       $no_rm = $_GET['no_rm'];
       $query  = mysqli_query($db,"SELECT * FROM pasien WHERE no_rm='$no_rm'");
       $hitung = mysqli_num_rows($query);
       if ($hitung>0) {
        while ($pecah = mysqli_fetch_assoc($query)) {

          ?>
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">No Rekam Medis <span class="required"></span>
             </label>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" name="no_rm" required="required" value="<?php echo $pecah ['no_rm']; ?>" class="form-control col-md-7 col-xs-12" readonly>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <input name="nama_lengkap" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $pecah ['nama_lengkap']; ?>" required="required">
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
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <textarea class="form-control" rows="5" name="alamat" required><?php echo $pecah ['alamat']; ?></textarea>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir</label>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <input name="tempat_lahir" class="form-control col-md-7 col-xs-12" type="text"  value="<?php echo $pecah ['tempat_lahir']; ?>" required>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <input name="tgl_lahir" class="form-control col-md-7 col-xs-12" type="date" value="<?php echo $pecah ['tgl_lahir']; ?>" required>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan</label>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <input name="pekerjaan" class="form-control col-md-7 col-xs-12" type="text"  value="<?php echo $pecah ['pekerjaan']; ?>" required>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Handphone</label>
             <div class="col-md-6 col-sm-6 col-xs-12">
               <input name="no_hp" class="form-control col-md-7 col-xs-12" type="number"  value="<?php echo $pecah ['no_hp']; ?>" required>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan Terkahir </label>
             <div class="col-md-6 col-sm-6 col-xs-12">                             
              <select class="form-control"  name="pendidikan">
                <option <?php if($pecah ['pendidikan_akhir'] == "SD"){echo "selected='true'";} ?>>SD</option>
                <option <?php if($pecah ['pendidikan_akhir'] == "SMP"){echo "selected='true'";} ?>>SMP</option>
                <option <?php if($pecah ['pendidikan_akhir'] == "SMA"){echo "selected='true'";} ?>>SMA</option>
                <option <?php if($pecah ['pendidikan_akhir'] == "D3"){echo "selected='true'";} ?>>D3</option>
                <option <?php if($pecah ['pendidikan_akhir'] == "D4"){echo "selected='true'";} ?>>D4</option>
                <option <?php if($pecah ['pendidikan_akhir'] == "S1"){echo "selected='true'";} ?>>S1</option>
                <option <?php if($pecah ['pendidikan_akhir'] == "S2"){echo "selected='true'";} ?>>S2</option>
                <option <?php if($pecah ['pendidikan_akhir'] == "S3"){echo "selected='true'";} ?>>S3</option>
              </select>
            </div>
          </div>
          <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Alergi Obat</label>
           <div class="col-md-6 col-sm-6 col-xs-12">
             <textarea class="form-control" rows="3" name="alergi" required><?php echo $pecah ['alergi_obat']; ?></textarea>
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
     <?php }} ?>
   </div>
 </div>
</div>
</div>
