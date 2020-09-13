<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $kd_poly= $_GET['kd_poly'];
    mysqli_query($db, "DELETE FROM poly WHERE kd_poly = '$kd_poly'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=poly'</script>";
  }
}


?>

<div class="" role="tabpanel" data-example-id="togglable-tabs">                      
  <div id="myTabContent2" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">

              <li role="presentation" class=""><a href="index.php?page=layanan"  id="profile-tabb" aria-controls="profile" aria-expanded="false">Data Layanan Poly</a>
              </li>
            </ul>
            <div class="x_title">
              <h2>Data Poly </h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <a href="index.php?page=tambahpoly" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Poly</a> <br> <br>
              <table id="example" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Poly</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                </thead>


                <tbody>
                  <?php
                  $no     = 1;
                  $query  = mysqli_query($db,"SELECT * FROM poly");
                  $hitung = mysqli_num_rows($query);
                  if ($hitung>0) {
                    while ($pecah = mysqli_fetch_assoc($query)) {

                      ?>
                      <tr>
                        <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $no; ?></td>
                        <td class="col-md-3 col-sm-3 col-xs-3"> <?php echo $pecah ['kd_poly']; ?></td>
                        <td><?php echo $pecah ['nama_poly'];?></td>
                        <td>
                          <a class="btn btn-xs btn-info" href="index.php?page=editpoly&kd_poly=<?php echo $pecah['kd_poly']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                          <a class="btn btn-xs btn-info" href="index.php?page=tambahlayanan&kd_poly=<?php echo $pecah['kd_poly']; ?>" data-toggle="tooltip" data-placement="bottom" title="Tambah Layanan"><i class="fa fa-plus"></i></a>
                          <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=poly&aksi=hapuslay&kd_poly=<?php echo $pecah['kd_poly']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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

          </div>
        </div>
      </div>
