<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $id_bidan= $_GET['id_bidan'];
    mysqli_query($db, "DELETE FROM bidan WHERE id_bidan = '$id_bidan'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=bidan'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Bidan </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a href="index.php?page=tambahbidan" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Bidan</a> <br> <br>
        <script src="localhost:8080/klinikcm/aset/vendors/datatables.net/js/jquery.dataTables.js"></script>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Id Bidan</th>
              <th>Nama Lengkap</th>
              <th>Alamat</th>
              <th>No Handphone</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $no     = 1;
            $query  = mysqli_query($db,"SELECT * FROM bidan");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $pecah ['id_bidan']; ?></td>
                  <td><?php echo $pecah ['nama'];?></td>
                  <td><?php echo $pecah ['alamat'];?></td>
                  <td><?php echo $pecah ['no_hp'];?></td>
                  <td>
                    <a class="btn btn-xs btn-info" href="index.php?page=editbidan&id_bidan=<?php echo $pecah['id_bidan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-xs btn-success" href="index.php?page=detailbidan&id_bidan=<?php echo $pecah['id_bidan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-search"></i></a>
                    <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=bidan&aksi=hapus&id_bidan=<?php echo $pecah['id_bidan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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
