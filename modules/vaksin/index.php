<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $kd_vaksin= $_GET['kd_vaksin'];
    mysqli_query($db, "DELETE FROM imun_vaksin WHERE kd_vaksin = '$kd_vaksin'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=imun_vaksin'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Vaksin Imunisasi </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a href="index.php?page=tambah_vaksin" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Vaksin</a> <br> <br>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>                            
              <th>Nama Vaksin</th>                            
              <th>Stok</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $no     = 1;
            $query  = mysqli_query($db,"SELECT * FROM imun_vaksin");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $no; ?></td>
                  <td><?php echo $pecah ['nm_vaksin'];?></td>                            
                  <td><?php echo $pecah ['stok'];?></td>
                  <td><?php echo rupiah($pecah['harga']); ?></td>
                  <td>
                    <a class="btn btn-xs btn-info" href="index.php?page=edit_vaksin&kd_vaksin=<?php echo $pecah['kd_vaksin']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=imun_vaksin&aksi=hapus&kd_vaksin=<?php echo $pecah['kd_vaksin']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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
