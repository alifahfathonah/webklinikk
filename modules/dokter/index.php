<?php

  if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
      $id_dokter= $_GET['id_dokter'];
      mysqli_query($db, "DELETE FROM dokter WHERE id_dokter = '$id_dokter'");

      echo "<script>alert('Data Berhasil Dihapus')</script>";
      echo "<script>window.location='index.php?page=dokter'</script>";
    }
  }

 ?>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Data Dokter </h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
  <a href="index.php?page=tambahdokter" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Dokter</a> <br> <br>
                      <table id="example" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Id Dokter</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>


                        <tbody>
                          <?php
                            $no     = 1;
                            $query  = mysqli_query($db,"SELECT * FROM dokter");
                            $hitung = mysqli_num_rows($query);
                            if ($hitung>0) {
                              while ($pecah = mysqli_fetch_assoc($query)) {

                          ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $pecah ['id_dokter']; ?></td>
                            <td><?php echo $pecah ['nama'];?></td>
                            <td><?php echo $pecah ['alamat'];?></td>
                            <td><?php echo $pecah ['no_hp'];?></td>
                            <td>
                              <a class="btn btn-xs btn-info" href="index.php?page=editdokter&id_dokter=<?php echo $pecah['id_dokter']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-xs btn-success" href="index.php?page=detaildokter&id_dokter=<?php echo $pecah['id_dokter']; ?>" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-search"></i></a>                              
                              <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=dokter&aksi=hapus&id_dokter=<?php echo $pecah['id_dokter']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">
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
