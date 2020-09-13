<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $id_jadwal= $_GET['id_jadwal'];
    mysqli_query($db, "DELETE FROM jad_dok WHERE id_jadwal = '$id_jadwal'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=jaddok'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Jadwal Dokter </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a href="index.php?page=tamjaddok" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Jadwal Dokter</a> <br> <br>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>     
              <th>Dokter</th>                       
              <th>Hari</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $no     = 1;
            $query  = mysqli_query($db,"SELECT jad_dok.id_jadwal, jad_dok.hari AS jad,jad_dok.waktu_mulai,jad_dok.waktu_selesai,dokter.nama FROM jad_dok JOIN dokter ON jad_dok.id_dokter=dokter.id_dokter");
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
                    <a class="btn btn-xs btn-info" href="index.php?page=editjaddok&id_jadwal=<?php echo $pecah['id_jadwal']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>                              
                    <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=jaddok&aksi=hapus&id_jadwal=<?php echo $pecah['id_jadwal']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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
