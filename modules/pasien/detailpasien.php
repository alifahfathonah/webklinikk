<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Detail Data Pasien </h2>
        <ul class="nav navbar-right">
          <li><a class="close-link" href="index.php?page=pasien" class="pull-right"><i class="fa fa-close"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <?php

        $no_rm = $_GET['no_rm'];
        $query  = mysqli_query($db,"SELECT * FROM pasien WHERE no_rm='$no_rm'");
        $hitung = mysqli_num_rows($query);
        if ($hitung>0) {
         while ($pecah = mysqli_fetch_assoc($query)) {

          ?>
          <table id="datatable" class="table table-striped table-bordered">
            <tr>
              <td>No Rekam Medis</td>
              <td><?php echo $pecah['no_rm']; ?></td>
            </tr>
            <tr>
              <td>Nama Pasien</td>
              <td><?php echo $pecah['nama_lengkap']; ?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td><?php echo $pecah['jk']; ?></td>
            </tr>
            <tr>
              <td>Agama</td>
              <td><?php echo $pecah['agama']; ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td><?php echo $pecah['alamat']; ?></td>
            </tr>
            <tr>
              <td>Tempat Lahir</td>
              <td><?php echo $pecah['tempat_lahir']; ?></td>
            </tr>
            <tr>
              <td>Tanggal Lahir</td>
              <td><?php echo date('d-m-Y',strtotime($pecah['tgl_lahir'])); ?></td>
            </tr>
            <tr>
              <td>Pekerjaan</td>
              <td><?php echo $pecah['pekerjaan']; ?></td>
            </tr>
            <tr>
              <td>No Handphone</td>
              <td><?php echo $pecah['no_hp']; ?></td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir</td>
              <td><?php echo $pecah['pendidikan_akhir']; ?></td>
            </tr>
            <tr>
              <td>Alergi Obat</td>
              <td><?php if($pecah['alergi_obat']==''){echo "Tidak Ada Alergi Obat";}else{echo $pecah['alergi_obat'];} ?></td>
            </tr>
          </table>
        <?php }} ?>
      </div>
    </div>
  </div>

</div>
<br>
