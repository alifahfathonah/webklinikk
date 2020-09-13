<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $kd_obat= $_GET['kd_obat'];
    mysqli_query($db, "DELETE FROM obat WHERE kd_obat = '$kd_obat'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=obat'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Obat </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a href="index.php?page=tambahobat" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Obat</a> <br> <br>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Obat</th>
              <th>Nama Obat</th>
              <th>Satuan</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $no     = 1;
            $query  = mysqli_query($db,"SELECT * FROM obat");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $no; ?></td>
                  <td class="col-md-3 col-sm-3 col-xs-3"> <?php echo $pecah ['kd_obat']; ?></td>
                  <td><?php echo $pecah ['nama_obat'];?></td>
                  <td><?php echo $pecah ['satuan'];?></td>
                  <td><?php echo rupiah($pecah['harga']); ?></td>
                  <td><?php echo $pecah ['stok'];?></td>
                  <td>
                    <a class="btn btn-xs btn-info" href="index.php?page=editobat&kd_obat=<?php echo $pecah['kd_obat']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=obat&aksi=hapus&kd_obat=<?php echo $pecah['kd_obat']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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
