<?php

if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'hapus') {
    $kd_detpol= $_GET['kd_detpol'];
    mysqli_query($db, "DELETE FROM det_poly WHERE kd_detpol = '$kd_detpol'");

    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location='index.php?page=layanan'</script>";
  }
}


?>

<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">

          <li role="presentation" class=""><a href="index.php?page=poly"  id="profile-tabb" aria-controls="profile" aria-expanded="false">Data Poly</a>
          </li>
        </ul>
        <div class="x_title">
          <h2>Data Layanan Poly </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"> <br>
          <table id="example" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Poly</th>
                <th>Layanan</th>
                <th>Biaya</th>
                <th>Aksi</th>
              </tr>
            </thead>


            <tbody>
              <?php
              $no     = 1;
              $query  = mysqli_query($db,"SELECT det_poly.*,poly.nama_poly FROM det_poly JOIN poly ON det_poly.kd_poly=poly.kd_poly");
              $hitung = mysqli_num_rows($query);
              if ($hitung>0) {
                while ($pecah = mysqli_fetch_assoc($query)) {

                  ?>
                  <tr>
                    <td class="col-md-1 col-sm-1 col-xs-1"><?php echo $no; ?></td>
                    <td class="col-md-3 col-sm-3 col-xs-3"> <?php echo $pecah ['nama_poly']; ?></td>
                    <td><?php echo $pecah ['layanan'];?></td>
                    <td><?php echo rupiah($pecah ['biaya']);?></td>
                    <td>
                      <a class="btn btn-xs btn-info" href="index.php?page=editlayanan&kd_detpol=<?php echo $pecah['kd_detpol']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                      <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=layanan&aksi=hapus&kd_detpol=<?php echo $pecah['kd_detpol']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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
