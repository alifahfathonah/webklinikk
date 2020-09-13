
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2> Detail Data Owner </h2>
                      <ul class="nav navbar-right">
                        <li><a class="close-link" href="index.php?page=owner" class="pull-right"><i class="fa fa-close"></i></a></li>
                    </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <?php

                         $id_owner = $_GET['id_owner'];
                         $query  = mysqli_query($db,"SELECT * FROM owner WHERE id_owner='$id_owner'");
                         $hitung = mysqli_num_rows($query);
                         if ($hitung>0) {
                           while ($pecah = mysqli_fetch_assoc($query)) {

                      ?>
        <table id="datatable" class="table table-striped table-bordered" style="text-align:bold">
            <tr>
                <td>ID Dokter</td>
                <td><?php echo $pecah['id_owner']; ?></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><?php echo $pecah['nama']; ?></td>
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
                <td><?php echo $pecah['tmpt_lahir']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><?php echo date('d-m-Y',strtotime($pecah['tgl_lahir'])); ?></td>
            </tr>
            <tr>
                <td>No Handphone</td>
                <td><?php echo $pecah['no_hp']; ?></td>
            </tr>
        </table>
      <?php }} ?>
      </div>
    </div>
  </div>

  </div>
  <br>
