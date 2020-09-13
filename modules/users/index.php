<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $no_user= $_GET['no'];
    mysqli_query($db, "DELETE FROM users WHERE no = '$no_user'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=poly'</script>";
  }
}

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data User </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <a href="index.php?page=tambahuser" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a> <br> <br>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>ID User</th>
              <th>Email</th>
              <th>Password</th>
              <th>Level</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>


          <tbody>
            <?php
            $no     = 1;
            $query  = mysqli_query($db,"SELECT * FROM users");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

                ?>
                <tr>
                  <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $no; ?></td>
                  <td class="col-md-3 col-sm-3 col-xs-3"> <?php echo $pecah ['id_user']; ?></td>
                  <td class="col-md-3 col-sm-3 col-xs-3"> <?php echo $pecah ['email']; ?></td>
                  <td><?php echo $pecah ['pasword'];?></td>
                  <td><?php echo $pecah ['level'];?></td>
                  <td><?php echo $pecah ['status'];?></td>
                  <td>
                    <a class="btn btn-xs btn-info" href="index.php?page=edituser&no_user=<?php echo $pecah['no']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=user&aksi=hapus&no_user=<?php echo $pecah['no']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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
