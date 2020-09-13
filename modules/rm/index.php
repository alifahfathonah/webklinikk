<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $id_pemeriksaan= $_GET['id_pemeriksaan'];
    mysqli_query($db, "DELETE FROM pemeriksaan WHERE id_pemeriksaan = '$id_pemeriksaan'");

    echo "<script>alert('RM Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=rm_pas'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Rekam Medis </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a href="index.php?page=tam_rm" class="btn btn-info"><i class="fa fa-plus"></i> Tambah RM</a> <br> <br>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Periksa</th>
              <th>NO RM</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>              
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $no     = 1;
            $query  = mysqli_query($db,"SELECT pemeriksaan.*, pasien.nama_lengkap,pasien.jk FROM pemeriksaan JOIN pasien ON pasien.no_rm=pemeriksaan.no_rm");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo date("d-m-Y",strtotime($pecah['tgl_pemeriksaan'])); ?></td>
                  <td><?php echo $pecah ['no_rm']; ?></td>
                  <td><?php echo $pecah ['nama_lengkap'];?></td>
                  <td><?php echo $pecah ['jk'];?></td>                  
                  <td>                
                    <a class="btn btn-xs btn-success" href="index.php?page=rekammedis&id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?> &no_rm=<?php echo $pecah['no_rm']; ?>" data-toggle="tooltip" data-placement="bottom" title="Rekam Medis"><i class="glyphicon glyphicon-book"></i></a>
                    <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=rm_pas&aksi=hapus&id_pemeriksaan=<?php echo $pecah['id_pemeriksaan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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
