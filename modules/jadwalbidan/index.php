<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $id_jadwal= $_GET['id_jadwal'];
    mysqli_query($db, "DELETE FROM jad_bid WHERE id_jadwal = '$id_jadwal'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=jadbid'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Jadwal Bidan </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a href="index.php?page=tamjadbid" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Jadwal Bidan</a> <br> <br>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>     
              <th>Bidan</th>                        
              <th>Hari</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $no     = 1;
            $query  = mysqli_query($db,"SELECT jad_bid.id_jadwal, jad_bid.hari AS jad,jad_bid.waktu_mulai,jad_bid.waktu_selesai,bidan.nama FROM jad_bid JOIN bidan ON jad_bid.id_bidan=bidan.id_bidan");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $pecah ['nama']; ?></td>
                  <td><?php echo days(date('D',strtotime($pecah['jad'])));?></td>
                  <td><?php echo $pecah ['waktu_mulai'];?></td>
                  <td><?php echo $pecah ['waktu_selesai'];?></td>                            
                  <td>
                    <a class="btn btn-xs btn-info" href="index.php?page=editjadbid&id_jadwal=<?php echo $pecah['id_jadwal']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>                              
                    <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=jadbid&aksi=hapus&id_jadwal=<?php echo $pecah['id_jadwal']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                      <i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php $no++; }} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
